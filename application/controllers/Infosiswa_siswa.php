<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Infosiswa_siswa extends CI_Controller
{
  public function __construct()
  {
      parent::__construct();
      $this->load->helper('html');
      $this->load->model('data');
  }

	public function index(){
    $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
    $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
    $data['infosiswa'] = $this->data->get_data();
    $this->load->view('pages/infosiswa_siswa.php', $data);
  }
}