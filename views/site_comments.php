<?php include 'views/layout/header.php'; ?>

<div class="container mt-5 fade-in">
    <h2 class="text-center mb-4">💬 Ziyaretçi Yorumları</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-start border-info border-4 mb-4">
                <div class="card-body">
                    <form action="index.php?page=submit_comment" method="POST">
                        <div class="mb-3">
                            <label for="comment_text" class="form-label">✍️ Yorumunuzu Yazın</label>
                            <textarea name="comment_text" class="form-control" rows="3" placeholder="Bu site hakkındaki düşünceleriniz..." required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-custom">📝 Gönder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if (!empty($comments)): ?>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php foreach ($comments as $comment): ?>
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <p class="card-text">🗨️ <?php echo nl2br(htmlspecialchars($comment['comment_text'])); ?></p>
                            <p class="text-muted text-end small">🕒 <?php echo $comment['created_at']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">Henüz yorum yapılmamış.</div>
    <?php endif; ?>
</div>

<?php include 'views/layout/footer.php'; ?>
