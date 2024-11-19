<?php
include __DIR__ . "/config/config.php";

try {
    $link = new PDO("mysql:host=" . HOST . ";dbname=" . BASE, USUARIO, PASS, OPCIONES);
    echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "¡Error!: " . $e->getMessage();
}
?>