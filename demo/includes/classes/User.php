<?php
class User
{
    private $user;
    private $con;
    public function __construct($con,$user)
    {
        $this->con=$con;
        $user_query= mysqli_query($con, "SELECT * FROM users WHERE username='$user'");
        $this->user=mysqli_fetch_array($user_query);
    }
    //get username
    public function getusername()
    {
        return this->user['username']


    }
    //get num of posts
    public function getnumofposts()
    {
        $username=this user['username'];
        $query=   mysqli_query($this->con,"SELECT no_post FROM users WHERE username='$username'");
        $row=mysqli_fetch_array($query);
        return $row['no_post'];

    }
    //get first and last name 
    public function getfirst_lastname()
    {
        $username=$this->user['username'];
        $query=mysqli_query($this->con,"SELECT first_name,last_name FROM users WHERE username='$username'");
        $row=mysqli_fetch_array($query);
        return $row['first_name']." ".$row['last_name'];
    }
}

?>