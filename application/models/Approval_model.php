<?php
defined('BASEPATH') or exit('No direct script access allowed !');

class Approval_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get approval by approve_id
     */
    function get_approval($approve_id)
    {
        return $this->db->get_where('approval',array('approve_id'=>$approve_id))->row_array();
    }
        
    /*
     * Get all approval
     */
    function get_all_approval()
    {
        $this->db->order_by('approve_id', 'desc');
        return $this->db->get('approval')->result_array();
    }
        
    /*
     * function to add new approval
     */
    function add_approval($params)
    {
        $this->db->insert('approval',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update approval
     */
    function update_approval($approve_id,$params)
    {
        $this->db->where('approve_id',$approve_id);
        return $this->db->update('approval',$params);
    }
    
    /*
     * function to delete approval
     */
    function delete_approval($approve_id)
    {
        return $this->db->delete('approval',array('approve_id'=>$approve_id));
    }

    function insert_app($params){
        $this->db->insert('credentials',$params);
    }

    function update_guru($params){
        $this->db->update('guru', $params);
    }

    function update_siswa($params){
        $this->db->update('siswa', $params);
    }
    
}
