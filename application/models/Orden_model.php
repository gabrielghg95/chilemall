<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Orden_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get orden by id
     */
    function get_orden($id)
    {
        return $this->db->get_where('ordenes',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all ordenes count
     */
    function get_all_ordenes_count()
    {
        $this->db->from('ordenes');
        return $this->db->count_all_results();
    }

    function buscar($rut)
    {
        return $this->db->get_where('clientes',array('rut'=>$rut))->row_array();
    }

    function get_producto($id)
    {
        return $this->db->get_where('productos', array('id' => $id))->row_array();
    }
    function get_all_productos()
    {
        $this->db->select('p.id, p.nombre, p.descripcion, p.precio, p.categoria_fk, p.local_fk, p.marca_fk, p.destacado, p.stock, p.imagen, p.creado_en, m.imagen as marca, c.nombre as categoria, l.nombre as local');
        $this->db->from('productos p');
        $this->db->join('marcas m', 'm.id = p.marca_fk');
        $this->db->join('categorias c', 'c.id = p.categoria_fk');
        $this->db->join('locales l', 'l.id = p.local_fk');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    function get_all_categorias()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('categorias')->result_array();
    }

    function get_all_locales()
    {
        $this->db->select('l.id, l.nombre, l.descripcion, l.imagen, l.creado_en, t.numero as telefono');
        $this->db->from('locales l');
        $this->db->join('telefonos t', 't.id = l.telefono_fk');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    } 
        
    /*
     * Get all ordenes
     */
    function get_all_ordenes($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('ordenes')->result_array();
    }
        
    /*
     * function to add new orden
     */
    function add_orden($params)
    {
        $this->db->insert('ordenes',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update orden
     */
    function update_orden($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('ordenes',$params);
    }
    
    /*
     * function to delete orden
     */
    function delete_orden($id)
    {
        return $this->db->delete('ordenes',array('id'=>$id));
    }
}
