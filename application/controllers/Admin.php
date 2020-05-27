<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper('html');
        $this->load->model('data');
    }

    public function index(){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['nav'] = $this->load->view('include/navbar.php', NULL, TRUE);

        $this->load->view('pages/adminv2.php', $data);
    }

    public function teacher(){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['nav'] = $this->load->view('include/navbar.php', NULL, TRUE);

        $guru['data'] = $this->data->get_guru();
        $data['table'] = $this->load->view('layouts/table_guru',$guru, TRUE);
        
        $this->load->view('pages/adminv2.php', $data);
    }
    public function student(){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['nav'] = $this->load->view('include/navbar.php', NULL, TRUE);

        $siswa['data'] = $this->data->get_data();
        $data['table'] = $this->load->view('layouts/table_siswa',$siswa, TRUE);
        
        $this->load->view('pages/adminv2.php', $data);
    }
    public function subject(){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['nav'] = $this->load->view('include/navbar.php', NULL, TRUE);

        $subject['data'] = $this->data->get_subject();
        $data['table'] = $this->load->view('layouts/table_subject',$subject, TRUE);
        
        $this->load->view('pages/adminv2.php', $data);
    }
    public function kelas(){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['nav'] = $this->load->view('include/navbar.php', NULL, TRUE);

        $class['data'] = $this->data->get_class();
        $data['table'] = $this->load->view('layouts/table_class',$class, TRUE);
        
        $this->load->view('pages/adminv2.php', $data);
    }

    public function grade(){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['nav'] = $this->load->view('include/navbar.php', NULL, TRUE);

        $grade['data'] = $this->data->get_nilai();
        $data['table'] = $this->load->view('layouts/table_grade',$grade, TRUE);
        
        $this->load->view('pages/adminv2.php', $data);
    }

    public function logout(){
        session_destroy();
        redirect();
    }

}