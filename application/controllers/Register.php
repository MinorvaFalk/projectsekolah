<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('credentials');
        $this->load->library('form_validation');
        $this->load->helper('string');

        $this->form_validation->set_rules('fname','Firstname','trim|required');
        $this->form_validation->set_rules('lname','Firstname','trim|required');
        $this->form_validation->set_rules('address','Address','trim|required');
        $this->form_validation->set_rules('contact','Contact','trim|required|numeric|minLength[10]|maxLength[11]');
        $this->form_validation->set_rules('pass','Password','required|min_length[8]');

    }

	public function index(){
        if(isset($_SESSION['approval'])) {
            $this->register_user();
        }else$this->load->view('pages/registerv2');
    }

    public function register_user(){
        $this->load->view('pages/register_verify');
    }

    public function search(){
        $output = '';
        $query = '';
        if($this->input->post('query')){
            $query = $this->input->post('query');
        }

        $data = $this->credentials->getApproval($query);
        $output .= '
            <table class="ui celled table">
                <thead>    
                    <tr>
                        <th>Approval ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead> <tbody>
        ';
        if($data->num_rows() >0){
            foreach($data->result() as $row){
                if($row->approve != NULL){
                    $status = '<a class="ui teal tag label" >Approved</a>';    
                } else $status = '<a class="ui red tag label">Waiting</a>';
                $output .='<tr>
                        <td>'.$row->approve_id.'</td>
                        <td>'.$row->first_name.'</td>
                        <td>'.$row->last_name.'</td>
                        <td>'.$row->email.'</td>
                        <td>'.$status.'</td>
                        </tr>
                        ';
            }
        }else{
            $output .= '<tr>
                            <td colspan="5">No Data Found</td>
                        </tr>';
        }
        $output .= '</tbody></table>';
        echo $output;
    }
    
    public function validator(){
        if(isset($_POST['cancel'])){
            redirect(base_url());
            
        }else{
            
                $email = $this->db->escape_str(strip_tags($this->input->post('email')));
                $password = $this->db->escape_str(strip_tags($this->input->post('pass')));
                $fname = strip_tags($this->input->post('fname'));
                $lname = strip_tags($this->input->post('lname'));
                $address = strip_tags($this->input->post('address'));
                $contact = strip_tags($this->input->post('contact'));

                $query = $this->credentials->setApproval($email, $password, $fname, $lname, $address, $contact);

                if($query == false){
                    $this->load->view('pages/registerv2');
                }else{
                    $this->load->view('pages/register_verify');
                }
            
        }
    }

}
