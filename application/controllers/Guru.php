<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Guru_model');
    } 

    /*
     * Listing of guru
     */
    function index()
    {
        $data['guru'] = $this->Guru_model->get_all_guru();
        
        $data['_view'] = 'guru/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new guru
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('first_name','First Name','alpha');
		$this->form_validation->set_rules('last_name','Last Name','alpha');
		$this->form_validation->set_rules('contact','Contact','integer|max_length[14]|min_length[10]');
		$this->form_validation->set_rules('address','Address','alpha');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'user_id' => $this->input->post('user_id'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'contact' => $this->input->post('contact'),
				'address' => $this->input->post('address'),
				'keterangan' => $this->input->post('keterangan'),
            );
            
            $guru_id = $this->Guru_model->add_guru($params);
            redirect('main');
        }
        else
        {            
            $this->load->view('layouts/table_guru',$data);
        }
    }  

    /*
     * Editing a guru
     */
    function edit($id_pengajar)
    {   
        // check if the guru exists before trying to edit it
        $data['guru'] = $this->Guru_model->get_guru($id_pengajar);
        
        if(isset($data['guru']['id_pengajar']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('first_name','First Name','alpha');
			$this->form_validation->set_rules('last_name','Last Name','alpha');
			$this->form_validation->set_rules('contact','Contact','integer|max_length[14]|min_length[10]');
			$this->form_validation->set_rules('address','Address','alpha');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'user_id' => $this->input->post('user_id'),
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'contact' => $this->input->post('contact'),
					'address' => $this->input->post('address'),
					'keterangan' => $this->input->post('keterangan'),
                );

                $this->Guru_model->update_guru($id_pengajar,$params);            
                redirect('main');
            }
            else
            {
                $this->load->view('layouts/table_guru',$data);
            }
        }
        else
            show_error('The guru you are trying to edit does not exist.');
    } 

    /*
     * Deleting guru
     */
    function remove($id_pengajar)
    {
        $guru = $this->Guru_model->get_guru($id_pengajar);

        // check if the guru exists before trying to delete it
        if(isset($guru['id_pengajar']))
        {
            $this->Guru_model->delete_guru($id_pengajar);
            redirect('main');
        }
        else
            show_error('The guru you are trying to delete does not exist.');
    }
    
}