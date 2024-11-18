<?php
include __DIR__ . "/config/autoload.php";

$base = new Base();

try {
    // Aquí puedes agregar la lógica para confirmar el pedido, como guardar los datos en la base de datos
    echo "Pedido confirmado exitosamente.";
} catch (PDOException $e) {
    echo "¡Error!: " . $e->getMessage();
    die();
}
?>