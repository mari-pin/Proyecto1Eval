<?php
session_start();
require "../config/autoload.php";
include "../vistas/vistParcialFormulario.html";

$base = new Base();

if(isset($_POST['enviar'])){

    $resultado = json_decode(file_get_contents("http://localhost/Proyecto/servicioCliente/validar.php?dniCliente=".$_POST['dniCliente']."&pwd=".$_POST['pwd']),true);
echo $resultado;
    if ($resultado) {
        // Crear sesiones
        $_SESSION['email'] = $resultado['email'];
        $_SESSION['pwd'] = $resultado['pwd'];
        $_SESSION['nombre'] = $resultado['nombre'];

        // Redirigir a inicio
        header("Location:../vistas/index2.html");
        exit();
        
    } else {
       echo "<p>Dni y contraseña incorrectos. Debes registrarte<a href= 'registro.php'>Regirtrarse</a></p>";
      
       
       
    }
}else{
    include "../vistas/inicioSesion.html";

}
include "../vistas/finalParcialForm.html";
