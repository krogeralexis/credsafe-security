<?php
// config/database.php

class Database {
    private $host = "localhost";
    private $db_name = "credsafe";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            // DSN (Data Source Name)
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4";
            
            $this->conn = new PDO($dsn, $this->username, $this->password);

            // Configuraciones de Seguridad y Manejo de Errores
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Lanza excepciones en errores
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Formato de array asociativo
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // Desactiva la emulación para mayor seguridad real

        } catch(PDOException $exception) {
            // En producción, no muestres $exception->getMessage() al usuario
            error_log("Error de Conexión: " . $exception->getMessage());
            die("Error crítico: No se pudo conectar a la base de datos.");
        }

        return $this->conn;
    }
}
?>