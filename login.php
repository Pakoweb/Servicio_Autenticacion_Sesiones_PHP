<?php
// Requisito 1: Implementar el manejo de sesiones (session_start)
// Debe ir al inicio del script antes de cualquier salida HTML
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Requisito 3: Array predefinido de usuarios
$usuarios = [
    "admin" => "1234",
    "paco" => "paco"
];

// Función para verificar credenciales (integrada)
function verificarCredenciales($usuario, $contrasena, $listaUsuarios) {
    if (isset($listaUsuarios[$usuario]) && $listaUsuarios[$usuario] === $contrasena) {
        return true;
    }
    return false;
}

// Verificar si el usuario ya está autenticado
if (isset($_SESSION['usuario'])) {
    // Si ya hay sesión, redirigir a bienvenida.php
    header("Location: bienvenida.php");
    exit;
}

$mensaje_error = '';

// Procesar el formulario POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['username'] ?? '';
    $contrasena = $_POST['password'] ?? '';

    // Validación en el servidor
    if (verificarCredenciales($nombre_usuario, $contrasena, $usuarios)) {
        // Autenticación exitosa: establecer la variable de sesión
        $_SESSION['usuario'] = $nombre_usuario;
        
        // Redirigir a la pantalla de bienvenida
        header("Location: bienvenida.php");
        exit;
    } else {
        // Credenciales incorrectas
        $mensaje_error = "Credenciales incorrectas. Inténtalo de nuevo.";
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

            <div class="mt-3 text-center text-muted small">
                Usuarios de prueba:<br>
                admin / 1234, usuario / abcd
            </div>
        </div>
    </div>
</body>
</html>