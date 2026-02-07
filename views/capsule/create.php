<?php include 'views/layout/header.php'; ?>

<div class="container mt-5 fade-in">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-start border-success border-4">
                <div class="card-body">
                    <h2 class="text-center text-success mb-4">✍️ Yeni Zaman Kapsülü Oluştur</h2>
                    <form action="index.php?page=store_capsule" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="message" class="form-label">📨 Mesaj</label>
                            <textarea name="message" class="form-control" rows="5" required placeholder="Gelecekteki kendine bir not..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="open_date" class="form-label">🗓 Açılma Tarihi</label>
                            <input type="datetime-local" name="open_date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">🔒 Şifre (isteğe bağlı)</label>
                            <input type="text" name="password" class="form-control" placeholder="Kapsülü korumak için şifre...">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">📧 Bildirilecek E-posta (isteğe bağlı)</label>
                            <input type="email" name="email" class="form-control" placeholder="Kapsül açıldığında haber verilecek e-posta">
                        </div>
                        <div class="mb-3">
                            <label for="attachment" class="form-label">📎 Dosya Ekle (isteğe bağlı)</label>
                            <input type="file" name="attachment" class="form-control">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-custom px-4">🚀 Kapsül Oluştur</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>
