<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class verifica_login extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('usuario_model','',TRUE);
        $this->load->library('session');
    }
    
    function index(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txtuser','Usuario','trim|required|xss_clean');
        $this->form_validation->set_rules('txtpass','Password','trim|required|xss_clean|callback_check_database');
        $this->form_validation->set_message('required', 'El  %s es requerido');
        if ($this->form_validation->run()==false){
            $this->load->view('header/header_login');
            //HH: creo una variable para mostrar el div del error
            $data['Error']="block";
            $this->load->view('login_view',$data);
            $this->load->view('footer/footer_login');
            
        }else {
            //HH: consulto si tiene el perfil de administrador
            if ($this->session->userdata['Datos_Session']['idperfil']==='1')
                {
                    redirect('../administracion/principal','refresh');
                } 
            //HH: consulto si tiene el perfil de usuarios
            if ($this->session->userdata['Datos_Session']['idperfil']==='2')    
                {
                    redirect('../usuarios/panel','refresh');
                }
        }
    }
    
    function check_database($password){
        $user=$this->input->post('txtuser');
        //HH: verifico los datos del usuario
        $result = $this->usuario_model->login($user,$password);
        if($result){
            //HH: creo un array con los datos del usuario
            $sess_array = array();
            foreach ($result as $row){
                $sess_array = array(
                    'id'=> $row->idusuario,
                    'usuario'=>$row->usuario,
                    'nombre_completo'=>$row->nombre_completo,
                    'idperfil'=>$row->idperfil,
                    'fecha_creacion'=>$row->fecha_creacion,
                    'idempleado'=>$row->idempleado
                );
                //HH: agrego los datos ala libreria session con el nombre Datos de Session
                $this->session->set_userdata('Datos_Session',$sess_array);
            }
            return true;
        } else {
            //HH: si no son correctos los datos del usuario muestro el mensaje.
            $this->form_validation->set_message('check_database','Datos invalidos Ingrese nuevamente el Usuario y Password');
            return false;
        }
    }
    
}

?>
