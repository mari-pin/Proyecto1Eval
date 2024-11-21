<?php
session_start();
require "../config/autoload.php";
include "../vistas/iniParcialProductos.html";

$base = new Base();

//obtengo los datos del servico
$resultado= json_decode(file_get_contents("http://localhost/Proyecto/servicoProducto/producto.php"),true);
 

 /* include "../vistas/productos.html";  */




// Productos Destacados
    echo '<section id="productos" class="py-5">';
    echo '<div class="container-fluid">';
     echo '<h2 class="text-center mb-5 titulo">Nuestros Bombones</h2>';
     echo'<div class="row justify-content-center">';
   
    foreach ($resultado as $producto) {

    
      echo '<div class="col-12 col-sm-8 col-md-6 col-lg-3 d-flex justify-content-center mb-4">';
      echo '<div class="card product-card">';
      echo '<img src="' . htmlspecialchars($producto['foto']) . '" class="card-img-top" alt="" />';
      echo '<div class="card-body text-center">';
      echo '<a href="detalle.php">ver detalle</a>';
      echo '<h5 class="card-title">' . htmlspecialchars($producto['nombre']) . '</h5>';
      echo '<button class="btn btn-detalle">Comprar';
      echo '<a href="/vistas/carrito.html">';
      echo '<i class="fa-solid fa-cart-shopping mt-2"></i>';
      echo '</a>';
      echo '</button>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
  }
  
    echo ' </div>';
   echo '</div>';
  echo'</section>';
  
  include "../vistas/finParcialProductos.html";