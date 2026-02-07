<?php


require_once 'config/database.php';

class User {

    public static function findByEmail($email) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($username, $email, $password) {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $password]);
    }
}
