<?php
	class Carrito
	{
		private $idCarrito;
		private $idProducto;
        private $nlinea;
        private $cantidad;
        private $precioUnidad;
        private $precioTotal;
		private $dniCliente;
		
		
		public function __construct($idCarrito,$idProducto, $nlinea, $cantidad,$precioUnidad, $precioTotal, $dniCliente){
			$this->idPedido = $idCarrito;
            $this->idProducto = $idProducto;
            $this->nlinea = $nlinea;
            $this-> cantidad = $cantidad;
            $this-> precioUnidad = $precioUnidad;
            $this-> precioTotal= $precioTotal;
			$this->dniCliente = $dniCliente;
			
		}
		public function guardar(){
            if(isset($_SESSION['idCarrito'])){
                $_SESSION['idCarrito'] = $this->idCarrito;
                $_SESSION['dniCliente']=$this->dniCliente;
                
            }else{
                $_SESSION['idCarrito'] = uniqid();
                $_SESSION['dniCliente'] = $this->dniCliente;

            }
			
			
			
		}
		
		public function __set($propiedad, $var){
			if(property_exists(__CLASS__, $propiedad)){
				$this->$propiedad = $var;
			}
		}
		public function __get($propiedad){
			if(property_exists(__CLASS__, $propiedad)){
				return $this->$propiedad;
			}
		}
		function Existe($link){
			try{
				$consulta = $link->prepare("SELECT * FROM carrito where idCarrito='$this->idCarrito'");
				$consulta->execute();
				return $consulta->fetch(PDO::FETCH_ASSOC);
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
				require "vistas/mensaje.php";
				die();
			}
		}
		function Insertar($link){
			try{
				$consulta = $link->prepare("INSERT into carrito (idCarrito, idProducto, nlinea, cantidad, precioUnidad, precioTotal, dniCliente) values ('$this->idcarrito','$this->idProducto', '$this->nlinea', '$this->cantidad', '$this->precioUnidad', '$this->precioTotal','$this->dniCliente')");
				$consulta->execute();
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
				require "vistas/mensaje.php";
				die();
			}
		}
        function borrar ($link){
			try{
				$consulta="DELETE FROM carrito where idCarrito = '$this->idcarrito'";
				$result=$link->prepare($consulta);
				return $result->execute();
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "../vistas/mensaje.php";
 				die();
 			}
		}
        function modificar ($link){
			try{
				$consulta="UPDATE carrito SET cantidad='$this->catidad' WHERE idCarrito='$this->idCarrito'";
				$result=$link->prepare($consulta);
				return $result->execute();
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "../vistas/mensaje.php";
 				die();
 			}
		}
	}
