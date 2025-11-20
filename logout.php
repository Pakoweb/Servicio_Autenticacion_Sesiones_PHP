<?php
// Requisito 1: Implementar el manejo de sesiones (session_start)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Destruir todas las variables de sesión
$_SESSION = array();

// Si se utilizan cookies de sesión, también hay que eliminarlas
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Requisito 1: Destruir la sesión
session_destroy();

// Requisito 2: Redirigir al login
header("Location: login.php");
exit;
?>