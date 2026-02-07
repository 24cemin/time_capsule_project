<?php


require_once 'config/database.php';

class SiteComment {

    public static function getAll() {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM site_comments ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($text) {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO site_comments (comment_text) VALUES (?)");
        $stmt->execute([$text]);
    }
}
