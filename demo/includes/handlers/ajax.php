<?php
include("../../config/config.php");
include("../classes/User.php");
include("../classes/Post.php");

$limit=10; //num of posts to be loaded

$post=new Post($con,$_REQUEST['userloggedin']);
$posts->loadpostfriends();

?>