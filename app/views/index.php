<?php
$error = $_GET['error'] ?? '';
$success = $_GET['success'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CredSafe</title>
    <link rel="stylesheet" href="/credsafe/app/views/assets/css/main.css">
</head>
<body class="auth">
    
<div class="container">
    <h1>🔐 CredSafe</h1>
    <p class="sub">Evaluador de seguridad de credenciales</p>

    <?php if ($error === 'auth'): ?>
        <div class="msg-error">Email o contraseña incorrectos.</div>
    <?php elseif ($error === 'exists'): ?>
        <div class="msg-error">Ese email ya está registrado.</div>
    <?php elseif ($success === 'registered'): ?>
        <div class="msg-success">Cuenta creada. Podés iniciar sesión.</div>
    <?php endif; ?>

    <div class="tabs">
        <div class="tab active" onclick="switchTab('login')">Iniciar sesión</div>
        <div class="tab" onclick="switchTab('register')">Registrarse</div>
    </div>

    <div id="login" class="form-section active">
        <form action="/credsafe/app/controllers/loginController.php" method="POST">
            <input type="hidden" name="action" value="login">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit" class="btn-login">Entrar</button>
        </form>
    </div>

    <div id="register" class="form-section">
        <form action="/credsafe/app/controllers/loginController.php" method="POST">
            <input type="hidden" name="action" value="register">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="passwd" placeholder="Contraseña" required>
            <button type="submit" class="btn-register">Crear cuenta</button>
        </form>
    </div>
</div>

<script src="/credsafe/app/views/assets/js/tabs.js"></script>
</body>
</html>