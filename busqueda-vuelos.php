<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Configuración de la base de datos
$host = 'localhost';
$db = 'agencia';
$user = 'root';
$pass = '';

$conexion = new mysqli($host, $user, $pass, $db);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Función para buscar vuelos
function buscarVuelos($origen, $destino, $fecha) {
    global $conexion;
    $query = "SELECT * FROM vuelos WHERE origen = ? AND destino = ? AND fecha = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("sss", $origen, $destino, $fecha);
    $stmt->execute();
    return $stmt->get_result();
}

//función buscarVuelos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $fecha = $_POST['fecha'];

    $resultados = buscarVuelos($origen, $destino, $fecha);

    if ($resultados->num_rows > 0) {
        while ($row = $resultados->fetch_assoc()) {
            echo "Vuelo encontrado: " . $row['vuelo_id'] . " - " . $row['aerolinea'] . "<br>";
        }
    } else {
        echo "No se encontraron vuelos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vuelosstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Búsqueda de Vuelos</title>
</head>
<body>
    <div class="container">
        <h2>Buscar Vuelos</h2>
        <form method="post" action="vuelos.php">
            <div class="mb-3">
                <label for="origen" class="form-label">Origen:</label>
                <input type="text" id="origen" name="origen" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="destino" class="form-label">Destino:</label>
                <input type="text" id="destino" name="destino" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" id="fecha" name="fecha" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success custom-btn">Buscar</button>
        </form>
    </div>
</body>
</html>
