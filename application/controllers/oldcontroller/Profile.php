<?php

class Profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Student_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    } 

    public function index()
    {
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['nav'] = $this->load->view('include/navbar.php', NULL, TRUE);
        $data['info'] = $this->Student_model->get_profile($_SESSION['id']);
        // var_dump($_SESSION);
        $this->load->view('pages/profile',$data);
    }

    public function edit(){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['nav'] = $this->load->view('include/navbar.php', NULL, TRUE);
        $data['info'] = $this->Student_model->get_info_siswa($_SESSION['id']);
        $this->load->view('pages/editprofile',$data);
    }

    /*buat submit data yang diganti*/
    public function save(){
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha');
        // $this->form_validation->set_rules('last_name', 'Last Name', 'alpha');
        $this->form_validation->set_rules('contact', 'Contact', 'trim|required|min_length[10]|max_length[13]');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');

        if ($this->form_validation->run() == FALSE){
            $this->edit();
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
    /*buat masukin database*/

}
