<?php
session_start();

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/Usuario.php';

class LoginController {
    
<<<<<<< HEAD
=======
    // Método para Registro y Login (POST)
>>>>>>> 42149af3b92ae19b50b875591ee4af7955b91936
    public function handlePost() {
        $database = new Database();
        $db = $database->getConnection();
        $userModel = new Usuario($db);

        $action = $_POST['action'] ?? '';

        if ($action === 'register') {
<<<<<<< HEAD
            // ... (lógica de registro se mantiene igual) ...
=======
>>>>>>> 42149af3b92ae19b50b875591ee4af7955b91936
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

<<<<<<< HEAD
            if ($user) {
                // El usuario existe, ahora verificamos contraseña
                if (password_verify($password, $user['password'])) {
                    
                    // LOGIN EXITOSO
                    $userModel->registrarIntento($user['id'], 1); // Registrar éxito
                    $userModel->updateLastLogin($user['id']);    // Actualizar fecha

                    session_regenerate_id(true);
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_email'] = $user['email'];
                    
                    header("Location: ../../public/dashboard.php");
                    exit();
                } else {
                    // LOGIN FALLIDO (Contraseña incorrecta)
                    $userModel->registrarIntento($user['id'], 0); 
                    header("Location: ../../public/index.php?error=auth");
                    exit();
                }
            } else {
                // El usuario ni siquiera existe
                // Nota: Aquí no podemos registrar intento por ID porque no hay ID, 
                // a menos que permitas registrar intentos con id_usuario NULL.
=======
            if ($user && password_verify($password, $user['password'])) {
                session_regenerate_id(true);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                header("Location: ../../public/dashboard.php");
                exit();
            } else {
>>>>>>> 42149af3b92ae19b50b875591ee4af7955b91936
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

<<<<<<< HEAD
// Ejecución del controlador
$controller = new LoginController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->handlePost();
}
=======
$controller = new LoginController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->handlePost();
}

>>>>>>> 42149af3b92ae19b50b875591ee4af7955b91936
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $controller->logout();
}