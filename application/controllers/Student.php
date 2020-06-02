<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper('html');
        $this->load->model('Student_model');
        $this->load->library('form_validation');
        
        if($_SESSION['role'] !== 'S') redirect('page404');
    }

    public function index(){
        $this->menu('');
    }

    public function menu($opt){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['nav'] = $this->load->view('include/navbar.php', NULL, TRUE);

        if($opt == 'profile'){
            $data['info'] = $this->Student_model->get_profile($_SESSION['id']);
            $this->load->view('pages/profile',$data);
        }else if($opt == 'editprofile'){
            $data['info'] = $this->Student_model->get_profile($_SESSION['id']);
            $this->load->view('pages/editprofile',$data);
        }else{
            $data['subject'] = $this->Student_model->get_subject($_SESSION['id']);
            $data['kelas'] = $this->Student_model->get_kelas($_SESSION['id']);
            $data['siswa'] = $this->Student_model->get_nilai($_SESSION['id']);
            $data['guru'] = $this->Student_model->get_guru($_SESSION['id']);
            $this->load->view('pages/siswa.php', $data, NULL);
        }
    }

    public function add(){
        $query = $this->Student_model->get_profile($_SESSION['id']);
        $this->validate_add($query['id_siswa']);
        $params = array(
            'id_subject' => $this->input->post('id_subject'),
            'nilai_tugas' => 0,
            'nilai_uts' => 0,
            'nilai_uas' => 0,
            'id_siswa' => $query['id_siswa'],
        );
        $this->Student_model->take_subject($params);
        echo json_encode(array("status" => TRUE, "redirect" => site_url('/student')));
    }

    public function komplain($id){
        $this->validate();

        $params = array(
            'komplain' => $this->input->post('komplain'),
        );

        $this->Student_model->komplain_nilai($id,$params);            
        echo json_encode(array("status" => TRUE, "redirect" => site_url('/student')));
    }

    public function get_nilai($id){
        $data = $this->Student_model->get_nilai_by_id($id);
        echo json_encode($data);
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
            $this->Student_model->edit_siswa($params);
            $this->index();
        }
    }

    private function validate_add($id_siswa){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
        $id = $this->input->post('id_subject');
        $check = $this->Student_model->get_nilai_siswa($id_siswa);

        foreach($check as $i){
            if($i['id_subject'] == $id){
                $data['inputerror'][] = 'id_subject';
                $data['error_string'][] = 'Pelajaran sudah diambil';
                $data['status'] = FALSE;
            }
        }

        if($data['status'] == FALSE){
            echo json_encode($data);
            exit();
        }
    }

    private function validate(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
        
        if($this->input->post('komplain') == ''){
            $data['inputerror'][] = 'komplain';
            $data['error_string'][] = 'required';
            $data['status'] = FALSE;
        }

        if($data['status'] == FALSE){
            echo json_encode($data);
            exit();
        }
    }

}
