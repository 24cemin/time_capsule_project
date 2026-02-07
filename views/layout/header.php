<?php

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaman Kapsülü</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/custom.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php?page=home">Zaman Kapsülü</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php?page=open_capsules">Açılmışlar</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?page=future_capsules">Bekleyenler</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?page=create_capsule">Yeni Kapsül</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?page=site_comments">Yorumlar</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item"><a class="nav-link text-warning" href="#"><?php echo $_SESSION['username']; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=logout">Çıkış</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=login">Giriş</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=register">Kayıt</a></li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="themeToggle">🌓 Tema</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container fade-in">
