<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        
    }

    public function register_enterprise_profile() {
        $this->_render('template/simple_skeleton', 'pages/profile/register_enterprise_profile', null, "register_enterprise_profile", "register_enterprise_profile");
    }

}
