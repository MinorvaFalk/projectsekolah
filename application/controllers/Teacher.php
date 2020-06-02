<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teacher extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper('html');
        $this->load->model('Teacher_model');
        $this->load->library('form_validation');
        
        if($_SESSION['role'] !== 'G') redirect('page404');
    }

    public function index(){
        $this->menu('');
    }

    public function menu($opt){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['nav'] = $this->load->view('include/navbar.php', NULL, TRUE);
        $data['notif'] = $this->Teacher_model->get_list()->result_array();

        if($opt == 'profile'){
            $data['info'] = $this->Teacher_model->get_profile($_SESSION['id']);
            $this->load->view('pages/profile',$data);
        }else if($opt == 'editprofile'){
            $data['info'] = $this->Teacher_model->get_profile($_SESSION['id']);
            $this->load->view('pages/editprofile',$data);
        }else{
            $data['nilai'] = $this->Teacher_model->get_nilai($_SESSION['id']);
            $this->load->view('pages/guru.php', $data, NULL);
        }
    }

    public function resolve($id){
        $params = array(
            'komplain' => NULL
        );

        $this->Teacher_model->update_nilai($id,$params);
        echo json_encode(array("status" => TRUE, "redirect" => site_url('/teacher')));
    }

    public function getnotif(){
        echo $this->Teacher_model->get_list()->num_rows();
    }

    public function save(){
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha');
        // $this->form_validation->set_rules('last_name', 'Last Name', 'alpha');
        $this->form_validation->set_rules('contact', 'Contact', 'trim|required|min_length[10]|max_length[13]');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');

        if ($this->form_validation->run() == FALSE){
            $this->menu('editprofile');
        }
        else{
            $params = array(
                'approve_id' => 'E'.$_SESSION['id'],
                'approve' => '2',
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'contact' => $this->input->post('contact'),
                'address' => $this->input->post('address'),
            );
            $this->Teacher_model->edit_profile($params);
            $this->index();
        }
    }

    public function get_grade($id){
        $data = $this->Teacher_model->get_nilai_by($id);
        echo json_encode($data);
    }

    public function edit($id){
        $this->validate();
        $params = array(
            'nilai_tugas' => $this->input->post('nilai_tugas'),
            'nilai_uts' => $this->input->post('nilai_uts'),
            'nilai_uas' => $this->input->post('nilai_uas')
        );

        $this->Teacher_model->update_nilai($id,$params);            
        echo json_encode(array("status" => TRUE, "redirect" => site_url('/teacher')));
    }

    private function validate(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
        
        $tugas = $this->input->post('nilai_tugas');
        $uts = $this->input->post('nilai_uts');
        $uas = $this->input->post('nilai_uas');

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

        if($data['status'] == FALSE){
            echo json_encode($data);
            exit();
        }
    }
}