<?php
require "../config/autoload.php";
require "../vistas/inicio.php";
require "../vistas/nav.php";

if(isset($_GET['confirmar']) && isset($_SESSION['dniCliente'])){

$carrito = file_get_contents('http://localhost/IbañezRosalenMaria_Proyect1T/api/servicioCarrito/carrito.php?dniCliente='.$_SESSION['dniCliente']);

$carrito = json_decode($carrito,true);//saco los datos del carrito
if(count($carrito) == 0){
    header("Location:./carrito.php");
    exit();
}

$cliente = file_get_contents('http://localhost/IbañezRosalenMaria_Proyect1T/api/servicioCliente/cliente.php?dniCliente='.$_SESSION['dniCliente']);

$cliente = json_decode($cliente,true);//saco los datos del cliente


file_get_contents('http://localhost/IbañezRosalenMaria_Proyect1T/api/servicioCarrito/carrito.php?eliminar&dniCliente='.$_SESSION['dniCliente']);//elimina de la base de datos de la api el carrito asociado a ese dniCliente k le paso x la url  

$base = new Base();

$pedido = null;
$lineasPedido = [];

try {
  $base->link->beginTransaction();
  $pedido = new Pedido(Pedido::nuevaLinea($base->link), date("Y/m/d"), $cliente['direccion'], $cliente['dniCliente'], $cliente['nombre']);
$pedido->insertar($base->link);

foreach($carrito as $lineaCarrito){
    $producto = file_get_contents('http://localhost/IbañezRosalenMaria_Proyect1T/api/servicioProducto/producto.php?idProducto='.$lineaCarrito['idProducto']);
    $producto = json_decode($producto,true);//me saca los datos del producto 

    $lineaPedido = new LineaPedido($pedido->idPedido, $producto['idProducto'], $lineaCarrito['cantidad'], $producto['precio'], $producto['nombre']);

    $lineaPedido->insertar($base->link);
    array_push($lineasPedido, $lineaPedido);


   
}
$base->link->commit();


} catch (PDOException $e) {
    $base->link->rollBack();
    echo "Error al insertar el pedido: " . $e->getMessage();
   
}

require "../vistas/confirmar_Pedido.php";


}else{
    header("Location:./validar.php");
}







include "../vistas/footeryfin.php";
