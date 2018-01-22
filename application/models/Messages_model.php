<?php
class Messages_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function index()
    {
    }

    function getMessagesByPoster($name){
            //simple sql query to get the messages by the poster
            $sql = "SELECT user_username,text, posted_at 
                    FROM Messages WHERE user_username='$name' ORDER BY id DESC";

        $query = $this->db->query($sql);
    //returns results
    return $query->result_array();

    }

    function searchMessages($string){
        $this->load->database();
        $query = $this->db->query("SELECT user_username,text, posted_at FROM Messages WHERE text LIKE '%$string%'");
        return $query->result_array();

    }
    function insertMessage($poster, $string){

        $sql = "INSERT INTO Messages (user_username, text, posted_at) 
                VALUES ('$poster','$string', CURRENT_TIMESTAMP)";
        $this-> db-> query($sql);

    }

    function getFollowedMessages($name){
        //using inner join to join messages and user_follows table to display messages followed by a specific user(variable)
        $sql = "SELECT user_username, text, posted_at
                FROM Messages
                INNER JOIN User_Follows
                ON follower_username = '$name'
                WHERE followed_username = user_username";
        $query = $this->db->query($sql);
        return $query->result_array();

    }
}
