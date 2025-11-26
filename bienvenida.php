<?php
// Requisito 1: Implementar el manejo de sesiones (session_start)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Función auxiliar para verificar si hay una sesión activa (integrada)
function verificarSesion() {
    return isset($_SESSION['usuario']);
}

// Requisito 3: Si no está autenticado, redirigir automáticamente a permisos.php
if (!verificarSesion()) {
    header("Location: permisos.php");
    exit;
}

// Obtener los datos del usuario de la sesión
$usuario = $_SESSION['usuario'];
$hora_actual = date("H:i:s"); // Requisito: La hora actual
$mensaje_adicional = "Inicio de sesión correcto"; // Requisito: Mensaje adicional
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2. Pantalla de Bienvenida</title>
    <!-- Incluir Bootstrap 5 CSS para el estilo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #e9ecef; }
        .container { margin-top: 50px; }
        .alert-success-custom { 
            background-color: #d5e7a9ff; 
            color: #191f1aff; 
            border-color: #c3e6cb;
            border-radius: 1rem;
            padding: 2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="alert alert-success-custom shadow-lg">
            <!-- Requisito: Mensaje personalizado con el nombre del usuario -->
            <h1 class="display-5">Bienvenido/a, <span class="text-primary"><?php echo htmlspecialchars($usuario); ?></span></h1>
            <p class="lead">Sistema de Autenticación con Sesiones en PHP</p>
            <hr>
            
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-1"><strong>Usuario Autenticado:</strong> <?php echo htmlspecialchars($usuario); ?></p>
                </div>
                <div class="col-md-6">
                    <p class="mb-1"><strong>Hora Actual:</strong> <?php echo $hora_actual; ?></p>
                </div>
            </div>
            <p class="mt-2"><em>
                <?php echo $mensaje_adicional; ?></em></p>
        </div>

        <!-- Requisito 4: Enlace para cerrar sesión -->
        <div class="mt-4 text-end">
            <a href="logout.php" class="btn btn-danger btn-lg shadow-sm rounded-pill">
                <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
            </a>
        </div>
    </div>
</body>
</html>
