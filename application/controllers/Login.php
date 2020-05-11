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
            if($this->form_validation->run() == TRUE){
                $email = $this->input->post('email');
                $password = $this->db->escape_str($this->input->post('pass'));

                $check = $this->credentials->getLogin($email, $password);
        
                if(!($check)){
                    echo 'false';
                    print_r($this->db->error());
                    // $this->form_validation->set_message('invalid', 'Invalid email or password');
                    redirect(base_url());
                    
                }else {
                    echo 'true';
                    $ses = array(
                        'username' => strtok($check->email,'@'),
                        'role' => $check->roleid
                    );
                    $this->session->set_userdata($ses);
    
                    redirect(base_url('index.php/main'));
    
                }
    
            }else $this->load->view('pages/login');

        }else {
            redirect(base_url('index.php/register'));

        }
    }
}
