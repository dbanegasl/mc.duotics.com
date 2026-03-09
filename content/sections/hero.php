<!-- HERO -->
<section class="hero" id="hero">
    <div class="hero-bg">
        <div class="hero-slide active" style="background-image: url('data/bgs/bg-12.jpg')"></div>
        <div class="hero-slide" style="background-image: url('data/bgs/bg-07.jpg')"></div>
        <div class="hero-slide" style="background-image: url('data/bgs/bg-08.jpg')"></div>
        <div class="hero-slide" style="background-image: url('data/bgs/bg-09.jpg')"></div>
        <div class="hero-slide" style="background-image: url('data/bgs/bg-10.jpg')"></div>
        <div class="hero-slide" style="background-image: url('data/bgs/bg-11.jpg')"></div>
    </div>
    <canvas id="heroParticles"></canvas>

    <div class="hero-content">
        <!-- Chest 3D CSS -->
        <style>
            .mc-chest-wrapper {
                perspective: 1200px;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 220px;
                margin: 0 auto 20px;
            }
            .mc-chest {
                width: 140px;
                height: 140px;
                position: relative;
                transform-style: preserve-3d;
                /* Inclinación inicial para ver tres lados */
                transform: rotateX(-20deg) rotateY(-35deg);
                transition: transform 0.5s ease;
            }
            .mc-chest:hover {
                transform: rotateX(-15deg) rotateY(-20deg);
            }
            
            /* Animación de apertura */
            .chest-open .mc-chest .chest-lid {
                transform: rotateX(105deg);
                transition: transform 0.7s cubic-bezier(0.5, 1.8, 0.5, 0.8);
            }
            .chest-open .mc-chest-inner-glow {
                opacity: 1;
            }

            .chest-base, .chest-lid {
                position: absolute;
                top: 0; left: 0;
                width: 140px; height: 140px;
                transform-style: preserve-3d;
            }
            
            .chest-lid {
                /* Centro = 70px (Y), la tapa corta en Y=50px, cara trasera es Z=-70px */
                transform-origin: 50% 50px -70px;
                transition: transform 0.4s cubic-bezier(0.3, 0, 0.1, 1);
            }

            .face {
                position: absolute;
                background-color: #8B5E3C;
                border: 2px solid #2e1c10;
                background-image: repeating-linear-gradient(to bottom, transparent, transparent 14px, rgba(0,0,0,0.15) 14px, rgba(0,0,0,0.15) 17px);
                box-sizing: border-box;
            }
            
            /* Borde interior oscuro del cofre */
            .face::after {
                content: ''; position: absolute; top:0; left:0; right:0; bottom:0;
                border: 2px solid rgba(0,0,0,0.4);
                pointer-events: none;
            }

            /* --- CARAS DE LA BASE --- */
            .chest-base .front  { width: 140px; height: 90px; top: 50px; left: 0; transform: translateZ(70px); }
            .chest-base .back   { width: 140px; height: 90px; top: 50px; left: 0; transform: translateZ(-70px) rotateY(180deg); }
            .chest-base .right  { width: 140px; height: 90px; top: 50px; left: 0; transform: translateX(70px) rotateY(90deg); }
            .chest-base .left   { width: 140px; height: 90px; top: 50px; left: 0; transform: translateX(-70px) rotateY(-90deg); }
            .chest-base .bottom { width: 140px; height: 140px; top: 0; left: 0; transform: translateY(70px) rotateX(-90deg); background: #222; }
            .chest-base .top    { width: 140px; height: 140px; top: 0; left: 0; transform: translateY(-20px) rotateX(90deg); background: #111; border: none; background-image: none; }

            /* --- GLOW INTERIOR --- */
            .mc-chest-inner-glow {
                width: 100%; height: 100%;
                background: rgba(255, 215, 0, 0.7);
                box-shadow: inset 0 0 30px rgba(255,165,0,0.8), 0 0 60px 20px rgba(255, 215, 0, 0.4);
                opacity: 0;
                transition: opacity 0.5s;
            }

            /* --- CARAS DE LA TAPA --- */
            .chest-lid .front  { width: 140px; height: 50px; top: 0; left: 0; transform: translateZ(70px); }
            .chest-lid .back   { width: 140px; height: 50px; top: 0; left: 0; transform: translateZ(-70px) rotateY(180deg); }
            .chest-lid .right  { width: 140px; height: 50px; top: 0; left: 0; transform: translateX(70px) rotateY(90deg); }
            .chest-lid .left   { width: 140px; height: 50px; top: 0; left: 0; transform: translateX(-70px) rotateY(-90deg); }
            .chest-lid .top    { width: 140px; height: 140px; top: 0; left: 0; transform: translateY(-70px) rotateX(90deg); }
            .chest-lid .bottom { width: 140px; height: 140px; top: 0; left: 0; transform: translateY(-20px) rotateX(-90deg); background-color: #4a2f1d; border: none; background-image: none; }

            /* --- PESTILLO (LATCH) --- */
            .latch {
                position: absolute; 
                width: 24px; height: 34px;
                left: 58px; top: 30px; /* Colgado entre la tapa y la base */
                transform-style: preserve-3d;
                transform: translateZ(76px); /* 70 (borde caja) + 6 (mitad profundo) */
            }
            .latch .face {
                background-color: #B0B0B0; 
                border: 2px solid #555; 
                background-image: none;
            }
            .latch .front  { width: 24px; height: 34px; top: 0; left: 0; transform: translateZ(6px); background-color: #D3D3D3; }
            .latch .back   { width: 24px; height: 34px; top: 0; left: 0; transform: translateZ(-6px) rotateY(180deg); }
            .latch .right  { width: 12px; height: 34px; top: 0; left: 6px; transform: translateX(12px) rotateY(90deg); }
            .latch .left   { width: 12px; height: 34px; top: 0; left: 6px; transform: translateX(-12px) rotateY(-90deg); }
            .latch .top    { width: 24px; height: 12px; top: 11px; left: 0; transform: translateY(-17px) rotateX(90deg); }
            .latch .bottom { width: 24px; height: 12px; top: 11px; left: 0; transform: translateY(17px) rotateX(-90deg); }

            /* --- PARTÍCULAS --- */
            .mc-chest-particles {
                position: absolute;
                width: 140px; height: 140px;
                left: 0; top: 0;
                pointer-events: none;
                opacity: 0;
                transition: opacity 0.3s;
                transform: translateZ(0);
            }
            .chest-open .mc-chest-particles { opacity: 1; }
            .particle {
                position: absolute;
                background: #FFD700;
                width: 6px; height: 6px;
                box-shadow: 0 0 12px #FFD700;
                animation: floatUp 1.2s infinite ease-in;
                border-radius: 1px;
            }
            .p1 { left: 40px; top: 50px; animation-delay: 0s; }
            .p2 { left: 70px; top: 60px; animation-delay: 0.4s; }
            .p3 { left: 100px; top: 40px; animation-delay: 0.8s; }
            @keyframes floatUp {
                0% { transform: translateY(0) scale(1); opacity: 1; }
                100% { transform: translateY(-80px) scale(0); opacity: 0; }
            }
        </style>

        <div class="chest-wrapper mc-chest-wrapper" id="chestWrapper">
            <div class="mc-chest">
                <div class="chest-base">
                    <div class="face front"></div>
                    <div class="face back"></div>
                    <div class="face right"></div>
                    <div class="face left"></div>
                    <div class="face top"><div class="mc-chest-inner-glow"></div></div>
                    <div class="face bottom"></div>
                </div>
                <div class="chest-lid">
                    <div class="face front"></div>
                    <div class="face back"></div>
                    <div class="face right"></div>
                    <div class="face left"></div>
                    <div class="face top"></div>
                    <div class="face bottom"></div>
                    <div class="latch">
                        <div class="face front"></div>
                        <div class="face back"></div>
                        <div class="face right"></div>
                        <div class="face left"></div>
                        <div class="face top"></div>
                        <div class="face bottom"></div>
                    </div>
                </div>
                <!-- Partículas -->
                <div class="mc-chest-particles">
                    <div class="particle p1"></div>
                    <div class="particle p2"></div>
                    <div class="particle p3"></div>
                </div>
            </div>
        </div>

        <div class="hero-badge">
            <span class="dot"></span> Servidor Activo — Java &amp; Bedrock
        </div>
        <h1 class="hero-title">El Cofre de <span>Frank</span></h1>
        <p class="hero-subtitle">Abre el cofre y descubre la aventura. Servidor de Minecraft survival hardcore para Java y Bedrock Edition.</p>
        <div class="hero-actions">
            <a href="#servers" class="btn-primary-mc"><i class="fas fa-play"></i> Unirse ahora</a>
            <a href="#rules" class="btn-ghost"><i class="fas fa-scroll"></i> Ver reglas</a>
        </div>
    </div>

    <div class="hero-dots" id="heroDots">
        <button class="hero-dot active" data-slide="0"></button>
        <button class="hero-dot" data-slide="1"></button>
        <button class="hero-dot" data-slide="2"></button>
        <button class="hero-dot" data-slide="3"></button>
        <button class="hero-dot" data-slide="4"></button>
        <button class="hero-dot" data-slide="5"></button>
    </div>
</section>
