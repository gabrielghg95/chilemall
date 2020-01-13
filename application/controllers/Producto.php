<?php

class Producto extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Producto_model');
    }

    /*
     * Listing of productos
     */
    function index()
    {
        if ($this->session->userdata("login")) {
            $data['productos'] = $this->Producto_model->get_all_productos();

            $this->load->model('Categoria_model');
            $data['all_categorias'] = $this->Categoria_model->get_all_categorias();

            $this->load->model('Local_model');
            $data['all_locales'] = $this->Local_model->get_all_locales();

            $data['_view'] = 'producto/index';
            $this->load->view('layouts/main', $data);
        } else {
            $this->load->view('vitrina/login');
        }
    }

    function inicio()
    {
        $data['productos'] = $this->Producto_model->get_all_productos();

        $this->load->model('Categoria_model');
        $data['all_categorias'] = $this->Categoria_model->get_all_categorias();

        $this->load->model('Local_model');
        $data['all_locales'] = $this->Local_model->get_all_locales();

        $data['_view'] = 'vitrina/mostrar';
        $this->load->view('layouts/index', $data);
    }

    function inicio_producto($id)
    {
        $data['all_locales'] = $this->Producto_model->get_all_locales();
        $data['all_categorias'] = $this->Producto_model->get_all_categorias();
        $data['producto'] = $this->Producto_model->get_producto($id);
        $data['productos'] = $this->Producto_model->get_all_productos();

        $data['_view'] = 'vitrina/producto';
        $this->load->view('layouts/index', $data);
    }

    function compra_producto($id)
    {
        $data['all_locales'] = $this->Producto_model->get_all_locales();
        $data['all_categorias'] = $this->Producto_model->get_all_categorias();
        $data['producto'] = $this->Producto_model->get_producto($id);
        $data['productos'] = $this->Producto_model->get_all_productos();

        $data['_view'] = 'vitrina/compra';
        $this->load->view('layouts/index', $data);
    }

    function inicio_producto_cat($categoria_fk)
    {
        $data['producto'] = $this->Producto_model->get_producto_cat($categoria_fk);
        $data['productos'] = $this->Producto_model->get_all_productos();

        $this->load->model('Categoria_model');
        $data['all_categorias'] = $this->Categoria_model->get_all_categorias();
        $data['categoria'] = $this->Categoria_model->get_categoria($categoria_fk);

        $this->load->model('Local_model');
        $data['all_locales'] = $this->Local_model->get_all_locales();

        $data['_view'] = 'vitrina/categoria';
        $this->load->view('layouts/index', $data);
    }

    function inicio_producto_loc($local_fk)
    {
        $data['producto'] = $this->Producto_model->get_producto_loc($local_fk);
        $data['productos'] = $this->Producto_model->get_all_productos();

        $this->load->model('Categoria_model');
        $data['all_categorias'] = $this->Categoria_model->get_all_categorias();

        $this->load->model('Local_model');
        $data['all_locales'] = $this->Local_model->get_all_locales();
        $data['local'] = $this->Local_model->get_local($local_fk);

        $data['_view'] = 'vitrina/local';
        $this->load->view('layouts/index', $data);
    }
    /*
     * Adding a new producto
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
                    'marca_fk' => $this->input->post('marca_fk'),
                    'categoria_fk' => $this->input->post('categoria_fk'),
                    'local_fk' => $this->input->post('local_fk'),
                    'nombre' => $this->input->post('nombre'),
                    'precio' => $this->input->post('precio'),
                    'destacado' => $this->input->post('destacado'),
                    'imagen' => $fileDestination,
                    'descripcion' => $this->input->post('descripcion'),
                    'stock' => $this->input->post('stock')
                );

                $producto_id = $this->Producto_model->add_producto($params);
                redirect('producto/index');
            } else {
                $this->load->model('Marca_model');
                $data['all_marcas'] = $this->Marca_model->get_all_marcas();

                $this->load->model('Categoria_model');
                $data['all_categorias'] = $this->Categoria_model->get_all_categorias();

                $this->load->model('Local_model');
                $data['all_locales'] = $this->Local_model->get_all_locales();

                $data['_view'] = 'producto/add';
                $this->load->view('layouts/main', $data);
            }
        } else {
            $this->load->view('vitrina/login');
        }
    }

    /*
     * Editing a producto
     */
    function edit($id)
    {
        if ($this->session->userdata("login")) {
            // check if the producto exists before trying to edit it
            $data['producto'] = $this->Producto_model->get_producto($id);

            if (isset($data['producto']['id'])) {
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
                        'marca_fk' => $this->input->post('marca_fk'),
                        'categoria_fk' => $this->input->post('categoria_fk'),
                        'local_fk' => $this->input->post('local_fk'),
                        'nombre' => $this->input->post('nombre'),
                        'precio' => $this->input->post('precio'),
                        'destacado' => $this->input->post('destacado'),
                        'imagen' => $fileDestination,
                        'descripcion' => $this->input->post('descripcion'),
                        'stock' => $this->input->post('stock')
                    );

                    $this->Producto_model->update_producto($id, $params);
                    redirect('producto/index');
                } else {
                    $this->load->model('Marca_model');
                    $data['all_marcas'] = $this->Marca_model->get_all_marcas();

                    $this->load->model('Categoria_model');
                    $data['all_categorias'] = $this->Categoria_model->get_all_categorias();

                    $this->load->model('Local_model');
                    $data['all_locales'] = $this->Local_model->get_all_locales();

                    $data['_view'] = 'producto/edit';
                    $this->load->view('layouts/main', $data);
                }
            } else
                show_error('The producto you are trying to edit does not exist.');
        } else {
            $this->load->view('vitrina/login');
        }
    }

    /*
     * Deleting producto
     */
    function remove($id)
    {
        if ($this->session->userdata("login")) {
            $producto = $this->Producto_model->get_producto($id);

            // check if the producto exists before trying to delete it
            if (isset($producto['id'])) {
                $this->Producto_model->delete_producto($id);
                redirect('producto/index');
            } else
                show_error('The producto you are trying to delete does not exist.');
        } else {
            $this->load->view('vitrina/login');
        }
    }
}
