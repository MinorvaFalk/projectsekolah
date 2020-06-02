<?php
defined('BASEPATH') or exit('No direct script access allowed !');
class Student_model extends CI_Model{
    function __construct(){
        parent::__construct();

    }

    function get_nilai($id){
        $query = $this->db->query("SELECT id, nama_subject, nilai_tugas, nilai_uts, nilai_uas, 
        CONCAT(g.first_name, ' ',g.last_name) as guru, komplain
        FROM nilai_siswa n
        JOIN siswa s on n.id_siswa = s.id_siswa
        NATURAL JOIN subject sub
        JOIN guru g on sub.id_pengajar = g.id_pengajar
        WHERE s.user_id = '$id'");
        return $query->result_array();
        
    }

    function get_subject(){
        $query = $this->db->query("SELECT * FROM subject");
        return $query->result_array();
    }

    function get_guru($id){
        $kelas = $this->db->get_where('siswa', array('user_id' => $id))->row();
        $query = $this->db->query("SELECT 
        CONCAT(g.first_name,' ', g.last_name) as guru
        FROM kelas
        NATURAL JOIN guru g
        WHERE id_kelas = '$kelas->id_kelas'");
        return $query->row_array();
    }

    function get_kelas($id){
        $siswa = $this->db->get_where('siswa', array('user_id' => $id))->row();
        $query = $this->db->query("SELECT 
        CONCAT(g.first_name,' ', g.last_name) as guru, CONCAT(s.first_name, ' ', s.last_name) as siswa
        FROM siswa s
        NATURAL JOIN kelas k
        JOIN guru g ON k.id_pengajar = g.id_pengajar
        WHERE id_kelas = '$siswa->id_kelas' AND s.user_id != '$id'");
        return $query->result_array();
    }

    function get_nilai_by_id($id){
        $query = $this->db->query("SELECT * FROM nilai_siswa
        NATURAL JOIN subject
        WHERE id = '$id'");
        return $query->row_array();
    }

    function get_nilai_siswa($id){
        $query = $this->db->get_where('nilai_siswa', array('id_siswa' => $id));
        return $query->result_array();
    }

    function get_profile($id){
        $query = $this->db->get_where('siswa', array('user_id' => $id));
        return $query->row_array();
    }

    function take_subject($params){
        $this->db->insert('nilai_siswa',$params);
        return $this->db->insert_id();
    }

    function edit_siswa($params){
        $this->db->insert('approval',$params);
        return $this->db->insert_id();
    }

    function komplain_nilai($id,$params){
        $this->db->where('id',$id);
        return $this->db->update('nilai_siswa',$params);
    }
}