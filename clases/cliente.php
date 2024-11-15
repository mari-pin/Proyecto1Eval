<?php

class Cliente{
    private $idCliente;
    private $nombre; 
    private $direccion;
    private $email;
    private $pwd;

    function __construct($idCliente, $nombre, $direccion, $email, $pwd){
        $this->idCliente = $idCliente;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->email = $email;
        $this->pwd = $pwd;

    }


    static function getAll($link){
        try{
            $consulta = "SELECT * FROM clientes";
            $result = $link->prepare($consulta);
            $result->execute();
            return $result;
        }catch(PDOException $e){
            $dato= "¡Error!: " . $e->getMessage() . "<br/>";
             require "../vistas/mensaje.php";
             die();
         }
    }


    function buscar($link){
        try{
            $consulta="SELECT * FROM clientes where idCliente='$this->idCliente'";
            $result=$link->prepare($consulta);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
            
        }catch(PDOException $e){
            $dato= "¡Error!: " . $e->getMessage() . "<br/>";
             require "../vistas/mensaje.php";
             die();
         }
    }

    function validar($link){
        try {
        $cli = $this->buscar($link);
        if(password_verify($this->pwd,$cli['pwd'])){
            return $cli;
        }else{
            return false;
        }   
    }catch(PDOException $e){
        $dato= "¡Error!: " . $e->getMessage() . "<br/>";
         require "../vistas/mensaje.php";
         die();
     }
    }



    function insertar($link){
        try{
            $consulta = "INSERT INTO clientes VALUES (:idCliente, :nombre, :direccion, :email, :pwd)";
            $result = $link->prepare($consulta);
            $result->bindParam(':idCliente', $idCliente);
            $result->bindParam(':nombre', $nombre);
            $result->bindParam(':direccion', $direccion);
            $result->bindParam(':email', $email);
            $result->bindParam(':pwd', $pwd);
    
            $idCliente = $this->idCliente;
            $nombre = $this->nombre;
            $direccion = $this->direccion;
            $email = $this->email;
            $pwd = password_hash($this->pwd, PASSWORD_DEFAULT);
            $result->execute();
            return $result;

        }catch(PDOException $e){
        $dato= "¡Error!: " . $e->getMessage() . "<br/>";
         require "../vistas/mensaje.php";
         die();
     }
      
    }

    function modificar($link){
        try {
            $consulta="UPDATE clientes SET nombre='$this->nombre',  direccion='$this->direccion',  email='$this->email', pwd='$this->pwd' WHERE idCliente='$this->idCliente'";
            $result=$link->prepare($consulta);
            return $result->execute();

            
        }catch(PDOException $e){
            $dato= "¡Error!: " . $e->getMessage() . "<br/>";
             require "../vistas/mensaje.php";
             die();
         }
    }
    function borrar ($link){
        try{
            $consulta="DELETE FROM clientes where idCliente='$this->idCliente'";
            $result=$link->prepare($consulta);
            return $result->execute();
        }
        catch(PDOException $e){
            $dato= "¡Error!: " . $e->getMessage() . "<br/>";
             require "../vistas/mensaje.php";
             die();
         }
    }
    function __get($var){
        return $this->$var;
    }

}

