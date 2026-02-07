<?php


require_once 'models/Capsule.php';

class CapsuleController {

    public function listOpened() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?page=login");
            exit;
        }
        $capsules = Capsule::getAllOpened();
        require 'views/capsule/index.php';
    }
    

    public function listFuture() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?page=login");
            exit;
        }
    
        $capsules = Capsule::getAllFuture();
        require 'views/capsule/future.php';
    }

    public function showCreateForm() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?page=login");
            exit;
        }
        require 'views/capsule/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            $uploadFileName = null;
    
            // 1. Dosya varsa yüklemeyi önce yap
            if (!empty($_FILES['attachment']['name'])) {
                $targetDir = "public/uploads/";
                $uploadFileName = time() . "_" . basename($_FILES["attachment"]["name"]);
                $targetFilePath = $targetDir . $uploadFileName;
    
                if (!move_uploaded_file($_FILES["attachment"]["tmp_name"], $targetFilePath)) {
                    echo "⛔ Dosya yüklenemedi.";
                    return;
                } else {
                    echo "✅ Dosya başarıyla yüklendi: $targetFilePath<br>";
                }
            }
    
            // 2. Dosya adıyla birlikte veriyi hazırla
            $data = [
                'message' => $_POST['message'],
                'open_date' => $_POST['open_date'],
                'password' => $_POST['password'] ?? null,
                'email' => $_POST['email'] ?? null,
                'user_id' => $_SESSION['user_id'] ?? null,
                'attachment' => $uploadFileName,
            ];
    
            // 3. Veritabanına ekle
            Capsule::create($data);
    
            // 4. Son olarak yönlendir
            header('Location: index.php');
            exit;
        }
    }

    public function viewCapsule($id) {
        if (!$id) {
            echo "Kapsül ID bulunamadı.";
            return;
        }
        $capsule = Capsule::findById($id);

        if (!$capsule) {
            echo "Kapsül bulunamadı.";
            return;
        }

        // Şifreli kapsül kontrolü
        if ($capsule['password'] && (!isset($_SESSION['capsule_access'][$id]) || $_SESSION['capsule_access'][$id] !== true)) {
            require 'views/capsule/password_form.php';
            return;
        }

        require 'views/capsule/view.php';
    }

    public function checkPassword($id) {
        $capsule = Capsule::findById($id);

        if ($capsule && $_POST['password'] === $capsule['password']) {
            $_SESSION['capsule_access'][$id] = true;
            header("Location: index.php?page=view_capsule&id=$id");
            exit;
        } else {
            $error = "Şifre yanlış.";
            require 'views/capsule/password_form.php';
        }
    }
}
