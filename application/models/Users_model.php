<?php
class Users_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function index()
    {

    }

    function checkLogin($username, $pass){
        $verified['userExists'] = FALSE;
        if(empty($username))
        {
            echo "UserName/Password is empty!";
            return false;
        }
        if(empty($pass))
        {
            echo "Password is empty!";
            return false;
        }
        $query = $this->db->query("SELECT username,password FROM Users WHERE username='$username' AND password=sha1('$pass')");
        //If a user exists basically there is one row then return true so that we know that a user with this usernamem and password exists
        if ($query->num_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    function isFollowing($follower,$followed)
    {
        //check that the follower and the followed are not the same!
        if ($follower != $followed) {
            $query = $this->db->query("SELECT *
                FROM User_Follows
                WHERE follower_username = '$follower' AND followed_username = '$followed'");
            if ($query->num_rows() > 0)
                return TRUE;
            else
                return FALSE;
        }
        else return TRUE;
    }

    function follow($followed){
        session_start();
        if(isset($_SESSION['username'])){
            $follower = $_SESSION['username'];
            $sql = "INSERT INTO User_Follows (follower_username, followed_username) 
                    VALUES ('$follower','$followed')";
            $this->db->query($sql);
        }
        else echo "Not logged in please!";
    }


}
