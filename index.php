<?php

if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('Location: ' . $redirect);
    exit();
}

// Configuración segura de la sesión
ini_set('session.cookie_secure', 1);
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);

// Aumentar tiempo de vida de la sesión
ini_set('session.gc_maxlifetime', 3600); // 1 hora
session_set_cookie_params(3600);

session_start(); // Iniciar la sesión al principio del script

if (!isset($_SESSION['initiated'])) {
    session_regenerate_id();
    $_SESSION['initiated'] = true;
}

// Función para guardar un nuevo usuario (normalmente se usaría una base de datos)
function guardarUsuario($username, $password) {
    // Hash de la contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Simulación de almacenamiento en una base de datos o archivo
    $_SESSION['usuarios'][$username] = $hashedPassword;
}

// Verificar si se ha enviado el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Guardar el usuario (simulado aquí)
    if (!isset($_SESSION['usuarios'][$username])) {
        guardarUsuario($username, $password);
        $registroExitoso = "Usuario registrado correctamente. Ahora puedes iniciar sesión.";
    } else {
        $errorRegistro = "El nombre de usuario ya existe. Por favor elige otro.";
    }
}

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar si el usuario existe y la contraseña coincide (simulado aquí)
    if (isset($_SESSION['usuarios'][$username]) && password_verify($password, $_SESSION['usuarios'][$username])) {
        // Iniciar sesión
        $_SESSION['username'] = $username;
        header('Location: dashboard.php'); // Redirigir al dashboard o página protegida
        exit();
    } else {
        $errorLogin = "Nombre de usuario o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Autenticación de Usuario</title>
</head>
<body>
    <div class="container">
        <h2>Registro de Usuario</h2>
        <?php if(isset($registroExitoso)) echo "<div class='alert alert-success'>$registroExitoso</div>"; ?>
        <?php if(isset($errorRegistro)) echo "<div class='alert alert-danger'>$errorRegistro</div>"; ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="mb-3">
                <label for="username" class="form-label">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" class="form-control green-input" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" id="password" name="password" class="form-control green-input" required>
            </div>
            <button type="submit" name="register" class="green-button">Registrar</button>
        </form>
        
        <h2>Iniciar Sesión</h2>
        <?php if(isset($errorLogin)) echo "<div class='alert alert-danger text-center'>$errorLogin</div>"; ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="mb-3">
                <label for="username" class="form-label">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" class="form-control green-input" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" id="password" name="password" class="form-control green-input" required>
            </div>
            <button type="submit" name="login" class="green-button">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
