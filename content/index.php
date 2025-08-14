<!-- Header con Slider -->
<div class="header">
    <!-- Slider de fondo -->
    <div class="header-slider">
        <div class="slide active" style="background-image: url('data/bgs/bg-01.jpg')"></div>
        <div class="slide" style="background-image: url('data/bgs/bg-02.jpg')"></div>
        <div class="slide" style="background-image: url('data/bgs/bg-03.jpg')"></div>
        <div class="slide" style="background-image: url('data/bgs/bg-04.jpg')"></div>
        <div class="slide" style="background-image: url('data/bgs/bg-05.jpg')"></div>
        <div class="slide" style="background-image: url('data/bgs/bg-06.jpg')"></div>
    </div>

    <!-- Navegación del slider -->
    <button class="slider-nav prev" onclick="changeSlide(-1)">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button class="slider-nav next" onclick="changeSlide(1)">
        <i class="fas fa-chevron-right"></i>
    </button>

    <!-- Contenido principal -->
    <div class="header-content">
        <h1 class="mb-4 text-shadow-effect display-1">¡Explora Minecraft Duotics!</h1>
        <p class="fs-3 mb-4">
            <span class="badge bg-secondary">
                <i class="fas fa-cubes"></i> Servidor de Minecraft Java Edition
            </span>
        </p>
        <div class="py-4">
            <a href="#info" class="btn btn-custom btn-lg mt-3">
                <i class="fas fa-search"></i> Explorar más
            </a>
        </div>
    </div>

    <!-- Indicadores del slider -->
    <div class="slider-indicators">
        <div class="indicator active" onclick="goToSlide(0)"></div>
        <div class="indicator" onclick="goToSlide(1)"></div>
        <div class="indicator" onclick="goToSlide(2)"></div>
        <div class="indicator" onclick="goToSlide(3)"></div>
        <div class="indicator" onclick="goToSlide(4)"></div>
        <div class="indicator" onclick="goToSlide(5)"></div>
    </div>
</div>

<main>

<!-- Server Information -->
<section id="info" class="container text-center my-5 py-5">
    <div class="server-info" data-aos="fade-up">
        <div class="row">
            <div class="col-12 col-lg-4 mb-4">
                <div class="info-card" data-aos="flip-left" data-aos-delay="100">
                    <h3 class="mb-3">
                        <i class="fas fa-server text-success"></i>
                        Información del Servidor
                    </h3>
                    <div class="bg-dark rounded p-4 border border-success">
                        <p class="h3 mb-3">
                            <code class="text-success">mcj.duotics.com:6066</code>
                        </p>

                        <table class="table table-dark table-striped mb-0">
                            <tbody>
                                <tr>
                                    <td><b><i class="fas fa-gamepad"></i> Modo:</b></td>
                                    <td><span class="badge bg-success">Survival</span></td>
                                </tr>
                                <tr>
                                    <td><b><i class="fas fa-skull"></i> Dificultad:</b></td>
                                    <td><span class="badge bg-danger">Hardcore</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 mb-4">
                <div class="info-card" data-aos="flip-up" data-aos-delay="200">
                    <h3 class="mb-3">
                        <i class="fas fa-wifi text-primary"></i>
                        Estado del Servidor
                    </h3>
                    <table class="table table-dark table-striped mb-0">
                        <tbody>
                            <tr>
                                <th><b><i class="fas fa-power-off"></i> Online</b></th>
                                <th><span id="server-status" class="fw-bold">Cargando...</span></th>
                            </tr>
                            <tr>
                                <td><b><i class="fab fa-java"></i> Servidor:</b></td>
                                <td>Java Edition</td>
                            </tr>
                            <tr>
                                <td><b><i class="fas fa-code-branch"></i> Versión:</b></td>
                                <td><span id="server-version" class="text-info">Cargando...</span></td>
                            </tr>
                            <tr>
                                <td><b><i class="fas fa-users"></i> Jugadores:</b></td>
                                <td><span id="player-count" class="text-warning">Cargando...</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-12 col-lg-4 mb-4">
                <div class="info-card" data-aos="flip-right" data-aos-delay="300">
                    <h3 class="mb-3">
                        <i class="fas fa-crown text-warning"></i>
                        Miembro más Valioso
                    </h3>
                    <h4><strong>Frank Barraza</strong></h4>
                    <div class="mb-3">
                        <img src="data/images/frank-barraza.jpg" alt="Frank Barraza" 
                             class="img-fluid rounded-circle mvp-img" 
                             style="max-height: 120px; width: 120px; object-fit: cover;">
                    </div>
                    <p><b><i class="fas fa-medal"></i> Rango:</b> 
                        <span id="player-rank" class="badge bg-warning text-dark fs-6">GOD ⭐</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Rules -->
<section id="rules" class="container text-center my-5 py-5">
    <div class="server-info" data-aos="zoom-in">
        <h2><i class="fas fa-gavel text-danger"></i> Reglas del Servidor</h2>
        <div class="row mt-4">
            <div class="col-12 col-md-6">
                <ul class="list-group">
                    <li class="list-group-item" data-aos="slide-right" data-aos-delay="100">
                        <i class="fas fa-heart text-danger me-2"></i>
                        1. Respeta a todos los jugadores.
                    </li>
                    <li class="list-group-item" data-aos="slide-right" data-aos-delay="200">
                        <i class="fas fa-ban text-warning me-2"></i>
                        2. Prohibido el uso de hacks o mods no permitidos.
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-6">
                <ul class="list-group">
                    <li class="list-group-item" data-aos="slide-left" data-aos-delay="300">
                        <i class="fas fa-comments text-info me-2"></i>
                        3. Evita el spam en el chat.
                    </li>
                    <li class="list-group-item" data-aos="slide-left" data-aos-delay="400">
                        <i class="fas fa-smile text-success me-2"></i>
                        4. Disfruta y diviértete al máximo.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Contact -->
<section id="contact" class="container text-center my-5 py-5">
    <div class="server-info" data-aos="fade-up">
        <h2><i class="fas fa-envelope text-primary"></i> Contacto</h2>
        <p class="mt-3 fs-5">¿Dudas o problemas? Escríbenos a: 
            <b class="text-info">soporte@duotics.com</b>
        </p>
        <div class="mt-4">
            <a href="#" class="btn btn-custom mx-2" data-aos="bounce" data-aos-delay="100">
                <i class="fab fa-discord"></i> Unirse a Discord
            </a>
            <a href="#" class="btn btn-custom mx-2" data-aos="bounce" data-aos-delay="200">
                <i class="fab fa-twitter"></i> Twitter
            </a>
            <a href="#" class="btn btn-custom mx-2" data-aos="bounce" data-aos-delay="300">
                <i class="fab fa-youtube"></i> YouTube
            </a>
        </div>
    </div>
</section>

</main>