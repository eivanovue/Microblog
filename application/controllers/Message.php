<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

    public function index() {
        session_start();
        //check if the user is logged in
        if(!(isset($_SESSION['username']))){
            header( "Location: user/login");
        }
        $username['name'] = $_SESSION['username'];
        $this->load->view('Post', $username);
    }


    public function doPost(){
        session_start();
        if(!(isset($_SESSION['username']))){
            header("Location:   user/login");
        }
        //deny the user from posting an empty message
        $error['error'] = "Message cannot be empty!";
        $message = $_POST['message'];
        if($message == null || $message == ''){
            $this->load->view('Post', $error);
        }
        else {
            $poster = $_SESSION['username'];
            $this->load->model('Messages_model');
            $this->Messages_model->insertMessage($poster, $message);
            header("Location: ../user/view/" . $poster);
        }

    }






}
