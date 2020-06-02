<?php
defined('BASEPATH') or exit('No direct script access allowed !');

class Data extends CI_Model{
  public function __construct(){
    parent::__construct();

  }

  public function get_data(){
    $query = $this->db->query("SELECT * FROM siswa NATURAL JOIN credentials");
    return $query->result_array();
  }

  function update_approve($id,$params){
    $this->db->where('approve_id',$id);
    return $this->db->update('approval',$params);
}

  function add_cred($params){
    $this->db->insert('credentials',$params);
    return TRUE;
  }

  function add_guru($params){
    $this->db->insert('guru',$params);
    return $this->db->insert_id();
  }

  function add_siswa($params){
    $this->db->insert('siswa',$params);
    return $this->db->insert_id();
  }

  public function get_approval_by($id){
    return $this->db->get_where('approval',array('approve_id'=>$id));
  }

  function update_profile($userid, $data){
    if(substr($userid,0,1) == 'S'){
      $this->db->where('user_id',$userid);
      $this->db->update('siswa',$data);
    }else{
      $this->db->where('user_id',$userid);
      $this->db->update('guru',$data);
    }
    return $this->db->delete('approval',array('approve_id'=>'E'.$userid));
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
    $query = $this->db->query("SELECT g.id_pengajar, g.first_name, g.first_name, g.last_name, 
    g.contact, g.address, email, id_kelas, keterangan
    FROM guru g
    LEFT JOIN kelas k ON g.id_pengajar = k.id_pengajar
    NATURAL JOIN credentials");
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
    $query = $this->db->query("SELECT *,
    CONCAT(first_name,' ',last_name) as guru
    FROM subject
    NATURAL JOIN guru");
    return $query->result_array();
  }

  public function get_nilai(){
    $query = $this->db->query("SELECT *, 
    CONCAT(s.first_name,' ',s.last_name) AS namasiswa, nilai_tugas, nilai_uts, nilai_uas 
    FROM nilai_siswa n 
    NATURAL JOIN subject
    INNER JOIN siswa s ON n.id_siswa = s.id_siswa");
    return $query->result_array();
  }

  public function get_notif(){
    $approval = $this->db->query("SELECT * FROM approval WHERE approve = '0'")->num_rows();
    $total = $this->db->query("SELECT * FROM approval WHERE approve = '2'")->num_rows();
    return $approval+$total;
  }

  public function get_list(){
    $query = $this->db->query("SELECT * FROM approval WHERE approve = '0' OR approve = '2'");
    return $query->result_array();
  }
}
