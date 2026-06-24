<?php
session_start();
require_once __DIR__ . '/../../app/middlewares/authMiddleWare.php';
checkAuth();

require_once __DIR__ . '/../../config/database.php';

$database = new Database();
$db = $database->getConnection();

$stmt = $db->prepare("
    SELECT r.id, r.score, r.nivelRiesgo, r.fechaGenerado, r.passwordMask,
           GROUP_CONCAT(d.recomendacion SEPARATOR '|') as recs
    FROM reporte r
    LEFT JOIN detallereporte d ON d.id_reporte = r.id
    WHERE r.id_usuario = :uid
    GROUP BY r.id
    ORDER BY r.fechaGenerado DESC
");
$stmt->execute([':uid' => $_SESSION['user_id']]);
$reportes = $stmt->fetchAll();

$pageTitle = 'CredSafe - Historial';
require_once __DIR__ . '/partials/header.php';
?>
<body>
<?php require_once __DIR__ . '/partials/nav.php'; ?>

<div class="content">
    <a href="/credsafe/app/views/dashboard.php" class="back">← Volver al dashboard</a>
    <h2 style="margin-bottom: 1.5rem;">Historial de reportes</h2>

    <?php if (empty($reportes)): ?>
        <div class="card">
            <p class="empty-msg">
                No tenés reportes todavía.
                <a href="/credsafe/app/views/evaluador.php">Evaluá una contraseña.</a>
            </p>
        </div>
    <?php else: ?>
        <?php foreach ($reportes as $r):
            $color = '#ef4444';
            $nivel = 'Alto riesgo';
            if ($r['score'] >= 50) { $color = '#f59e0b'; $nivel = 'Riesgo medio'; }
            if ($r['score'] >= 75) { $color = '#22c55e'; $nivel = 'Bajo riesgo'; }
            $recs = $r['recs'] ? explode('|', $r['recs']) : [];
        ?>
        <div class="card">
            <div class="historial-meta">
                <span class="historial-fecha"><?= $r['fechaGenerado'] ?></span>
                <span style="color: <?= $color ?>; font-weight: bold;"><?= $nivel ?></span>
            </div>

            <div class="historial-mask"><?= htmlspecialchars($r['passwordMask'] ?? '—') ?></div>

            <div class="barra-bg">
                <div class="barra" style="width: <?= $r['score'] ?>%; background: <?= $color ?>"></div>
            </div>

            <div class="historial-score" style="color: <?= $color ?>">
                <?= $r['score'] ?>/100
            </div>

            <?php if (!empty($recs)): ?>
                <div class="historial-recs">
                    <?php foreach ($recs as $rec): ?>
                        <div class="rec"><?= htmlspecialchars($rec) ?></div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="historial-fuerte">✓ Contraseña fuerte</p>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

</body>
</html>