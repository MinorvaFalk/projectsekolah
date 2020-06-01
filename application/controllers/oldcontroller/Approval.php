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
        
        if(isset($data['approval']['approve_id']))
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

                $this->Approval_model->update_approval($approve_id,$params);            
                redirect('main');
            }
            else
            {
                $this->load->view('layouts/main',$data);
            }
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