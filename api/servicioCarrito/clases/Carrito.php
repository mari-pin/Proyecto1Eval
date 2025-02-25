<?php
class Carrito
{
	private $idCarrito;
	private $idProducto;
	private $cantidad;
	private $precioUnidad;
	private $precioTotal;
	private $dniCliente;


	public function __construct($idCarrito, $idProducto, $cantidad, $precioUnidad, $precioTotal, $dniCliente)
	{
		$this->idPedido = $idCarrito;
		$this->idProducto = $idProducto;	
		$this->cantidad = $cantidad;
		$this->precioUnidad = $precioUnidad;
		$this->precioTotal = $precioTotal;
		$this->dniCliente = $dniCliente;
	}


	function Buscar($link)
	{
		try {
			$consulta = $link->prepare("SELECT * FROM carrito where dniCliente = '$this->dniCliente'");
			$consulta->execute();
			return $consulta;
		} catch (PDOException $e) {
			$dato = "¡Error!: buscar" . $e->getMessage() . "<br/>";
			echo $dato;
			die();
		}
	}
	function Insertar($link)
	{
		try {
			$consulta = $link->prepare("SELECT count(*) FROM carrito where dniCliente = '$this->dniCliente'");
			$consulta->execute();
			$nlinea = $consulta->fetchColumn() + 1;

			/* $consulta = $link->prepare("INSERT into carrito (idCarrito, idProducto, nlinea, cantidad, precioUnidad, precioTotal, dniCliente) values ('$this->idCarrito','$this->idProducto', '$nlinea', '$this->cantidad', '$this->precioUnidad', '$this->precioTotal','$this->dniCliente')");
			$consulta->execute();
		 */
		} catch (PDOException $e) {
			$dato = "¡Error!: insertar" . $e->getMessage() . "<br/>";
			echo $dato;
			die();
		}
	}
	function borrar($link)
	{
		try {
			if ($this->idProducto !== 0 ){
				$consulta = "DELETE FROM carrito where dniCliente = '$this->dniCliente'and idProducto ='$this->idProducto'";
			} else {
				$consulta = "DELETE FROM carrito where dniCliente = '$this->dniCliente'";
			}
			$result = $link->prepare($consulta);
			return $result->execute();
		} catch (PDOException $e) {
			$dato = "¡Error!: " . $e->getMessage() . "<br/>";
			echo $dato;
			die();
		}
	}
	function modificar($link)
	{
		try {
			$consulta = "UPDATE carrito SET cantidad='$this->cantidad' WHERE idProducto='$this->idProducto' and dniCliente = '$this->dniCliente'";
			$result = $link->prepare($consulta);
			return $result->execute();
		} catch (PDOException $e) {
			$dato = "¡Error!:modificar " . $e->getMessage() . "<br/>";
			echo $dato;
			die();
		}
	}

	function __get($var)
	{
		return $this->$var;
	}

	function __set($var, $value)
	{
		$this->$var = $value;
	}

	
}
