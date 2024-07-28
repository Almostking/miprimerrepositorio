<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" form-styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Registro de Intención de Viaje</title>
</head>
<body>
    <div class="form-container">
        <form action="registro.php" method="POST">
            <label for="nombreHotel">Nombre del Hotel:</label>
            <input type="text" id="nombreHotel" name="nombreHotel" required>
            <label for="ciudad">Ciudad:</label>
            <input type="text" id="ciudad" name="ciudad" required>
            <label for="pais">País:</label>
            <input type="text" id="pais" name="pais" required>
            <label for="fechaViaje">Fecha de Viaje:</label>
            <input type="date" id="fechaViaje" name="fechaViaje" required>
            <label for="duracion">Duración (días):</label>
            <input type="number" id="duracion" name="duracion" required>
            <button type="submit">Registrar Intención de Viaje</button>
        </form>
    </div>

</body>
</html>
