<?php
// app/controllers/passwordController.php
session_start();
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/PasswordEvaluator.php';

// Verificamos que sea POST y que el usuario esté logueado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
    
    $pass = $_POST['password_test'] ?? '';
    
    // 1. Conexión a la base de datos
    $database = new Database();
    $db = $database->getConnection();
    
    // 2. Instanciar el modelo pasándole la conexión
    $evaluador = new PasswordEvaluator($db);
    
    // 3. El MODELO procesa la lógica de seguridad
    $analisis = $evaluador->analizar($pass);
    
    // 4. Guardar en las tablas 'reporte' y 'detallereporte'
    // Pasamos el ID del usuario de la sesión y el array con resultados
    $guardadoExitoso = $evaluador->guardarReporteCompleto($_SESSION['user_id'], $analisis);
    
    // 5. Preparar recomendaciones para la URL (para mostrar en la vista)
    // Extraemos solo el texto de 'rec' de cada detalle encontrado
    $recsSoloTexto = array_column($analisis['detalles'], 'rec');
    $recsEncoded = urlencode(implode('|', $recsSoloTexto));
    
    // 6. Redirigir de vuelta al evaluador con los resultados
    // Agregamos un flag de éxito de guardado opcional
    $status = $guardadoExitoso ? "saved" : "error_db";
    
    header("Location: ../../public/evaluador.php?puntos={$analisis['score']}&recs={$recsEncoded}&status={$status}");
    exit();
} else {
    // Si intentan entrar directo al archivo sin POST o sesión
    header("Location: ../../public/index.php");
    exit();
}