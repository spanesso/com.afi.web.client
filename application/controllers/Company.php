<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Company extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('company_business');
    }

    function index() {
        $is_logged_in = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in !== true) {
            redirect("login");
        } else {

            $company_data = $this->company_business->get_company_data();
            $this->data["company_data"] = $company_data;

            $this->_render('template/skeleton', 'pages/company/company', "menu/menu", "company", "company");
        }
    }

}
