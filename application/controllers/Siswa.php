<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
    } 

    /*
     * Listing of siswa
     */
    function index()
    {
        $data['siswa'] = $this->Siswa_model->get_all_siswa();
        
        $data['_view'] = 'siswa/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new siswa
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('contact','Contact','integer|max_length[14]|min_length[10]');
		$this->form_validation->set_rules('first_name','First Name','alpha');
		$this->form_validation->set_rules('last_name','Last Name','alpha');
		$this->form_validation->set_rules('address','Address','alpha');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'user_id' => $this->input->post('user_id'),
				'id_kelas' => $this->input->post('id_kelas'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'contact' => $this->input->post('contact'),
				'address' => $this->input->post('address'),
				'keterangan' => $this->input->post('keterangan'),
            );
            
            $siswa_id = $this->Siswa_model->add_siswa($params);
            redirect('main');
        }
        else
        {            
            $this->load->view('layouts/table_siswa',$data);
        }
    }  

    /*
     * Editing a siswa
     */
    function edit($id_siswa)
    {   
        // check if the siswa exists before trying to edit it
        $data['siswa'] = $this->Siswa_model->get_siswa($id_siswa);
        
        if(isset($data['siswa']['id_siswa']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('contact','Contact','integer|max_length[14]|min_length[10]');
			$this->form_validation->set_rules('first_name','First Name','alpha');
			$this->form_validation->set_rules('last_name','Last Name','alpha');
			$this->form_validation->set_rules('address','Address','alpha');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'user_id' => $this->input->post('user_id'),
					'id_kelas' => $this->input->post('id_kelas'),
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'contact' => $this->input->post('contact'),
					'address' => $this->input->post('address'),
					'keterangan' => $this->input->post('keterangan'),
                );

                $this->Siswa_model->update_siswa($id_siswa,$params);            
                redirect('main');
            }
            else
            {
                $this->load->view('layouts/table_siswa',$data);
            }
        }
        else
            show_error('The siswa you are trying to edit does not exist.');
    } 

    /*
     * Deleting siswa
     */
    function remove($id_siswa)
    {
        $siswa = $this->Siswa_model->get_siswa($id_siswa);

        // check if the siswa exists before trying to delete it
        if(isset($siswa['id_siswa']))
        {
            $this->Siswa_model->delete_siswa($id_siswa);
            redirect('main');
        }
        else
            show_error('The siswa you are trying to delete does not exist.');
    }
    
}