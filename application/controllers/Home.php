<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        $this->_render('template/skeleton', 'pages/home/home', "menu/menu", "home", "home");
    }

}
