<?php
defined('BASEPATH') or exit('No direct script access allowed !');
class Teacher_model extends CI_Model{
    function __construct(){
        parent::__construct();

    }

    function get_nilai_by($id){
        $query = $this->db->query("SELECT *, 
        CONCAT(first_name,' ',last_name) as siswa
        FROM nilai_siswa
        NATURAL JOIN subject
        NATURAL JOIN siswa
        WHERE id = '$id'");
        return $query->row_array();
    }

    function get_nilai($id){
        $query = $this->db->query("SELECT *,
        CONCAT(s.first_name,' ',s.last_name) as siswa
        FROM nilai_siswa n
        JOIN siswa s on n.id_siswa = s.id_siswa
        NATURAL JOIN subject sub
        JOIN guru g on sub.id_pengajar = g.id_pengajar
        WHERE g.user_id = '$id'
        ORDER BY komplain DESC");
        return $query->result_array();
        
    }

    function get_profile($id){
        $query = $this->db->query("SELECT * FROM guru
        NATURAL JOIN kelas
        WHERE user_id = '$id'");
        return $query->row_array();
    }

    function update_nilai($id, $params){
        $this->db->where('id',$id);
        return $this->db->update('nilai_siswa',$params);
    }

    function edit_profile($params){
        $this->db->insert('approval',$params);
        return $this->db->insert_id();
    }

    function get_list(){
        $query = $this->db->query("SELECT * FROM nilai_siswa 
        NATURAL JOIN siswa
        NATURAL JOIN subject
        WHERE komplain IS NOT NULL");
        return $query;
    }
}