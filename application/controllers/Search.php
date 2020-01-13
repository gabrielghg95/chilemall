<?php

class Search extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Search_model');
    }
   
    function search_keyword()
    {
        $data['all_locales'] = $this->Search_model->get_all_locales();
        $data['all_categorias'] = $this->Search_model->get_all_categorias();
        $categoriaseleccionada = $this->input->post('categoriaseleccionada');
        $keyword    =   $this->input->post('keyword');
        $data['results']    =   $this->Search_model->search($categoriaseleccionada, $keyword);
        $data['busqueda']    =   $keyword;
        $data['categoriaselected'] = $categoriaseleccionada;
        $data['_view'] = 'vitrina/resultado';
        $this->load->view('layouts/index', $data);
    }
    function search_keyword2()
    {
        $data['all_locales'] = $this->Search_model->get_all_locales();
        $data['all_categorias'] = $this->Search_model->get_all_categorias();
        $categoriaseleccionada = $this->input->post('categoriaseleccionada');
        $localseleccionado = $this->input->post('localseleccionado');
        $keyword    =   $this->input->post('keyword');
        $data['results']    =   $this->Search_model->search2($categoriaseleccionada, $localseleccionado, $keyword);
        $data['busqueda']    =   $keyword;
        $data['categoriaselected'] = $categoriaseleccionada;
        $data['localselected'] = $localseleccionado;
        $data['_view'] = 'producto/index2';
        $this->load->view('layouts/main', $data);
    }
}
