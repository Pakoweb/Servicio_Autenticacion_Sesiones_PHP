<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3. Pantalla de No Tienes Permisos</title>
    <!-- Incluir Bootstrap 5 CSS para el estilo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background-color: #fff0f0; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
        }
        .card { 
            width: 100%; 
            max-width: 500px; 
            border-left: 5px solid #dc3545; 
            border-radius: 1rem;
        }
    </style>
</head>
<body>
    <div class="card shadow-lg p-3">
        <div class="card-body text-center">
            <h1 class="card-title text-danger mb-4">🚫 Acceso Denegado</h1>
            <div class="alert alert-warning" role="alert">
                <strong>No tienes permisos</strong> para acceder a este recurso.
            </div>
            <p>Por favor, inicia sesión para continuar.</p>
            <a href="login.php" class="btn btn-primary mt-3 rounded-pill">Ir a la página de Login</a>
        </div>
    </div>
</body>
</html>