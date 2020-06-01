<?php

class Nilai_siswa_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get nilai_siswa by id
     */
    function get_nilai_siswa($id)
    {
        return $this->db->get_where('nilai_siswa',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all nilai_siswa
     */
    function get_all_nilai_siswa()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('nilai_siswa')->result_array();
    }
        
    /*
     * function to add new nilai_siswa
     */
    function add_nilai_siswa($params)
    {
        $this->db->insert('nilai_siswa',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update nilai_siswa
     */
    function update_nilai_siswa($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('nilai_siswa',$params);
    }
    
    /*
     * function to delete nilai_siswa
     */
    function delete_nilai_siswa($id)
    {
        return $this->db->delete('nilai_siswa',array('id'=>$id));
    }
}
