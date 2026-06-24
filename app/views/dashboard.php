<?php
session_start();
require_once __DIR__ . '/../../app/middlewares/authMiddleWare.php';
checkAuth();
$pageTitle = 'CredSafe - Dashboard';
require_once __DIR__ . '/partials/header.php';
?>
<body>
<?php require_once __DIR__ . '/partials/nav.php'; ?>

<div class="content centered">
    <h2>Bienvenido, <?= htmlspecialchars($_SESSION['user_email']) ?></h2>
    <p>Evaluá la seguridad de tus contraseñas y generá reportes detallados.</p>
    <a href="/credsafe/app/views/evaluador.php" class="btn">Evaluar contraseña</a>
    <a href="/credsafe/app/views/historial.php" class="btn">Ver historial</a>
</div>

</body>
</html>
