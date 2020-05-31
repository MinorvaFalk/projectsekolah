<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper('html');
        $this->load->model('data');
    }

    public function index(){
        $menu = '';
        $this->menu($menu);
    }

    public function menu($table){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['nav'] = $this->load->view('include/navbar.php', NULL, TRUE);
        $data['notif'] = $this->data->get_list();

        if($table == 'teacher'){
            $guru['data'] = $this->data->get_guru();
            $data['table'] = $this->load->view('layouts/table_guru',$guru, TRUE);
        }elseif($table == 'student'){
            $siswa['data'] = $this->data->get_data();
            $siswa['kelas'] = $this->data->get_class();
            $data['table'] = $this->load->view('layouts/table_siswa',$siswa, TRUE);
        }elseif($table == 'subject'){
            $subject['data'] = $this->data->get_subject();
            $data['table'] = $this->load->view('layouts/table_subject',$subject, TRUE);
        }elseif($table == 'class'){
            $class['guru'] = $this->data->get_availableGuru();
            $class['data'] = $this->data->get_class();
            $data['table'] = $this->load->view('layouts/table_class',$class, TRUE);
        }elseif($table == 'grade'){
            $grade['siswa'] = $this->data->get_data();
            $grade['data'] = $this->data->get_nilai();
            $grade['guru'] = $this->data->get_guru();
            $grade['subject'] = $this->data->get_subject();
            $data['table'] = $this->load->view('layouts/table_grade',$grade, TRUE);
        }
        $this->load->view('pages/adminv2.php', $data);
    }

    public function getNotif(){
        echo $this->data->get_notif();
    }
    
    public function logout(){
        session_destroy();
        redirect();
    }

}