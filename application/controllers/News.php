<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('register_business');
        $this->load->library('news_business');
        $this->load->library('brands_business');
        $this->load->library('medios_business');
    }

    function index() {
        $this->show();
    }

    public function create() {

        $is_logged_in = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in !== true) {
            redirect("login");
        } else {

            $medios_list = $this->medios_business->get_company_medios_list();
            $this->data["medios_list"] = $medios_list;

            $brand_list = $this->brands_business->get_company_brands_list();
            $this->data["brand_list"] = $brand_list;

            $brand_positions_list = $this->brands_business->get_brand_positions_list();
            $this->data["brand_positions_list"] = $brand_positions_list;


            $dimension_deployment_list = $this->news_business->get_dimension_deployment_list();
            $this->data["dimension_deployment_list"] = $dimension_deployment_list;

            $control_capacity_list = $this->news_business->get_control_capacity_list();
            $this->data["control_capacity_list"] = $control_capacity_list;

            $fixed_capacity_list = $this->news_business->get_fixed_capacity_list();
            $this->data["fixed_capacity_list"] = $fixed_capacity_list;

            $stakeholders_concern_list = $this->news_business->get_stakeholders_concern_list();
            $this->data["stakeholders_concern_list"] = $stakeholders_concern_list;

            $this->_render('template/skeleton', 'pages/news/create_new', "menu/menu", "create_new", "create_new");
        }
    }

    public function show() {

        $is_logged_in = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in !== true) {
            redirect("login");
        } else {

            $news_list = $this->news_business->get_company_news_list();
            $this->data["news_list"] = $news_list;

            $medios_list = $this->medios_business->get_company_medios_list();
            $this->data["medios_list"] = $medios_list;

            $brand_list = $this->brands_business->get_company_brands_list();
            $this->data["brand_list"] = $brand_list;

            $brand_positions_list = $this->brands_business->get_brand_positions_list();
            $this->data["brand_positions_list"] = $brand_positions_list;


            $dimension_deployment_list = $this->news_business->get_dimension_deployment_list();
            $this->data["dimension_deployment_list"] = $dimension_deployment_list;

            $control_capacity_list = $this->news_business->get_control_capacity_list();
            $this->data["control_capacity_list"] = $control_capacity_list;

            $fixed_capacity_list = $this->news_business->get_fixed_capacity_list();
            $this->data["fixed_capacity_list"] = $fixed_capacity_list;

            $stakeholders_concern_list = $this->news_business->get_stakeholders_concern_list();
            $this->data["stakeholders_concern_list"] = $stakeholders_concern_list;

            $this->_render('template/skeleton', 'pages/news/news_list', "menu/menu", "news_list", "news_list");
        }
    }

    public function save_data_new() {

        $new = $this->input->post('new_data');

        $is_new_created = $this->news_business->save_data_new($new);

        if ($is_new_created) {
            echo $this->return_message(200, "La noticia se creo exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al crear la noticia.", null);
        }
    }

    public function get_new_by_id() {
        $new_id = $this->input->post('id');
        $new_data = $this->news_business->get_new_by_id($new_id);
        if ($new_data != null) {
            echo $this->return_message(200, "Información noticia.", $new_data);
        } else {
            echo $this->return_message(400, "Error al traer la noticia.", null);
        }
    }

    public function update_data_new() {

        $new = $this->input->post('new');

        $is_new_updated = $this->news_business->update_data_new($new);

        if ($is_new_updated) {
            echo $this->return_message(200, "Noticia actualizada exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al actualizar noticia.", null);
        }
    }

    public function detele_new() {

        $new_id = $this->input->post('id');

        $is_new_delete = $this->news_business->detele_new($new_id);

        if ($is_new_delete != null) {
            echo $this->return_message(200, "Noticia eliminada", null);
        } else {
            echo $this->return_message(400, "Error al eliminar noticia.", null);
        }
    }

}
