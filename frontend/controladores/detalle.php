<?php
session_start();
require "../config/autoload.php";
include "../vistas/iniParcialProductos.html";

$base = new Base();
$idProducto = $_GET['idProducto']??1;
//obtengo los datos del servico
$resultado= json_decode(file_get_contents("http://localhost/Proyecto/api/servicoProducto/producto.php"),true);





include "../vistas/detalle.html";



include "../vistas/finParcialProductos.html";