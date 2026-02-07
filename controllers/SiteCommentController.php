<?php


require_once 'models/SiteComment.php';

class SiteCommentController {

    public function showComments() {
        $comments = SiteComment::getAll();
        require 'views/site_comments.php';
    }

    public function submitComment() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $text = $_POST['comment_text'] ?? '';
            if (!empty(trim($text))) {
                SiteComment::create($text);
            }
            header('Location: index.php?page=site_comments');
        }
    }
}
