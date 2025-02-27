<?php
require "../vistas/inicio.php";
require "../vistas/nav.php";

$idProducto = $_GET['idProducto']??1;
//obtengo los datos del servico
$resultado= json_decode(file_get_contents("http://localhost/IbañezRosalenMaria_Proyect1T/api/servicioProducto/producto.php?idProducto=$idProducto"),true);

require "../vistas/detalle.php";



require "../vistas/footeryfin.php";