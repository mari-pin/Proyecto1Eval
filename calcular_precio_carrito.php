<?php
function calcularTotal($cantidad, $precio) {
    return $cantidad * $precio;
}

// Ejemplo de datos del carrito (esto normalmente vendría de una base de datos)
$carrito = [
    ['producto' => 'Bombón de Chocolate Puro', 'cantidad' => 1, 'precio' => 5.00],
    ['producto' => 'Trufa de Chocolate Blanco', 'cantidad' => 2, 'precio' => 3.50],
    // Añade más productos aquí
];
?>