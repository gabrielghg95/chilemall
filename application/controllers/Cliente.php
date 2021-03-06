<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Cliente extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cliente_model');
    } 

    /*
     * Listing of clientes
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('cliente/index?');
        $config['total_rows'] = $this->Cliente_model->get_all_clientes_count();
        $this->pagination->initialize($config);

        $data['clientes'] = $this->Cliente_model->get_all_clientes($params);
        
        $data['_view'] = 'cliente/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new cliente
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'nombre' => $this->input->post('nombre'),
				'apellido' => $this->input->post('apellido'),
				'direccion' => $this->input->post('direccion'),
				'comuna' => $this->input->post('comuna'),
				'ciudad' => $this->input->post('ciudad'),
				'correo' => $this->input->post('correo'),
				'telefono' => $this->input->post('telefono'),
				'creado_en' => $this->input->post('creado_en'),
            );
            
            $cliente_id = $this->Cliente_model->add_cliente($params);
            redirect('cliente/index');
        }
        else
        {            
            $data['_view'] = 'cliente/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a cliente
     */
    function edit($rut)
    {   
        // check if the cliente exists before trying to edit it
        $data['cliente'] = $this->Cliente_model->get_cliente($rut);
        
        if(isset($data['cliente']['rut']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'nombre' => $this->input->post('nombre'),
					'apellido' => $this->input->post('apellido'),
					'direccion' => $this->input->post('direccion'),
					'comuna' => $this->input->post('comuna'),
					'ciudad' => $this->input->post('ciudad'),
					'correo' => $this->input->post('correo'),
					'telefono' => $this->input->post('telefono'),
					'creado_en' => $this->input->post('creado_en'),
                );

                $this->Cliente_model->update_cliente($rut,$params);            
                redirect('cliente/index');
            }
            else
            {
                $data['_view'] = 'cliente/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The cliente you are trying to edit does not exist.');
    } 

    /*
     * Deleting cliente
     */
    function remove($rut)
    {
        $cliente = $this->Cliente_model->get_cliente($rut);

        // check if the cliente exists before trying to delete it
        if(isset($cliente['rut']))
        {
            $this->Cliente_model->delete_cliente($rut);
            redirect('cliente/index');
        }
        else
            show_error('The cliente you are trying to delete does not exist.');
    }
    
}
