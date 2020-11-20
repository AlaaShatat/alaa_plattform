<?php
//connect local host to the database 
$con =mysqli_connect("localhost","root","","social");
// if something is wrong ,echo is used to print on the screeen ,and dot is used to connect or link  
if(mysqli_connect_errno()){
	echo "failed to connect:".mysqli_connect_errno(); 
}
echo "connected successfully";

?>

<!DOCTYPE html>
<html>
<head>
	<title>alaa</title>
	<style>
		h1{
			color:red;
		}
	</style>
</head>
<body>
<h1>hello there!!!!!! </h1>
</body>
</html>
