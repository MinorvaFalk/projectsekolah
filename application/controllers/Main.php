<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->model('data');
    }

	public function index(){
		switch($_SESSION['role']){
            case 'A': $this->admin(); break;
            case 'T': $this->guru(); break;
            case 'S': $this->student(); break;
            default : redirect(base_url());
        }
    }

    public function admin()
    {
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['datasiswa'] = $this->data->get_data();
        $this->load->view('pages/admin.php', $data);
    }

    public function guru()
    {
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['datasiswa'] = $this->data->get_data();
        $this->load->view('pages/guru.php', $data);
    }

    public function student()
    {
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['datasiswa'] = $this->data->get_data();
        $this->load->view('pages/guru.php', $data);
    }

    public function logout(){
        if(isset($_POST['ret'])){
            // $this->session->unset_userdata('uid');
            // unset($_SESSION['role']);
            session_destroy();
            redirect();
        }
    }
}
