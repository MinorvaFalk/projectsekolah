<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subject extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Subject_model');
    } 

    /*
     * Listing of subject
     */
    function index()
    {
        $data['subject'] = $this->Subject_model->get_all_subject();
        
        $data['_view'] = 'subject/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new subject
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'id_subject' => $this->input->post('id_subject'),
				'nama_subject' => $this->input->post('nama_subject'),
            );
            
            $subject_id = $this->Subject_model->add_subject($params);
            redirect('admin/menu/subject');
        }
        else
        {            
            $data['_view'] = 'subject/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a subject
     */
    function edit($id_subject)
    {   
        // check if the subject exists before trying to edit it
        $data['subject'] = $this->Subject_model->get_subject($id_subject);

        if(isset($data['subject']['id_subject']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'nama_subject' => $this->input->post('nama_subject'),
                );

                $this->Subject_model->update_subject($id_subject,$params);            
                redirect('admin/menu/subject');
            }
            else
            {
                $data['_view'] = 'subject/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The subject you are trying to edit does not exist.');
    } 

    /*
     * Deleting subject
     */
    function remove($id_subject)
    {
        $subject = $this->Subject_model->get_subject($id_subject);

        // check if the subject exists before trying to delete it
        if(isset($subject['id_subject']))
        {
            $this->Subject_model->delete_subject($id_subject);
            redirect('admin/menu/subject');
        }
        else
            show_error('The subject you are trying to delete does not exist.');
    }
    
}
