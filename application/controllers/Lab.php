<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lab extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('mail_manager');
    }

    function index() {
        
    }

    public function test_mail() {

        $response = $this->mail_manager->send_mail_test();

        echo "respuesta--->" . $response;
    }

    public function prueba($aaaaa) {

       

        echo "respuesta--->" . $aaaaa;
    }

}
