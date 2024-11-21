<<<<<<< HEAD
<?php
session_start();
require "../config/autoload.php";
include "../vistas/vistParcialFormulario.html";
 
$base = new Base();
if(isset($_POST['enviar'])){
     $cli =  new Cliente($_POST['dniCliente'], $_POST['nombre'], $_POST['direccion'], $_POST['email'], $_POST['pwd']);
  /*  if(!$cli->buscar($base->link)){
        $_SESSION['nombre'] = $_POST['nombre'];

        $cli->insertar($base->link);
           
    } */
   if($cli->buscar($base->link)){
   
    $_SESSION['nombre'] = $_POST['nombre'];
    $dato = "hola ".$_SESSION['nombre'];
    $dato.= "<a href='principal.php'>volver</a>";
    require "../vistas/mensaje.php";
    

   }else{
    if(!$cli->insertar($base->link)){
        echo "estoy insertando";
        $dato="El cliente se ha insertado correctamente<br>";
        $_SESSION['nombre'] = $_POST['nombre'];
        $dato.="<a href='principal.php'>Volver</a>";
        require "../vistas/mensaje.php";}
    else {
            $dato= "error al insertar";
            $dato.="<a href='principal.php'>Volver</a>";
            require "../vistas/mensaje.php";
    }
}

} else {
    include "../vistas/registro.html";
}

include "../vistas/finalParcialForm.html";










=======
<?php
session_start();
require "../config/autoload.php";
include "../vistas/vistParcialFormulario.html";
 
$base = new Base();
if(isset($_POST['enviar'])){
     $cli =  new Cliente($_POST['dniCliente'], $_POST['nombre'], $_POST['direccion'], $_POST['email'], $_POST['pwd']);
  /*  if(!$cli->buscar($base->link)){
        $_SESSION['nombre'] = $_POST['nombre'];

        $cli->insertar($base->link);
           
    } */
   if($cli->buscar($base->link)){
   
    $_SESSION['nombre'] = $_POST['nombre'];
    $dato = "hola ".$_SESSION['nombre'];
    $dato.= "<a href='principal.php'>volver</a>";
    require "../vistas/mensaje.php";
    

   }else{
    if(!$cli->insertar($base->link)){
        echo "estoy insertando";
        $dato="El cliente se ha insertado correctamente<br>";
        $_SESSION['nombre'] = $_POST['nombre'];
        $dato.="<a href='principal.php'>Volver</a>";
        require "../vistas/mensaje.php";}
    else {
            $dato= "error al insertar";
            $dato.="<a href='principal.php'>Volver</a>";
            require "../vistas/mensaje.php";
    }
}

} else {
    include "../vistas/registro.html";
}

include "../vistas/finalParcialForm.html";










>>>>>>> 2da4c6c02739034c040714be351d5dd8cdf17326
