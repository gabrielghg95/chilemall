<?php

class Marca extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Marca_model');
    }

    /*
     * Listing of marcas
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('marca/index?');
        $config['total_rows'] = $this->Marca_model->get_all_marcas_count();
        $this->pagination->initialize($config);

        $data['marcas'] = $this->Marca_model->get_all_marcas($params);
        
        $data['_view'] = 'marca/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new marca
     */
    function add()
    {
        if ($this->session->userdata("login")) {
            if (isset($_POST) && count($_POST) > 0) {
                $file = $_FILES['file'];

                $fileName = $_FILES['file']['name'];
                $fileTmpName = $_FILES['file']['tmp_name'];
                $fileSize = $_FILES['file']['size'];
                $fileError = $_FILES['file']['error'];
                $fileType = $_FILES['file']['type'];

                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));

                $allowed = array('jpg', 'jpeg', 'png');

                if (in_array($fileActualExt, $allowed)) {
                    if ($fileError === 0) {
                        if ($fileSize < 1000000) {
                            $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                            $fileDestination = 'includes/img/' . $fileNameNew;
                            move_uploaded_file($fileTmpName, $fileDestination);
                        } else {
                            echo "Tu archivo es demasiado grande";
                        }
                    } else {
                        echo "Hubo un error al subir tu imagen";
                    }
                } else {
                    echo "No puedes subir archivos de este tipo";
                }
                $params = array(
                    'nombre' => $this->input->post('nombre'),
                    'imagen' => $fileDestination,
                    'descripcion' => $this->input->post('descripcion'),
                );

                $marca_id = $this->Marca_model->add_marca($params);
                redirect('marca/index');
            } else {
                $data['_view'] = 'marca/add';
                $this->load->view('layouts/main', $data);
            }
        } else {
            $this->load->view('vitrina/login');
        }
    }

    /*
     * Editing a marca
     */
    function edit($id)
    {
        if ($this->session->userdata("login")) {
            // check if the marca exists before trying to edit it
            $data['marca'] = $this->Marca_model->get_marca($id);

            if (isset($data['marca']['id'])) {
                if (isset($_POST) && count($_POST) > 0) {
                    $file = $_FILES['file'];

                    $fileName = $_FILES['file']['name'];
                    $fileTmpName = $_FILES['file']['tmp_name'];
                    $fileSize = $_FILES['file']['size'];
                    $fileError = $_FILES['file']['error'];
                    $fileType = $_FILES['file']['type'];

                    $fileExt = explode('.', $fileName);
                    $fileActualExt = strtolower(end($fileExt));

                    $allowed = array('jpg', 'jpeg', 'png');

                    if (in_array($fileActualExt, $allowed)) {
                        if ($fileError === 0) {
                            if ($fileSize < 1000000) {
                                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                                $fileDestination = 'includes/img/' . $fileNameNew;
                                move_uploaded_file($fileTmpName, $fileDestination);
                            } else {
                                echo "Tu archivo es demasiado grande";
                            }
                        } else {
                            echo "Hubo un error al subir tu imagen";
                        }
                    } else {
                        echo "No puedes subir archivos de este tipo";
                    }
                    $params = array(
                        'nombre' => $this->input->post('nombre'),
                        'imagen' => $fileDestination,
                        'descripcion' => $this->input->post('descripcion'),
                    );

                    $this->Marca_model->update_marca($id, $params);
                    redirect('marca/index');
                } else {
                    $data['_view'] = 'marca/edit';
                    $this->load->view('layouts/main', $data);
                }
            } else
                show_error('The marca you are trying to edit does not exist.');
        } else {
            $this->load->view('vitrina/login');
        }
    }

    /*
     * Deleting marca
     */
    function remove($id)
    {
        if ($this->session->userdata("login")) {
            $marca = $this->Marca_model->get_marca($id);

            // check if the marca exists before trying to delete it
            if (isset($marca['id'])) {
                $this->Marca_model->delete_marca($id);
                redirect('marca/index');
            } else
                show_error('The marca you are trying to delete does not exist.');
        } else {
            $this->load->view('vitrina/login');
        }
    }
}
