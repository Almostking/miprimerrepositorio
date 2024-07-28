<?php
session_start();
$data = json_decode(file_get_contents('php://input'), true);

$destino = $data['destino'];
$fecha = $data['fecha'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$_SESSION['cart'][] = [
    'destino' => $destino,
    'fecha' => $fecha
];

echo "Paquete agregado al carrito: $destino - $fecha";
?>
