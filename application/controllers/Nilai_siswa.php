<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_siswa extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nilai_siswa_model');
    } 

    /*
     * Listing of nilai_siswa
     */
    function index()
    {
        $data['nilai_siswa'] = $this->Nilai_siswa_model->get_all_nilai_siswa();
        $data['_view'] = 'nilai_siswa/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new nilai_siswa
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('id_subject','Id Subject','required|max_length[5]');
		$this->form_validation->set_rules('id_siswa','Id Siswa','required|max_length[5]');
		$this->form_validation->set_rules('nilai_tugas','Nilai Tugas','required|integer');
		$this->form_validation->set_rules('nilai_uts','Nilai Uts','required|integer');
		$this->form_validation->set_rules('nilai_uas','Nilai Uas','required|integer');
		$this->form_validation->set_rules('komplain','Komplain','max_length[500]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'id_subject' => $this->input->post('id_subject'),
				'id_siswa' => $this->input->post('id_siswa'),
				'nilai_tugas' => $this->input->post('nilai_tugas'),
				'nilai_uts' => $this->input->post('nilai_uts'),
				'nilai_uas' => $this->input->post('nilai_uas'),
				'komplain' => $this->input->post('komplain'),
            );
            
            $nilai_siswa_id = $this->Nilai_siswa_model->add_nilai_siswa($params);
            redirect('nilai_siswa/');
        }
        else
        {            
            $data['_view'] = 'nilai_siswa/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a nilai_siswa
     */
    function edit($id)
    {   
        // check if the nilai_siswa exists before trying to edit it
        $data['nilai_siswa'] = $this->Nilai_siswa_model->get_nilai_siswa($id);
        
        if(isset($data['nilai_siswa']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('id_subject','Id Subject','required|max_length[5]');
			$this->form_validation->set_rules('id_siswa','Id Siswa','required|max_length[5]');
			$this->form_validation->set_rules('nilai_tugas','Nilai Tugas','required|integer');
			$this->form_validation->set_rules('nilai_uts','Nilai Uts','required|integer');
			$this->form_validation->set_rules('nilai_uas','Nilai Uas','required|integer');
			$this->form_validation->set_rules('komplain','Komplain','max_length[500]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'id_subject' => $this->input->post('id_subject'),
					'id_siswa' => $this->input->post('id_siswa'),
					'nilai_tugas' => $this->input->post('nilai_tugas'),
					'nilai_uts' => $this->input->post('nilai_uts'),
					'nilai_uas' => $this->input->post('nilai_uas'),
					'komplain' => $this->input->post('komplain'),
                );

                $this->Nilai_siswa_model->update_nilai_siswa($id,$params);            
                redirect('nilai_siswa/');
            }
            else
            {
                $data['_view'] = 'nilai_siswa/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The nilai_siswa you are trying to edit does not exist.');
    } 

    /*
     * Deleting nilai_siswa
     */
    function remove($id)
    {
        $nilai_siswa = $this->Nilai_siswa_model->get_nilai_siswa($id);

        // check if the nilai_siswa exists before trying to delete it
        if(isset($nilai_siswa['id']))
        {
            $this->Nilai_siswa_model->delete_nilai_siswa($id);
            redirect('nilai_siswa/');
        }
        else
            show_error('The nilai_siswa you are trying to delete does not exist.');
    }
    
}
