<?php
//connect local host to the database 
$con =mysqli_connect("localhost","root","","social");
// if something is wrong ,echo is used to print on the screeen ,and dot is used to connect or link  
if(mysqli_connect_errno()){
	echo "failed to connect:".mysqli_connect_errno(); 
}
echo "connected successfully";
//$query =mysqli_query($con,"INSERT INTO test VALUES(NULL,'hi')");

$sql = "INSERT INTO test VALUES(null,'yesss');";
//$sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";

if (mysqli_query($con, $sql)) {
	echo "New record created successfully";
  } else {
	echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }
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
