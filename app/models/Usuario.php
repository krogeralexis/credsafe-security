<?php

<<<<<<< HEAD
=======
<?php

>>>>>>> 42149af3b92ae19b50b875591ee4af7955b91936
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
<<<<<<< HEAD

    // --- NUEVOS MÉTODOS ---

    // Actualiza el campo lastLogin del usuario
    public function updateLastLogin($id) {
        $stmt = $this->db->prepare("UPDATE usuario SET lastLogin = NOW() WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    // Registra el intento en la tabla intentologin
    // $resultado: 1 para exitoso, 0 para fallido
    public function registrarIntento($idUsuario, $resultado) {
        $stmt = $this->db->prepare("INSERT INTO intentologin (id_usuario, fecha, resultado) VALUES (:uid, NOW(), :res)");
        return $stmt->execute([
            ':uid' => $idUsuario,
            ':res' => $resultado
        ]);
    }
=======
>>>>>>> 42149af3b92ae19b50b875591ee4af7955b91936
}