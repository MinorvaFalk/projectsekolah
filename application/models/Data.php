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
    $query = $this->db->query("SELECT * FROM datasiswa");
    return $query->result_array();
  }
}
