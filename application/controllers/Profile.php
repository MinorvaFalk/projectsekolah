<?php

class Profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
    } 

    public function index()
    {
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['nav'] = $this->load->view('include/navbar.php', NULL, TRUE);
        $data['info'] = $this->Siswa_model->get_info_siswa($_SESSION['id']);
        // var_dump($_SESSION);
        $this->load->view('pages/profile',$data);
    }

    public function getNotif(){
        echo $this->data->get_notif();
    }
}