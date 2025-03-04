
  <section class="section_carrito">
  <!-- Carrito de Compras -->
  <section class="container w-100 my-5 ">
    <h2 class="text-center mb-4">Carrito de Compras</h2>
  
    <!-- Tabla de productos en el carrito -->
<form action="" method="post">
<table class="table tabla-hover carrito-tabla">
      <thead>
        <tr>
          <th>Producto</th>
          <th>Cantidad</th>
          <th>Precio Unitario</th>
          <th>Total</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($lineas)): ?>
        <?php foreach ($lineas as $linea): ?>
          <tr>
            <td><?php echo htmlspecialchars($linea['idProducto']); ?></td>
            <td>
              <div class="input-group div_cantidad">
                <input type="number" class="form-control text-center" value="<?php echo $linea['cantidad']; ?>" min="1" name="<?=$linea['idProducto']?>">
              </div>
            </td>
            <td>$<?php echo number_format($linea['precioUnidad'], 2); ?></td>
            <td>$<?php echo number_format($linea['precioUnidad'] * $linea['cantidad'], 2); ?></td>
            <td>
              <form method="POST" action="eliminar_linea.php">
                <input type="hidden" name="idProducto" value="<?php echo $linea['idProducto']; ?>">
                <input type="submit" class="btn btn-danger btn-sm value="eliminar">
                  <i class="fas fa-trash-alt"></i> 
                </input>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="5" class="text-center">El carrito está vacío.</td>
        </tr>
      <?php endif; ?>
     
        
      </tbody>
    </table>
  
    <!-- Botones de acción -->
    <div class="text-center mt-4 row w-100 div_btnes_carrito">
      <input type="submit" class="btn btn-secondary me-2 col-3 " name="actualizar" value="Actualizar Carrito">
      <button class="btn btn-primary me-2 col-3"><a href="./confirmar_pedido.php?confirmar">Confirmar Pedido</a></button>
      <button class="btn btn-success col-3"><a href="./principal.php">Seguir Comprando</a></button>
    </div>
</form>
  </section>
</section>
