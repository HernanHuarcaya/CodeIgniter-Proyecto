<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//HH: para definir las sesiones y saber si puede visualizar
session_start();

class Principal extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');
        $this->load->library('session');
    }

    public function index() {
        $data['xsesion'] = $this->session->userdata('Datos_Session');
        $this->load->vars($data);
        $this->load->view('header/header');
        $this->load->view('header/bannerUser');
        $this->load->view('menu/menuPrincipal');
        $this->load->view('administracion/vistas/vistaClienteConsultas');
        $this->load->view('administracion/contenedor_principal');
        $this->load->view('footer/footer');
    }

}