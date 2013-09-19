<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->helper(array('form'));
        $this->load->view("header/header_login");
        $data['Error'] = "none";
        $this->load->view('login_view', $data);
        $this->load->view("footer/footer_login");
    }

    function cerrar_sesion() {
        session_start();
        $this->session->unset_userdata('Datos_Session');
        session_destroy();
        redirect('../login', 'refresh');
    }

}

?>
