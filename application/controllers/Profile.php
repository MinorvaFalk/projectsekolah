<?php

class Profile extends CI_Controller
{
    public function index()
    {
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['nav'] = $this->load->view('include/navbar.php', NULL, TRUE);
        $this->load->view('pages/profile',$data);
    }

    public function getNotif(){
        echo $this->data->get_notif();
    }
}