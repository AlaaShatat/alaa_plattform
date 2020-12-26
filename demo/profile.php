<?php
include("includes/header.php");
//session_destroy(); 

if(isset($_GET['profile_username'])) {
	$username = $_GET['profile_username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");

  if(mysqli_num_rows($user_details_query) == 0) {
    echo "User does not exist";
    exit();
  }
}
?>
<div class="main_column column">
	<div class="posts_area"></div>
	<img id="loading" src="assets/images/icons/loading.gif">



</div>
<script>
//for infinite loading 
		var userloggedin ='<?php echo $userloggedin; ?>';
		var profileusername ='<?php echo $username?>';
		$(document).ready(function(){

			$('#loading').show();
			// ajax for loading posts
			$.ajax({
				url:"includes/handlers/ajaxprofile.php",
				type:"POST",
				data:"page=1&userloggedin=" + userloggedin +"&profileusername=" +profileusername,
				cache:false,

				success:function(data)
				{
					$('#loading').hide(); //dont show loading sign again 
					$('.posts_area').html(data);
				}
			});  //end of ajax
		$(window).scroll(function(){
		var height=$('.posts_area').height(); //div containing posts
		var scroll_top=$(this).scrollTop();
		var page=$('.posts_area').find('.nextpage').val();//   created int post class
		var nomoreposts=$('.posts_area').find('.nomoreposts').val();
		//alert("hello");

		// function to scroll to the bottom //rl moshkla msh radi yd5ol  el if aslnn
		if((document.body.scrollHeight == document.body.scrollTop + window.innerHeight) && nomoreposts=='false')
		{
			
			$('#loading').show();
			alert("hello");
			var ajaxReq = $.ajax({
			url:"includes/handlers/ajaxprofile.php",
			type:"POST",
			data:"page=" + page + "&userloggedin=" + userloggedin +"&profileusername=" +profileusername,
			cache:false,

				success:function(response)
				{
					$('.posts_area').find('.nextpage').remove();
					$('.posts_area').find('.nomoreposts').remove();

					$('#loading').hide();
					$('.posts_area').append(response);//add new posts to the existing posts
				}
			});  

		}//end if

		return false;


		});//end $(window).scroll(function(){*/



		});

	</script>

</div>
</body>
</html>