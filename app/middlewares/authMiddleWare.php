<?php
session_start();

function checkAuth() {
    // Si no existe la variable de sesión que creamos en el Controller
    if (!isset($_SESSION['user_id'])) {
        // Redirigir al login con un mensaje de error
        header("Location: /public/index.php?error=no_access");
        exit();
    }
}

// Opcional: Función para cerrar sesión
function logout() {
    session_unset();
    session_destroy();
    header("Location: /public/index.php");
    exit();
}