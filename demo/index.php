<?php
include("includes/header.php");
include("includes/classes/User.php");
include("includes/classes/Post.php");
//session_destroy();

if (isset($_POST['post'])) 
{
	//echo "Hello from post";
	//die();
	$post= new Post($con,$userloggedin);
	//it takes body and user to fro now we make it none just in the start 
	$post->submitpost($_POST['post_text'],'none');
	header("Location:index.php");
	

}  
?>
<div class="user_details column">
	<a href="<?php echo $userloggedin ?>"><img src="<?php echo $user['profile_pic'];?>" >
	</a>
	<div class="user_details_left_right">
		<a href="#">	
			<?php
			echo $user['first_name']." ".$user['last_name'] ."<br>"; 
			?>
		</a>
		<a>
			<?php
				echo"posts: " .$user['no_post']. "<br>";
				
				echo"likes: " .$user['no_likes']."<br>";
			?>
		</a>
	</div>
</div>
<div class="main_column column">
	<form action="index.php" class="post_form" method="POST">
		<textarea name="post_text" id ="post_text" placeholder="what's in your mind?"></textarea>
		<br>
		<input type="submit" name="post" id="post_button" value="post">
		<hr>
	</form>
	<?php
		$post= new Post($con,$userloggedin);
		$post->loadpostfriends();
	?>


</div>

</div>
</body>
</html>
