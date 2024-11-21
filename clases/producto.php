<?php
class producto{
    static function getAll($link){
        try {
            $consulta = $link->prepare("SELECT * FROM productos");
            $consulta->execute();
            return $consulta;
        }catch(PDOException $e){
            $dato= "¡Error!: " . $e->getMessage() . "<br/>";
            require "vistas/mensaje.php";
            die();
        }
    }
}