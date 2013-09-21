<?php

$acum = ""; //HH: indica la igualdad del valor del menu
$val_inicial = "0"; //HH: indicador de inicio del menu
echo "<div class='sidebar-nav'>";
if ($modulos <> false) { //HH: verificando si tiene registros
    foreach ($modulos as $modulo) {
        //HH: Consulto si es un sub modulo para activarlo.
        $xIn = "";
        $xClass = "";
        if ($modulo_activo <> "") {
            if ($modulo_activo === $modulo->idsub_modulo) {
                $xIn = " in";
                $xClass = " class='active' ";
            }
        }
        //HH: inicia el pintado de modulos de menus
        if ($val_inicial === "0") {
            $acum = $modulo->idmodulo;
            echo "<a href='#" . $modulo->m_identificador . "' class='nav-header' data-toggle='collapse'><i class='icon-dashboard'></i>" . $modulo->nom_modulo . "<i class='icon-chevron-up'></i></a>";
            echo "<!-- se pone 'class='nav-header' data-toggle='collapse'> para que se vea el icono hacia abajo-->";
            echo "<ul id='" . $modulo->m_identificador . "' class='nav nav-list collapse " . $xIn . "'>";  //HH: class='nav nav-list collapse in' para que se visualice 
        }
        //HH: muestro los modulos siguientes
        if ($modulo->idmodulo === $acum) {
            echo "<li " . $xClass . "><a href='" . $this->config->base_url() . $modulo->sm_ruta . "'>" . $modulo->nom_sub_modulo . "</a></li>";
        } else {
            echo "</ul>";
            echo "<a href='#" . $modulo->m_identificador . "' class='nav-header' data-toggle='collapse'><i class='icon-dashboard'></i>" . $modulo->nom_modulo . "<i class='icon-chevron-up'></i></a>";
            echo "<ul id='" . $modulo->m_identificador . "' class='nav nav-list collapse'>";
            echo "<li " . $xClass . " ><a href='" . $this->config->base_url() . $modulo->sm_ruta . "'>" . $modulo->nom_sub_modulo . "</a></li>";
            $acum = $modulo->idmodulo;
        }
        $val_inicial = "1";
    }
}
echo "</ul>";
echo "</div>";
?>