<?php

class Search_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
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
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    function search($categoriaseleccionada, $keyword)
    {

        $this->db->select('p.id, p.nombre, p.descripcion, p.precio, p.categoria_fk, p.destacado, p.stock, p.imagen, p.creado_en, m.nombre as marca, c.nombre as categoria, l.nombre as local');
        $this->db->from('productos p');
        $this->db->join('marcas m', 'm.id = p.marca_fk');
        $this->db->join('categorias c', 'c.id = p.categoria_fk');
        $this->db->join('locales l', 'l.id = p.local_fk');
        $this->db->like('p.nombre', $keyword) && $this->db->like('c.nombre', $categoriaseleccionada);
        $query  =   $this->db->get();
        return $query->result();
    }
    function search2($categoriaseleccionada, $localseleccionado, $keyword)
    {

        $this->db->select('p.id, p.nombre, p.descripcion, p.precio, p.categoria_fk, p.marca_fk, p.local_fk, p.destacado, p.stock, p.imagen, p.creado_en, m.imagen as marca, c.nombre as categoria, l.nombre as local');
        $this->db->from('productos p');
        $this->db->join('marcas m', 'm.id = p.marca_fk');
        $this->db->join('categorias c', 'c.id = p.categoria_fk');
        $this->db->join('locales l', 'l.id = p.local_fk');
        $this->db->like('p.nombre', $keyword) && $this->db->like('c.nombre', $categoriaseleccionada) && $this->db->like('l.nombre', $localseleccionado);
        $this->db->or_like('m.nombre', $keyword) && $this->db->like('c.nombre', $categoriaseleccionada) && $this->db->like('l.nombre', $localseleccionado);
        $query  =   $this->db->get();
        return $query->result();
    }
}
