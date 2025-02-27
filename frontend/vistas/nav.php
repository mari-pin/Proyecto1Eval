
<?php
session_start();
?>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid contNav">
      <a class="navbar-brand" href="/index2.html">Sweet Shop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon "></span>
      </button>
      <div class="collapse navbar-collapse flex-wrap" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="./index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./principal.php">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Acerca de</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contacto</a>
          </li>
        </ul>
        <!-- Formulario de búsqueda -->
        <form class="d-flex ms-4 flex-wrap flex-lg-nowrap">
          <input class="form-control me-2 mb-2 mb-lg-0 mb-0 " type="search" placeholder="Buscar" aria-label="Buscar" />

          
        
          <!-- Enlace de registro -->
          <a href="./registro.php" class="ms-3 mb-2 mb-lg-0">
            <i class="fa-solid fa-user-plus fs-5 mt-4 ms-4"></i>
            <span class="registro-text">Registro</span>
          </a>
          <a href="./carrito.php" class="ms-3 mb-2 mb-lg-0">
            <i class="fa-solid fa-cart-shopping fs-5 mt-4 ms-4"></i>
            <span class="registro-text">Carrito</span>
          </a>
          <?php
          if (isset($_SESSION['nombre'])) {
              echo "<p class='ms-3 mb-2 mb-lg-0'>Bienvenido, " . htmlspecialchars($_SESSION['nombre']) . "</p>";
             echo " <a href='./session_destroy.php' class='ms-5'>Cerrar Sesion</a>";
          }else{
           ?>
            <a href="./validar.php" class="ms-3 mb-2 mb-lg-0">
              <i class="fa-solid fa-user fs-5 mt-4 ms-4"></i></a>
          <?php
          }
          
          ?>
        

        </form>
      </div>
    </div>
  </nav>
