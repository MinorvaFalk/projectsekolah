<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('credentials');
        $this->load->library('form_validation');
        $this->load->helper('string');

        $this->form_validation->set_rules('fname','Firstname','trim|required');
        $this->form_validation->set_rules('address','Address','trim|required');
        $this->form_validation->set_rules('contact','Contact','trim|required|numeric');
        // $this->form_validation->set_rules('username','Username','trim|required|max_length[50]',
        //     array('max_length[50]' => 'Input maximum 50 character !'));
        // $this->form_validation->set_rules('role','Role','required');
        // $this->form_validation->set_rules('pass','Password','required');
        // $this->form_validation->set_rules('cpass','CPassword','required|matches[pass]');
        // $this->form_validation->set_message('cpass', "Password didn't match");

    }

	public function index(){
		$this->load->view('pages/register');
    }
    
    public function validator(){
        if(isset($_POST['cancel'])){
            // session_destroy();
            redirect(base_url());
            
        }else{
            if($this->form_validation->run() == true){
                // $username = $this->db->escape_str(strip_tags($this->input->post('username')));
                // $password = $this->db->escape_str(strip_tags($this->input->post('pass')));
                $fname = strip_tags($this->input->post('fname'));
                $lname = strip_tags($this->input->post('lname'));
                $address = strip_tags($this->input->post('address'));
                $contact = strip_tags($this->input->post('contact'));
                $role = strip_tags($this->input->post('role'));
                var_dump($role);

                $query = $this->credentials->setApproval($fname, $lname, $address, $contact, $role);

                if($query == false){
                    $data['invalid'] = 1;
                    $this->load->view('pages/register',$data);
                }else redirect();
                
            }else $this->load->view('pages/register');

        }
    }

}
