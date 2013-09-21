<?php
@session_start();
class Cliente_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

   function listar_clientes($Cad,$tipo){
       $Sql="";
        if ($tipo==="" && $Cad===""){
            $Sql="SELECT w.idcliente as idcliente, concat(w.nombres , ' ' , w.apellidos) as nom_completo , w.telefono as telefono , w.email as email, w.nombre_empresa as nom_empresa, w.ruc_empresa as ruc_empresa   FROM `cliente` as w order by nom_completo limit 0,30";  
        }
        if ($tipo==="1"){ //HH: si es consulta por nombre
            $Sql = "SELECT w.idcliente as idcliente, concat(w.nombres , ' ' , w.apellidos) as nom_completo , w.telefono as telefono , w.email as email, w.nombre_empresa as nom_empresa, w.ruc_empresa as ruc_empresa   FROM `cliente` as w  where w.nombres like '%".$Cad."%'  order by nom_completo limit 0,30";
        }
        if ($tipo==="2"){ //HH: si es consulta por apellido
            $Sql = "SELECT w.idcliente as idcliente, concat(w.nombres , ' ' , w.apellidos) as nom_completo , w.telefono as telefono , w.email as email, w.nombre_empresa as nom_empresa, w.ruc_empresa as ruc_empresa   FROM `cliente` as w  where w.apellidos like '%".$Cad."%'  order by nom_completo limit 0,30";
        }
        if ($tipo==="3"){ //HH: si es consulta por nombre de la empresa
            $Sql = "SELECT w.idcliente as idcliente, concat(w.nombres , ' ' , w.apellidos) as nom_completo , w.telefono as telefono , w.email as email, w.nombre_empresa as nom_empresa, w.ruc_empresa as ruc_empresa   FROM `cliente` as w  where w.nombre_empresa like '%".$Cad."%'  order by nom_completo limit 0,30";
        }
        if ($tipo==="4"){ //HH: si es consulta por Ruc de la empresa
            $Sql = "SELECT w.idcliente as idcliente, concat(w.nombres , ' ' , w.apellidos) as nom_completo , w.telefono as telefono , w.email as email, w.nombre_empresa as nom_empresa, w.ruc_empresa as ruc_empresa   FROM `cliente` as w  where w.ruc_empresa like '%".$Cad."%'  order by nom_completo limit 0,30";
        }        
        $query = $this->db->query($Sql);
        if ($query->num_rows()>0)
        {
            return $query->result();
        } else {
            return false;
        }       
    }
    
}
?>
