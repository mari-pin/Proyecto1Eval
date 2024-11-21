<<<<<<< HEAD
<?php
session_start();
include __DIR__ . "/config/autoload.php";


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
var_dump($_GET);
if(isset($_GET['dniCliente'],$_GET['pwd'])){

    $dniCliente = $_GET['dniCliente'];
    $pwd = $_GET['pwd'];
    $base = new Base();
    $cli = new Cliente($dniCliente, "", "","",$pwd); 
        // Validar cliente
        $resultado = $cli->validar($base->link);
        header("HTTP/1.1 200 OK");
        echo json_encode($resultado);
        exit();

  
}else{
    echo "error:faltan datos";
}


    

} else {
    echo json_encode( "Error: vuelva a intentarlo");
}


=======
<?php
session_start();
include __DIR__ . "/config/autoload.php";


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
var_dump($_GET);
if(isset($_GET['dniCliente'],$_GET['pwd'])){

    $dniCliente = $_GET['dniCliente'];
    $pwd = $_GET['pwd'];
    $base = new Base();
    $cli = new Cliente($dniCliente, "", "","",$pwd); 
        // Validar cliente
        $resultado = $cli->validar($base->link);
        header("HTTP/1.1 200 OK");
        echo json_encode($resultado);
        exit();

  
}else{
    echo "error:faltan datos";
}


    

} else {
    echo json_encode( "Error: vuelva a intentarlo");
}


>>>>>>> 2da4c6c02739034c040714be351d5dd8cdf17326
