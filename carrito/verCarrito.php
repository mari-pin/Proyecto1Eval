<?php
session_start();
require "../config/autoload.php";
include "../vistas/iniParcialProductos.html";

$base = new Base();

if(isset($_POST['Añadir al carrito'])){

    $carrito = new Carrito($_POST['idcarrito'], '', '', '', '', '','');
    $carrito->existe($base->link);
    if($carrito){
        $carrito->insertar($base->link);
        $carrito = Carrito::getall($base->link);
        include "../controladores/carrito.php";

    }else{
        $idCarrito['idCarrito'] = uniqid();
        $carrito->guardar($base->link);
        $carrito->insertar($base->link);
        include "../controladores/carrito.php";
    }

}

