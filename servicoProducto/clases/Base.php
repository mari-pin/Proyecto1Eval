<<<<<<< HEAD
<?php

include __DIR__ . "/../config/config.php";

class Base{
    private $link;

    function __construct(){
        try {
         /*    echo "Host: " . HOST . "<br>";
            echo "Base: " . BASE . "<br>";
            echo "Usuario: " . USUARIO . "<br>";
            echo "Pass: " . PASS . "<br>"; */
            $this-> link = new PDO("mysql:host=".HOST.";dbname=".BASE, USUARIO, PASS, OPCIONES);
        
        } catch(PDOException $e){
			$dato= "¡Error!: " . $e->getMessage() . "<br/>";
            require __DIR__ . "/../../vistas/mensaje.php"; 
            die();
		}
 		
    }

    function __get($var){
        return $this->$var;
    }
=======
<?php

include __DIR__ . "/../config/config.php";

class Base{
    private $link;

    function __construct(){
        try {
         /*    echo "Host: " . HOST . "<br>";
            echo "Base: " . BASE . "<br>";
            echo "Usuario: " . USUARIO . "<br>";
            echo "Pass: " . PASS . "<br>"; */
            $this-> link = new PDO("mysql:host=".HOST.";dbname=".BASE, USUARIO, PASS, OPCIONES);
        
        } catch(PDOException $e){
			$dato= "¡Error!: " . $e->getMessage() . "<br/>";
            require __DIR__ . "/../../vistas/mensaje.php"; 
            die();
		}
 		
    }

    function __get($var){
        return $this->$var;
    }
>>>>>>> 2da4c6c02739034c040714be351d5dd8cdf17326
}