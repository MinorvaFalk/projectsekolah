<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('credentials');
        $this->load->library('form_validation');

		$this->form_validation->set_rules('email','Email','trim|required|max_length[50]|valid_email',
			array('max_length[50]' => 'Input maximum 50 character !'));
		$this->form_validation->set_rules('pass','Password','trim|required');

    }

	public function index(){
		$this->load->view('pages/login');
    }

    public function validator(){
        if(isset($_POST['login'])){
            if($this->form_validation->run() == true){
                $data = array(
                    'email' => $this->input->post('email'),
                    'password' => md5($this->input->post('pass')));
                
                $check = $this->credentials->getLogin($data);
        
                if(isset($check)){
                    // echo 'true';
                    $ses = array(
                        'username' => strtok($check->email,'@'),
                        'role' => $check->roleid
                    );
                    $this->session->set_userdata($ses);
    
                    var_dump($_SESSION['username']);
                    
                }else {
                    echo 'false';
                    $this->form_validation->set_message('invalid', 'Invalid email or password');
                    redirect(base_url());
    
                }
    
            }else redirect(base_url());

        }else {
            redirect(base_url('index.php/register'));

        }
    }

}
