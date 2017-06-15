<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Event_type extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('event_type_business');
    }

    function index() {
        $this->show();
    }

    public function create() {

        $is_logged_in = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in !== true) {
            redirect("login");
        } else {


            $this->_render('template/skeleton', 'pages/event_type/create_event_type', "menu/menu", "create_event_type", "create_event_type");
        }
    }

    public function show() {

        $is_logged_in = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in !== true) {
            redirect("login");
        } else {

            $event_type_list = $this->event_type_business->get_company_event_type_list();
            $this->data["event_type_list"] = $event_type_list;

            $this->_render('template/skeleton', 'pages/event_type/event_type_list', "menu/menu", "event_type_list", "event_type_list");
        }
    }

    public function save_data_new_event_type() {

        $event_type = $this->input->post('event_type');

        $is_event_type_created = $this->event_type_business->save_data_new_event_type($event_type);

        if ($is_event_type_created) {
            echo $this->return_message(200, "El tipo de evento se creo exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al crear el tipo de vento.", null);
        }
    }

    public function get_event_type_data_by_id() {
        $event_type_id = $this->input->post('id');
        $event_type_data = $this->event_type_business->get_event_type_data_by_id($event_type_id);
        if ($event_type_data != null) {
            echo $this->return_message(200, "Información tipo evento.", $event_type_data->fetch_assoc());
        } else {
            echo $this->return_message(400, "Error al traer el tipo evento.", null);
        }
    }

    public function update_data_event_type() {

        $event_type = $this->input->post('event_type');

        $is_event_type_updated = $this->event_type_business->update_data_event_type($event_type);

        if ($is_event_type_updated) {
            echo $this->return_message(200, "Tipo de evento actualizado exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al actualizar el Tipo de evento.", null);
        }
    }

    public function detele_event_type() {

        $event_type_id = $this->input->post('id');

        $is_event_type_delete = $this->event_type_business->detele_event_type($event_type_id);

        if ($is_event_type_delete != null) {
            echo $this->return_message(200, "Tipo de evento eliminado", null);
        } else {
            echo $this->return_message(400, "Error al eliminar el tipo de envento.", null);
        }
    }

}
