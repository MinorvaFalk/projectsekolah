<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tables extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('data');
    }

    public function index(){
        $sel = $this->input->post();
        $menu = $sel['menu'];

        switch($menu){
            case 1: $this->table_approval();break;
            case 2: $this->table_class(); break;
            case 3: $this->table_guru();break;
            case 4: $this->table_student(); break;
            case 5: $this->table_subject(); break;
            case 6: $this->table_nilai(); break;
        }
    }

    public function table_student(){
        $data = $this->data->get_data();
        echo '<table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <td>NIS</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>No. Telephone</td>
                    <td>Alamat</td>
                    <td>Keterangan</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>';
        foreach ($data as $row) {
            echo '<tr>
            <td>'.$row['id_siswa'].'</td>
            <td>'.$row['first_name'].' '.$row['last_name'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['contact'].'</td>
            <td>'.$row['address'].'</td>
            <td>'.$row['keterangan'].'</td>
            <td></td>
            </tr>';
        }
        echo '</tbody></table>';
    }

    public function table_approval(){
        $data = $this->data->get_approval();
        echo '<table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>No. Telephone</td>
                    <td>Alamat</td>
                    <td>Status</td>
                </tr>
            </thead>';
        foreach ($data as $row) {
            if($row['approve'] == NULL){
                $status = '<span class="badge badge-warning">Waiting Approval</span>';
            }else $status = '<span class="badge badge-success">Approved</span>';
            echo '<tr>
            <td>'.$row['approve_id'].'</td>
            <td>'.$row['first_name'].' '.$row['last_name'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['contact'].'</td>
            <td>'.$row['address'].'</td>
            <td>'.$status.'</td>
        </tr>';
        }
    }

    public function table_guru(){
        $data = $this->data->get_guru();
        echo '<table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>NI</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Kelas</td>
                    <td>No. Telephone</td>
                    <td>Alamat</td>
                    <td>Keterangan</td>
                    <td>Action</td>
                </tr>
            </thead><tbody>';
        foreach ($data as $row) {
            echo '<tr>
            <td>'.$row['id_pengajar'].'</td>
            <td>'.$row['first_name'].' '.$row['last_name'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['id_kelas'].'</td>
            <td>'.$row['contact'].'</td>
            <td>'.$row['address'].'</td>
            <td>'.$row['keterangan'].'</td>
            <td></td>
        </tr></tbody></table>';
        }
    }

    public function table_class(){
        $data = $this->data->get_class();
        echo '<table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>Kode Kelas</td>
                    <td>Nama Kelas</td>
                    <td>Nama Guru</td>
                    <td>Action</td>
                </tr>
            </thead><tbody>';
        foreach ($data as $row) {
            echo '<tr>
            <td>'.$row['id_kelas'].'</td>
            <td>'.$row['nama_kelas'].'</td>
            <td>'.$row['first_name'].' '.$row['last_name'].'</td>
            <td></td>
        </tr></tbody></table>';
        }
    }

    public function table_subject(){
        $data = $this->data->get_subject();
        echo '<table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID Subject</td>
                    <td>Nama Subject</td>
                    <td>Action</td>
                </tr>
            </thead>';
        foreach ($data as $row) {
            echo '<tr>
            <td>'.$row['id_subject'].'</td>
            <td>'.$row['nama_subject'].'</td>
            <td></td>
        </tr>';
        }
    }

    public function table_nilai(){
        $data = $this->data->get_nilai();
        echo '<table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID Subject</td>
                    <td>ID Siswa</td>
                    <td>ID Guru</td>
                    <td>Nilai Tugas</td>
                    <td>Nilai UTS</td>
                    <td>Nilai UAS</td>
                    <td>Action</td>
                </tr>
            </thead><tbody>';
        foreach ($data as $row) {
            echo '<tr>
            <td>'.$row['id_subject'].'</td>
            <td>'.$row['id_siswa'].'</td>
            <td>'.$row['id_pengajar'].'</td>
            <td>'.$row['nilai_tugas'].'</td>
            <td>'.$row['nilai_uts'].'</td>
            <td>'.$row['nilai_uas'].'</td>
            <td></td>
        </tr></tbody></table>';
        }
    }
}
