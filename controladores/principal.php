<?php
session_start();
require "../config/autoload.php";
include "../vistas/iniParcialProductos.html";

$base = new Base();

$resultado = json_decode(file_get_contents("http://localhost/Proyecto/servicioProducto/producto.php"),true);

include "../vistas/productos.html";
include "../vistas/finParcialProductos";


/* falta introducir todo el foreach de cada producto */
/*   <section id="productos" class="py-5">
    <div class="container-fluid">
      <h2 class="text-center mb-5 titulo">Nuestros Bombones</h2>
      <div class="row justify-content-center">
        <?php foreach ($productos as $producto): ?>
        <div class="col-12 col-sm-8 col-md-6 col-lg-3 d-flex justify-content-center mb-4">
          <div class="card product-card">
            <img src="<?php echo htmlspecialchars($producto['imagen']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($producto['nombre']); ?>" />
            <div class="card-body text-center">
              <h5 class="card-title"><?php echo htmlspecialchars($producto['nombre']); ?></h5>
              <p class="card-text"><?php echo htmlspecialchars($producto['descripcion']); ?></p>
              <p class="card-text">$<?php echo htmlspecialchars($producto['precio']); ?></p>
              <button class="btn btn-detalle">Comprar
                <!-- Icono cart -->
                <a href="/vistas/carrito.html">
                  <i class="fa-solid fa-cart-shopping mt-2"></i>
                </a>
              </button>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section> */

