<?php
// Configuración segura de la sesión
ini_set('session.cookie_secure', 1);
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);

// Aumentar tiempo de vida de la sesión
ini_set('session.gc_maxlifetime', 3600); // 1 hora

session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header('Location: index.php'); // Redirigir al inicio de sesión si no está autenticado
    exit();
}

// Simulación de notificaciones al acceder a la página
$notificaciones = [
    'Oferta especial para Paris!',
    'Descuento del 10% en vuelos a Tokio!',
    'Nuevos paquetes disponibles para Nueva York!'
];
$notificacionAleatoria = $notificaciones[array_rand($notificaciones)];

// Simulación de paquetes turísticos disponibles
$paquetes = [
    ["destino" => "Paris", "fecha" => "2024-07-10"],
    ["destino" => "Tokio", "fecha" => "2024-08-15"],
    ["destino" => "Nueva York", "fecha" => "2024-09-20"],
    ["destino" => "Londres", "fecha" => "2024-10-05"],
    ["destino" => "Roma", "fecha" => "2024-11-25"],
];

// Regenerar ID de sesión
session_regenerate_id(true);

function generarNotificacion($mensaje) {
    echo "<div class='notification'>{$mensaje}</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="search-styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Agencia de Viajes</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>Bienvenido al Dashboard</h1>
        </header>
        <div class="search-container">
            <input type="text" id="destination" placeholder="Destino">
            <input type="date" id="travel-date">
            <button onclick="search()">Buscar</button>
            <a href="form.php"><button>Registrar Viaje</button></a>
        </div>
        <div id="results-container">
            <!-- Los resultados de la búsqueda se mostrarán aquí -->
        </div>
        <div id="notifications-container">
            <?php generarNotificacion($notificacionAleatoria); ?>
        </div>
        <div id="package-list">
            <h2>Paquetes Turísticos Disponibles</h2>
            <ul>
                <?php foreach ($paquetes as $paquete): ?>
                    <li>
                        <?php echo "{$paquete['destino']} - {$paquete['fecha']}"; ?>
                        <button onclick="addToCart('<?php echo $paquete['destino']; ?>', '<?php echo $paquete['fecha']; ?>')">Agregar al Carrito</button>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <a href="cart.php" class="btn btn-success custom-btn">Ir al Carrito</a>
        <a href="form_hotel.html" class="btn btn-success custom-btn">Registrar Hotel</a>
        <a href="form_vuelo.html" class="btn btn-success custom-btn">Registrar Vuelo</a>
    </div>

    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p id="modal-text"></p>
        </div>
    </div>

    <script>
        const paquetes = <?php echo json_encode($paquetes); ?>;

        function addToCart(destino, fecha) {
            fetch('add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ destino, fecha })
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
            });
        }
    </script>
    <script src="search.js"></script>
</body>
</html>
