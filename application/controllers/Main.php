<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('html');
    }

	public function index(){
		switch($_SESSION['role']){
            case 'A': $this->admin(); break;
            case 'T': $this->guru(); break;
            case 'S': $this->student(); break;
            default : redirect(base_url());
        }
    }
    
    public function admin(){
        echo 'admin';
        echo form_open('main/logout').'<form><button name="ret">Logout</button></form>';
        
    }

    public function guru(){
        echo 'guru';
        echo form_open('main/logout').'<form><button name="ret">Logout</button></form>';
    }

    public function student(){
        echo 'student';
        echo form_open('main/logout').'<form><button name="ret">Logout</button></form>';
    }

    public function logout(){
        if(isset($_POST['ret'])){
            session_destroy();
            redirect();
        }
    }
}
