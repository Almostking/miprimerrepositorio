<?php

session_start(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="search-styles.css"> <!-- Estilos generales -->
    <link rel="stylesheet" href="cart-styles.css"> <!-- Estilos específicos para cart.php -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Carrito de Compra</title>
</head>
<body>
    <h1>Carrito de Compra de Paquetes Turísticos</h1>
    <div id="cart-container">
        <?php include 'show_cart.php'; ?>
    </div>
    <a href="dashboard.php" class="btn btn-success">Volver a la Página Principal</a> <!-- Botón con estilo verde -->
</body>
</html>