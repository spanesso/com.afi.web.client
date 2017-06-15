<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('register_business');
    }

    function index() {
        
    }

    public function save_enterprise_data_register() {

        $enterprise_id = $this->input->post('id');
        $enterprise_data = $this->input->post('data');

        $is_enterprise_update = $this->register_business->update_enterprise_data($enterprise_id, $enterprise_data);

        if ($is_enterprise_update) {
            echo $this->return_message(200, "Empresa actualizada exitosamente", null);
        } else {
            echo $this->return_message(400, "Error al registrar empresa", null);
        }
    }

    public function register_enterprise() {

        $isValidUser = $this->validate_user();

        if ($isValidUser) {

            $enterprise_name = $this->input->post('enterprise_name');
            $enterprise_nit = $this->input->post('enterprise_nit');
            $enterprise_email = $this->input->post('enterprise_email');
            $enterprise_dir = $this->input->post('enterprise_dir');
            $enterprise_tel = $this->input->post('enterprise_tel');
            $enterprise_admin = $this->input->post('enterprise_admin');
            $enterprise_admin_email = $this->input->post('enterprise_admin_email');

            $enterprise_initial_register = array(
                "enterprise_name" => $enterprise_name,
                "enterprise_nit" => $enterprise_nit,
                "enterprise_email" => $enterprise_email,
                "enterprise_dir" => $enterprise_dir,
                "enterprise_tel" => $enterprise_tel,
                "enterprise_admin" => $enterprise_admin,
                "enterprise_admin_email" => $enterprise_admin_email
            );

            $is_enterprise_register = $this->register_business->register_enterprise_bussines($enterprise_initial_register);

            if ($is_enterprise_register) {
                echo $this->return_message(200, "Empresa registrada exitosamente", null);
            } else {
                echo $this->return_message(400, "Error al registrar empresa", null);
            }
        } else {
            echo $this->return_message(400, "Usuario invalido", null);
        }
    }

    public function confirm_enterprise_register($enterprise_token) {

        $enterprise_register = $this->register_business->get_enterprise_data_by_token($enterprise_token);
        $position_list = $this->register_business->get_enterprise_position_list();

        if ($enterprise_register != null) {
            $this->data["enterprise"] = $enterprise_register->fetch_assoc();
            $this->data["position_list"] = $position_list;
            $this->_simple_render('template/simple_skeleton', 'pages/register/complete_enterprise_register', null, "complete_enterprise_register", "complete_enterprise_register");
        } else {
            $this->_simple_render('template/simple_skeleton', 'pages/error/error_token', "error_token", "error_token");
        }
    }

}
