<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agencia";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Registrar 10 reservas
    for ($i = 1; $i <= 10; $i++) {
        $id_cliente = rand(1, 10);  // Asumimos que hay clientes con IDs del 1 al 10
        $fecha_reserva = date('Y-m-d');
        $id_vuelo = rand(1, 3);  // Asumimos que hay 3 vuelos registrados
        $id_hotel = rand(1, 3);  // Asumimos que hay 3 hoteles registrados

        $stmt = $conn->prepare("INSERT INTO reserva (id_cliente, fecha_reserva, id_vuelo, id_hotel) VALUES (:id_cliente, :fecha_reserva, :id_vuelo, :id_hotel)");
        $stmt->bindParam(':id_cliente', $id_cliente);
        $stmt->bindParam(':fecha_reserva', $fecha_reserva);
        $stmt->bindParam(':id_vuelo', $id_vuelo);
        $stmt->bindParam(':id_hotel', $id_hotel);
        $stmt->execute();
    }

    echo "Reservas registradas exitosamente.<br>";

    // Mostrar contenido de la tabla RESERVA
    $stmt = $conn->query("SELECT * FROM reserva");
    $reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h2>Reservas</h2>";
    echo "<table class='table'>";
    echo "<thead><tr><th>ID Reserva</th><th>ID Cliente</th><th>Fecha Reserva</th><th>ID Vuelo</th><th>ID Hotel</th></tr></thead><tbody>";
    foreach ($reservas as $reserva) {
        echo "<tr><td>{$reserva['id_reserva']}</td><td>{$reserva['id_cliente']}</td><td>{$reserva['fecha_reserva']}</td><td>{$reserva['id_vuelo']}</td><td>{$reserva['id_hotel']}</td></tr>";
    }
    echo "</tbody></table>";

    // Consulta avanzada: hoteles con más de 2 reservas
    $stmt = $conn->query("SELECT id_hotel.nombre, COUNT(reserva.id_reserva) AS total_reservas FROM hotel INNER JOIN reserva ON id_hotel.id_hotel = reserva.id_hotel GROUP BY id_hotel.id_hotel HAVING COUNT(reserva.id_reserva) > 2");
    $hoteles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h2>Hoteles con más de 2 reservas</h2>";
    echo "<table class='table'>";
    echo "<thead><tr><th>Nombre del Hotel</th><th>Total de Reservas</th></tr></thead><tbody>";
    foreach ($hoteles as $hotel) {
        echo "<tr><td>{$hotel['nombre']}</td><td>{$hotel['total_reservas']}</td></tr>";
    }
    echo "</tbody></table>";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
