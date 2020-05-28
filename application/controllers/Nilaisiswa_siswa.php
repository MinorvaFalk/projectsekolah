<?php 
class Nilaisiswa_siswa extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data');
    }

    public function index()
    {
    $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
    $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
    $data['nav'] = $this->load->view('include/navbar.php', NULL, TRUE);
    $data['getnilai'] = $this->Data->get_nilaisiswa();
    $this->load->view('pages/nilaisiswa_siswa.php', $data);
    }
  }
?>