<?php
require_once __DIR__ . '/../app/middlewares/authMiddleware.php';

// check autenticacion (logueado)
checkAuth(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CredSafe - Dashboard</title>
    <style>
        body { font-family: sans-serif; background: #f0f2f5; margin: 0; }
        nav { background: #1e293b; color: white; padding: 1rem; display: flex; justify-content: space-between; }
        .container { padding: 2rem; }
        .card { background: white; padding: 2rem; border-radius: 8px; shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .logout-btn { color: #ff4d4d; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

<nav>
    <span><strong>CredSafe</strong> | Panel de Usuario</span>
    <a href="../app/controllers/loginController.php?action=logout" class="logout-btn">Cerrar Sesión</a>
</nav>

<div class="container">
    <div class="card">
        <h1>¡Bienvenido de nuevo!</h1>
        <p>Has ingresado con el correo: <strong><?php echo htmlspecialchars($_SESSION['user_email']); ?></strong></p>
        <hr>
        <h3>Tus Herramientas</h3>
        <ul>
            <li>Ver historial de Reportes</li>
            <li>Evaluar Contraseña</li>
        </ul>
    </div>
</div>

</body>
</html>