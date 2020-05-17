<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('credentials');
        $this->load->library('form_validation');

		$this->form_validation->set_rules('email','Email','trim|required|max_length[50]',
			array('max_length[50]' => 'Input maximum 50 character !'));
		$this->form_validation->set_rules('pass','Password','trim|required');

    }

	public function index(){
        if(isset($_SESSION['uid'])){
            redirect(base_url('index.php/Main'));
        }else $this->load->view('pages/loginv2');
    }

    public function validator(){
        if($this->form_validation->run() == TRUE){
            $email = $this->input->post('email');
            $password = $this->db->escape_str($this->input->post('pass'));
    
            $check = $this->credentials->getLogin($email, $password);
    
            if(!($check)){
                $data['invalid'] = TRUE;
                $this->load->view('pages/loginv2',$data);
                
            }else {
                redirect(base_url('index.php/main'));

            }
    
        }else $this->load->view('pages/loginv2');

    }
}
