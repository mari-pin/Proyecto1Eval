<?php
require "../vistas/inicio.php";
require "../vistas/nav.php";


if (isset($_GET['eliminar'])) {
    file_get_contents('http://localhost/IbañezRosalenMaria_Proyect1T/api/servicioCarrito/carrito.php?eliminar&dniCliente='. $_SESSION['dniCliente'] . '&idProducto=' . $_GET['idProducto']);



    header('Location:carrito.php');
} 

if (isset($_POST['enviar'])) {


    $datos = [
        'idProducto' => $_POST['idProducto'],
        'cantidad' => $_POST['cantidad'],
        'precioUnidad' => $_POST['precio'],
        'dniCliente' => $_SESSION['dniCliente']
    ];

    $jsonDatos = json_encode($datos);

    $url = 'http://localhost/IbañezRosalenMaria_Proyect1T/api/servicioCarrito/carrito.php';

    // Inicializar cURL
    $ch = curl_init($url);

    // Configurar opciones de la petición
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDatos);

    // Ejecutar la petición
    $resultado = curl_exec($ch);
    echo curl_getinfo($ch, CURLINFO_HTTP_CODE);
    // Comprobar si hubo errores
    if (curl_errno($ch)) {
        echo 'Error en cURL: ' . curl_error($ch);
    }

    // Cerrar la conexión
    curl_close($ch);

    //echo $resultado;
    header('Location:carrito.php');
} elseif (isset($_POST['actualizar'])) {
    //var_dump($_POST);
    $datos =  file_get_contents('http://localhost/IbañezRosalenMaria_Proyect1T/api/servicioCarrito/carrito.php?dniCliente=' . $_SESSION['dniCliente']);
    $lineas = json_decode($datos, true);
    foreach ($lineas as $linea) {
        $dato =  $_POST[$linea['idProducto']];
        if ($dato !== $linea['cantidad']) {
           // echo $linea['idProducto'];
            $datos = [
                'actualizar'=>'',
                'idProducto' => $linea['idProducto'],
                'cantidad' => $dato,
                'dniCliente' => $_SESSION['dniCliente']
            ];

            $jsonDatos = json_encode($datos);

            $url = 'http://localhost/IbañezRosalenMaria_Proyect1T/api/servicioCarrito/carrito.php';

            // Inicializar cURL
            $ch = curl_init($url);

            // Configurar opciones de la petición
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDatos);

            // Ejecutar la petición
            $resultado = curl_exec($ch);
            // Cerrar la conexión
            curl_close($ch);

            // echo $resultado;
            header('Location:carrito.php');
        }
    }
}else {
    $datos =  file_get_contents('http://localhost/IbañezRosalenMaria_Proyect1T/api/servicioCarrito/carrito.php?dniCliente=' . $_SESSION['dniCliente']);
    $lineas = json_decode($datos, true);
  
    require '../vistas/carrito.php';
}



include "../vistas/footeryfin.php";
