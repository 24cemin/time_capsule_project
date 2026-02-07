<?php include 'views/layout/header.php'; ?>

<div class="container mt-5 fade-in">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-start border-dark border-4">
                <div class="card-body">
                    <h2 class="text-center text-dark mb-4">📬 Kapsül Detayları</h2>

                    <div class="mb-3">
                        <h5 class="text-muted">📝 Mesaj:</h5>
                        <p class="fs-5"><?php echo nl2br(htmlspecialchars($capsule['message'])); ?></p>
                    </div>
                    <?php if (!empty($capsule['attachment'])): ?>
                        <div class="mt-3">
                        <h5 class="text-muted">📎 Ek Dosya:</h5>
                        <a href="public/uploads/<?php echo $capsule['attachment']; ?>" download class="btn btn-outline-secondary">Dosyayı İndir</a>
                    </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <h5 class="text-muted">🗓 Açılma Tarihi:</h5>
                        <p class="text-primary fw-semibold"><?php echo $capsule['open_date']; ?></p>
                    </div>

                    <?php if (!empty($capsule['email'])): ?>
                        <div class="mb-3">
                            <h5 class="text-muted">📧 Bildirilecek E-posta:</h5>
                            <p class="text-secondary"><?php echo htmlspecialchars($capsule['email']); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($capsule['password'])): ?>
                        <div class="mb-3">
                            <h5 class="text-muted">🔒 Şifre Korumalıydı</h5>
                            <p class="text-secondary">Bu kapsül görüntülenmeden önce şifre girilmesi gerekiyordu.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>
