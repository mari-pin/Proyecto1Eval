<?php
class Linea 
	{
		private $idPedido;
		private $idProducto;
        private $nlinea;	
		private $cantidad;
        
		
		public function __construct($idPedido, $idProducto, $nlinea,$cantidad, ){
			$this->idPedido = $idPedido;
            $this->idProducto = $idProducto;
            $this->nlinea = $nlinea;
			$this->cantidad = $cantidad;
       
			
		}
		/* public function guardar(){
			$indice=$_SESSION['linea'];
			$_SESSION['nlinea'][$indice]=$this->nlinea;
			$_SESSION['idProducto'][$indice]=$this->idProducto;
			$_SESSION['cantidad'][$indice]=$this->cantidad;
		} */
		
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
		static function getall($link){
			try{
				$consulta = $link->prepare("SELECT * FROM lineaspedidos");
				$consulta->execute();
				return $consulta;
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
				require "vistas/mensaje.php";
				die();
			}
		}
		function InsertarTodas($link){
			try{
				$consulta = $link->prepare("INSERT into lineaspedidos (idPedido, nlinea, idProducto, cantidad) values (:idPedido,:nlinea,:idProducto, :cantidad)");
				$consulta->bindParam(':idPedido',$idPedido);
                $consulta->bindParam(':idProducto',$idProducto);
				$consulta->bindParam(':nlinea',$nlinea);
				$consulta->bindParam(':cantidad',$cantidad);

                $idPedido=$this->idPedido;
                $idProducto = $this->idProducto;
                $nlinea = $this->nlinea;
                $cantidad = $this->cantidad;
                $consulta->execute();
					return $consulta;
				}
				
				
				
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
				require "vistas/mensaje.php";
				die();
			}
		}

        function borrar ($link){
			try{
				$consulta="DELETE FROM carrito where idPedido = '$this->idPedido' and  nlinea='$this->nlinea'";
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
