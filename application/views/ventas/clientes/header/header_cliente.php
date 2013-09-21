<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Listado de Clientes</title>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- HH: Carpeta Bootstrap v2.3.2 -->
        <link rel="stylesheet" type="text/css" href="<?= $this->config->base_url() ?>bootstrap/assets/css/bootstrap.css">
        <!-- HH: Estilos del Tema -->
        <link rel="stylesheet" type="text/css" href="<?= $this->config->base_url() ?>css/theme-black.css">
        <!-- HH: Estilos Personales -->
        <link rel="stylesheet" type="text/css" href="<?= $this->config->base_url() ?>css/Estilos.css">
        <!-- HH: Carpeta de iconos -->
        <link rel="stylesheet" href="<?= $this->config->base_url() ?>/font-awesome/css/font-awesome.css">
        <!-- HH: Carpeta JQuery -->
        <script src="<?= $this->config->base_url() ?>/JS/jquery-1.9.1.js"></script>
        <script type="text/javascript">
            //HH: Cargo el div para filtrar los datos de consulta
            $(document).ready(function(){
                $("#ContenedorDetalle").load("<?= $this->config->base_url() ?>ventas/clientes/listar/listar_cliente");
                $("#txtbuscar").keyup (function (e) {
                    cadena=$(this).val();
                    //HH: capturo el valor de los radios butons
                    var radio = $("input[name='opcionBuscar']:checked").val(); 
                    if (cadena==""){ //HH: si la cadena esta vacia devuelve toda la lista 
                        var href = "<?= $this->config->base_url() ?>ventas/clientes/listar/listar_cliente";
                    } else { //HH: carga el filtro
                        //HH: valor de radio 
                        //1.- filtro por nombre
                        //2.- filtro por apellidos
                        //3.- filtro por nombre de la empresa
                        //4.- filtro por el ruc de la empresa
                        var href = "<?= $this->config->base_url() ?>ventas/clientes/listar/listar_cliente/"+cadena+"/"+radio;
                    }
                    $("#ContenedorDetalle").load(href);
                });
            });         
        </script>

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="../assets/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    </head>

    <body > 