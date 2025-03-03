<!-- Contenido del Detalle del Producto -->
<section class="container_section">
  <div class="row">
    <!-- Galería de Imágenes -->
    <div class=" col-12 col-sm-12 col-md-12 col-lg-6">
      <img width="500px" height="500px" src="<?php echo htmlspecialchars($resultado['foto']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($resultado['nombre']); ?>" />
    </div>

    <!-- Detalles del Producto -->
    <div class="col-12  col-sm-12 col-md-12 col-lg-6 detalle_pro_text">
      <h2 class="product-name"><?php echo htmlspecialchars($resultado['nombre']); ?></h2>
      <hr>

      <hr>                                             
      <!-- Información Relevante -->
      <ul class="list-unstyled fs-4">
        <li><strong>Precio por unidad:</strong><?php echo htmlspecialchars($resultado['precio']); ?></li>
        <li><strong>Peso por unidad:</strong> 50g</li>
        <li><strong>Ingredientes:</strong> Cacao, azúcar, leche, manteca de cacao.</li>
        <li><strong>Fecha de Caducidad:</strong> 12 meses desde la compra.</li>
      </ul>
      <hr>

      <form action="./carrito.php" method="post">
        <!-- Botónes para añadir al carrito -->
        <div class="text-center mb-4">
          <div class="quantity-container">
            <input type="number" id="quantity" class="form-control text-center" value="1" min="1" name="cantidad">
          </div>
          <input type="submit" class="btn btn-detalle mt-3" value="Añadir al carrito" name="enviar">
        </div>
        <input type="text" hidden name="precio" value="<?= $resultado['precio'] ?>">
        <input type="text" hidden name="idProducto" value="<?= $resultado['idProducto'] ?>">

      </form>
    </div>
  </div>
</section>