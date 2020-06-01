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
            case 'G': $this->guru(); break;
            case 'S': redirect('student'); break;
            default : redirect(base_url());
        }
    }

    public function guru(){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['nav'] = $this->load->view('include/navbar.php', NULL, TRUE);
        $data['nilai_siswa'] = $this->Nilai_siswa_model->get_all_nilai_siswa();
        $this->load->view('nilai_siswa/index.php', $data);
    }

    public function student(){
        
    }

    public function logout(){
            session_destroy();
            redirect();
    }
}
