<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Educative_tips extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('educative_tips_business');
    }

    function index() {
        $this->show();
    }

    public function create() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in !== true) {
            redirect("login");
        } else {
            $this->_render('template/skeleton', 'pages/educative_tips/create_educative_tip', "menu/menu", "create_educative_tip", "create_educative_tip");
        }
    }

    public function save_data_new_tip() {

        $tip = $this->input->post('tip');
 
        $is_tip_created = $this->educative_tips_business->save_educative_tip($tip);

        if ($is_tip_created) {
            echo $this->return_message(200, "Tip educativo creado exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al crear Tip educativo.", null);
        }
    }

    public function show() {
        $is_logged_in = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in !== true) {
            redirect("login");
        } else {
            $educative_tips_list = $this->educative_tips_business->get_educative_tips_list();
            $this->data["educative_tips_list"] = $educative_tips_list;
            $this->_render('template/skeleton', 'pages/educative_tips/educative_tips_list', "menu/menu", "educative_tips_list", "educative_tips_list");
        }
    }

    public function public_educative_tip() {
        $tip_id = $this->input->post('id');

        $is_tip_publicated = $this->educative_tips_business->public_educative_tip($tip_id);

        if ($is_tip_publicated) {
            echo $this->return_message(200, "Tip educativo publicado exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al publicar Tip educativo.", null);
        }
    }

    public function get_educative_tip_by_id() {
        $tip_id = $this->input->post('id');
        $tip_data = $this->educative_tips_business->get_educative_tip_by_id($tip_id);

        if ($tip_data != null) {
            echo $this->return_message(200, "Información tip.", $tip_data->fetch_assoc());
        } else {
            echo $this->return_message(400, "Error al traer tip.", null);
        }
    }

    public function update_educative_tip() {

        $tip_array = $this->input->post();
        $file = $_FILES;
        $is_tip_updated = $this->educative_tips_business->update_educative_tip($tip_array, $file);

        if ($is_tip_updated) {
            echo $this->return_message(200, "Tip educativo editado exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al editar Tip educativo.", null);
        }
    }

}
