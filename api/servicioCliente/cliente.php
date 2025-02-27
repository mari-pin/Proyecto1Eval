<?php
session_start();
require "./clases/Cliente.php";
require "./clases/Base.php";

$datos = json_decode(file_get_contents('php://input'), true);


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET['dniCliente'], $_GET['pwd'])) {

        $dniCliente = $_GET['dniCliente'];
        $pwd = $_GET['pwd'];
        $base = new Base();
        $cli = new Cliente($dniCliente, "", "", "", $pwd);
        if ($cli) {
            // Validar cliente
            $resultado = $cli->validar($base->link);
            //$_SESSION['nombre'] = $resultado['nombre'];
            header("HTTP/1.1 200 OK");
           
            echo json_encode($resultado);
        } else {
            echo "sus dato no estan registrados";
        }

        exit();
    } else {
        echo "error:faltan datos";
    }
}
if($_SERVER['REQUEST_METHOD'] === "POST"){


    if (isset($datos['dniCliente'], $datos['nombre'], $datos['direccion'], $datos['email'], $datos['pwd'])) {
        $base = new Base();
        $cli = new Cliente($datos['dniCliente'], $datos['nombre'], $datos['direccion'], $datos['email'], $datos['pwd']);
       

        if( $cli->buscar($base->link)){
            
            echo "El cliente ya existe";
        }else{
            $cli->insertar($base->link);
            
            echo json_encode($cli->buscar($base->link));
        }


}
}