
<?php

class Usuario {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM usuario WHERE email = :email LIMIT 1");
        $stmt->execute([':email' => $email]);
        return $stmt->fetch();
    }

    public function create($email, $password) {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO usuario (email, password) VALUES (:email, :pass)");
        return $stmt->execute([
            ':email' => $email,
            ':pass'  => $hash
        ]);
    }
}