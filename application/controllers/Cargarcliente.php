<?php
defined('BASEPATH') or exit('No existe el script alojado');

class Cargarcliente extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Cargarcliente_model");
    }
    public function rut()
    {
        $rut = $this->input->post("rut");
        $rut = str_replace("-", "", $rut);
        $idproducto = $this->input->post("idproducto");
        $res = $this->Cargarcliente_model->buscar($rut);
        if (!$res) {

            $data['rut'] = $rut;
            $data['all_locales'] = $this->Cargarcliente_model->get_all_locales();
            $data['all_categorias'] = $this->Cargarcliente_model->get_all_categorias();
            $data['productos'] = $this->Cargarcliente_model->get_all_productos();
            $data['producto'] = $this->Cargarcliente_model->get_producto($idproducto);
            $data['mensaje'] = "No ha realizado compras con este rut en nuestra plataforma.";
            $data['_view'] = 'vitrina/orden_compra';
            $this->load->view('layouts/index', $data);
        } else {

            $data['mensaje'] = "Se cargaron sus datos ingresados anteriormente.";
            $data['all_locales'] = $this->Cargarcliente_model->get_all_locales();
            $data['all_categorias'] = $this->Cargarcliente_model->get_all_categorias();
            $data['productos'] = $this->Cargarcliente_model->get_all_productos();
            $data['producto'] = $this->Cargarcliente_model->get_producto($idproducto);
            $data['cliente'] = $this->Cargarcliente_model->buscar($rut);
            $data['rut'] = $rut;
            $data['_view'] = 'vitrina/orden_compra';
            $this->load->view('layouts/index', $data);
        }
    }
    
}
