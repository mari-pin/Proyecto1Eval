<?php
require "../vistas/inicio.php";
require "../vistas/nav.php";


//obtengo los datos del servicio
$resultado= json_decode(file_get_contents("http://localhost/IbañezRosalenMaria_Proyect1T/api/servicioProducto/producto.php"),true);



require "../vistas/productos.php";

  
require "../vistas/footeryfin.php";