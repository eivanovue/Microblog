<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller{

    public function index()
    {
        //load the search view
        $this->load->view('Search');

    }

    public function doSearch()
    {
        $this->load->model('Messages_model');
        if ($this->input->get('keyword') !== FALSE) {
            $data['result'] = $this->Messages_model->searchMessages($this->input->get('keyword'));
        } else {
            $data['result'] = array();
        }
        //get username from session
        session_start();
        $following['following'] = TRUE;
        if(isset($_SESSION['username'])){
            $username['name'] = $_SESSION['username'];
            //combine username, whether the user is following and results from search query
            //into one vaarible that is then passed to the ViewMessages view
            $data += $username;
            $data += $following;
        }
        $count=0;
        //if no results are found then an error will be displayed
        $noResult['noResult'] = "No results found";
        foreach($data['result'] as $result) {
            $count++;
        }
        if($count != 0){
            $this->load->view('ViewMessages', $data);
        }
        else {
           echo "no results found";
        }




    }



}