<?php
session_start();
require "./clases/Carrito.php";
require "./clases/Base.php";

$datos = json_decode(file_get_contents('php://input'), true);

$base = new Base();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if(isset($_GET['eliminar'])){
     
        if(isset($_GET['dniCliente'])){
    
            if(isset($_GET['idProducto'])){
    
                $carrito = new Carrito(0, $_GET['idProducto'], 0, 0, $_GET['dniCliente']);
    
            }else{
                $carrito = new Carrito(0, 0, 0, 0, $_GET['dniCliente']);
    
            }
            $carrito->borrar($base->link);
            echo json_encode('el carrito se ha eliminado');
    
        }
    
       }else{

        if (isset($_GET['dniCliente'])) {

            $carrito = new Carrito(0, 0,0,0,$_GET['dniCliente'] );
            $datos = $carrito->getAll($base->link);
            
           if($datos){
               $datos = json_encode($datos->fetchAll());
            echo $datos;
                
           }else{
               echo json_encode('[]');
           }
   
          
       } else {
           echo "error:faltan datos";
       }
   

       }

  
}

if($_SERVER['REQUEST_METHOD'] === "POST"){
  
    if(isset($datos['dniCliente'], $datos['idProducto'], $datos['cantidad'])){

        $carrito = new Carrito(0, $datos['idProducto'], $datos['cantidad'], 0, $datos['dniCliente']);
       $resultado = $carrito->Buscar($base->link);
  
      $resultado =  $resultado->fetch(PDO::FETCH_ASSOC);

      if($resultado){

        if($datos['cantidad'] == 0){
            $carrito->cantidad = $resultado['cantidad'] +1;
        }

         $carrito->modificar($base->link);
      }else{

        if(isset($datos['precioUnidad'])){
            $carrito = new Carrito(Carrito::nuevaLinea($base->link), $datos['idProducto'], $datos['cantidad'], $datos['precioUnidad'], $datos['dniCliente']);
          
            $carrito->Insertar($base->link);
        

        }
    
      }

    }else{
     echo "faltan datos";
    }
    
    
   }


