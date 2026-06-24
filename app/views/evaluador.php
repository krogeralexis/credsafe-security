<?php
session_start();
require_once __DIR__ . '/../../app/middlewares/authMiddleWare.php';
checkAuth();

$pageTitle = 'CredSafe - Evaluador';
$score = isset($_GET['puntos']) ? (int)$_GET['puntos'] : null;
$recs = isset($_GET['recs']) ? explode('|', urldecode($_GET['recs'])) : [];
$status = $_GET['status'] ?? null;

$color = '#ef4444';
$nivel = 'Alto riesgo';
if ($score >= 50) { $color = '#f59e0b'; $nivel = 'Riesgo medio'; }
if ($score >= 75) { $color = '#22c55e'; $nivel = 'Bajo riesgo'; }

require_once __DIR__ . '/partials/header.php';
?>
<body>
<?php require_once __DIR__ . '/partials/nav.php'; ?>

<div class="content">
    <a href="/credsafe/app/views/dashboard.php" class="back">← Volver al dashboard</a>

    <div class="card">
        <h2>Evaluá tu contraseña</h2>
        <form action="/credsafe/app/controllers/passwordController.php" method="POST">
            <input type="password" id="password_test" name="password_test" placeholder="Ingresá una contraseña" required>

            <div id="medidor" class="medidor">
                <div class="barra-bg">
                    <div id="medidor-barra" class="barra" style="width: 0%"></div>
                </div>
                <div class="medidor-meta">
                    <span id="medidor-nivel" class="medidor-nivel"></span>
                    <span id="medidor-score" class="medidor-score"></span>
                </div>
                <div id="medidor-recs" class="medidor-recs"></div>
            </div>

            <button type="submit">Analizar</button>
        </form>
    </div>

    <?php if ($score !== null): ?>
    <div class="card">
        <h2>Resultado</h2>

        <?php if ($status === 'saved'): ?>
            <div class="msg-success">Reporte guardado correctamente.</div>
        <?php endif; ?>

        <div class="score-box">
            <div class="score-num" style="color: <?= $color ?>"><?= $score ?></div>
            <div class="score-label">puntos de 100</div>
            <div class="nivel" style="color: <?= $color ?>"><?= $nivel ?></div>
        </div>

        <div class="barra-bg">
            <div class="barra" style="width: <?= $score ?>%; background: <?= $color ?>"></div>
        </div>

        <?php if (!empty($recs)): ?>
            <h2 class="resultado-recs">Recomendaciones</h2>
            <?php foreach ($recs as $rec): ?>
                <div class="rec"><?= htmlspecialchars($rec) ?></div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="resultado-fuerte">✓ Tu contraseña cumple todos los criterios.</p>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</div>

</body>
<script src="/credsafe/app/views/assets/js/evaluador.js"></script>
</html>