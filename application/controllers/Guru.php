<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('CRUD_model');
    } 

    /*
     * Listing of guru
     */
    function index()
    {
        $data['guru'] = $this->CRUD_model->get_all_guru();
        
        $data['_view'] = 'guru/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new guru
     */
    function add(){   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('first_name','First Name','alpha');
		$this->form_validation->set_rules('last_name','Last Name','alpha');
		$this->form_validation->set_rules('contact','Contact','integer|max_length[14]|min_length[10]');
		$this->form_validation->set_rules('address','Address','alpha');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'contact' => $this->input->post('contact'),
				'address' => $this->input->post('address'),
				'keterangan' => $this->input->post('keterangan'),
            );
            
            $guru_id = $this->CRUD_model->add_guru($params);
            redirect('main');
        }
        else
        {            
            $this->load->view('layouts/table_guru');
        }
    }  

    /*
     * Editing a guru
     */
    function edit($id_pengajar)
    {   
        $this->validate();
        $params = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'contact' => $this->input->post('contact'),
            'address' => $this->input->post('address'),
            'keterangan' => $this->input->post('keterangan'),
        );

        $this->CRUD_model->update_guru($id_pengajar,$params);            
        echo json_encode(array("status" => TRUE, "redirect" => site_url('/admin/menu/teacher')));
    } 

    /*
     * Deleting guru
     */
    function remove($id_pengajar)
    {
        $guru = $this->CRUD_model->get_guru($id_pengajar);

        // check if the guru exists before trying to delete it
        if(isset($guru['id_pengajar']))
        {
            $this->CRUD_model->delete_guru($id_pengajar);
            redirect('admin/menu/teacher');
        }
        else
            show_error('The guru you are trying to delete does not exist.');
    }
    
    function get_data($id){
        $data = $this->CRUD_model->get_guru($id);
        echo json_encode($data);
    }

    private function validate(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

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