<?php

Class User extends CI_Model {

    function login($username, $password) {
        $this->db->select('idusuario,nombre_completo,usuario,password');
        $this->db->from('usuario');
        $this->db->where('usuario',$username);
        $this->db->where('password',  $password);
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        }
        return false;
    }
    
    function modulos($idusuario){
        $this->db->query("SELECT m.idmodulo ,  m.nombre , sm.idsubmodulos , sm.nombre FROM `usuario_sub_modulos`  as usm , sub_modulos as sm , modulos as m where m.idmodulo = sm.idmodulo and sm.idsubmodulos = usm.idsubmodulos and usm.idusuario = ?",$idusuario);
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;        
    }

}

?>