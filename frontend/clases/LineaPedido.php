<?php

class LineaPedido{
    private $idPedido;
    private $nlinea;
    private $idProducto;
    private $cantidad;
    private $precioProducto ;
    private $nombreProducto;
    private $precioTotal;



    function __construct($idPedido, $idProducto, $cantidad, $precioProducto, $nombreProducto){
        $this->idPedido = $idPedido;
       
        $this->idProducto = $idProducto;
        $this->cantidad = $cantidad;
        $this->precioProducto = $precioProducto;
        $this->nombreProducto = $nombreProducto;
        $this->precioTotal = $precioProducto * $cantidad;
    }

    function __get($var)
	{
		return $this->$var;
	}


    private function nuevaLinea($link)
    {
        try {
            $consulta = $link->prepare("SELECT count(*) FROM lineaspedidos WHERE idPedido = '$this->idPedido'");
            $consulta->execute();
            return $consulta->fetchColumn()+1;
            
        } catch (PDOException $e) {
            $dato = "¡Error!: insertar" . $e->getMessage() . "<br/>";
            echo $dato;
            die();
        }
    }


        
     function insertar($link){
        $this->nlinea = $this->nuevaLinea($link);
        try {
          
            $result=$link->prepare("INSERT INTO `lineaspedidos` (`idPedido`, `nlinea`, `idProducto`, `cantidad`, `precioProducto`, `nombreProducto`, `precioTotal`) VALUES ('$this->idPedido', '$this->nlinea', '$this->idProducto', '$this->cantidad', '$this->precioProducto', '$this->nombreProducto', '$this->precioTotal')");
			$result->execute();
			return $result;
		}
		catch(PDOException $e){
			$dato= "¡Error!: " . $e->getMessage() . "<br/>";
			 echo $dato;
			 die();
		 }
     }
    
}