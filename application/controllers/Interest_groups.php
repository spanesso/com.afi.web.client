<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Interest_groups extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('interest_groups_business');
    }

    function index() {
        $this->show();
    }

    public function create() {

        $is_logged_in = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in !== true) {
            redirect("login");
        } else {


            $this->_render('template/skeleton', 'pages/interest_groups/create_interest_groups', "menu/menu", "create_interest_groups", "create_interest_groups");
        }
    }

    public function show() {

        $is_logged_in = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in !== true) {
            redirect("login");
        } else {

            $interest_groups_list = $this->interest_groups_business->get_company_interest_groups_list();
            $this->data["interest_groups_list"] = $interest_groups_list;

            $this->_render('template/skeleton', 'pages/interest_groups/interest_groups_list', "menu/menu", "interest_groups_list", "interest_groups_list");
        }
    }

    public function save_data_new_interest_groups() {

        $interest_groups = $this->input->post('interest_groups');

        $is_interest_groups_created = $this->interest_groups_business->save_data_new_interest_groups($interest_groups);

        if ($is_interest_groups_created) {
            echo $this->return_message(200, "El tipo de evento se creo exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al crear el tipo de vento.", null);
        }
    }

    public function get_interest_groups_data_by_id() {
        $interest_groups_id = $this->input->post('id');
        $interest_groups_data = $this->interest_groups_business->get_interest_groups_data_by_id($interest_groups_id);
        if ($interest_groups_data != null) {
            echo $this->return_message(200, "Información tipo evento.", $interest_groups_data->fetch_assoc());
        } else {
            echo $this->return_message(400, "Error al traer el tipo evento.", null);
        }
    }

  

    public function update_data_interest_groups() {

        $interest_groups = $this->input->post('interest_groups');

        $is_interest_groups_updated = $this->interest_groups_business->update_data_interest_groups($interest_groups);

        if ($is_interest_groups_updated) {
            echo $this->return_message(200, "Tipo de evento actualizado exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al actualizar el Tipo de evento.", null);
        }
    }

    public function detele_interest_groups() {

        $interest_groups_id = $this->input->post('id');

        $is_interest_groups_delete = $this->interest_groups_business->detele_interest_groups($interest_groups_id);

        if ($is_interest_groups_delete != null) {
            echo $this->return_message(200, "Tipo de evento eliminado", null);
        } else {
            echo $this->return_message(400, "Error al eliminar el tipo de envento.", null);
        }
    }

}
