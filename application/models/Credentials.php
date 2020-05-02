<?php 
defined('BASEPATH') OR exit('No direct script access allowed !');

class Credentials extends CI_Model{
    public function __construct(){
        parent::__construct();

    }

    public function getLogin($data){
        $query = $this->db->get_where('cred',$data);
        return $query->row();
    }

    public function getRole(){
        $query = $this->db->get('role');
        return $query->result_array();
    }
}