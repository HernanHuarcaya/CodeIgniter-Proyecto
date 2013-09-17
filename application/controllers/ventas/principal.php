<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function index()
	{
            $this->load->view('header/header');
            $this->load->view('header/bannerUser');
            $this->load->view('menu/menuPrincipal');
            $this->load->view('ventas/vistas/vistaClienteConsultas');	
            $this->load->view('ventas/contenedor_principal');
                $this->load->view('footer/footer');
	}
}
