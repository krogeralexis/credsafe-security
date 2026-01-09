<?php
require_once __DIR__ . '/../app/middlewares/authMiddleware.php';
checkAuth(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CredSafe - Evaluador</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f0f2f5; margin: 0; color: #1e293b; }
        
        /* Nav Estilo CredSafe */
        nav { background: #1e293b; color: white; padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; }
        
        .container { padding: 2rem; display: flex; flex-direction: column; align-items: center; }
        
        .card { 
            background: white; 
            padding: 2.5rem; 
            border-radius: 12px; 
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); 
            width: 100%; 
            max-width: 500px; 
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            color: #64748b;
            font-weight: 600;
            margin-bottom: 1.5rem;
            transition: color 0.2s;
        }
        .back-link:hover { color: #2563eb; }

        h1 { margin-top: 0; font-size: 1.6rem; text-align: center; }
        
        .input-group { margin-top: 1.5rem; display: flex; flex-direction: column; gap: 0.8rem; }
        
        input { 
            padding: 1rem; 
            border: 2px solid #e2e8f0; 
            border-radius: 8px; 
            font-size: 1rem;
            outline: none;
            transition: border-color 0.2s;
        }
        input:focus { border-color: #2563eb; }

        .btn-evaluar {
            padding: 1rem;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-evaluar:hover { background: #1d4ed8; }

        /* Estilos de resultados */
        #resultado { margin-top: 2rem; display: none; padding-top: 1.5rem; border-top: 1px solid #e2e8f0; }
        .meter { height: 10px; background: #e2e8f0; border-radius: 5px; margin: 1rem 0; overflow: hidden; }
        .meter-fill { height: 100%; width: 0%; transition: width 0.3s, background 0.3s; }
        
        .rec-list { font-size: 0.9rem; color: #64748b; padding-left: 1.2rem; }
        .logout-btn { color: #fca5a5; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

<nav>
    <span><strong>CredSafe</strong> | Herramientas</span>
    <a href="../app/controllers/loginController.php?action=logout" class="logout-btn">Cerrar Sesión</a>
</nav>

<?php
require_once __DIR__ . '/../app/middlewares/authMiddleware.php';
checkAuth(); 

// Leer resultados de la URL si existen
$puntos = $_GET['puntos'] ?? null;
$recs = isset($_GET['recs']) ? explode('|', urldecode($_GET['recs'])) : [];
?>

<div class="container">
    <div style="width: 100%; max-width: 500px;">
        <a href="dashboard.php" class="back-link">← Volver al Panel</a>
        
        <div class="card">
            <h1>Evaluador de Seguridad</h1>
            
            <form action="../app/controllers/passwordController.php" method="POST" class="input-group">
                <input type="text" name="password_test" placeholder="Introduce una contraseña..." required>
                <button type="submit" class="btn-evaluar">Analizar en Servidor</button>
            </form>

            <?php if ($puntos !== null): ?>
            <div id="resultado" style="display: block; margin-top: 2rem; border-top: 1px solid #e2e8f0; padding-top: 1rem;">
                <p>Puntuación: <strong><?php echo $puntos; ?>%</strong></p>
                <div class="meter">
                    <div class="meter-fill" style="width: <?php echo $puntos; ?>%; background: <?php echo ($puntos < 50 ? '#ef4444' : ($puntos < 100 ? '#f59e0b' : '#10b981')); ?>;"></div>
                </div>
                
                <p style="font-weight: bold; font-size: 0.9rem;">Recomendaciones:</p>
                <ul class="rec-list">
                    <?php if (empty($recs[0])): ?>
                        <li style="color: #10b981;">¡Excelente contraseña!</li>
                    <?php else: ?>
                        <?php foreach($recs as $r): ?>
                            <li><?php echo htmlspecialchars($r); ?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html>