<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//HH: para definir las sesiones y saber si puede visualizar
session_start();

class Listar extends CI_Controller {

    function __construct() {
        parent::__construct();
                $this->load->model('usuario_model');
        $this->load->library('session');
    }

    public function index() {
        //HH: pasando los datos del usuario a las vistas
        $data['xsesion'] = $this->session->userdata('Datos_Session');
        //echo $data['xsesion']['id'];
        $modulos = $this->usuario_model->modulos_usuario($data['xsesion']['id']);
        $data['modulos']= $modulos;
        $data['modulo_activo']="4"; //HH: idsub_modulo de la tabla sub_modulo de la BD
        $this->load->vars($data);
        $this->load->view('header/header');
        $this->load->view('header/bannerUser');
        $this->load->view('menu/menuPrincipal');
        $this->load->view('ventas/clientes/listar');
        $this->load->view('footer/footer');
    }
}