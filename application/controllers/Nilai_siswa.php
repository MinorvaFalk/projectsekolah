<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_siswa extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('CRUD_model');
    }

    /*
     * Listing of nilai_siswa
     */
    function index()
    {
        $data['nilai_siswa'] = $this->CRUD_model->get_all_nilai_siswa();
        
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new nilai_siswa
     */
    function add(){   
        $this->validate();
        $params = array(
            'id_subject' => $this->input->post('id_subject'),
            'id_siswa' => $this->input->post('id_siswa'),
            'id_pengajar' => $this->input->post('id_pengajar'),
            'nilai_tugas' => $this->input->post('nilai_tugas'),
            'nilai_uts' => $this->input->post('nilai_uts'),
            'nilai_uas' => $this->input->post('nilai_uas'),
            'komplain' => $this->input->post('komplain'),
        );
        
        $nilai_siswa_id = $this->CRUD_model->add_nilai_siswa($params);
        echo json_encode(array("status" => TRUE, "redirect" => site_url('/admin/menu/grade')));
    }  

    /*
     * Editing a nilai_siswa
     */
    function edit($id){   
        $this->validate();

        $params = array(
            // 'id_subject' => $this->input->post('id_subject'),
            'id_siswa' => $this->input->post('id_siswa'),
            'id_pengajar' => $this->input->post('id_pengajar'),
            'nilai_tugas' => $this->input->post('nilai_tugas'),
            'nilai_uts' => $this->input->post('nilai_uts'),
            'nilai_uas' => $this->input->post('nilai_uas'),
            'komplain' => $this->input->post('komplain'),
        );

        $this->CRUD_model->update_nilai_siswa($id,$params);            
        echo json_encode(array("status" => TRUE, "redirect" => site_url('/admin/menu/grade')));
    }
    
    function komplain($id){
        $this->validate();

        if(isset($_POST) && count($_POST) > 0)     
        { 
            $params = array(
                'id_pengajar' => $this->input->post('id_pengajar'),
                'nilai_tugas' => $this->input->post('nilai_tugas'),
                'nilai_uts' => $this->input->post('nilai_uts'),
                'nilai_uas' => $this->input->post('nilai_uas'),
                'komplain' => $this->input->post('komplain'),
            );

            $this->CRUD_model->update_nilai_siswa($id,$params);  
        }else{
            $this->load->view('pages/student');
        }
        
    }

    function remove($id){
        $nilai_siswa = $this->CRUD_model->get_nilai_siswa($id);

        // check if the nilai_siswa exists before trying to delete it
        if(isset($nilai_siswa['id']))
        {
            $this->CRUD_model->delete_nilai_siswa($id);
            redirect('/admin/menu/grade');
        }
        else
            show_error('The nilai_siswa you are trying to delete does not exist.');
    }

    function get_grade($id){
        $data = $this->db->query("SELECT *, CONCAT(s.first_name,' ',s.last_name) AS namasiswa, CONCAT(g.first_name,' ',g.last_name) AS namaguru, nilai_tugas, nilai_uts, nilai_uas 
        FROM nilai_siswa n 
        INNER JOIN guru g ON n.id_pengajar = g.id_pengajar 
        INNER JOIN siswa s ON n.id_siswa = s.id_siswa WHERE id = '$id'")->row_array();
        echo json_encode($data);
    }

    function validate(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
        $id = $this->input->post('id_subject');
        $tugas = $this->input->post('nilai_tugas');
        $uts = $this->input->post('nilai_uts');
        $uas = $this->input->post('nilai_uas');
        $check = $this->CRUD_model->get_all_nilai_siswa();
        
        if($this->input->post('id_pengajar') == ''){
            $data['inputerror'][] = 'id_pengajar';
            $data['error_string'][] = 'Required';
            $data['status'] = FALSE;
        }

        if(isset($id)){
            if($id == ''){
                $data['inputerror'][] = 'id_subject';
                $data['error_string'][] = 'Required';
                $data['status'] = FALSE;
            }
            foreach($check as $i){
                if($i['id_subject'] == $id && $i['id_siswa'] == $this->input->post('id_siswa')){
                    $data['inputerror'][] = 'id_subject';
                    $data['error_string'][] = 'Pelajaran sudah diambil oleh murid yang sama';
                    $data['status'] = FALSE;
                }
            }
        }

        if($tugas == ''){
            $data['inputerror'][] = 'nilai_tugas';
            $data['error_string'][] = 'Required';
            $data['status'] = FALSE;
        }elseif(!is_numeric($tugas)){
            $data['inputerror'][] = 'nilai_tugas';
            $data['error_string'][] = 'Nilai hanya boleh angka';
            $data['status'] = FALSE;
        }elseif($tugas < 0 || $tugas > 100){
            $data['inputerror'][] = 'nilai_tugas';
            $data['error_string'][] = 'Nilai minimal 0 dan maximal 100';
            $data['status'] = FALSE;
        }

        if($uts == ''){
            $data['inputerror'][] = 'nilai_uts';
            $data['error_string'][] = 'Required';
            $data['status'] = FALSE;
        }elseif(!is_numeric($uts)){
            $data['inputerror'][] = 'nilai_uts';
            $data['error_string'][] = 'Nilai hanya boleh angka';
            $data['status'] = FALSE;
        }elseif($uts < 0 || $uts > 100){
            $data['inputerror'][] = 'nilai_uts';
            $data['error_string'][] = 'Nilai minimal 0 dan maximal 100';
            $data['status'] = FALSE;
        }
        
        if($uas == ''){
            $data['inputerror'][] = 'nilai_uas';
            $data['error_string'][] = 'Required';
            $data['status'] = FALSE;
        }elseif(!is_numeric($uas)){
            $data['inputerror'][] = 'nilai_uas';
            $data['error_string'][] = 'Nilai hanya boleh angka';
            $data['status'] = FALSE;
        }elseif($uas < 0 || $uas > 100){
            $data['inputerror'][] = 'nilai_uas';
            $data['error_string'][] = 'Nilai minimal 0 dan maximal 100';
            $data['status'] = FALSE;
        }

        if($this->input->post('id_siswa') == ''){
            $data['inputerror'][] = 'id_siswa';
            $data['error_string'][] = 'Required';
            $data['status'] = FALSE;
        }

        if($data['status'] == FALSE){
            echo json_encode($data);
            exit();
        }
    }
    
}