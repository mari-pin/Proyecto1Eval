

<!-- Formulario de Inicio de Sesión -->
<div class="login-container text-center p-4 border rounded shadow">
    <h2 class="mb-4">Iniciar Sesión</h2>
    
    <!-- Formulario de Autenticación -->
    <form  action="" method="post">
        <div class="mb-3">
            <label for="dniCliente" class="form-label">Dni Cliente</label>
            <input type="text" class="form-control" id="email" name="dniCliente" placeholder="DNI" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="pwd" placeholder="contraseña" required>
        </div>
        <input type="submit" name="enviar" class="btn btn-detalle mt-3" value="Iniciar Sesion">
    </form>

    <!-- Opción para iniciar sesión con Google -->
    <div class="my-3">
        <p class="text-muted">Inicia sesión con</p>
        <button class="btn btn-outline-dark w-100 fs-5"><i class="fab fa-google me-2"></i>Continuar con Google</button>
    </div>
    
    <!-- Enlace para registrarse -->
    <p class="mt-3">¿No tienes cuenta? <a href="./registro.php">Regístrate</a></p>
</div>
