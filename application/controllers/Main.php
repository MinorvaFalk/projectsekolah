<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Main extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->helper('html');
        $this->load->model('data');
        $this->load->model('Nilai_siswa_model');
    }

	public function index(){
		switch($_SESSION['role']){
            case 'A': redirect('admin'); break;
            case 'G': redirect('teacher'); break;
            case 'S': redirect('student'); break;
            default : redirect(base_url());
        }
        
    }

    public function logout(){
            session_destroy();
            redirect();
    }
}
