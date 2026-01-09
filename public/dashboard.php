<?php
require_once __DIR__ . '/../app/middlewares/authMiddleware.php';
<<<<<<< HEAD
=======

// check autenticacion (logueado)
>>>>>>> 42149af3b92ae19b50b875591ee4af7955b91936
checkAuth(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
<<<<<<< HEAD
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CredSafe - Dashboard</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f0f2f5; margin: 0; color: #1e293b; }
        
        /* Nav Estilo CredSafe */
        nav { background: #1e293b; color: white; padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; }
        
        .container { padding: 2rem; display: flex; justify-content: center; }
        
        .card { 
            background: white; 
            padding: 2.5rem; 
            border-radius: 12px; 
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); 
            width: 100%; 
            max-width: 600px; 
        }

        h1 { margin-top: 0; font-size: 1.8rem; }
        h3 { color: #64748b; margin-top: 2rem; }
        
        /* Estilo de la lista de herramientas */
        .tools-grid {
            list-style: none;
            padding: 0;
            display: grid;
            grid-template-columns: 1fr 1fr; /* Dos columnas */
            gap: 1rem;
            margin-top: 1.5rem;
        }

        /* Botones que parecen tarjetas de herramientas */
        .tool-button {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            background: #ffffff;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            color: #1e293b;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s ease;
            cursor: pointer;
            text-align: center;
        }

        .tool-button:hover {
            border-color: #2563eb;
            color: #2563eb;
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.1);
        }

        .tool-icon {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .logout-btn { 
            color: #fca5a5; 
            text-decoration: none; 
            font-weight: bold; 
            transition: color 0.2s;
        }
        .logout-btn:hover { color: #ff4d4d; }

        hr { border: 0; border-top: 1px solid #e2e8f0; margin: 1.5rem 0; }
=======
    <title>CredSafe - Dashboard</title>
    <style>
        body { font-family: sans-serif; background: #f0f2f5; margin: 0; }
        nav { background: #1e293b; color: white; padding: 1rem; display: flex; justify-content: space-between; }
        .container { padding: 2rem; }
        .card { background: white; padding: 2rem; border-radius: 8px; shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .logout-btn { color: #ff4d4d; text-decoration: none; font-weight: bold; }
>>>>>>> 42149af3b92ae19b50b875591ee4af7955b91936
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
<<<<<<< HEAD
        
        <hr>
        
        <h3>Herramientas de Seguridad</h3>
        
        <div class="tools-grid">
            <a href="evaluador.php" class="tool-button">
                <span class="tool-icon">🛡️</span>
                Evaluar Contraseña
            </a>

            <a href="reportes.php" class="tool-button">
                <span class="tool-icon">📊</span>
                Historial de Reportes
            </a>
        </div>
=======
        <hr>
        <h3>Tus Herramientas</h3>
        <ul>
            <li>Ver historial de Reportes</li>
            <li>Evaluar Contraseña</li>
        </ul>
>>>>>>> 42149af3b92ae19b50b875591ee4af7955b91936
    </div>
</div>

</body>
</html>