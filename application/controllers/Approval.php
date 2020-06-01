<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Approval_model');
    } 

    /*
     * Listing of approval
     */
    function index()
    {
        $data['approval'] = $this->Approval_model->get_all_approval();
        
        $data['_view'] = 'approval/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new approval
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'password' => $this->input->post('password'),
				'approve' => $this->input->post('approve'),
				'email' => $this->input->post('email'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'contact' => $this->input->post('contact'),
				'address' => $this->input->post('address'),
            );
            
            $approval_id = $this->Approval_model->add_approval($params);
            redirect('main');
        }
        else
        {            
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a approval
     */
    function edit($approve_id)
    {   
    
        // check if the approval exists before trying to edit it
        $data['approval'] = $this->Approval_model->get_approval($approve_id);
        $approval = $this->Approval_model->get_approval($approve_id);
        // var_dump($approval);


        if(isset($approval['approve_id']))
        {
                $query = $this->db->get_where('approval', array('approve_id' => $approve_id));
                $res = $query->row();
                $email = $res->email;

                $params2 = array( //update tabel approve
                    'approve_id' => $approve_id,
                    'approve' => 1,
                    'email' => $email,
                    'password' =>  $res->password,
                    'first_name' => $res->first_name,
                    'last_name' => $res->last_name,
                    'contact' => $res->contact,
                    'address' =>  $res->address,
                );

                if($res->approve == 0){
                    if($this->db->like('email', '@teacher.school.com')){
                        $finalid= 'G'.(crc32(uniqid()));
                    }elseif($this->db->like('email', '@admin.school.com')){
                        $finalid= 'A'.(crc32(uniqid()));
                    }elseif($this->db->like('email', '@student.school.com')){
                        $finalid= 'S'.(crc32(uniqid()));
                    }

                    $params = array(                //update credentials register
                        'user_id' => $finalid,
                        'username' => strtok($email, '@'),
                        'email' => $email,
                        'password' =>  $res->password,
                    );

                    $this->Approval_model->insert_app($params); 

                }else if($res->approve == 2){
                    $id = substr($res->approve_id,1);
                    
                    $profile = array(
                        'first_name' => $res->first_name,
                        'last_name' => $res->last_name,
                        'contact' => $res->contact,
                        'address' => $res->address,
                    );
                    if(substr($id,0,1) == 'S'){
                        $this->Approval_model->update_siswa($profile);
                    }else{
                        $this->Approval_model->update_guru($profile);
                    }
                }

                $this->Approval_model->update_approval($approve_id,$params2);
                redirect('main');
        }
        else
            show_error('The approval you are trying to edit does not exist.');
    } 

    /*
     * Deleting approval
     */
    function remove($approve_id)
    {
        $approval = $this->Approval_model->get_approval($approve_id);

        // check if the approval exists before trying to delete it
        if(isset($approval['approve_id']))
        {
            $this->Approval_model->delete_approval($approve_id);
            redirect('main');
        }
        else
            show_error('The approval you are trying to delete does not exist.');
    }
    
}