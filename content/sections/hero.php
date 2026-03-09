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
        <!-- Chest SVG animado -->
        <div class="chest-wrapper" id="chestWrapper">
            <svg class="chest-svg" viewBox="0 0 200 180" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <radialGradient id="innerGlow" cx="50%" cy="50%" r="50%">
                        <stop offset="0%" stop-color="#FFD700" stop-opacity="0.9"/>
                        <stop offset="100%" stop-color="#FFD700" stop-opacity="0"/>
                    </radialGradient>
                </defs>

                <!-- Sombra -->
                <ellipse cx="100" cy="170" rx="75" ry="7" fill="rgba(0,0,0,0.3)"/>

                <!-- Cuerpo -->
                <g>
                    <rect x="20" y="90" width="160" height="70" rx="3" fill="#8B5E3C" stroke="#5C3A1E" stroke-width="1.5"/>
                    <rect x="25" y="95" width="150" height="60" fill="#A0714F"/>
                    <line x1="25" y1="110" x2="175" y2="110" stroke="#8B5E3C" stroke-width="1.2" opacity="0.4"/>
                    <line x1="25" y1="125" x2="175" y2="125" stroke="#8B5E3C" stroke-width="1.2" opacity="0.4"/>
                    <line x1="25" y1="140" x2="175" y2="140" stroke="#8B5E3C" stroke-width="1.2" opacity="0.4"/>
                    <rect x="20" y="90" width="8" height="70" fill="#6B4226"/>
                    <rect x="172" y="90" width="8" height="70" fill="#6B4226"/>
                    <rect x="20" y="152" width="160" height="8" fill="#6B4226"/>
                    <rect x="88" y="90" width="24" height="15" rx="2" fill="#5C3A1E"/>
                    <rect x="90" y="92" width="20" height="11" rx="1" fill="#F4D03F"/>
                    <rect x="92" y="94" width="16" height="7" rx="1" fill="#D4A017" opacity="0.6"/>
                    <rect x="93" y="95" width="4" height="3" rx="0.5" fill="#FFF8DC" opacity="0.7"/>
                </g>

                <!-- Resplandor interior -->
                <ellipse class="chest-glow" cx="100" cy="88" rx="55" ry="12" fill="url(#innerGlow)" opacity="0"/>

                <!-- Tapa (se anima) -->
                <g class="chest-lid-group">
                    <rect x="20" y="50" width="160" height="42" rx="3" fill="#9B6B4A"/>
                    <rect x="25" y="55" width="150" height="32" fill="#B07D5A"/>
                    <line x1="25" y1="65" x2="175" y2="65" stroke="#9B6B4A" stroke-width="1.2" opacity="0.35"/>
                    <line x1="25" y1="75" x2="175" y2="75" stroke="#9B6B4A" stroke-width="1.2" opacity="0.35"/>
                    <rect x="20" y="50" width="8" height="42" fill="#7A5233"/>
                    <rect x="172" y="50" width="8" height="42" fill="#7A5233"/>
                    <rect x="20" y="50" width="160" height="6" rx="3" fill="#7A5233"/>
                    <rect x="90" y="82" width="20" height="10" rx="2" fill="#F4D03F"/>
                    <rect x="92" y="84" width="16" height="6" rx="1" fill="#D4A017" opacity="0.6"/>
                    <rect x="30" y="56" width="40" height="4" rx="2" fill="#C9956B" opacity="0.4"/>
                </g>

                <!-- Partículas doradas -->
                <g class="chest-particles-group" opacity="0">
                    <circle cx="60" cy="70" r="2" fill="#F4D03F">
                        <animate attributeName="cy" values="70;30;10" dur="1.5s" repeatCount="indefinite"/>
                        <animate attributeName="opacity" values="1;0.5;0" dur="1.5s" repeatCount="indefinite"/>
                    </circle>
                    <circle cx="100" cy="65" r="2.5" fill="#FFD700">
                        <animate attributeName="cy" values="65;25;5" dur="1.2s" repeatCount="indefinite"/>
                        <animate attributeName="opacity" values="1;0.6;0" dur="1.2s" repeatCount="indefinite"/>
                    </circle>
                    <circle cx="140" cy="70" r="2" fill="#FFA500">
                        <animate attributeName="cy" values="70;35;15" dur="1.8s" repeatCount="indefinite"/>
                        <animate attributeName="opacity" values="1;0.4;0" dur="1.8s" repeatCount="indefinite"/>
                    </circle>
                    <circle cx="80" cy="68" r="1.5" fill="#FFEC8B">
                        <animate attributeName="cy" values="68;28;8" dur="1.4s" repeatCount="indefinite"/>
                        <animate attributeName="opacity" values="1;0.5;0" dur="1.4s" repeatCount="indefinite"/>
                    </circle>
                    <circle cx="120" cy="72" r="1.5" fill="#F4D03F">
                        <animate attributeName="cy" values="72;32;12" dur="1.6s" repeatCount="indefinite"/>
                        <animate attributeName="opacity" values="1;0.3;0" dur="1.6s" repeatCount="indefinite"/>
                    </circle>
                </g>
            </svg>
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
