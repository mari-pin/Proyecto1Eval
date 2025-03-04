
    <section class="section_carrito">
        <!-- Formalización del Pedido -->
        <section class="container w-100 my-5">
            <h2 class="text-center mb-4">Formalizar Pedido</h2>

            <!-- Tabla de productos en el pedido -->
            <table class="table tabla-hover carrito-tabla">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <!--línea de un producto -->
                    <tr>
                        <td>Bombón de Chocolate Puro</td>
                        <td>
                            <div class="input-group div_cantidad">
                                <input type="number" class="form-control text-center" value="1" min="1">
                            </div>
                        </td>
                        <td>$5.00</td>
                        <td>$5.00</td>
                    </tr>
                    <tr>
                      <td>Bombón de Chocolate Puro</td>
                      <td>
                          <div class="input-group div_cantidad">
                              <input type="number" class="form-control text-center" value="1" min="1">
                          </div>
                      </td>
                      <td>$5.00</td>
                      <td>$5.00</td>
                  </tr>

                    <!-- Más líneas de productos aquí -->
                

                </tbody>
            </table>

            <!-- Botones-->
            <div class="text-center mt-4 row w-100 div_btnes_carrito">
                <button class="btn btn-primary me-2 col-3"><a href="confirmar_pedido.php">Confirmar Pedido</a></button>
                <button class="btn btn-success col-3"><a href="../controladores/principal.php">Seguir Comprando</a></button>
            </div>
        </section>
    </section>
 