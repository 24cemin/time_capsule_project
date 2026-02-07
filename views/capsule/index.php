<?php include 'views/layout/header.php'; ?>

<div class="container mt-5 fade-in">
    <h2 class="text-center mb-4">📂 Açılmış Zaman Kapsülleri</h2>
    <?php if (empty($capsules)): ?>
        <div class="alert alert-warning text-center">Henüz açılmış kapsül bulunmamaktadır.</div>
    <?php else: ?>
        <?php foreach ($capsules as $capsule): ?>
            <div class="card my-3 border-start border-primary border-5 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-primary fw-bold">📨 Mesaj</h5>
                    <p class="card-text"><?php echo nl2br(htmlspecialchars($capsule['message'])); ?></p>
                    <p class="text-muted">🕒 Açılma Tarihi: <?php echo $capsule['open_date']; ?></p>
                    <a href="index.php?page=view_capsule&id=<?php echo $capsule['id']; ?>" class="btn btn-outline-primary btn-sm">🔍 Görüntüle</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php include 'views/layout/footer.php'; ?>
