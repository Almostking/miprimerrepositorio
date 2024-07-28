<?php

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<p>El carrito está vacío.</p>";
} else {
    echo "<ul>";
    foreach ($_SESSION['cart'] as $item) {
        echo "<li>{$item['destino']} - {$item['fecha']}</li>";
    }
    echo "</ul>";
}
?>
