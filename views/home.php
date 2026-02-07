<?php include 'views/layout/header.php'; ?>

<section class="text-center p-5 bg-light rounded shadow mt-4 fade-in">
    <h1 class="display-4 fw-bold mb-3">🚀 Zaman Kapsülüne Hoş Geldiniz</h1>
    <p class="lead">Geleceğe bir mesaj bırakın, zamanı geldiğinde açıp hatırlayın.</p>
    <a href="index.php?page=create_capsule" class="btn btn-custom btn-lg mt-3 me-2">✍️ Yeni Kapsül Oluştur</a>
    <a href="index.php?page=future_capsules" class="btn btn-outline-primary btn-lg mt-3 me-2">⏳ Bekleyenleri Gör</a>
    <a href="index.php?page=site_comments" class="btn btn-outline-secondary btn-lg mt-3">💬 Ziyaretçi Yorumları</a>
</section>

<section class="mt-5 fade-in">
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
                <div class="card-body">
                    <h5 class="card-title">📬 Mesaj Gönder</h5>
                    <p class="card-text">Geleceğe yazmak istediğiniz bir notu hemen bırakabilirsiniz.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
                <div class="card-body">
                    <h5 class="card-title">⏳ Geri Sayımı İzle</h5>
                    <p class="card-text">Açılma zamanı yaklaşan kapsülleri geri sayımla takip edin.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
                <div class="card-body">
                    <h5 class="card-title">💬 Yorum Bırak</h5>
                    <p class="card-text">Site hakkında düşüncelerinizi bizimle paylaşın.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'views/layout/footer.php'; ?>
