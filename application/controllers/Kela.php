<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kela extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kela_model');
    } 

    /*
     * Listing of kelas
     */
    function index()
    {
        $data['kelas'] = $this->Kela_model->get_all_kelas();
        
        $data['_view'] = 'kela/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new kela
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nama_kelas','Nama Kelas','alpha_numeric');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'nama_kelas' => $this->input->post('nama_kelas'),
				'id_pengajar' => $this->input->post('id_pengajar'),
            );
            
            $kela_id = $this->Kela_model->add_kela($params);
            redirect('main');
        }
        else
        {            
            $this->load->view('layouts/table_class',$data);
        }
    }  

    /*
     * Editing a kela
     */
    function edit($id_kelas)
    {   
        // check if the kela exists before trying to edit it
        $data['kela'] = $this->Kela_model->get_kela($id_kelas);
        
        if(isset($data['kela']['id_kelas']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nama_kelas','Nama Kelas','alpha_numeric');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'nama_kelas' => $this->input->post('nama_kelas'),
					'id_pengajar' => $this->input->post('id_pengajar'),
                );

                $this->Kela_model->update_kela($id_kelas,$params);            
                redirect('main');
            }
            else
            {
                $this->load->view('layouts/table_class',$data);
            }
        }
        else
            show_error('The kela you are trying to edit does not exist.');
    } 

    /*
     * Deleting kela
     */
    function remove($id_kelas)
    {
        $kela = $this->Kela_model->get_kela($id_kelas);

        // check if the kela exists before trying to delete it
        if(isset($kela['id_kelas']))
        {
            $this->Kela_model->delete_kela($id_kelas);
            redirect('main');
        }
        else
            show_error('The kela you are trying to delete does not exist.');
    }
}