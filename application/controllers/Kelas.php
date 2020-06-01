<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('CRUD_model');
    } 

    function index(){
    }

    /*
     * Adding a new kela
     */
    function add(){
        $this->validate();   
        $params = array(
            'id_kelas' => $this->input->post('id_kelas'),
            'nama_kelas' => $this->input->post('nama_kelas'),
            'id_pengajar' => $this->input->post('id_pengajar'),
        );
        
        $kela_id = $this->CRUD_model->add_kelas($params);
        echo json_encode(array("status" => TRUE, "redirect" => site_url('/admin/menu/class')));
        
    }  

    /*
     * Editing a kela
     */
    function edit($id_kelas){   
        $this->validate();

        $params = array(
            'nama_kelas' => $this->input->post('nama_kelas'),
            'id_pengajar' => $this->input->post('id_pengajar'),
        );

        $this->CRUD_model->update_kelas($id_kelas,$params);            
        echo json_encode(array("status" => TRUE, "redirect" => site_url('/admin/menu/class')));
          
    } 

    /*
     * Deleting kela
     */
    function remove($id_kelas){
        $kela = $this->CRUD_model->get_kelas($id_kelas);

        // check if the kela exists before trying to delete it
        if(isset($kela['id_kelas']))
        {
            $this->CRUD_model->delete_kelas($id_kelas);
            redirect('admin/menu/class');
        }
        else
            show_error('The kela you are trying to delete does not exist.');
    }

    function get_kelas($id_kelas){
        $data = $this->db->query("SELECT * FROM kelas k RIGHT JOIN guru g ON k.id_pengajar = g.id_pengajar WHERE id_kelas = '$id_kelas'")->row_array();
       echo json_encode($data);
    }

    private function validate(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
        $id = $this->input->post('id_kelas');
        $kela_id = $this->CRUD_model->get_all_kelas();
        

        if(isset($id)){
            if($id == ''){
                $data['inputerror'][] = 'id_kelas';
                $data['error_string'][] = 'Required';
                $data['status'] = FALSE;
            }else{
                foreach($kela_id as $kelas){
                    if($id == $kelas['id_kelas']){
                        $data['inputerror'][] = 'id_kelas';
                        $data['error_string'][] = 'ID sudah terdaftar';
                        $data['status'] = FALSE;
                    }
                }
            }
        }

        if($this->input->post('nama_kelas') == '')
        {
            $data['inputerror'][] = 'nama_kelas';
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