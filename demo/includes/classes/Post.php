<?php
class Post
{
    private $user_obj;
    private $con;
    public function __construct($con,$user)
    {
        //connect to the data base
        $this->con=$con;
        $this->user_obj=new User($con,$user);
    }
    //get first and last name 
    public function submitpost($body, $user_to)
    {
        $body=strip_tags($body);//strip html tags
        $body=mysqli_real_escape_string($htis->con,$body);//escape the quotes ti ignore mi$smatch
        $chech_space=preg_replace('/\s+/','',$body);//erase any space
        if($chech_space !="")
        {
            //current date and time 
            $date_added=date("Y-m-d H:i:S");
            // added by 
            $added_by=$this->$user_obj->getusername();
            if($user_to ==$added_by)
            {
                $user_to="none";
            }
            //insert post into database
            $insert=mysqli_queri($this->con,"INSERT INTO posts VALUES ('','$body','$added_by','$date_added','$user_to','no','no','0')");
            $returned_id=mysqli_insert_id($this->con);
            //insert notifiacations
            //update post count for user
            $no_post=$this->user_obj->getnumofposts();
            $no_post++;
            $update_query=mysqli_query($this->con,"UPDATE users SET no_post='$no_post' WHERE username='$added_by' ");





        }
    }
}

?>