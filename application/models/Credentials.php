<?php 
defined('BASEPATH') OR exit('No direct script access allowed !');

class Credentials extends CI_Model{
    public function __construct(){
        parent::__construct();

    }

    public function getLogin($email, $pass){
        $this->db->where('email', $email)
            ->or_where('username', $email);
        $query = $this->db->get('credentials');

        if($query->num_rows()){
            $res = $query->row();

            if(password_verify($pass,$res->password)){
                $ses = array(
                    'uid' => strtok($res->username,'@'),
                    'role' => substr($res->user_id,0,1)
                );
                $this->session->set_userdata($ses); 
                return true;  
            }
        }else return false;
    }

    public function getRole(){
        $query = $this->db->get('credentials');
        return $query->result_array();
    }

    public function setApproval($fname, $lname, $address, $contact, $role){
        $values = array(
            'role' => $role,
            'first_name' => $fname,
            'last_name' => $lname,
            'address' => $address,
            'contact' => $contact
        );
        
        if(!$this->db->insert('approval',$values)){
            return false;
        }else return true;
    }
}