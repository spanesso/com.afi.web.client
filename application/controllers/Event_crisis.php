<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Event_crisis extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('event_crisis_business');
        $this->load->library('event_type_business');
        $this->load->library('impact_attributes_business');
        $this->load->library('specific_committee_business');
        $this->load->library('register_business');
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


            $event_type_list = $this->event_type_business->get_company_event_type_list();
            $this->data["event_type_list"] = $event_type_list;

            $attributes_list = $this->impact_attributes_business->get_company_impact_attributes_list();
            $this->data["impact_attributes_list"] = $attributes_list;

            $specific_commite_list = $this->specific_committee_business->get_company_specific_commite_list();
            $this->data["specific_commite_list"] = $specific_commite_list;

            $interest_groups_actions_list = $this->interest_groups_business->get_interest_groups_actions_list();
            $this->data["interest_groups_actions_list"] = $interest_groups_actions_list;


            $interest_groups_list = $this->interest_groups_business->get_company_interest_groups_list();
            $this->data["interest_groups_list"] = $interest_groups_list;


            $rol_list = $this->register_business->get_enterprise_rol_list();
            $this->data["rol_list"] = $rol_list;


            $this->_render('template/skeleton', 'pages/event_crisis/create_event_crisis', "menu/menu", "create_event_crisis", "create_event_crisis");
        }
    }

    public function show() {

        $is_logged_in = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in !== true) {
            redirect("login");
        } else {

            $event_list = $this->event_crisis_business->get_company_event_list();
            $this->data["event_list"] = $event_list;

            $event_type_list = $this->event_type_business->get_company_event_type_list();
            $this->data["event_type_list"] = $event_type_list;

            $attributes_list = $this->impact_attributes_business->get_company_impact_attributes_list();
            $this->data["impact_attributes_list"] = $attributes_list;

            $specific_commite_list = $this->specific_committee_business->get_company_specific_commite_list();
            $this->data["specific_commite_list"] = $specific_commite_list;

            $interest_groups_actions_list = $this->interest_groups_business->get_interest_groups_actions_list();
            $this->data["interest_groups_actions_list"] = $interest_groups_actions_list;

            $interest_groups_list = $this->interest_groups_business->get_company_interest_groups_list();
            $this->data["interest_groups_list"] = $interest_groups_list;

            $rol_list = $this->register_business->get_enterprise_rol_list();
            $this->data["rol_list"] = $rol_list;

            $this->_render('template/skeleton', 'pages/event_crisis/event_crisis_list', "menu/menu", "event_crisis_list", "event_crisis_list");
        }
    }

    public function save_data_event() {

        $event_data = $this->input->post('event_data');

        $is_event_created = $this->event_crisis_business->save_data_new_event($event_data);

        if ($is_event_created) {
            echo $this->return_message(200, "El evento se creo exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al crear el vento.", null);
        }
    }

    public function get_event_data_by_id() {
        $event_id = $this->input->post('id');

        $event_data = $this->event_crisis_business->get_event_data_by_id($event_id);

        if ($event_data != null) {
            echo $this->return_message(200, "Información evento.", $event_data);
        } else {
            echo $this->return_message(400, "Error al traer el evento.", null);
        }
    }

    public function update_data_event() {
        $event = $this->input->post('event_data');

        $is_event_updated = $this->event_crisis_business->update_data_event($event);

        if ($is_event_updated) {
            echo $this->return_message(200, "Acontecimiento actualizado exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al actualizar el acontecimiento.", null);
        }
    }

      public function detele_event() {

        $event_id = $this->input->post('id');

        $is_event_delete = $this->event_crisis_business->detele_event($event_id);

        if ($is_event_delete != null) {
            echo $this->return_message(200, "Acontecimiento eliminado", null);
        } else {
            echo $this->return_message(400, "Error al eliminar el acontecimiento.", null);
        }
    }
}
