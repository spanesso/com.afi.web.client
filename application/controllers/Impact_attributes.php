<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Impact_attributes extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('impact_attributes_business');
    }

    function index() {
        $this->show();
    }

    public function detele_attribute() {

        $attr_id = $this->input->post('id');
        $is_attr_delete = $this->impact_attributes_business->detele_attribute($attr_id);

        if ($is_attr_delete != null) {
            echo $this->return_message(200, "Atributo eliminado", null);
        } else {
            echo $this->return_message(400, "Error al eliminar atributo.", null);
        }
    }

    public function get_attr_data_by_id() {

        $attr_id = $this->input->post('id');
        $attr_data = $this->impact_attributes_business->get_attr_data_by_id($attr_id);

        if ($attr_data != null) {
            echo $this->return_message(200, "Información atributo.", $attr_data->fetch_assoc());
        } else {
            echo $this->return_message(400, "Error al traer atributo.", null);
        }
    }

    public function create() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in !== true) {
            redirect("login");
        } else {
          
            $this->_render('template/skeleton', 'pages/impact_attributes/create_impact_attribute', "menu/menu", "create_impact_attribute", "create_impact_attribute");
        }
    }

    public function show() {


        $is_logged_in = $this->session->userdata('is_logged_in');


        if (!isset($is_logged_in) || $is_logged_in !== true) {
            redirect("login");
        } else {
            $attributes_list = $this->impact_attributes_business->get_company_impact_attributes_list();
            $this->data["attributes_list"] = $attributes_list;
            $this->_render('template/skeleton', 'pages/impact_attributes/impact_attributes_list', "menu/menu", "impact_attributes_list", "impact_attributes_list");
        }
    }

    public function save_data_new_attribute() {

        $name = $this->input->post('name');
        $desc = $this->input->post('desc');

        $is_attr_created = $this->impact_attributes_business->save_impact_attribute($name, $desc);

        if ($is_attr_created) {
            echo $this->return_message(200, "Atributo creado exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al crear atributo.", null);
        }
    }

    public function update_data_attribute() {


        $attr = $this->input->post('attr');


        $is_attr_updated = $this->impact_attributes_business->update_data_attribute($attr);


        if ($is_attr_updated) {
            echo $this->return_message(200, "Atributo actualizado exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al crear atributo.", null);
        }
    }

}
