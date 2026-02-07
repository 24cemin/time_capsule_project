<?php


require_once 'config/database.php';

class Capsule {

    public static function getAllOpened() {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM capsules WHERE open_date <= NOW() ORDER BY open_date DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAllFuture() {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM capsules WHERE open_date > NOW() ORDER BY open_date ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO capsules (message, open_date, password, email, user_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([
            $data['message'],
            $data['open_date'],
            $data['password'],
            $data['email'],
            $data['user_id']
        ]);
    }

    public static function findById($id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM capsules WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function markNotified($id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("UPDATE capsules SET notified = 1 WHERE id = ?");
        $stmt->execute([$id]);
    }

    public static function getReadyToNotify() {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM capsules WHERE open_date <= NOW() AND notified = 0 AND email IS NOT NULL");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function markAsNotified($id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("UPDATE capsules SET notified = 1 WHERE id = ?");
        $stmt->execute([$id]);
    }
    
}
