<?php
session_start();
require "../config/autoload.php";
include "../vistas/vistParcialFormulario.html";
 
$base = new Base();
if(isset($_POST['enviar'])){
    $cli =  new Cliente($_POST['dniCliente'], $_POST['nombre'], $_POST['direccion'], $_POST['email'], $_POST['pwd']);
    if(!$cli->buscar($base->link)){
        $_SESSION['nombre'] = $_POST['nombre'];

        $cli->insertar($base->link);
           
    }
}else{
    include "../vistas/registro.html";
}

include "../vistas/finalParcialForm.html";










