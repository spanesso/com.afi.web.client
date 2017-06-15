<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Educative_tips_ws extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('educative_tips_business');
    }

    function index() {
        
    }

    public function get_educative_tips_list() {
        $company_id = $_POST['company_id'];


        $educative_tips_list = $this->educative_tips_business->get_educative_tips_list_by_mobile($company_id);
        if ($educative_tips_list != null) {
            echo $this->return_message(200, "Tips Educativos.", $educative_tips_list);
        } else {
            echo $this->return_message(400, "Error datos de acceso.---", null);
        }
    }

}
