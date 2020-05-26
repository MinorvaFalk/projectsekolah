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
    $query = $this->db->query("SELECT * FROM subject");
    return $query->result_array();
  }

  public function get_nilai(){
    $query = $this->db->query("SELECT * FROM nilai_siswa");
    return $query->result_array();
  }
}
