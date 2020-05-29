<?php

class Profile extends CI_Controller
{
    public function index()
    {
        
        $this->load->view('include/navbar.php');
        $this->load->view('pages/profile');
    }

    public function getNotif(){
        echo $this->data->get_notif();
    }
}