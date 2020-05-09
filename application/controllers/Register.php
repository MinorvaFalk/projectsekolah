<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('credentials');
        $this->load->library('form_validation');
        $this->load->helper('string');

		$this->form_validation->set_rules('email','Email','trim|required|max_length[50]|valid_email',
            array('max_length[50]' => 'Input maximum 50 character !'));
        // $this->form_validation->set_rules('role','Role','required');
        $this->form_validation->set_rules('pass','Password','required');
        // $this->form_validation->set_rules('cpass','CPassword','required|matches[pass]');
        // $this->form_validation->set_message('cpass', "Password didn't match");

    }

	public function index(){
        $data['roles'] = $this->credentials->getRole();
		$this->load->view('pages/register',$data);
    }
    
    public function validator(){
        $data['roles'] = $this->credentials->getRole();
        if(isset($_POST['cancel'])){
            redirect(base_url());
            
        }else{
            if($this->form_validation->run() == true){
                $email = $this->db->escape_str($this->input->post('email'));
                $password = $this->db->escape_str($this->input->post('pass'));
                $role = $this->input->post('role');

                $this->credentials->setCredentials($role ,$email, $password);

            }else $this->load->view('pages/register',$data);

        }
    }

}
