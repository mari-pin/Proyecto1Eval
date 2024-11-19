<?php
session_start();
include __DIR__ . "/config/autoload.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['pwd'];

    $base = new Base();
    $cli = new Cliente(); 

    try {
        // Validar cliente
        $resultado = $cli->validar($email, $pass);


        if ($resultado) {
            // Crear sesiones
            $_SESSION['email'] = $resultado['email'];
            $_SESSION['pwd'] = $resultado['pwd'];
            $_SESSION['nombre'] = $resultado['nombre'];
           
            // Comprobar si existe la variable de sesión idUnico
            if (!isset($_SESSION['idUnico'])) {
                $_SESSION['idUnico'] = uniqid();
                $idUnico = $_SESSION['idUnico'];
                $nombre = $_SESSION['nombre'];
                
            }
             // suludar al usuario
             $mensaje = "Hola, " . $_SESSION['nombre'];
             echo "<script>alert('$mensaje');</script>";

            // Redirigir a inicio
            header("Location:../vistas/index2.html");
            exit();
            
        } else {
           echo "el cliente no existe. Debes registrarte";
            header("Location: ../vistas/registro.html");
            exit();
           
        }
    } catch (Exception $e) {
        echo "¡Error!: " . $e->getMessage();
        die();
    }
} else {
    echo "Error: vuelva a intentarlo";
}


