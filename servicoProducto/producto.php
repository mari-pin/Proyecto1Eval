<?php
/* Se implementará un servicio para obtener los productos de la base de datos, por tanto,
solo tendrá contemplado el método GET. De manera que si se le pasa un idProducto
devuelve ese producto y sino devolverá todos los productos. Siempre que necesitemos
algún producto se usará el servicio.
Un servicio para validación y registro de clientes, que se usará en DWC.LOS ALUMNOS QUE
SOLO TIENEN DWS LO HARÁN, pero solo lo probarán con thunder Client
Otro servicio para la gestión total del carrito (también la haréis en el lado cliente)
El intercambio de información será en formato json. (LOS ALUMNOS QUE SOLO TIENEN DWS LO
HARÁN EN PHP SIN SERVICIOS)
Los servicios se crearán cada uno en una carpeta dentro de la carpeta principal del proyecto, y
dentro de esta carpeta tendrán la misma estructura de carpetas que cualquier aplicación (con las
carpetas clases, config, controladores …). */


require  __DIR__."/config/autoload.php";


$base = new Base();

if($_SERVER['REQUEST_METHOD'] === 'GET'){
   

    if(isset($_GET['idProducto'])){
        echo "hola";
        $producto = new Producto($_GET['idProducto']);
        $dato = $producto->buscar($base->link);
        header("HTTP/1.1 200 OK");
        echo json_encode($dato);
        exit();
    }else{
        $dato = Producto::getAll($base->link);
        $dato->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode($dato->fetchAll());
        exit();
    }
      
}

//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");