<?php
ob_start();// turns on out put buffering
session_start();
$timezone=date_default_timezone_set("europe/london");
//connect local host to the database 
$con =mysqli_connect("localhost","root","","social");
// if something is wrong ,echo is used to print on the screeen ,and dot is used to connect or link  
if(mysqli_connect_errno()){
	echo "failed to connect:".mysqli_connect_errno(); 
}
//echo "connected successfully";
//trying to understand
?>