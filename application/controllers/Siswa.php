<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('CRUD_model');
    } 

    /*
     * Listing of siswa
     */
    function index()
    {
        $data['siswa'] = $this->CRUD_model->get_all_siswa();
        
        $data['_view'] = 'siswa/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new siswa
     */
    function add()
    {   
        
        $params = array(
            'id_kelas' => $this->input->post('id_kelas'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'contact' => $this->input->post('contact'),
            'address' => $this->input->post('address'),
            'keterangan' => $this->input->post('keterangan'),
        );
        
        $siswa_id = $this->CRUD_model->add_siswa($params);
        echo json_encode(array("status" => TRUE, "redirect" => site_url('/admin/menu/class')));
        
    }  

    /*
     * Editing a siswa
     */
    function edit($id_siswa){   
        $this->validate();
        $params = array(
            'id_kelas' => $this->input->post('id_kelas'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'contact' => $this->input->post('contact'),
            'address' => $this->input->post('address'),
            'keterangan' => $this->input->post('keterangan'),
        );

        $this->CRUD_model->update_siswa($id_siswa,$params);            
        echo json_encode(array("status" => TRUE, "redirect" => site_url('/admin/menu/student')));
           
    } 

    function remove($id_siswa)
    {
        $siswa = $this->CRUD_model->get_siswa($id_siswa);

        // check if the siswa exists before trying to delete it
        if(isset($siswa['id_siswa']))
        {
            $this->CRUD_model->delete_siswa($id_siswa);
            redirect('admin/menu/student');
        }
        else
            show_error('The siswa you are trying to delete does not exist.');
    }
    
    function get_siswa($id){
        $data = $this->CRUD_model->get_siswa($id);
        echo json_encode($data);
    }

    private function validate(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('id_kelas') == ''){
            $data['inputerror'][] = 'id_kelas';
            $data['error_string'][] = 'Required';
            $data['status'] = FALSE;
        }

        if($this->input->post('first_name') == '')
        {
            $data['inputerror'][] = 'first_name';
            $data['error_string'][] = 'Required';
            $data['status'] = FALSE;
        }elseif($this->check($this->input->post('first_name'))>0){
            $data['inputerror'][] = 'first_name';
            $data['error_string'][] = 'No number allowed';
            $data['status'] = FALSE;
        }

        if($this->check($this->input->post('last_name'))>0){
            $data['inputerror'][] = 'last_name';
            $data['error_string'][] = 'No number allowed';
            $data['status'] = FALSE;
        }

        if($this->input->post('address') == '')
        {
            $data['inputerror'][] = 'address';
            $data['error_string'][] = 'Required';
            $data['status'] = FALSE;
        }

        if($this->input->post('contact') == '')
        {
            $data['inputerror'][] = 'contact';
            $data['error_string'][] = 'Required';
            $data['status'] = FALSE;
        }

        if($data['status'] == FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    private function check($string){
        return preg_match('/\\d/', $string);
    }
}