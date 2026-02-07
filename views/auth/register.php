<?php include 'views/layout/header.php'; ?>

<div class="container mt-5 fade-in">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-start border-success border-4">
                <div class="card-body">
                    <h2 class="text-center text-success mb-4">📝 Kayıt Ol</h2>

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger text-center">⚠️ <?php echo $error; ?></div>
                    <?php endif; ?>

                    <form action="index.php?page=register_submit" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">👤 Kullanıcı Adı</label>
                            <input type="text" name="username" class="form-control" placeholder="Kullanıcı adınızı girin" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">📧 E-posta</label>
                            <input type="email" name="email" class="form-control" placeholder="ornek@mail.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">🔑 Şifre</label>
                            <input type="password" name="password" class="form-control" placeholder="Şifrenizi girin" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-custom px-4">✅ Kayıt Ol</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>
