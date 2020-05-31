<?php
defined('BASEPATH') or exit('No direct script access allowed !');

class Guru_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get guru by id_pengajar
     */
    function get_guru($id_pengajar)
    {
        return $this->db->get_where('guru',array('id_pengajar'=>$id_pengajar))->row_array();
    }
        
    /*
     * Get all guru
     */
    function get_all_guru()
    {
        $this->db->order_by('id_pengajar', 'desc');
        return $this->db->get('guru')->result_array();
    }
        
    /*
     * function to add new guru
     */
    function add_guru($params)
    {
        $this->db->insert('guru',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update guru
     */
    function update_guru($id_pengajar,$params)
    {
        $this->db->where('id_pengajar',$id_pengajar);
        return $this->db->update('guru',$params);
    }
    
    /*
     * function to delete guru
     */
    function delete_guru($id_pengajar)
    {
        return $this->db->delete('guru',array('id_pengajar'=>$id_pengajar));
    }

}
