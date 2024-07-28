<?php

include 'FiltroViaje.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreHotel = $_POST['nombreHotel'];
    $ciudad = $_POST['ciudad'];
    $pais = $_POST['pais'];
    $fechaViaje = $_POST['fechaViaje'];
    $duracion = $_POST['duracion'];

    $nuevoFiltro = new FiltroViaje($nombreHotel, $ciudad, $pais, $fechaViaje, $duracion);

    echo "<h2>Intención de Viaje Registrada:</h2>";
    echo $nuevoFiltro->mostrarFiltro();
    
}

?>
    <link rel="stylesheet" href="registro-styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>