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


	function Existe($link)
	{
		try {
			$consulta = $link->prepare("SELECT * FROM carrito where idCarrito='$this->idCarrito'");
			$consulta->execute();
			return $consulta->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			$dato = "¡Error!: " . $e->getMessage() . "<br/>";
			echo $dato;
			die();
		}
	}
	function Insertar($link)
	{
		try {
			$consulta = $link->prepare("SELECT count(*) FROM where dniCliente = '$this->dniCliente");
			$consulta->execute();
			$nlinea = $consulta->fetchColumn() + 1;

			$consulta = $link->prepare("INSERT into carrito (idCarrito, idProducto, nlinea, cantidad, precioUnidad, precioTotal, dniCliente) values ('$this->idcarrito','$this->idProducto', '$nlinea', '$this->cantidad', '$this->precioUnidad', '$this->precioTotal','$this->dniCliente')");
			$consulta->execute();
		
		} catch (PDOException $e) {
			$dato = "¡Error!: " . $e->getMessage() . "<br/>";
			echo $dato;
			die();
		}
	}
	function borrar($link)
	{
		try {
			if ($this->idProducto) {
				$consulta = "DELETE FROM carrito where idCarrito = '$this->idcarrito'and idProducto ='$this->idProducto";
			} else {
				$consulta = "DELETE FROM carrito where idCarrito = '$this->idcarrito'";
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
			$consulta = "UPDATE carrito SET cantidad='$this->catidad' WHERE idCarrito='$this->idCarrito'";
			$result = $link->prepare($consulta);
			return $result->execute();
		} catch (PDOException $e) {
			$dato = "¡Error!: " . $e->getMessage() . "<br/>";
			echo $dato;
			die();
		}
	}

	function getAll($link)
	{
		try {
			$consulta = "SELECT * FROM carrito where dniCliente = '$this->dniCliente";
			$result = $link->prepare($consulta);
			return $result->execute();
		} catch (PDOException $e) {
			$dato = "¡Error!: " . $e->getMessage() . "<br/>";
			echo $dato;
			die();
		}
	}
}
