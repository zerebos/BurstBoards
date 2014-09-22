<?php
// Category Table: id, name, sort
// Board Table: id, categoryId, sort, name, description
// Topic Table: id, boardId, author, dateAndTime, title, content
// Reply Table: id, topicId, author, dateAndTime, content

function getPostCount($boardId) {
    global $settings;
    $counts['topics']=0;
    $counts['total']=0;
    $query=mysqli_query($settings['con'], "SELECT * FROM {$settings['topicTable']} WHERE boardId = $boardId");
    if (!$query) {
        die('Could not select: ' . mysqli_error($settings['con']));
    }
    while ($query_array=mysqli_fetch_array($query)) {
        $topicId=$query_array['id'];
        $query2=mysqli_query($settings['con'], "SELECT * FROM {$settings['replyTable']} WHERE topicId = $topicId");
        if (!$query2) {
            die('Could not select: ' . mysqli_error($settings['con']));
        }
        $getArray2=mysqli_fetch_array($query2);
        $counts['topics']+=1;
        $counts['total']+=sizeof($getArray2['id']);

    }
    $counts['total']+=$counts['topics'];
    return $counts;
}

function getBoards($catId) {
    global $settings;
    $query=mysqli_query($settings['con'], "SELECT * FROM {$settings['boardTable']} WHERE categoryId = $catId ORDER BY sort ASC");
    if (!$query) {
        die('Could not select: ' . mysqli_error($settings['con']));
    }
    while ($db = mysqli_fetch_array($query)) {
        $board=new Board;
        $board->setDescription($db['description']);
        $board->setId($db['id']);
        $board->setName($db['name']);
        $board->setOrder($db['sort']);
        $boards[]=$board;
    }
    return $boards;
}


//Returns an array of categories mapped by category name
function getForumSetup() {
    global $settings; // Give access to settings

    // Get all Categories
    $query1=mysqli_query($settings['con'], "SELECT * FROM {$settings['categoryTable']} ORDER BY sort ASC");
    while ($categorydb = mysqli_fetch_array($query1)) {
        $category=new Category;
        $category->setName($categorydb['name']);
        $category->setOrder($categorydb['sort']);
        $category->setId($categorydb['id']);

        // Get all boards in the category
            $boards=getBoards($category->getId());
            $category->addBoard($boards); // assign each board to the category

        $categories[]=$category; // make a list of categories
    }
    return $categories;
}

//$query2=mysqli_query($settings['con'], "SELECT * FROM {$settings['boardTable']} WHERE categoryId = {$category->getId()} ");
//while ($boarddb = mysqli_fetch_array($query2)) {
//    $board=new Board;
//    $board->setDescription($boarddb['description']);
//    $board->setId($boarddb['id']);
//    $board->setName($boarddb['name']);
//    $board->setOrder($boarddb['sort']);
//}