<?php
require "../vistas/inicio.php";
require "../vistas/nav.php";




if(isset($_POST['enviar'])){

        $dniCliente = $_POST['dniCliente'];
        $pwd = $_POST['pwd'];
    
        // Realizar la petición al servicio de validación
        $url = "http://localhost/IbañezRosalenMaria_Proyect1T/api/servicioCliente/cliente.php?dniCliente=" . urlencode($dniCliente) . "&pwd=" . urlencode($pwd);
        $resultado = json_decode(file_get_contents($url), true);

     
    
        // Verificar si la respuesta es válida
        if ($resultado && !isset($resultado['error'])) {
            // Crear sesiones
            $_SESSION['email'] = $resultado['email'];
            $_SESSION['dniCliente'] = $resultado['dniCliente'];
            $_SESSION['nombre'] = $resultado['nombre'];
    
            // Redirigir a inicio
           header("Location:principal.php");
            exit();
        } else {
            $dato.="<p>Dni y contraseña incorrectos. Debes registrarte <a href='registro.php'>Registrarse</a></p>";
            echo $dato;
        }
    
    header("Location:principal.php");

  

}else{
    require "../vistas/inicioSesion.php";

}
require "../vistas/footeryfin.php";
