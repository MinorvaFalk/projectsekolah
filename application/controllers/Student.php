<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper('html');
        $this->load->model('Student_model');
        $this->load->library('form_validation');
        
        if($_SESSION['role'] !== 'S') redirect();
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
            $data['siswa'] = $this->Student_model->get_nilai($_SESSION['id']);
            $this->load->view('pages/siswa.php', $data);
        }
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
            $this->Student_model->update_profile($params);
            $this->index();
        }
    }

}
