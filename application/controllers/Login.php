<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('login_business');
    }

    function index() {

        $this->_simple_render('template/simple_skeleton', 'pages/login/login', "login", "login");
    }

    public function authorize_user_entry() {

        $email = $this->input->post('email');
        $pass = $this->input->post('pass');
        $remember = $this->input->post('remember');

        $is_enterprise_update = $this->login_business->authorize_user_entry($email, $pass, $remember);

        if ($is_enterprise_update) {
            echo $this->return_message(200, "Bienvenido a la plataforma Def-Com", null);
        } else {
            echo $this->return_message(400, "Error: usuario inválido", null);
        }
    }

}
