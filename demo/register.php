<?php
require'config/config.php';
require'includes/form_handler/register_handler.php';


?>
<html>
<head>
<title>welcome to alaa </title>
</head>
<body>
    <form action="register.php" method ="post" >
<input type="text" name="reg_fname" placeholder="first name" value="<?php if (isset($_SESSION['reg_fname'])){
  echo$_SESSION['reg_fname'];
}
?>   " required>
<br>
<?php if(in_array("your first name must be between 2 and 25 <br>",$error_array)) echo"your first name must be between 2 and 25 <br>"; ?>
<input type="text" name="reg_lname" placeholder="last name" value="<?php if (isset($_SESSION['reg_lname'])){
  echo$_SESSION['reg_lname'];
} ?>" required>
  <br>  
  <?php if(in_array("your last name must be between 2 and 25 <br>",$error_array)) echo"your last name must be between 2 and 25 <br>"; ?>
  <input type="email" name="reg_email" placeholder="email" value="<?php if (isset($_SESSION['reg_email'])){
    echo$_SESSION['reg_email'];
  } ?>" required>
<br>
<input type="email" name="reg_email2" placeholder="confirm email" value="<?php if (isset($_SESSION['reg_email'])){
  echo$_SESSION['reg_email'];
} ?>" required>
  <br>  
  <?php if(in_array("Email already in use<br>",$error_array)) echo"Email already in use<br>"; 
   else if(in_array("invalid format<br>",$error_array)) echo"invalid format<br>"; 
  else if(in_array("emails don't match<br>",$error_array)) echo"emails don't match<br>"; ?>
  
  <input type="password" name="reg_password" placeholder="password" required>
<br>
<?php if(in_array("your password can only conatains english characters or numbers<br>",$error_array)) echo"your password can only conatains english characters or numbers<br>"; ?>
<?php if(in_array("your password should be between 5 and 30<br>",$error_array)) echo"your password should be between 5 and 30<br>"; ?>
<input type="password" name="reg_password2" placeholder="confirm password " required>


  <br>  
  <?php if(in_array("passwords don't match <br>",$error_array)) echo"passwords don't match <br>"; ?>
    <input type="submit" name="register_button" value="register" >
    <br>
    <?php if(in_array("<span style='color:red;' > you are all set up, hurry up and log in</span><br>",$error_array)) echo"<span style='color:red;' > you are all set up, hurry up and log in</span><br>" ?>
    
    </form>
    echo "GitHub";
</body>
</html>