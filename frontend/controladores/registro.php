<?php
require "../vistas/inicio.php";
require "../vistas/nav.php";


if(isset($_POST['enviar'])){
     $cli =  new Cliente($_POST['dniCliente'], $_POST['nombre'], $_POST['direccion'], $_POST['email'], $_POST['pwd']);

   if($cli->buscar($base->link)){
   
    $_SESSION['nombre'] = $_POST['nombre'];
    $dato = "hola ".$_SESSION['nombre'];
    $dato.= "<a href='principal.php'>volver</a>";
    require "../vistas/mensaje.php";
    

   }else{
    if(!$cli->insertar($base->link)){
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
    require "../vistas/registro.php";
}

require "../vistas/footeryfin.php";










