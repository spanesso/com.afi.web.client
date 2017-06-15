<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Medios extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('medios_business');
    }

    function index() {
        $this->show();
    }

    public function show() {


        $is_logged_in = $this->session->userdata('is_logged_in');


        if (!isset($is_logged_in) || $is_logged_in !== true) {
            redirect("login");
        } else {
            $medios_list = $this->medios_business->get_company_medios_list();
            $this->data["medios_list"] = $medios_list;
            $this->_render('template/skeleton', 'pages/medios/medios_list', "menu/menu", "medios_list", "medios_list");
        }
    }

    public function detele_medio() {

        $medio_id = $this->input->post('id');
        $is_medio_delete = $this->medios_business->detele_medio($medio_id);

        if ($is_medio_delete != null) {
            echo $this->return_message(200, "Medio eliminado", null);
        } else {
            echo $this->return_message(400, "Error al eliminar medio.", null);
        }
    }

    public function get_medio_data_by_id() {

        $medio_id = $this->input->post('id');
        $medio_data = $this->medios_business->get_medio_data_by_id($medio_id);

        if ($medio_data != null) {
            echo $this->return_message(200, "Información medio.", $medio_data->fetch_assoc());
        } else {
            echo $this->return_message(400, "Error al traer medio.", null);
        }
    }

    public function create() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in !== true) {
            redirect("login");
        } else {

            $this->_render('template/skeleton', 'pages/medios/create_medio', "menu/menu", "create_medio", "create_medio");
        }
    }

    public function save_data_new_medio() {

        $name = $this->input->post('name');
        $desc = $this->input->post('desc');

        $is_medio_created = $this->medios_business->save_data_new_medio($name, $desc);

        if ($is_medio_created) {
            echo $this->return_message(200, "Medio creado exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al crear medio.", null);
        }
    }

    public function update_data_medio() {


        $medio = $this->input->post('medio');


        $is_medio_updated = $this->medios_business->update_data_medio($medio);


        if ($is_medio_updated) {
            echo $this->return_message(200, "Medio actualizado exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al crear medio.", null);
        }
    }

}
