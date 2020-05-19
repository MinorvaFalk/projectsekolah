<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilaisiswa_admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->model('data');
    }

    public function index()
    {
      $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
      $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
      $data['nilai_siswa'] = $this->data->get_nilaisiswa();
      $this->load->view('pages/nilaisiswa.php');
    }
}