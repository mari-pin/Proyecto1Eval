<?php
session_start();
require "../config/autoload.php";
include "../vistas/iniParcialProductos.html";



//obtengo los datos del servico
$resultado= json_decode(file_get_contents("http://localhost/Proyecto/api/servicoProducto/producto.php"),true);


  if ($resultado && isset($resultado['productos'])) {
  $productos = $resultado['productos'];
} else {
  $productos = [];
} 

 include "../vistas/productos.html";

  
  include "../vistas/finParcialProductos.html";