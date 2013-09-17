<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class verifica_login extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('usuario_model','',TRUE);
    }
    
    function index(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txtuser','Usuario','trim|required|xss_clean');
        $this->form_validation->set_rules('txtpass','Password','trim|required|xss_clean|callback_check_database');
        $this->form_validation->set_message('required', 'El  %s es requerido');
        if ($this->form_validation->run()==false){
            $this->load->view('header/header_login');
            $data['Error']="block";
            $this->load->view('login_view',$data);
            $this->load->view('footer/footer_login');
            
        }else {
            //redirect('home','refresh');
            redirect('ventas/principal','refresh');
        }
    }
    
    function check_database($password){
        $user=$this->input->post('txtuser');
        $result = $this->usuario_model->login($user,$password);
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
            $this->form_validation->set_message('check_database','Datos invalidos Ingrese nuevamente el Usuario y Password');
            return false;
        }
    }
    
}

?>
