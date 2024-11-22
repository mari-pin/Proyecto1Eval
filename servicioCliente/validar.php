<?php
session_start();
include  "config/autoload.php";


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

if(isset($_GET['dniCliente'],$_GET['pwd'])){

    $dniCliente = $_GET['dniCliente'];
    $pwd = $_GET['pwd'];
    $base = new Base();
    $cli = new Cliente($dniCliente, "", "","",$pwd); 
    if($cli){
        // Validar cliente
        $resultado = $cli->validar($base->link);
        $_SESSION['nombre'] = $resultado['nombre'];
        header("HTTP/1.1 200 OK");
        echo json_encode($resultado);

    }else{
        echo "sus dato no estan registrados";
    }
        
        exit();

  
}else{
    echo "error:faltan datos";
}


    

} else {
    echo json_encode( "Error: vuelva a intentarlo");
}


