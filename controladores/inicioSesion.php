<?php
session_start();
require "../config/autoload.php";
include "../vistas/vistParcialFormulario.html";

$base = new Base();

if(isset($_POST['enviar'])){

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dniCliente = $_POST['dniCliente'];
        $pwd = $_POST['pwd'];
    
        // Realizar la petición al servicio de validación
        $url = "http://localhost/Proyecto/servicioCliente/validar.php?dniCliente=" . urlencode($dniCliente) . "&pwd=" . urlencode($pwd);
        $resultado = json_decode(file_get_contents($url), true);
    
        // Verificar si la respuesta es válida
        if ($resultado && !isset($resultado['error'])) {
            // Crear sesiones
            $_SESSION['email'] = $resultado['email'];
            $_SESSION['pwd'] = $resultado['pwd'];
            $_SESSION['nombre'] = $resultado['nombre'];
    
            // Redirigir a inicio
            header("Location:principal.php");
            exit();
        } else {
            echo "<p>Dni y contraseña incorrectos. Debes registrarte <a href='registro.php'>Registrarse</a></p>";
        }
    }
    include "principal.php";

  /*   $cli= new Cliente($_POST['dniCliente'], '','', '',$_POST['pwd']);
    
   
    var_dump($_POST['dniCliente'], $_POST['pwd'], $_POST['nombre']);
    $cli->buscar($base->link);
  

    $resultado = json_decode(file_get_contents("http://localhost/Proyecto/servicioCliente/validar.php?dniCliente=".$_POST['dniCliente']."&pwd=".$_POST['pwd']),true);
    $_SESSION['nombre'] = $_POST['nombre'];
var_dump($resultado);

    if (isset($_POST['dniCliente'], $_POST['pwd'])) {
        echo "entro en el if";
        // Crear sesiones
        $_SESSION['email'] = $resultado['email'];
        $_SESSION['pwd'] = $resultado['pwd'];
        $_SESSION['nombre'] = $resultado['nombre'];
        include "../vistas/iniParcialProductos.html";
        // Redirigir a inicio
        header("Location:principal.php");
      
        exit();
        
    } else {
       echo "<p>Dni y contraseña incorrectos. Debes registrarte<a href= 'registro.php'>Regirtrarse</a></p>";
      
       
       
    } */
}else{
    include "../vistas/inicioSesion.html";

}
include "../vistas/finalParcialForm.html";
