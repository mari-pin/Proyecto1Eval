<?php
session_start();
require "./config/autoload.php";
//require "./clases/Carrito.php";
//require "./clases/Base.php";

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
            $datosCarrito = $carrito->getAll($base->link);
            
           if($datosCarrito){
               $datosCarrito = json_encode($datosCarrito->fetchAll());
            echo $datosCarrito;
                
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

        if(!isset($datos['actualizar'])){
         
            $carrito->cantidad += $resultado['cantidad'] ;
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


