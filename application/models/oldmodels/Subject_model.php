<?php
defined('BASEPATH') or exit('No direct script access allowed !');

class Subject_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get subject by id_subject
     */
    function get_subject($id_subject)
    {
        return $this->db->get_where('subject',array('id_subject'=>$id_subject))->row_array();
    }
        
    /*
     * Get all subject
     */
    function get_all_subject()
    {
        $this->db->order_by('id_subject', 'desc');
        return $this->db->get('subject')->result_array();
    }
        
    /*
     * function to add new subject
     */
    function add_subject($params)
    {
        $this->db->insert('subject',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update subject
     */
    function update_subject($id_subject,$params)
    {
        $this->db->where('id_subject',$id_subject);
        return $this->db->update('subject',$params);
    }
    
    /*
     * function to delete subject
     */
    function delete_subject($id_subject)
    {
        return $this->db->delete('subject',array('id_subject'=>$id_subject));
    }
}
