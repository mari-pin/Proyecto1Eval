<section class="section_carrito">
    <!-- Formalización del Pedido -->
    <section class="container w-100 my-5">
        <h2 class="text-center mb-4">Formalizar Pedido</h2>

        <?php $strPdf = '';
        $strPdf .= "Id Pedido: $pedido->idPedido &";

        $strPdf .= "Dni Cliente: $pedido->dniCliente &";
        $strPdf .= "Nombre: $pedido->nombreCliente &";
        $strPdf .= "Direccion Entrega: $pedido->dirEntrega &";
        $strPdf .= "Fecha: $pedido->fecha &";


        ?>
        <p>Id Pedido: <?= $pedido->idPedido ?></p>
        <p>Dni: <?= $pedido->dniCliente ?></p>
        <p>Nombre: <?= $pedido->nombreCliente ?></p>
        <p>Direccion de Entrega: <?= $pedido->dirEntrega ?></p>
        <p>Fecha: <?= $pedido->fecha ?></p>




        <!-- Tabla de productos en el pedido -->
        <table class="table tabla-hover carrito-tabla">
            <thead>
                <tr>
                    <th> Id Producto </th>
                    <th> Nombre</th>
                    <th>Precio Unitario</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($lineasPedido as $linea) {
                    $total = $total + $linea->precioTotal;
                    $strPdf .=  "Id Producto: $linea->idProducto,";
                    $strPdf .=  "Nombre: $linea->nombreProducto,";
                    $strPdf .=  "Precio Unitario: $linea->precioProducto,";
                    $strPdf .=  "Cantidad: $linea->cantidad,";
                    $strPdf .=  "Total: $linea->precioTotal &";

                    echo "<tr>" .
                        "<td>" . $linea->idProducto . "</td>" .
                        "<td>" . $linea->nombreProducto . "</td>" .
                        "<td>" . $linea->precioProducto . "</td>" .
                        "<td>" . $linea->cantidad . "</td>" .
                        "<td>" . $linea->precioTotal . "</td>" .
                        "</tr>";
                };

                ?>


            </tbody>
        </table>
        <h2>Total: <?= $total ?></h2>
        
        <?php $strPdf .=  "Total: $total"; ?>




        <!-- Botones-->
        <div class="text-center mt-4 row w-100 div_btnes_carrito">
            <form action="./crearPdf.php" method="Post">
                <input type="hidden" name="strPdf" value="<?= $strPdf ?>">
                <input type="submit" class="btn btn-primary me-2 col-3" value="Ver PDF">
            </form>

            <button class="btn btn-success col-3"><a href="./principal.php">Seguir Comprando</a></button>
        </div>
    </section>
</section>