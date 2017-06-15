<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Brands extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('register_business');
        $this->load->library('brands_business');
    }

    function index() {
        $this->show();
    }

    public function get_brand_data_by_id() {
        $brand_id = $this->input->post('id');
        $brand_data = $this->brands_business->get_brand_data_by_id($brand_id);
        if ($brand_data != null) {
            echo $this->return_message(200, "Información marca.", $brand_data->fetch_assoc());
        } else {
            echo $this->return_message(400, "Error al traer la marca.", null);
        }
    }

    public function update_data_brand() {

        $brand = $this->input->post('brand');

        $is_brand_updated = $this->brands_business->update_data_brand($brand);

        if ($is_brand_updated) {
            echo $this->return_message(200, "Marca actualizado exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al actualizar la marca.", null);
        }
    }

    public function create() {

        $is_logged_in = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in !== true) {
            redirect("login");
        } else {


            $this->_render('template/skeleton', 'pages/brands/create_brands', "menu/menu", "create_brands", "create_brands");
        }
    }

    public function show() {

        $is_logged_in = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in !== true) {
            redirect("login");
        } else {

            $brand_list = $this->brands_business->get_company_brands_list();
            $this->data["brand_list"] = $brand_list;

            $this->_render('template/skeleton', 'pages/brands/brands_list', "menu/menu", "brand_list", "brand_list");
        }
    }

    public function save_data_new_brands() {

        $brands = $this->input->post('brands');

        $is_brands_created = $this->brands_business->save_data_new_brands($brands);

        if ($is_brands_created) {
            echo $this->return_message(200, "La marca se creo exitosamente!", null);
        } else {
            echo $this->return_message(400, "Error al crear la marca.", null);
        }
    }

    public function detele_brand() {

        $brand_id = $this->input->post('id');

        $is_brand_delete = $this->brands_business->detele_brand($brand_id);

        if ($is_brand_delete != null) {
            echo $this->return_message(200, "Marca eliminada", null);
        } else {
            echo $this->return_message(400, "Error al eliminar la marca.", null);
        }
    }

}
