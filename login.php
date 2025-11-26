<?php
session_start();

// Lista simulada de usuarios (usuario => contraseña)
$usuarios = [
    "admin"   => "1234",
    "paco" => "paco"
];

// Si el usuario ya inició sesión, lo enviamos a bienvenida
if (isset($_SESSION["usuario"])) {
    header("Location: bienvenida.php");
    exit();
}

$errores = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST["usuario"] ?? "";
    $pass = $_POST["password"] ?? "";

    // Validar credenciales
    if (isset($usuarios[$user]) && $usuarios[$user] === $pass) {
        $_SESSION["usuario"] = $user;
        header("Location: bienvenida.php");
        exit();
    } else {
        // Credenciales incorrectas → redirigir a permisos.php
        header("Location: permisos.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1. Pantalla de Login</title>
    <!-- Incluir Bootstrap 5 CSS para el estilo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background-color: #f8f9fa; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
        }
        .card { 
            width: 100%; 
            max-width: 400px; 
            border-radius: 1rem;
        }
    </style>
</head>
<body>
    <div class="card shadow-lg p-3">
        <div class="card-body">
            <h1 class="card-title text-center text-primary mb-4">Iniciar Sesión</h1>
            
            <?php if (!empty($mensaje_error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $mensaje_error; ?>
                </div>
            <?php endif; ?>

            <!-- Requisito: Formulario donde el usuario introduce su nombre de usuario y contraseña -->
            <form method="POST" action="login.php">
                <div class="mb-3">
                    <label for="username" class="form-label">Nombre de Usuario:</label>
                    <input type="text" id="username" name="username" class="form-control rounded-pill" required>
                </div>
                
                <div class="mb-4">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" id="password" name="password" class="form-control rounded-pill" required>
                </div>
                
                <button type="submit" class="btn btn-primary w-100 rounded-pill">Entrar</button>
            </form>

            
        </div>
    </div>
</body>
</html>