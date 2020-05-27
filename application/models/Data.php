<?php
defined('BASEPATH') or exit('No direct script access allowed !');

class Data extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function get_data(){
    $query = $this->db->query("SELECT * FROM siswa NATURAL JOIN credentials");
    return $query->result_array();
  }

  public function get_nilaisiswa(){
    $query = $this->db->query("SELECT * FROM subject NATURAL JOIN nilai_siswa NATURAL JOIN siswa");
    return $query->result_array();
  }

  public function get_approval(){
    $query = $this->db->query("SELECT * FROM approval");
    return $query->result_array();
  }

  public function get_guru(){
    $query = $this->db->query("SELECT * FROM guru NATURAL JOIN credentials NATURAL JOIN kelas");
    return $query->result_array();
  }

  public function get_class(){
    $query = $this->db->query("SELECT * FROM kelas NATURAL JOIN guru");
    return $query->result_array();
  }

  public function get_subject(){
    $query = $this->db->query("SELECT * FROM subject NATURAL JOIN nilai_siswa NATURAL JOIN guru");
    return $query->result_array();
  }

  public function get_nilai(){
    $query = $this->db->query("SELECT id, id_subject, CONCAT(s.first_name,' ',s.last_name) AS namasiswa, CONCAT(g.first_name,' ',g.last_name) AS namaguru, nilai_tugas, nilai_uts, nilai_uas FROM nilai_siswa n INNER JOIN guru g ON n.id_pengajar = g.id_pengajar INNER JOIN siswa s ON n.id_siswa = s.id_siswa");
    return $query->result_array();
  }
}
