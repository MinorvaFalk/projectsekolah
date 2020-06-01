<?php
defined('BASEPATH') or exit('No direct script access allowed !');

class Data extends CI_Model{
  public function __construct(){
    parent::__construct();

  }

  public function get_data(){
    $query = $this->db->query("SELECT * FROM siswa NATURAL JOIN credentials NATURAL JOIN nilai_siswa");
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
    $query = $this->db->query("SELECT * FROM guru NATURAL JOIN credentials LEFT JOIN kelas USING (id_pengajar)");
    return $query->result_array();
  }

  public function get_availableGuru(){
    $query = $this->db->query("SELECT * 
    FROM kelas k
    RIGHT JOIN guru g
    ON k.id_pengajar = g.id_pengajar
    WHERE k.id_pengajar IS NULL");
    return $query->result_array();
  }

  public function get_class(){
    $query = $this->db->query("SELECT * FROM kelas NATURAL JOIN guru");
    return $query->result_array();
  }

  public function get_subject(){
    $query = $this->db->query("SELECT id_subject, nama_subject
    FROM subject");
    return $query->result_array();
  }

  public function get_nilai(){
    $query = $this->db->query("SELECT *, CONCAT(s.first_name,' ',s.last_name) AS namasiswa, CONCAT(g.first_name,' ',g.last_name) AS namaguru, nilai_tugas, nilai_uts, nilai_uas 
    FROM nilai_siswa n 
    INNER JOIN guru g ON n.id_pengajar = g.id_pengajar 
    INNER JOIN siswa s ON n.id_siswa = s.id_siswa");
    return $query->result_array();
  }

  public function get_notif(){
    $approval = $this->db->query("SELECT * FROM approval WHERE approve IS NULL")->num_rows();
    $total = $this->db->query("SELECT * FROM approval WHERE approve = '2'")->num_rows();
    return $approval+$total;
  }

  public function get_list(){
    $query = $this->db->query("SELECT * FROM approval WHERE approve IS NULL OR approve = '2'");
    return $query->result_array();
  }
}
