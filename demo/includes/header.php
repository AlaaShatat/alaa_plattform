<?php
require 'config/config.php';
if(isset($_SESSION['username']))
{
    $userloggedin=$_SESSION['username'];
}
else
{
    header("Location: register.php");
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>alaa</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>

	<link rel="stylesheet" type=text/css href="styling/bootstrap.css">
</head>
<body>
   