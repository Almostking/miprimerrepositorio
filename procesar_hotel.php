<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'conexion.php';

try {
    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];
    $habitaciones_disponibles = $_POST['habitaciones_disponibles'];
    $tarifa_noche = $_POST['tarifa_noche'];

    $stmt = $conn->prepare("INSERT INTO id_hotel (nombre, ubicacion, habitaciones_disponibles, tarifa_noche) VALUES (:nombre, :ubicacion, :habitaciones_disponibles, :tarifa_noche)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':ubicacion', $ubicacion);
    $stmt->bindParam(':habitaciones_disponibles', $habitaciones_disponibles);
    $stmt->bindParam(':tarifa_noche', $tarifa_noche);
    $stmt->execute();

    echo "Hotel agregado exitosamente";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
