<?php include 'views/layout/header.php'; ?>

<div class="container mt-5 fade-in">
    <h2 class="text-center mb-4">⏳ Bekleyen Zaman Kapsülleri</h2>
    <?php if (empty($capsules)): ?>
        <div class="alert alert-info text-center">Bekleyen kapsül bulunmamaktadır.</div>
    <?php else: ?>
        <?php foreach ($capsules as $capsule): ?>
            <div class="card my-3 border-start border-warning border-5 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-warning fw-bold">📦 Saklanan Mesaj</h5>
                    <p class="text-muted">🗓 Açılma Tarihi: <?php echo $capsule['open_date']; ?></p>
                    <p id="countdown<?= $capsule['id'] ?>" class="fw-bold text-danger"></p>
                    <script>
                        const countdown<?= $capsule['id'] ?> = document.getElementById("countdown<?= $capsule['id'] ?>");
                        const targetDate<?= $capsule['id'] ?> = new Date("<?= $capsule['open_date'] ?>").getTime();

                        setInterval(() => {
                            const now = new Date().getTime();
                            const distance = targetDate<?= $capsule['id'] ?> - now;

                            if (distance < 0) {
                                countdown<?= $capsule['id'] ?>.innerHTML = "📬 Kapsül Açıldı!";
                                return;
                            }

                            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                            countdown<?= $capsule['id'] ?>.innerHTML =
                                `⏰ Geri Sayım: ${days}g ${hours}s ${minutes}d ${seconds}sn`;
                        }, 1000);
                    </script>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php include 'views/layout/footer.php'; ?>
