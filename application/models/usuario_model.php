<?php

Class Usuario_model extends CI_Model {

    function login($username, $password) {
        $this->db->select('idusuario,nombre_completo,usuario,password,activo,fecha_creacion,fecha_modificacion,idperfil,idempleado');
        $this->db->from('usuario');
        $this->db->where('usuario',$username);
        $this->db->where('password',  $password);
        $this->db->where('activo','1');
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        }
        return false;
    }
    
    function modulos_usuario($idusuario){
        $query = $this->db->query("select m.idmodulo as idmodulo, m.nombre as nom_modulo, sm.idsub_modulo as idsub_modulo, sm.nombre as nom_sub_modulo from usuario_sub_modulo usm , sub_modulo sm, modulo m where m.idmodulo = sm.idmodulo and sm.idsub_modulo = usm.idsub_modulo and m.activo = '1' and sm.activo = '1' and usm.idusuario ='".$idusuario."'");
        if ($query->num_rows()>0)
            {
                return $query->result();
            } else {
                return false;
            }       
    }

}

?>