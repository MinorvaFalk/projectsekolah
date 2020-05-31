<?php
defined('BASEPATH') or exit('No direct script access allowed !');

class Siswa_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    /*buat masukin database*/
    function edit_siswa($params){
        $this->db->insert('approval',$params);
        return $this->db->insert_id();
    }
    /*buat masukin database*/
    /*
     * Get siswa by id_siswa
     */
    function get_siswa($id_siswa)
    {
        return $this->db->get_where('siswa',array('id_siswa'=>$id_siswa))->row_array();
    }

    function get_info_siswa($id)
    {
        return $this->db->get_where('siswa',array('user_id'=>$id))->row_array();
    }
    /*
     * Get all siswa
     */
    function get_all_siswa()
    {
        $this->db->order_by('id_siswa', 'desc');
        return $this->db->get('siswa')->result_array();
    }
        
    /*
     * function to add new siswa
     */
    function add_siswa($params)
    {
        $this->db->insert('siswa',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update siswa
     */
    function update_siswa($id_siswa,$params)
    {
        $this->db->where('id_siswa',$id_siswa);
        return $this->db->update('siswa',$params);
    }
    
    /*
     * function to delete siswa
     */
    function delete_siswa($id_siswa)
    {
        return $this->db->delete('siswa',array('id_siswa'=>$id_siswa));
    }
}
