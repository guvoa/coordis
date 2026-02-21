<?php
session_start();
include_once '../config/db.php';
include_once '../models/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action == 'register') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['email']; // Using email as username
        $password = $_POST['password'];
        $name = $_POST['name'];
        $confirm_password = $_POST['confirm_password'];

        if ($password !== $confirm_password) {
            header("Location: ../views/register.php?error=La contraseña no coincide");
            exit();
        }

        // Check if user exists
        $query = "SELECT id FROM user_credentials WHERE username = :username";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("Location: ../views/register.php?error=El usuario ya existe");
            exit();
        }

        // Create User Profile first
        $user->name = $name;
        $user->email = $username;

        if ($user->create()) {
            // Get the ID of the newly created user
            $user_id = $db->lastInsertId();

            // Create Credentials
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO user_credentials (user_id, username, password) VALUES (:user_id, :username, :password)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashed_password);

            if ($stmt->execute()) {
                header("Location: ../views/login.php?success=Registro exitoso. Por favor inicie sesión.");
            } else {
                // Rollback if needed (simplified here)
                header("Location: ../views/register.php?error=Error al registrar credenciales");
            }
        } else {
            header("Location: ../views/register.php?error=Error al crear perfil de usuario");
        }
    }
} elseif ($action == 'login') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT uc.id, uc.user_id, uc.password, u.name, u.email FROM user_credentials uc JOIN users u ON uc.user_id = u.id WHERE uc.username = :username";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['logged_in'] = true;
                header("Location: ../views/dashboard.php");
            } else {
                header("Location: ../views/login.php?error=Contraseña incorrecta");
            }
        } else {
            header("Location: ../views/login.php?error=Usuario no encontrado");
        }
    }
} elseif ($action == 'logout') {
    session_destroy();
    header("Location: ../views/login.php");
}
?>