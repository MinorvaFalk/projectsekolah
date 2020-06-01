<?php
defined('BASEPATH') or exit('No direct script access allowed !');

class CRUD_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function get_kelas($id_kelas){
        return $this->db->get_where('kelas',array('id_kelas'=>$id_kelas))->row_array();
    }

    function get_subject($id_subject){
        return $this->db->get_where('subject',array('id_subject'=>$id_subject))->row_array();
    }

    function get_guru($id_pengajar){
        return $this->db->get_where('guru',array('id_pengajar'=>$id_pengajar))->row_array();
    }

    function get_siswa($id_siswa){
        return $this->db->get_where('siswa',array('id_siswa'=>$id_siswa))->row_array();
    }
    
    function get_nilai_siswa($id){
        return $this->db->get_where('nilai_siswa',array('id'=>$id))->row_array();
    }

    // add kelas
    function add_kelas($params){
        $this->db->insert('kelas',$params);
        return $this->db->insert_id();
    }
    
    // update kelas
    function update_kelas($id_kelas,$params){
        $this->db->where('id_kelas',$id_kelas);
        return $this->db->update('kelas',$params);
    }
    
    // delete kelas
    function delete_kelas($id_kelas){
        return $this->db->delete('kelas',array('id_kelas'=>$id_kelas));
    }

    function get_all_kelas(){
        $this->db->order_by('id_kelas', 'desc');
        return $this->db->get('kelas')->result_array();
    }
            
    //add subject
    function add_subject($params){
        $this->db->insert('subject',$params);
        return $this->db->insert_id();
    }

    function get_all_subject(){
        $this->db->order_by('id_subject', 'desc');
        return $this->db->get('subject')->result_array();
    }
    
    //update subject
    function update_subject($id_subject,$params){
        $this->db->where('id_subject',$id_subject);
        return $this->db->update('subject',$params);
    }
    
    //delete subject
    function delete_subject($id_subject){
        return $this->db->delete('subject',array('id_subject'=>$id_subject));
    }

    //update guru
    function update_guru($id_pengajar,$params){
        $this->db->where('id_pengajar',$id_pengajar);
        return $this->db->update('guru',$params);
    }
    
    //delete guru
    function delete_guru($id_pengajar){
        return $this->db->delete('guru',array('id_pengajar'=>$id_pengajar));
    }

    //update siswa
    function update_siswa($id_siswa,$params){
        $this->db->where('id_siswa',$id_siswa);
        return $this->db->update('siswa',$params);
    }
    
    //delete siswa
    function delete_siswa($id_siswa){
        return $this->db->delete('siswa',array('id_siswa'=>$id_siswa));
    }

    //add nilai siswa
    function add_nilai_siswa($params){
        $this->db->insert('nilai_siswa',$params);
        return $this->db->insert_id();
    }
    
    //update nilai siswa
    function update_nilai_siswa($id,$params){
        $this->db->where('id',$id);
        return $this->db->update('nilai_siswa',$params);
    }
    
    //delete nilai siswa
    function delete_nilai_siswa($id){
        return $this->db->delete('nilai_siswa',array('id'=>$id));
    }

    function get_all_nilai_siswa(){
        $this->db->order_by('id', 'desc');
        return $this->db->get('nilai_siswa')->result_array();
    }
}