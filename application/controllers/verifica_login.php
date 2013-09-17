<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class verifica_login extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('user','',TRUE);
    }
    
    function index(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Usuario','trim|required|xss_clean');
        $this->form_validation->set_rules('password','Password','trim|required|xss_clean|callback_check_database');
        $this->form_validation->set_message('required', 'El  %s es requerido');
        if ($this->form_validation->run()==false){
            $this->load->view('login');
        }else {
            //redirect('home','refresh');
            redirect('ventas/principal','refresh');
        }
    }
    
    function check_database($password){
        $usernname=$this->input->post('username');
        
        $result = $this->user->login($usernname,$password);
        if($result){
            $sess_array = array();
            foreach ($result as $row){
                $sess_array = array(
                    'id'=> $row->idusuario,
                    'usuario'=>$row->usuario,
                    'nombre_completo'=>$row->nombre_completo
                );
                $this->session->set_userdata('logged_in',$sess_array);
            }
            return true;
        } else {
            $this->form_validation->set_message('check_database','Datos invalidos del Usuario o Password');
            return false;
        }
    }
    
}

?>
