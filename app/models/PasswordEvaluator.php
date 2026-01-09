<?php
// app/models/PasswordEvaluator.php

class PasswordEvaluator {
    private $db;

    public function __construct($dbConnection = null) {
        $this->db = $dbConnection;
    }

    public function analizar($password) {
        $score = 0;
        $detalles = []; // Guardaremos objetos con tipo, desc y rec

        // Regla 1: Longitud
        if (strlen($password) >= 8) {
            $score += 25;
        } else {
            $detalles[] = [
                'tipo' => 'Longitud',
                'desc' => 'La contraseña es demasiado corta.',
                'rec'  => 'Aumenta el tamaño a 8 o más caracteres.'
            ];
        }

        // Regla 2: Mayúsculas
        if (preg_match('/[A-Z]/', $password)) {
            $score += 25;
        } else {
            $detalles[] = [
                'tipo' => 'Complejidad',
                'desc' => 'Faltan letras mayúsculas.',
                'rec'  => 'Incluye al menos una letra en mayúscula (A-Z).'
            ];
        }

        // Regla 3: Números
        if (preg_match('/[0-9]/', $password)) {
            $score += 25;
        } else {
            $detalles[] = [
                'tipo' => 'Complejidad',
                'desc' => 'No se detectaron números.',
                'rec'  => 'Agrega dígitos numéricos (0-9).'
            ];
        }

        // Regla 4: Especiales
        if (preg_match('/[\W]/', $password)) {
            $score += 25;
        } else {
            $detalles[] = [
                'tipo' => 'Complejidad',
                'desc' => 'Faltan caracteres especiales.',
                'rec'  => 'Usa símbolos como @, #, $, etc.'
            ];
        }

        // Determinar nivel de riesgo para el enum ('1','2','3')
        // 1 = Bajo riesgo (Fuerte), 2 = Medio, 3 = Alto riesgo (Débil)
        $nivelRiesgo = '3'; 
        if ($score > 40) $nivelRiesgo = '2';
        if ($score > 80) $nivelRiesgo = '1';

        return [
            'score' => $score,
            'nivel' => $nivelRiesgo,
            'detalles' => $detalles
        ];
    }

    public function guardarReporteCompleto($userId, $datosAnalisis) {
        try {
            // Iniciamos transacción para asegurar que se guarde todo o nada
            $this->db->beginTransaction();

            // 1. Insertar en la tabla 'reporte'
            $queryR = "INSERT INTO reporte (id_usuario, score, nivelRiesgo, fechaGenerado) 
                       VALUES (:uid, :score, :nivel, NOW())";
            $stmtR = $this->db->prepare($queryR);
            $stmtR->execute([
                ':uid'   => $userId,
                ':score' => $datosAnalisis['score'],
                ':nivel' => $datosAnalisis['nivel']
            ]);

            // Obtener el ID del reporte que acabamos de crear
            $reporteId = $this->db->lastInsertId();

            // 2. Insertar los detalles si existen (recomendaciones)
            if (!empty($datosAnalisis['detalles'])) {
                $queryD = "INSERT INTO detallereporte (id_reporte, tipoRiesgo, descripcion, recomendacion) 
                           VALUES (:rid, :tipo, :desc, :rec)";
                $stmtD = $this->db->prepare($queryD);

                foreach ($datosAnalisis['detalles'] as $det) {
                    $stmtD->execute([
                        ':rid'  => $reporteId,
                        ':tipo' => $det['tipo'],
                        ':desc' => $det['desc'],
                        ':rec'  => $det['rec']
                    ]);
                }
            }

            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            error_log("Error al guardar reporte: " . $e->getMessage());
            return false;
        }
    }
}