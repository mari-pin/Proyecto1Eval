<<<<<<< HEAD
<?php
session_start();
require "../config/autoload.php";
include "../vistas/vistParcialFormulario.html";

$base = new Base();

if(isset($_POST['enviar'])){
    $cli= new Cliente("dniCliente", "", "", "","pwd");
    
    var_dump($_POST['dniCliente'], $_POST['pwd']);
    $cli->buscar($base->link);
    $_SESSION['nombre'] = $_POST['nombre'];

    $resultado = json_decode(file_get_contents("http://localhost/Proyecto/servicioCliente/validar.php?dniCliente=".$_POST['dniCliente']."&pwd=".$_POST['pwd']),true);

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
      
       
       
    }
}else{
    include "../vistas/inicioSesion.html";

}
include "../vistas/finalParcialForm.html";
=======
<?php
session_start();
require "../config/autoload.php";
include "../vistas/vistParcialFormulario.html";

$base = new Base();

if(isset($_POST['enviar'])){
    $cli= new Cliente("dniCliente", "", "", "","pwd");
    
    var_dump($_POST['dniCliente'], $_POST['pwd']);
    $cli->buscar($base->link);
    $_SESSION['nombre'] = $_POST['nombre'];

    $resultado = json_decode(file_get_contents("http://localhost/Proyecto/servicioCliente/validar.php?dniCliente=".$_POST['dniCliente']."&pwd=".$_POST['pwd']),true);

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
      
       
       
    }
}else{
    include "../vistas/inicioSesion.html";

}
include "../vistas/finalParcialForm.html";
>>>>>>> 2da4c6c02739034c040714be351d5dd8cdf17326
