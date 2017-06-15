<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_ws extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('register_business');
        $this->load->library('users_business');
    }

    function index() {
        
    }

    public function log_user() {


        /*
          $email = $this->input->post('email');
          $password = $this->input->post('password');
          $token = $this->input->post('token');
         */
        $email = $_POST['email'];
        $password = $_POST['password'];
        $token = $_POST['token'];




        $user_data = $this->users_business->get_user_data_by_mobile_login($email, $password, $token);

        if ($user_data != null) {
            echo $this->return_message(200, "Usuario.", $user_data->fetch_array(MYSQLI_ASSOC));
        } else {
            echo $this->return_message(400, "Error datos de acceso.---", null);
        }
    }

    public function edit_user() {

        $id_company = $_POST['id_company'];
        $id_user = $_POST['id_user'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $cell = $_POST['cell'];
        $img = $_POST['img'];
 
        $message_return = $this->users_business->user_edit_data_mobile($id_company, $id_user, $name, $email, $password, $phone, $cell, $img);

        if ($message_return["is_user_udpate"] == true) {
            echo $this->return_message(200, $message_return["url_folder_img_user"], null);
        } else {
            echo $this->return_message(400, "Error al editar usuario.", null);
        }
    }

}
