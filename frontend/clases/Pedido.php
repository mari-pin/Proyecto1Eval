<?php

class Pedido{

     private $idPedido;
     private $fecha;
     private $dirEntrega;
     private $dniCliente;
     private $nombreCliente;


     function __construct($idPedido, $fecha, $dirEntrega, $dniCliente, $nombreCliente){
        $this-> idPedido = $idPedido;
        $this-> fecha = $fecha;
        $this-> dirEntrega = $dirEntrega;
        $this-> dniCliente = $dniCliente;
        $this-> nombreCliente = $nombreCliente;
     }

     function insertar($link){
        try {
           
            $result=$link->prepare("INSERT INTO `pedidos` (`idPedido`, `fecha`, `dirEntrega`, `dniCliente`, `nombreCliente`) VALUES ('$this->idPedido', '$this->fecha', '$this->dirEntrega', '$this->dniCliente', '$this->nombreCliente')");
			$result->execute();
			return $result;
		}
		catch(PDOException $e){
			$dato= "¡Error!:insertar " . $e->getMessage() . "<br/>";
			 echo $dato;
			 die();
		 }
     }

     
	 static function nuevaLinea($link)
     {
         try {
             $consulta = $link->prepare("SELECT count(*) FROM pedidos");
             $consulta->execute();
             return $consulta->fetchColumn()+1;
             
         } catch (PDOException $e) {
             $dato = "¡Error!: insertar" . $e->getMessage() . "<br/>";
             echo $dato;
             die();
         }
     }


     function __get($var)
	{
		return $this->$var;
	}
 
}