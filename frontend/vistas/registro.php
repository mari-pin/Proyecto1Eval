


    <!-- Formulario de Inicio de Sesión -->
<div class="login-container text-center border rounded shadow">
    <h2 class="mb-4">Formulario de Registro</h2>
    
    <!-- Formulario de Autenticación -->
    <form action="" method="POST" class="row">
        <div class="mb-3 input">
            <label for="nombre" class="form-label">Nombre y apellidos</label>
            <input type="text" name="nombre" class="form-control" id="nombre_completo" placeholder="nombre_completo" required>
        </div>
        <div class="mb-3 input">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control" id="direccion" placeholder="dirección" required>
        </div>
    
        <div class="mb-3 input">
            <label for="direccion" class="form-label">DniCliente</label>
            <input type="text" name="dniCliente" class="form-control" id="dniCliente" placeholder="DNI" required>
        </div>
        <div class="mb-3 input">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="correo@ejemplo.com" required>
        </div>
        <div class="mb-3 input">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="pwd" class="form-control" id="password" placeholder="••••••••" required>
        </div>
        <!-- todos los botones tienen k ser inputs en php -->
        <input type="submit" name="enviar" value="Aceptar" class="btn-detalle">
        
    </form>

    
    
   
</div>


