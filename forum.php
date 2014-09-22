<?php
/**
 * Created by PhpStorm.
 * User: Zack
 * Date: 9/10/14
 * Time: 5:30 PM
 */
include_once("inc/settings.php");
include_once("inc/classes.php");
include_once("inc/forumfunctions.php");
include_once("./layout/general/head.php");

$categories=getForumSetup();
//var_dump($setup);

for ($i=0;$i<sizeof($categories);$i++) {
    $category['name']=$categories[$i]->getName();
    $boards=$categories[$i]->getBoards();
    include("./layout/main/category.php");
    for ($j=0;$j<sizeof($boards);$j++) {
        $board['name']=$boards[$j]->getName();
        $board['description']=$boards[$j]->getDescription();
        $board['id']=$boards[$j]->getId();
        $postCount=getPostCount($boards[$j]->getId());
        include("./layout/main/boards.php");
    }
}
include_once("./layout/main/ending.php");

include_once("./layout/general/footer.php");
