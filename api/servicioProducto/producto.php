<?php
require "./config/autoload.php";

//require  "./clases/Base.php";
//require  "./clases/Producto.php";


$base = new Base();

if($_SERVER['REQUEST_METHOD'] === 'GET'){
   

    if(isset($_GET['idProducto'])){
        $producto = new Producto($_GET['idProducto']);
        $dato = $producto->buscar($base->link);
        header("HTTP/1.1 200 OK");
        echo json_encode($dato);
        exit();
    }else{
        $dato = Producto::getAll($base->link);
        $dato->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode($dato->fetchAll());
        exit();
    }
      
}

//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");