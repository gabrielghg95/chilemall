<?php

class Categoria extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Categoria_model');
    }

    /*
     * Listing of categorias
     */

    function index()
    {
        if ($this->session->userdata("login")) {
            $params['limit'] = RECORDS_PER_PAGE;
            $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

            $config = $this->config->item('pagination');
            $config['base_url'] = site_url('categoria/index?');
            $config['total_rows'] = $this->Categoria_model->get_all_categorias_count();
            $this->pagination->initialize($config);

            $data['categorias'] = $this->Categoria_model->get_all_categorias($params);

            $data['_view'] = 'categoria/index';
            $this->load->view('layouts/main', $data);
        } else {
            $this->load->view('vitrina/login');
        }
    }

    /*
     * Adding a new categoria
     */
    function add()
    {
        if ($this->session->userdata("login")) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'nombre' => $this->input->post('nombre'),
                    'descripcion' => $this->input->post('descripcion'),
                );

                $categoria_id = $this->Categoria_model->add_categoria($params);
                redirect('categoria/index');
            } else {
                $data['_view'] = 'categoria/add';
                $this->load->view('layouts/main', $data);
            }
        } else {
            $this->load->view('vitrina/login');
        }
    }

    /*
     * Editing a categoria
     */
    function edit($id)
    {
        if ($this->session->userdata("login")) {
            // check if the categoria exists before trying to edit it
            $data['categoria'] = $this->Categoria_model->get_categoria($id);

            if (isset($data['categoria']['id'])) {
                if (isset($_POST) && count($_POST) > 0) {
                    $params = array(
                        'nombre' => $this->input->post('nombre'),
                        'descripcion' => $this->input->post('descripcion'),
                    );

                    $this->Categoria_model->update_categoria($id, $params);
                    redirect('categoria/index');
                } else {
                    $data['_view'] = 'categoria/edit';
                    $this->load->view('layouts/main', $data);
                }
            } else
                show_error('The categoria you are trying to edit does not exist.');
        } else {
            $this->load->view('vitrina/login');
        }
    }

    /*
     * Deleting categoria
     */
    function remove($id)
    {
        if ($this->session->userdata("login")) {
            $categoria = $this->Categoria_model->get_categoria($id);

            // check if the categoria exists before trying to delete it
            if (isset($categoria['id'])) {
                $this->Categoria_model->delete_categoria($id);
                redirect('categoria/index');
            } else
                show_error('The categoria you are trying to delete does not exist.');
        } else {
            $this->load->view('vitrina/login');
        }
    }
}
