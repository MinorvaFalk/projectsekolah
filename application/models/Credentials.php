<?php 
defined('BASEPATH') OR exit('No direct script access allowed !');

class Credentials extends CI_Model{
    public function __construct(){
        parent::__construct();

    }

    public function getLogin($email, $pass){
        $query = $this->db->get_where('cred',array('email' => $email));
        $res = $query->row();

        if(password_verify($pass,$res->password)){
            return $query->row();
            
        }else return $this->db->error();
    }

    public function getRole(){
        $query = $this->db->get('role');
        return $query->result_array();
    }

    public function setCredentials($role, $email, $pass){
        $values = array(
            'roleid' => $role,
            'email' => $email,
            'password' => password_hash($pass, PASSWORD_BCRYPT)
        );
        
        if(!$this->db->insert('cred',$values)){
            echo "error";
        }else redirect(base_url());
    }
}