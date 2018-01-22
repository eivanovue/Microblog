<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{


    public function index()
    {
        //load the login view
        $this->login();
    }


    public function login()
    {
        $this->load->view('Login');

    }

    public function doLogin()
    {

        $this->load->model('Users_model');
        //get posted values
        $username = $_POST['username'];
        $pass = $_POST['password'];

        if ($this->Users_model->checkLogin($username, $pass)) {
            session_start();
            $_SESSION['username'] = $username;
            header('Location:  view/' . $username);
        } else {
            // have an error displayed if username or password are incorrect
            $error['error'] = "<h2>Wrong username or password, please try again!</h2>";
            $this->load->view('Login', $error);
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        redirect(site_url('user/login'));
    }

    public function view($name)
    {

        session_start();
        $username['name'] = $name;
        $this->load->model('Messages_model');
        $this->load->model('Users_model');
        $messages['result'] = $this->Messages_model->getMessagesByPoster($name);
        //if the user is logged in, then the navigation bar wll display more options!
        if (isset($_SESSION['username'])) {
            $following['following'] = $this->Users_model->isFollowing($_SESSION['username'], $name);
            $data = $username + $messages + $following;
        } else {
            $data = $username + $messages;
        }
        $this->load->view('ViewMessages', $data);


    }

    public function follow($followed)
    {
        $this->load->model('Users_model');
        $this->Users_model->follow($followed);
        redirect(site_url('user/view/' . $followed));

    }

    public function feed($name)
    {
        session_start();
        $this->load->model('Messages_model');
        $this->load->model('Users_model');
        //store the results in a getfeed variable
        $getfeed['result'] = $this->Messages_model->getFollowedMessages($name);
        //this is the username of the follower, which is then passed to the ViewMessages
        //so that it can display the followed messages by the follower
        $username['name'] = $name;
        //check if user is logged in for the navigation bar
        if (isset($_SESSION['username'])) {
            $following['following'] = $this->Users_model->isFollowing($_SESSION['username'], $name);
            $data = $username + $getfeed + $following;
        } else {
            $data = $username + $getfeed;
        }

        $this->load->view('ViewMessages', $data);
    }


}
