<?php
/**
 * Created by PhpStorm.
 * User: Zack
 * Date: 9/11/14
 * Time: 11:17 AM
 */
if (!file_exists("./inc/settings.php")) {
    header("Location: ./install/index.php");
    die();
}
else if (file_exists("./install/index.php")) {
    // rename("../install/","../oldinstall/");
    array_map('unlink', glob("./install/*"));
    rmdir("./install");

    unlink("./index.php");
    rename("./forum.php","./index.php");
header("Location: index.php");
die();
}