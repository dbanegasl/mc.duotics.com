<?php
define('BASE_PATH', __DIR__);
include(__DIR__ . "/frames/_head.php");
?>

<?php include(__DIR__ . "/content/index.php"); ?>

<!-- Footer -->
<footer class="footer mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0">© 2025 MC Duotics. Todos los derechos reservados.</p>
            </div>
            <div class="col-md-6 text-end">
                <div class="social-links">
                    <a href="#" class="text-decoration-none me-3">
                        <i class="fab fa-discord"></i>
                    </a>
                    <a href="#" class="text-decoration-none me-3">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-decoration-none">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Scripts -->
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- AOS Animation -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- Custom JavaScript -->
<script src="resources/js/index.js"></script>

<script>
    // Inicializar AOS
    AOS.init({
        duration: 800,
        once: true,
        offset: 100
    });
</script>

</body>
</html>