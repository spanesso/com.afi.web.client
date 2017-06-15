<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Social_network_post extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('register_business');
        $this->load->library('social_network_post_business');
    }

    function index() {
        $this->show();
    }

    public function create() {

        $is_logged_in = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in !== true) {
            redirect("login");
        } else {
            $social_networks_list = $this->social_network_post_business->get_social_networks_list();
            $this->data["social_networks_list"] = $social_networks_list;
            $this->_render('template/skeleton', 'pages/social_networks/create_social_network_post', "menu/menu", "create_social_network_post", "create_social_network_post");
        }
    }

    public function show() {

        $is_logged_in = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in !== true) {
            redirect("login");
        } else {
            $social_networks_list = $this->social_network_post_business->get_social_networks_list();
            $post_list = $this->social_network_post_business->get_company_social_post_list();
            $this->data["social_networks_list"] = $social_networks_list;
            $this->data["post_list"] = $post_list;

            $this->_render('template/skeleton', 'pages/social_networks/social_network_post_list', "menu/menu", "social_network_post_list", "social_network_post_list");
        }
    }

    public function save_data_new_social_post() {

        $social_post = $this->input->post('social_post');

        $is_social_post_created = $this->social_network_post_business->save_data_new_social_post($social_post);

        if ($is_social_post_created) {
            echo $this->return_message(200, "El post se creo exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al crear el post.", null);
        }
    }

    public function get_post_data_by_id() {
        $post_id = $this->input->post('id');
        $post_data = $this->social_network_post_business->get_post_data_by_id($post_id);
        if ($post_data != null) {
            echo $this->return_message(200, "Información psot.", $post_data->fetch_assoc());
        } else {
            echo $this->return_message(400, "Error al traer la marca.", null);
        }
    }

    public function update_data_post() {

        $post = $this->input->post('post');

        $is_post_updated = $this->social_network_post_business->update_data_post($post);

        if ($is_post_updated) {
            echo $this->return_message(200, "Post actualizado exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al actualizar post.", null);
        }
    }

    public function detele_post() {

        $post_id = $this->input->post('id');

        $is_post_delete = $this->social_network_post_business->detele_post($post_id);

        if ($is_post_delete != null) {
            echo $this->return_message(200, "Post eliminado", null);
        } else {
            echo $this->return_message(400, "Error al eliminar post.", null);
        }
    }

}
