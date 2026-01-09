<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CredSafe - Inicio</title>
    <style>
        /* Estilos base para concordar con el Dashboard */
        body { font-family: sans-serif; background: #f0f2f5; margin: 0; color: #1e293b; }
        nav { background: #1e293b; color: white; padding: 1rem; display: flex; justify-content: center; }
        
        .container { 
            padding: 2rem; 
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            justify-content: center; 
            min-height: 80vh;
        }

        .card { 
            background: white; 
            padding: 2rem; 
            border-radius: 8px; 
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); 
            width: 100%;
            max-width: 400px;
        }

        h2 { margin-top: 0; color: #1e293b; text-align: center; }
        p.subtitle { text-align: center; color: #64748b; margin-bottom: 2rem; }

        /* Estilos de Formulario */
        form { display: flex; flex-direction: column; gap: 1rem; }
        input { 
            padding: 0.8rem; 
            border: 1px solid #cbd5e1; 
            border-radius: 6px; 
            font-size: 1rem;
        }
        button { 
            padding: 0.8rem; 
            background: #2563eb; 
            color: white; 
            border: none; 
            border-radius: 6px; 
            cursor: pointer; 
            font-weight: bold;
            font-size: 1rem;
            transition: background 0.2s;
        }
        button:hover { background: #1d4ed8; }

        .toggle-link { 
            color: #2563eb; 
            cursor: pointer; 
            text-align: center; 
            font-size: 0.9rem; 
            margin-top: 1.5rem;
            text-decoration: underline;
        }
        
        .hidden { display: none; }

        /* Mensajes de Feedback */
        .alert {
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 1rem;
            text-align: center;
            font-size: 0.9rem;
            width: 100%;
            max-width: 400px;
        }
        .alert-error { background: #fee2e2; color: #b91c1c; }
        .alert-success { background: #dcfce7; color: #15803d; }
    </style>
</head>
<body>

<nav>
    <span><strong>CredSafe</strong> | Seguridad de Credenciales</span>
</nav>

<div class="container">
    
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-error">
            <?php 
                if($_GET['error'] == 'auth') echo "Correo o contraseña incorrectos.";
                if($_GET['error'] == 'exists') echo "El correo ya está registrado.";
                if($_GET['error'] == 'no_access') echo "Debes iniciar sesión primero.";
            ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success">
            Registro completado. ¡Ya puedes iniciar sesión!
        </div>
    <?php endif; ?>

    <div class="card">
        <div id="loginFormContainer">
            <h2>Iniciar Sesión</h2>
            <p class="subtitle">Ingresa a tu panel seguro</p>
            <form action="../app/controllers/loginController.php" method="POST">
                <input type="hidden" name="action" value="login">
                <input type="email" name="email" placeholder="Correo Electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Ingresar</button>
            </form>
            <p class="toggle-link" onclick="switchForm('register')">¿No tienes cuenta? Regístrate aquí</p>
        </div>

        <div id="registerFormContainer" class="hidden">
            <h2>Crear Cuenta</h2>
            <p class="subtitle">Únete a la plataforma CredSafe</p>
            <form action="../app/controllers/loginController.php" method="POST">
                <input type="hidden" name="action" value="register">
                <input type="email" name="email" placeholder="Correo Electrónico" required>
                <input type="password" name="passwd" id="passwd" placeholder="Contraseña" required>
                <input type="password" name="conf_passwd" id="conf_passwd" placeholder="Confirmar contraseña" required>
                <button type="submit">Registrarme</button>
            </form>
            <p class="toggle-link" onclick="switchForm('login')">¿Ya tienes cuenta? Inicia sesión</p>
        </div>
    </div>

    <p style="margin-top: 2rem; color: #64748b; font-size: 0.8rem;">&copy; 2026 CredSafe Project</p>
</div>

<script>
    const loginForm = document.getElementById('loginFormContainer');
    const registerForm = document.getElementById('registerFormContainer');

    function switchForm(type) {
        if (type === 'register') {
            loginForm.classList.add('hidden');
            registerForm.classList.remove('hidden');
        } else {
            registerForm.classList.add('hidden');
            loginForm.classList.remove('hidden');
        }
    }
</script>

</body>
</html>