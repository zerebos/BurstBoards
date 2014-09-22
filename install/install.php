<html>
<head>
    <title>Install this forum</title>
</head>
<body>
<form method="post" action="">
    Server: <input type="text" value="localhost" width="50" name="host" /><br />
    Database: <input type="text" value="" width="50" name="db" /><br />
    User: <input type="text" value="" width="50" name="user" /><br />
    Password: <input type="password" value="" width="50" name="dbpass" /><br />
    Category Table: <input type="text" value="forum_categories" width="50" name="categoryTable" /><br />
    Board Table: <input type="text" value="forum_boards" width="50" name="boardTable" /><br />
    Topic Table: <input type="text" value="forum_topics" width="50" name="topicTable" /><br />
    Reply Table: <input type="text" value="forum_replies" width="50" name="replyTable" /><br />
    <input type="submit" />
</form>
</body>
</html>


<?php
/**
 * Created by PhpStorm.
 * User: Zack
 * Date: 9/11/14
 * Time: 12:13 AM
 */
if ($_REQUEST['host'] && $_REQUEST['db'] && $_REQUEST['user'] && $_REQUEST['dbpass'] && $_REQUEST['categoryTable'] && $_REQUEST['boardTable'] && $_REQUEST['topicTable'] && $_REQUEST['replyTable']) {

    $con=mysqli_connect($_REQUEST['host'], $_REQUEST['user'], $_REQUEST['dbpass'], $_REQUEST['db']);
    if (!$con)
    {
        die('Could not connect: ' . mysqli_error($con));
    }
    else {
    $makeCategoryTable=mysqli_query($con,"CREATE TABLE {$_REQUEST['categoryTable']} (id INT UNSIGNED NOT NULL AUTO_INCREMENT, PRIMARY KEY (id), name TINYTEXT, sort INT)");
    $makeBoardTable=mysqli_query($con,"CREATE TABLE {$_REQUEST['boardTable']} (id INT UNSIGNED NOT NULL AUTO_INCREMENT, PRIMARY KEY (id), categoryId INT, sort INT, name TINYTEXT, description TEXT)");
    $makeTopicTable=mysqli_query($con,"CREATE TABLE {$_REQUEST['topicTable']} (id INT UNSIGNED NOT NULL AUTO_INCREMENT, PRIMARY KEY (id), boardId INT, author TINYTEXT, dateAndTime TINYTEXT, title TINYTEXT, content LONGTEXT)");
    $makeReplyTable=mysqli_query($con,"CREATE TABLE {$_REQUEST['replyTable']} (id INT UNSIGNED NOT NULL AUTO_INCREMENT, PRIMARY KEY (id), topicId INT, author TINYTEXT, dateAndTime TINYTEXT, content LONGTEXT)");
    if (!$makeCategoryTable || !$makeBoardTable || !$makeTopicTable || !$makeReplyTable) {
        die('Could not install: ' . mysqli_error($con));
    }
    else {
        $insCategoryTable=mysqli_query($con, "INSERT INTO {$_REQUEST['categoryTable']} (name, sort) VALUES ('Default Category','1')");
        $insBoardTable=mysqli_query($con, "INSERT INTO {$_REQUEST['boardTable']} (categoryId,sort,name,description) VALUES ('1','1','Default Board','This is the one that comes pre-installed, feel free to change this at any time.')");

        if (!$insCategoryTable || !$insBoardTable) {
            die('Could not install: ' . mysqli_error($con));
        }
        if (!is_dir("../inc/")) {
            mkdir("../inc/");
        }
        if (!file_exists("../inc/settings.php")) {
        $file = fopen("../inc/settings.php", 'w') or die("can't open file");
        $stringData = '<?php' . "\n" . '';
        fwrite($file, $stringData);
        $stringData = '$settings[\'installed\']=TRUE;' . "\n" . '';
        fwrite($file, $stringData);
        $stringData = '$settings[\'server\']='.$_REQUEST['host'].';' . "\n" . '';
        fwrite($file, $stringData);
        $stringData = '$settings[\'db\']='.$_REQUEST['db'].';' . "\n" . '';
        fwrite($file, $stringData);
        $stringData = '$settings[\'user\']='.$_REQUEST['user'].';' . "\n" . '';
        fwrite($file, $stringData);
        $stringData = '$settings[\'pass\']='.$_REQUEST['dbpass'].';' . "\n" . '';
        fwrite($file, $stringData);
        $stringData = '$settings[\'categoryTable\']='.$_REQUEST['categoryTable'].';' . "\n" . '';
        fwrite($file, $stringData);
        $stringData = '$settings[\'boardTable\']='.$_REQUEST['boardTable'].';' . "\n" . '';
        fwrite($file, $stringData);
        $stringData = '$settings[\'topicTable\']='.$_REQUEST['topicTable'].';' . "\n" . '';
        fwrite($file, $stringData);
        $stringData = '$settings[\'replyTable\']='.$_REQUEST['replyTable'].';' . "\n" . '';
        fwrite($file, $stringData);
        $stringData = '$settings[\'con\']=mysqli_connect($settings[\'server\'], $settings[\'user\'], $settings[\'pass\'], $settings[\'db\']);' . "\n" . '';
        fwrite($file, $stringData);
        $stringData = 'if (!$settings[\'con\']) {die(\'Could not connect: \' . mysqli_error($settings[\'con\']));}' . "\n" . '';
        fwrite($file, $stringData);
        $stringData = '?>' . "\n" . '';
        fwrite($file, $stringData);

        fclose($file);
            echo "<a href=\"../\">Successfully installed! Click here to view your forum!</a>";
        }
    }
    }
}