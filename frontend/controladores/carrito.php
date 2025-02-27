<?php
require "../vistas/inicio.php";
require "../vistas/nav.php";

if(isset($_POST['enviar'])){
    $datos = [
       'idProducto'=> $_POST['idProducto'],
       'cantidad'=> $_POST['cantidad'],
       'precio'=> $_POST['precio'],
       'dniCliente' => $_SESSION['dniCliente']
    ];
}





include "../vistas/footeryfin.phpre";

