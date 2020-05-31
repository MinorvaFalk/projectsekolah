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
                    'id' => $res->user_id,
                    'uid' => strtok($res->username,'@'),
                    'role' => substr($res->user_id,0,1)
                );
                $this->session->set_userdata($ses); 
                return true;  
            }
        }else return false;
    }

    public function getApproval($query){
        $this->db->select('');
        $this->db->from("approval");

        if($query != ''){
            $this->db->like('first_name',$query);
            $this->db->or_like('last_name',$query);
            $this->db->or_like('email',$query);
            $this->db->or_like('approve_id',$query);
        }
        $this->db->order_by('approve_id','DESC');
        return $this->db->get();
    }

    public function setApproval($email, $password, $fname, $lname, $address, $contact){
        $a = 'A'.uniqid();
        
        $values = array(
            'approve_id' => $a,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
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