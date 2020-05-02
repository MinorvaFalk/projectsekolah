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
        $this->form_validation->set_rules('role','Role','required');
        $this->form_validation->set_rules('pass','Password','trim|required');
        $this->form_validation->set_rules('cpass','CPassword','trim|matches[pass]|required',
            array('matches[pass]' => "Password didn't match"));

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
                echo "hello";
            }else $this->load->view('pages/register',$data);

        }
    }

}
