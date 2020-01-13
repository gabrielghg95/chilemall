<?php
 
class Telefono_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get telefono by id
     */
    function get_telefono($id)
    {
        return $this->db->get_where('telefonos',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all telefonos
     */
    function get_all_telefonos_count()
    {
        $this->db->from('telefonos');
        return $this->db->count_all_results();
    }

    function get_all_telefonos($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('telefonos')->result_array();
    }
        
    /*
     * function to add new telefono
     */
    function add_telefono($params)
    {
        $this->db->insert('telefonos',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update telefono
     */
    function update_telefono($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('telefonos',$params);
    }
    
    /*
     * function to delete telefono
     */
    function delete_telefono($id)
    {
        return $this->db->delete('telefonos',array('id'=>$id));
    }
}
