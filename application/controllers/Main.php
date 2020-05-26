<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Main extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->helper('html');
        $this->load->model('data');
    }

	public function index(){
		switch($_SESSION['role']){
            case 'A': redirect('admin'); break;
            case 'G': $this->guru(); break;
            case 'S': $this->student(); break;
            default : redirect(base_url());
        }
    }

    public function guru(){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['nav'] = $this->load->view('include/navbar.php', NULL, TRUE);
        $data['siswa'] = $this->data->get_data();
        $this->load->view('pages/guru.php', $data);
    }

    public function student(){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['nav'] = $this->load->view('include/navbar.php', NULL, TRUE);
        $data['siswa'] = $this->data->get_data();
        $this->load->view('pages/siswa.php', $data);
    }

    public function logout(){
            session_destroy();
            redirect();
    }
}
