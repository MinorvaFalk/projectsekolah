<?php
defined('BASEPATH') or exit('No direct script access allowed !');

class Kela_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get kela by id_kelas
     */
    function get_kela($id_kelas)
    {
        return $this->db->get_where('kelas',array('id_kelas'=>$id_kelas))->row_array();
    }
        
    /*
     * Get all kelas
     */
    function get_all_kelas()
    {
        $this->db->order_by('id_kelas', 'desc');
        return $this->db->get('kelas')->result_array();
    }
        
    /*
     * function to add new kela
     */
    function add_kela($params)
    {
        $this->db->insert('kelas',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update kela
     */
    function update_kela($id_kelas,$params)
    {
        $this->db->where('id_kelas',$id_kelas);
        return $this->db->update('kelas',$params);
    }
    
    /*
     * function to delete kela
     */
    function delete_kela($id_kelas)
    {
        return $this->db->delete('kelas',array('id_kelas'=>$id_kelas));
    }
}
