<?php
class Carrito{

    private $idCarrito;
    private $idProducto;
    private $nlinea;
    private $cantidad;
    private $precioUnidad;
    private $precioTotal;



    public function __construct($idCarrito, $idProducto, $nlinea, $cantidad, $precioUnidad, $precioTotal){
        $this->idCarrito = $idCarrito;
        $this->idProducto = $idProducto;
        $this->nlinea = $nlinea;
        $this->cantidad = $cantidad;
        $this->precioUnidad = $precioUnidad;
        $this->precioTotal = $precioTotal;
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
    static function getall($link){
        try{
            $consulta = $link->prepare("SELECT * FROM carrito");
            $consulta->execute();
            return $consulta;
        }
        catch(PDOException $e){
            $dato= "¡Error!: " . $e->getMessage() . "<br/>";
            require "vistas/mensaje.php";
            die();

            
        }
    }

}