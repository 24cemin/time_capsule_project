<?php

?>
</div> 

<footer class="text-center py-4 mt-5 bg-dark text-white small">
    <div class="container">
        <p class="mb-1">© <?php echo date('Y'); ?> Zaman Kapsülü</p>
        <p class="mb-0">⏳ Geleceğe mesaj bırak, zamanı gelince hatırla.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const toggleButton = document.getElementById('themeToggle');
    const body = document.body;

    // Kaydedilen tercih varsa yükle
    if (localStorage.getItem('theme') === 'dark') {
        body.classList.add('dark-mode');
    }

    toggleButton.addEventListener('click', () => {
        body.classList.toggle('dark-mode');

        // Tercihi sakla
        if (body.classList.contains('dark-mode')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
    });
</script>

</body>
</html>
