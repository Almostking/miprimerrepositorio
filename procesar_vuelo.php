<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'conexion.php';

try {
    // Obtén los datos del formulario
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $fecha = $_POST['fecha'];
    $plazas_disponibles = $_POST['plazas_disponibles'];
    $precio = $_POST['precio'];

    // Prepara la consulta SQL para insertar un vuelo en la base de datos
    $stmt = $conn->prepare("INSERT INTO vuelo (origen, destino, fecha, plazas_disponibles, precio) VALUES (:origen, :destino, :fecha, :plazas_disponibles, :precio)");
    $stmt->bindParam(':origen', $origen);
    $stmt->bindParam(':destino', $destino);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':plazas_disponibles', $plazas_disponibles);
    $stmt->bindParam(':precio', $precio);
    $stmt->execute(); // Ejecuta la consulta preparada

    echo "Vuelo registrado exitosamente"; // Mensaje de éxito si la inserción fue exitosa
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage(); // Manejo de errores si ocurre algún problema
}
?>
