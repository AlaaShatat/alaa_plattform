<html>
<head>
<title></title>
<link rel="stylesheet" type=text/css href="styling/style.css">
</head>
<body>
    <?php
        require'config/config.php';
        include("includes/classes/User.php");
        include("includes/classes/Post.php");
        
        if ($isset($_SESSION['username']))
        {
            $userloggedin=$_SESSION['username'];
            $user_datails=mysqli_query($con,"SELECT * FROM users WHERE username='$userloggedin'");
            $user_fetch=mysqli_fetch_array($user_datails);
        }
        else 
        {
            header("Location:register.php");
        }
    ?>
    <script>
    //toggle comment section
        function toggle(){
            var element=document.getElementById("comment_section");
            if(element.style.display=="block")
                element.style.display="none";
            else 
               element.style.display="block";
        }
    </script>
    <?php 
        //getid of the post 
        if(isset($_GET['post_id']))
        {
            $post_id=$_GET['post_id']; 
        }
        //fetch postid data 
        $user_query=mysqli_query($con,"SELECT added_by,user_to FROM posts WHERE id='$post_id'");
        $row=mysqli_fetch_array($user_query);
        $posted_to=$row['added_by'];

        //POST 
        if(isset($_POST['postcomment']. $post_id))
        {
            $post_body= $_POST['post_body'];
            $post_body=mysqli_escape_string($con, $post_body);
            $date_time_now= date("Y:m:d H:i:s");
            $insert_post=mysqli_query($con,"INSERT INTO comments VALUES ('', '$post_body','$userloggedin','$posted_to','$date_time_now','no','$post_id' )" );
            echo "<p> WOohOo comment posted !</p>";


        }
    
    
    
    
    ?>
    <form action="comment_frame.php?post_id=<?php echo $post_id ; ?>" id="comment_form" name="postcomment<?php echo $post_id; ?>" method="POST"  >
        <textarea name="post_body"></textarea>
        <input type="submit" name="postcomment <?php echo $post_id;?>">
    </form>

</body>



























</html>