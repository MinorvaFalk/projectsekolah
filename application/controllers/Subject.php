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
        $this->validate();
        $params = array(
            'id_subject' => $this->input->post('id_subject'),
            'nama_subject' => $this->input->post('nama_subject'),
        );
        
        $subject_id = $this->Subject_model->add_subject($params);
        echo json_encode(array("status" => TRUE, "redirect" => site_url('/admin/menu/subject')));
    }  

    /*
     * Editing a subject
     */
    function edit($id_subject)
    {   
        $this->validate();
        $params = array(
            'nama_subject' => $this->input->post('nama_subject'),
        );
    
        $this->Subject_model->update_subject($id_subject,$params);            
        echo json_encode(array("status" => TRUE, "redirect" => site_url('/admin/menu/subject')));    
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
 
    function get_subject($id)
    {
        $data = $this->db->query("SELECT * FROM subject WHERE id_subject = '$id'")->row_array();
        echo json_encode($data);
    }

    function validate(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
        $id = $this->input->post('id_subject');
        $primaryid = $this->Subject_model->get_all_subject();
        

        if(isset($id)){
            if($id == ''){
                $data['inputerror'][] = 'id_subject';
                $data['error_string'][] = 'Required';
                $data['status'] = FALSE;
            }elseif(strlen($id)>5){
                $data['inputerror'][] = 'id_subject';
                $data['error_string'][] = 'Max 5 karakter';
                $data['status'] = FALSE;
            }else{
                foreach($primaryid as $i){
                    if($id == $i['id_subject']){
                        $data['inputerror'][] = 'id_subject';
                        $data['error_string'][] = 'ID sudah terdaftar';
                        $data['status'] = FALSE;
                    }
                }
            }
        }

        if($this->input->post('nama_subject') == '')
        {
            $data['inputerror'][] = 'nama_subject';
            $data['error_string'][] = 'Required';
            $data['status'] = FALSE;
        }

        if($data['status'] == FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
}
