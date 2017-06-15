<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('register_business');
        $this->load->library('users_business');
    }

    function index() {
        $this->show();
    }

    public function get_user_data_by_id() {

        $user_id = $this->input->post('id');
        $user_data = $this->users_business->get_user_data_by_id($user_id);

        if ($user_data != null) {
            echo $this->return_message(200, "Información Usuario.", $user_data->fetch_assoc());
        } else {
            echo $this->return_message(400, "Error al traer usuario.", null);
        }
    }

    public function unable_user() {

        $user_id = $this->input->post('id');
        $user_data = $this->users_business->unable_user($user_id);

        if ($user_data != null) {
            echo $this->return_message(200, "Usuario bloqueado", null);
        } else {
            echo $this->return_message(400, "Error al bloquear usuario.", null);
        }
    }

    public function delete_user() {

        $user_id = $this->input->post('id');
        $is_user_delete = $this->users_business->delete_user($user_id);
        if ($is_user_delete != null) {
            echo $this->return_message(200, "Usuario eliminado satisfactoriamente.", null);
        } else {
            echo $this->return_message(400, "El usuario no pudo ser eliminado, puede que esté asociado a un comité.", null);
        }
    }

    public function create() {

        $is_logged_in = $this->session->userdata('is_logged_in');


        if (!isset($is_logged_in) || $is_logged_in !== true) {
            redirect("login");
        } else {

            $position_list = $this->register_business->get_enterprise_position_list();
            $rol_list = $this->register_business->get_enterprise_rol_list();
            $this->data["rol_list"] = $rol_list;
            $this->data["position_list"] = $position_list;
            $this->_render('template/skeleton', 'pages/users/create_user', "menu/menu", "create_user", "create_user");
        }
    }

    public function show() {


        $is_logged_in = $this->session->userdata('is_logged_in');


        if (!isset($is_logged_in) || $is_logged_in !== true) {
            redirect("login");
        } else {


            $user_list = $this->users_business->get_company_user_list();
            $position_list = $this->register_business->get_enterprise_position_list();
            $rol_list = $this->register_business->get_enterprise_rol_list();

            $this->data["user_list"] = $user_list;
            $this->data["rol_list"] = $rol_list;
            $this->data["position_list"] = $position_list;

            $this->_render('template/skeleton', 'pages/users/user_list', "menu/menu", "user_list", "user_list");
        }
    }

    public function save_data_new_user() {

        $user = $this->input->post('user');

        $is_user_created = $this->users_business->save_data_new_user($user);

        if ($is_user_created) {
            echo $this->return_message(200, "Usuario creado exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al crear usuario.", null);
        }
    }

    public function update_data_user() {

        $user = $this->input->post('user');

        $is_user_created = $this->users_business->update_data_user($user);

        if ($is_user_created) {
            echo $this->return_message(200, "Usuario actualizado exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al actualizar usuario.", null);
        }
    }

}
