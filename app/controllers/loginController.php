<?php
session_start();

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/Usuario.php';

class LoginController {
    
    // Método para Registro y Login (POST)
    public function handlePost() {
        $database = new Database();
        $db = $database->getConnection();
        $userModel = new Usuario($db);

        $action = $_POST['action'] ?? '';

        if ($action === 'register') {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $passwd = $_POST['passwd'];
            
            if ($userModel->findByEmail($email)) {
                header("Location: ../../public/index.php?error=exists");
                exit();
            }

            if ($userModel->create($email, $passwd)) {
                header("Location: ../../public/index.php?success=registered");
                exit();
            }
        } 
        
        elseif ($action === 'login') {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];
            $user = $userModel->findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                session_regenerate_id(true);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                header("Location: ../../public/dashboard.php");
                exit();
            } else {
                header("Location: ../../public/index.php?error=auth");
                exit();
            }
        }
    }

    public function logout() {
        session_unset(); 
        session_destroy(); 
        header("Location: ../../public/index.php?msg=logout_success");
        exit();
    }
}

$controller = new LoginController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->handlePost();
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $controller->logout();
}