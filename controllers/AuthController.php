<?php


require_once 'models/User.php';

class AuthController {

    public function showLoginForm() {
        require 'views/auth/login.php';
    }

    public function login() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = User::findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: index.php');
        } else {
            $error = "Email veya şifre hatalı.";
            require 'views/auth/login.php';
        }
    }

    public function showRegisterForm() {
        require 'views/auth/register.php';
    }

    public function register() {
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (User::findByEmail($email)) {
            $error = "Bu email zaten kayıtlı.";
            require 'views/auth/register.php';
            return;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        User::create($username, $email, $hashedPassword);

        header('Location: index.php?page=login');
    }

    public function logout() {
        session_destroy();
        header('Location: index.php');
    }
}