<?php include 'views/layout/header.php'; ?>

<div class="container mt-5">
    <h2>Şifreli Kapsül</h2>
    <p>Bu kapsül şifre ile korunuyor. Lütfen açmak için şifreyi girin.</p>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form action="index.php?page=check_password&id=<?php echo $capsule['id']; ?>" method="POST">
        <div class="mb-3">
            <label for="password" class="form-label">Şifre</label>
            <input type="text" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Gönder</button>
    </form>
</div>

<?php include 'views/layout/footer.php'; ?>
