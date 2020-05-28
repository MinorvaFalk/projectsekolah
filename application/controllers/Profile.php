<?php

class Profile extends CI_Controller
{
    public function index($nama = '')
    {
        $data['judul'] = "Profile - UAS Penilaian Siswa";
        $data['nama'] = $nama;
        $this->load->view('include/navbar', $data);
        $this->load->view('profile/index');
        $this->load->view('include/footer');
    }
}