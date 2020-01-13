<?php

class Producto_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get producto by id
     */
    function get_producto($id)
    {
        return $this->db->get_where('productos', array('id' => $id))->row_array();
    }

    function get_producto_cat($categoria_fk)
    {
        return $this->db->get_where('productos', array('categoria_fk' => $categoria_fk))->row_array();
    }

    function get_producto_loc($local_fk)
    {
        return $this->db->get_where('productos', array('local_fk' => $local_fk))->row_array();
    }

    /*
     function get_all_productos($params = array())
    {
        $this->db->select('p.id, p.nombre, p.descripcion, p.precio, p.categoria_fk, p.local_fk, p.destacado, p.stock, p.imagen, p.creado_en, m.nombre as marca, c.nombre as categoria, l.nombre as local');
        $this->db->from('productos p');
        $this->db->join('marcas m', 'm.id = p.marca_fk');
        $this->db->join('categorias c', 'c.id = p.categoria_fk');
        $this->db->join('locales l', 'l.id = p.local_fk');
        $this->db->order_by('id', 'desc');
        if ($this->db->get()->num_rows() != 0) {
            if (isset($params) && !empty($params)) {
                $this->db->limit($params['limit'], $params['offset']);
            }
            return $this->db->get()->result_array();
        } else {
            return false;
        }
    }
     */
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
     * function to add new producto
     */
    function add_producto($params)
    {
        $this->db->insert('productos', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update producto
     */
    function update_producto($id, $params)
    {
        $this->db->where('id', $id);
        return $this->db->update('productos', $params);
    }

    /*
     * function to delete producto
     */
    function delete_producto($id)
    {
        return $this->db->delete('productos', array('id' => $id));
    }
}
