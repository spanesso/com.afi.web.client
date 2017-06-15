<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Specific_committee extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('specific_committee_business');
    }

    function index() {
        $this->show();
    }

    public function get_specific_committe_data_by_id() {

        $committe_id = $this->input->post('id');
        $committe_data = $this->specific_committee_business->get_specific_committe_data_by_id($committe_id);

        if ($committe_data != null) {
            echo $this->return_message(200, "Información Comite.", $committe_data);
        } else {
            echo $this->return_message(400, "Error al traer comite.", null);
        }
    }

    public function show() {
        $is_logged_in = $this->session->userdata('is_logged_in');


        if (!isset($is_logged_in) || $is_logged_in !== true) {
            redirect("login");
        } else {

            $user_list = $this->specific_committee_business->get_users_for_comitte();
            $this->data["user_list"] = $user_list;

            $specific_commite_list = $this->specific_committee_business->get_company_specific_commite_list();
            $this->data["specific_commite_list"] = $specific_commite_list;
            $this->_render('template/skeleton', 'pages/specific_committee/specific_committee_list', "menu/menu", "specific_committee_list", "specific_committee_list");
        }
    }

    public function create() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in !== true) {
            redirect("login");
        } else {
            $user_list = $this->specific_committee_business->get_users_for_comitte();
            $this->data["user_list"] = $user_list;
            $this->_render('template/skeleton', 'pages/specific_committee/create_specific_committee', "menu/menu", "create_specific_committee", "create_specific_committee");
        }
    }

    public function save_data_new_user_specific_committee() {

        $specific_committe = $this->input->post('specific_committe');

        $is_committed_created = $this->specific_committee_business->save_data_new_user_specific_committee($specific_committe);

        if ($is_committed_created) {
            echo $this->return_message(200, "Committe creado exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al crear committe.", null);
        }
    }

    public function update_data_specific_committee() {

        $specific_committe = $this->input->post('specific_committe');

        $is_committe_updated = $this->specific_committee_business->update_data_specific_committee($specific_committe);

        if ($is_committe_updated) {
            echo $this->return_message(200, "Comité actualizado exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al actualizar comité.", null);
        }
    }

}
