<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="El mejor servidor de Minecraft: mc.duotics.com">
    <title>MC Duotics - ¡Tu aventura comienza aquí!</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(to bottom, #0d6efd, #6610f2);
            color: white;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .header {
            background: url('https://images.unsplash.com/photo-1523741543316-beb7fc7023d8?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDE4fHxtaW5lY3JhZnR8ZW58MHx8fHwxNjg3Mjk0NzEy&ixlib=rb-1.2.1&q=80&w=1080') no-repeat center center/cover;
            height: 500px;
            text-align: center;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .header h1 {
            font-size: 4rem;
            font-weight: bold;
            text-shadow: 2px 2px 10px black;
        }

        .header p {
            font-size: 1.5rem;
            text-shadow: 1px 1px 5px black;
        }

        .server-info {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
        }

        .footer {
            background-color: rgba(0, 0, 0, 0.9);
            color: white;
            text-align: center;
            padding: 1rem;
        }

        .btn-custom {
            background-color: #6610f2;
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background-color: #0d6efd;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fa-solid fa-cube"></i> MC Duotics</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#info">Información</a></li>
                    <li class="nav-item"><a class="nav-link" href="#rules">Reglas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <div class="header">
        <h1>¡Bienvenido a MC Duotics!</h1>
        <p>La mejor experiencia en Minecraft: <b>mc.duotics.com:6066</b></p>
        <a href="#info" class="btn btn-custom btn-lg mt-3">Explorar más</a>
    </div>

    <!-- Server Information -->
    <section id="info" class="container text-center mt-5">
        <div class="server-info">
            <div class="row">
                <div class="col-sm-5">
                    <h3>Información del Servidor</h3>
                    <div class="bg-dark rounded mx-5 p-4 mb-2">
                        <h3><code>mcj.duotics.com:6066</code></h3>
                    </div>

                    <p><b>Modo:</b> Survival</p>
                    <p><b>Dificultad:</b> Hardcore</p>
                </div>

                <div class="col-sm-4">
                    <h3>Estado del Servidor</h3>
                    <p><b>Online:</b> <span id="server-status">Cargando...</span></p>
                    <p><b>Servidor:</b> Java Edition</p>
                    <p><b>Versión:</b> <span id="server-version">Cargando...</span></p>
                    <p><b>Jugadores Conectados:</b> <span id="player-count">Cargando...</span></p>
                </div>

                <div class="col-sm-3">
                    <h3>Miembro mas Valioso</h3>
                    <h4><strong>Frank Barraza</strong></h4>
                    <div class="mb-2">
                        <img src="data/images/frank-barraza.jpg" alt="" class="img-fluid rounded-circle" style="max-height: 100px;">
                    </div>
                    <p><b>Rango:</b> <span id="player-count">GOD</span></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Rules -->
    <section id="rules" class="container text-center mt-5">
        <div class="server-info">
            <h2>Reglas del Servidor</h2>
            <ul class="list-group mt-3">
                <li class="list-group-item bg-transparent text-white">1. Respeta a todos los jugadores.</li>
                <li class="list-group-item bg-transparent text-white">2. Prohibido el uso de hacks o mods no permitidos.</li>
                <li class="list-group-item bg-transparent text-white">3. Evita el spam en el chat.</li>
                <li class="list-group-item bg-transparent text-white">4. Disfruta y diviértete al máximo.</li>
            </ul>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="container text-center mt-5">
        <div class="server-info">
            <h2>Contacto</h2>
            <p class="mt-3">¿Dudas o problemas? Escríbenos a: <b>soporte@duotics.com</b></p>
            <div class="mt-3">
                <a href="#" class="btn btn-custom"><i class="fab fa-discord"></i> Unirse a Discord</a>
                <a href="#" class="btn btn-custom"><i class="fab fa-twitter"></i> Twitter</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer mt-5">
        <p>© 2024 MC Duotics. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const serverIP = "mcj.duotics.com";
        const serverPort = 6066;

        async function fetchServerData() {
            try {
                const response = await fetch(`https://mcapi.us/server/status?ip=${serverIP}&port=${serverPort}`);
                const data = await response.json();

                document.getElementById("server-status").textContent = data.online ? "Sí" : "No";
                document.getElementById("server-version").textContent = data.server.name || "N/A";
                document.getElementById("player-count").textContent = `${data.players.now} / ${data.players.max}`;
            } catch (error) {
                console.error("Error al consultar la API:", error);
            }
        }

        fetchServerData();
        setInterval(fetchServerData, 10000); // Actualiza cada 30 segundos
    </script>
</body>

</html>