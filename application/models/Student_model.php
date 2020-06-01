<?php
defined('BASEPATH') or exit('No direct script access allowed !');
class Student_model extends CI_Model{
    function __construct(){
        parent::__construct();

    }

    function get_nilai($id){
        $query = $this->db->query("SELECT nama_subject, nilai_tugas, nilai_uts, nilai_uas, 
        CONCAT(g.first_name, ' ',g.last_name) as guru
        FROM nilai_siswa n
        JOIN siswa s on n.id_siswa = s.id_siswa
        JOIN guru g on n.id_pengajar = g.id_pengajar
        NATURAL JOIN subject
        WHERE s.user_id = '$id'");
        return $query->result_array();
        
    }

    function get_profile($id){
        $query = $this->db->get_where('siswa', array('user_id' => $id));
        return $query->row_array();
    }

    function edit_siswa($params){
        $this->db->insert('approval',$params);
        return $this->db->insert_id();
    }
}