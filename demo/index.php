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
	<a href="profile.php"><img src="<?php echo $user['profile_pic'];?>" >
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
	<div class="posts_area"></div>
<img id="#loading" src="assets/images/icons/loading.gif">

</div>

<script>
var userloggedin ='<?php echo $userloggedin?>';

$(document).ready(function(){

$('#loading').show();
// ajax for loading posts
$.ajax({
	url:"includes/handlers/ajax.php",
	type:"POST",
	data:"page=1&userloggedin=" + userloggedin,
	cache:false;

	success:function(data)
	{
		$('#loading').hide();
		$('.posts_area').html(data);
	}
});  
$(window).scroll(function(){
var height=$('.posts_area').height();
var scroll_top=$(this).scrollTop();
var page=$('.posts_area').find('.nextpage').val();
var nomoreposts=$('.posts_area').find('.nomoreposts').val();

if((document.body.scrollHeight==document.body.scrollTop +window.innerHeight)&&nomoreposts=='false')
{
	$('#loading').show();
	var ajaxreq = $.ajax({
	url:"includes/handlers/ajax.php",
	type:"POST",
	data:"page="+"&userloggedin=" + userloggedin,
	cache:false;

	success:function(response)
	{
		$('.posts_area').find('.nextpage').remove();
		$('.posts_area').find('.nomoreposts').remove();

		$('#loading').hide();
		$('.posts_area').append(response);
	}
});  

}//end if

return false;


});//end $(window).scroll(function(){



});





</script>





</div>
</body>
</html>
