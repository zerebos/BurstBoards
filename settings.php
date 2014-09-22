<?php
/**
 * Created by PhpStorm.
 * User: Zack
 * Date: 9/10/14
 * Time: 5:29 PM
 */

$settings['installed']=FALSE;
$settings['server']="localhost"; // Default: localhost
$settings['db']="zackrauen"; // Default: none
$settings['user']="zackrauen"; // Default: none
$settings['pass']="knux777"; // Default: none
$settings['boardTable']="forum_boards"; // Default: forum_boards
$settings['topicTable']="forum_topics"; // Default: forum_topics
$settings['replyTable']="forum_replies"; // Default: forum_replies
$settings['theme']="default"; // Default: default
$settings['title']="My Forum"; // Default: My Forum
$settings['con']=mysqli_connect($settings['server'], $settings['user'], $settings['pass'], $settings['db']);
if (!$settings['con'])
{
    die('Could not connect: ' . mysqli_error($settings['con']));
}