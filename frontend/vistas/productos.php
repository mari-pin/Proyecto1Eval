 
  <!-- Productos Destacados -->
  <section id="productos" class="py-5">
    <div class="container-fluid">
        <h2 class="text-center mb-5 titulo">Nuestros Bombones</h2>
        <div class="row justify-content-center">
            <?php if (isset($resultado) && !empty($resultado)): ?>
                <?php foreach ($resultado as $producto): ?>
                    <div class="col-12 col-sm-8 col-md-6 col-lg-3 d-flex justify-content-center mb-4">
                        <div class="card product-card">
                            <img src="<?php echo htmlspecialchars($producto['foto']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($producto['nombre']); ?>" />
                            <div class="card-body text-center">
                              
                                <h5 class="card-title"><?php echo htmlspecialchars($producto['nombre']); ?></h5>
                                <button class="btn btn-detalle">
                                <?php echo "  <a href='./detalle.php?idProducto=".$producto['idProducto'] ."'>Ver detalle</a>";?>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay productos disponibles.</p>
            <?php endif; ?>
        </div>
    </div>
</section>




  <!-- Footer -->
<!--   <footer class="footer text-center" id="footer">
    <div class="container">
      <p class="footer-text mb-0">
        &copy; 2024 Sweet Shop. Todos los derechos reservados.
      </p>
      <p class="footer-text">
        Ubicación: Calle Lopez num.35 40430 Valencia<br>
        Contacto: 655522881<br>
        Email: SweetShop@gmail.com<br>
        Síguenos en:
        <a href="#" class="text-light mx-2"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="text-light mx-2"><i class="fab fa-twitter"></i></a>
        <a href="#" class="text-light mx-2"><i class="fab fa-instagram"></i></a>
      </p>
    </div>
  </footer> -->


    <!-- Bootstrap JS -->
  <!--   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html> -->