<?php

class Cliente{
    private $dniCliente;
    private $nombre; 
    private $direccion;
    private $email;
    private $pwd;

    function __construct($dniCliente = "", $nombre = "", $direccion = "", $email = "", $pwd = ""){
        $this->dniCliente = $dniCliente;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->email = $email;
        $this->pwd = $pwd;

    }


    function buscar($link){
        try{
            $consulta="SELECT * FROM clientes where dniCliente ='$this->dniCliente'";
            $result=$link->prepare($consulta);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
            
        }catch(PDOException $e){
            $dato= "¡Error!: " . $e->getMessage() . "<br/>";
             require "../vistas/mensaje.php";
             die();
         }
    }
    public function validar($link) {
        try {
            $cli = $this->buscar($link);
            if ($cli) {
                if (password_verify($this->pwd, $cli['pwd'])) {
                    return $cli;
                } else {
                    echo "Usuario o contraseña incorrectos. Comprueba tus datos o regístrate.";
                    return false;
                }
            } else {
                echo "Usuario no encontrado. Comprueba tus datos o regístrate.";
                return false;
            }
        } catch (PDOException $e) {
            echo "¡Error!: " . $e->getMessage() . "<br/>";
            return false;
        }
    }

/*     function validar($link){
        try {
            $cli = $this->buscar($link);
            if($cli){
                if(password_verify($this->pwd,$cli['pwd'])){
                    return $cli;
                }else{
                    echo "Usuario o contraseña incorrectos.Comprueba tus datos o registrate";
                    return false;
                }   
            }else{
                return false;
            }
       
      
    }catch(PDOException $e){
        $dato= "¡Error!: " . $e->getMessage() . "<br/>";
         require "../vistas/mensaje.php";
         die();
     }
    } */



    function insertar($link){
        try{
               
            $consulta = "INSERT INTO clientes VALUES (:dniCliente, :nombre, :direccion, :email, :pwd)";
            $result = $link->prepare($consulta);
            $result->bindParam(':idCliente', $dniCliente);
            $result->bindParam(':nombre', $nombre);
            $result->bindParam(':direccion', $direccion);
            $result->bindParam(':email', $email);
            $result->bindParam(':pwd', $pwd);
    
            $dniCliente = $this->dniCliente;
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
            $consulta="UPDATE clientes SET nombre='$this->nombre',  direccion='$this->direccion',  email='$this->email', pwd='$this->pwd' WHERE dniCliente='$this->dniCliente'";
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
            $consulta="DELETE FROM clientes where dniCliente='$this->dniCliente'";
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

