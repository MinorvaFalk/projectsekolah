<?php
defined('BASEPATH') or exit('No direct script access allowed !');

class Data extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function get_data()
  {
    $query = $this->db->query("SELECT * FROM siswa");
    return $query->result_array();
  }

  public function get_nilaisiswa()
  {
    $query = $this->db->query("SELECT * FROM subject NATURAL JOIN nilai_siswa NATURAL JOIN siswa");
    return $query->result_array();
  }
}
