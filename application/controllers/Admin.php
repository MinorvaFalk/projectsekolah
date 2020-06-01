<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper('html');
        $this->load->model('data');
        
        if($_SESSION['role'] !== 'A') redirect('page404');
    }

    public function index(){
        $menu = '';
        $this->menu($menu);
    }

    public function menu($table){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['nav'] = $this->load->view('include/navbar.php', NULL, TRUE);
        $data['notif'] = $this->data->get_list();

        if($table == 'teacher'){
            $guru['data'] = $this->data->get_guru();
            $data['table'] = $this->load->view('layouts/table_guru',$guru, TRUE);
        }elseif($table == 'student'){
            $siswa['data'] = $this->data->get_data();
            $siswa['kelas'] = $this->data->get_class();
            $data['table'] = $this->load->view('layouts/table_siswa',$siswa, TRUE);
        }elseif($table == 'subject'){
            $subject['data'] = $this->data->get_subject();
            $data['table'] = $this->load->view('layouts/table_subject',$subject, TRUE);
        }elseif($table == 'class'){
            $class['guru'] = $this->data->get_availableGuru();
            $class['data'] = $this->data->get_class();
            $data['table'] = $this->load->view('layouts/table_class',$class, TRUE);
        }elseif($table == 'grade'){
            $grade['siswa'] = $this->data->get_data();
            $grade['data'] = $this->data->get_nilai();
            $grade['guru'] = $this->data->get_guru();
            $grade['subject'] = $this->data->get_subject();
            $data['table'] = $this->load->view('layouts/table_grade',$grade, TRUE);
        }
        $data['approval'] = $this->data->get_approval();
        
        $this->load->view('pages/adminv2.php', $data);
    }

    public function get_approval($id){
        $data = $this->data->get_approval_by($id)->row_array();
        echo json_encode($data);
        
    }

    public function approve(){
        $id = $this->input->post('approve_id');
        $data = $this->data->get_approval_by($id)->row_array();

        if(substr($id,0,1) == 'A'){
            if(strpos($data['email'],'admin') || strpos($data['email'],'teacher')){
                $userid = 'A'.crc32(uniqid());
            }else $userid = 'S'.crc32(uniqid());
            $params = array(
                'user_id' => $userid,
                'username' => strtok($data['email'],'@'),
                'email' => $data['email'],
                'password' => $data['password']
            );

            if($this->data->add_cred($params)){
                if(strpos($data['email'],'admin')){
                    $params1 = array(
                        'id_pengajar' => 'GA'.crc32(uniqid()),
                        'user_id' => $userid,
                        'first_name' => $data['first_name'],
                        'last_name' => $data['last_name'],
                        'contact' => $data['contact'],
                        'address' => $data['address']
                    );
                    
                    $this->data->add_guru($params1);
    
                }else if(strpos($data['email'],'teacher')){
                    $params1 = array(
                        'id_pengajar' => 'G'.crc32(uniqid()),
                        'user_id' => $userid,
                        'first_name' => $data['first_name'],
                        'last_name' => $data['last_name'],
                        'contact' => $data['contact'],
                        'address' => $data['address']
                    );
                    $this->data->add_guru($params1);
                   
    
                }else{
                    $params1 = array(
                        'id_siswa' => 'A'.crc32(uniqid()),
                        'user_id' => $userid,
                        'first_name' => $data['first_name'],
                        'last_name' => $data['last_name'],
                        'contact' => $data['contact'],
                        'address' => $data['address']
                    );
                    $this->data->add_siswa($params1);
                }
            }
            $this->data->update_approve($id,array('approve' => '1'));
            echo json_encode(array("status" => TRUE, "redirect" => site_url('/admin')));
        }else{
            $userid = substr($id,1);
            $params = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'contact' => $this->input->post('contact'),
                'address' => $this->input->post('address'),
                'keterangan' => $this->input->post('keterangan'),
            );
            $this->data->update_profile($userid,$params);
            echo json_encode(array("status" => TRUE, "redirect" => site_url('/admin')));
        }
    }

    public function getNotif(){
        echo $this->data->get_notif();
    }
    
    public function logout(){
        session_destroy();
        redirect();
    }
}