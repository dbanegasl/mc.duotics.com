<!-- SERVERS — Bento Grid -->
<section class="server-section" id="servers">
    <div class="reveal" style="text-align:center;">
        <span class="section-label"><i class="fas fa-server"></i> Conexión</span>
        <h2 class="section-heading">Elige tu Edición</h2>
        <p class="section-sub">Dos formas de unirte a la aventura. Mismo mundo, misma comunidad.</p>
    </div>

    <div class="bento-grid">
        <!-- Java Card -->
        <div class="bento-card bento-java reveal reveal-delay-1">
            <div class="card-label">
                <span class="label-dot label-dot-java"></span> Java Edition
            </div>
            <div class="server-ip-box">
                <div class="ip-info">
                    <span class="ip-text ip-java">mcj.duotics.com</span>
                    <span class="ip-port">Puerto 6066</span>
                </div>
                <button class="btn-copy" onclick="copyIP('mcj.duotics.com:6066')">
                    <i class="fas fa-copy"></i> Copiar
                </button>
            </div>
            <div class="server-meta">
                <div class="meta-item">
                    <span class="meta-label">Modo</span>
                    <span class="meta-value">Survival</span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Dificultad</span>
                    <span class="meta-value" style="color:var(--danger)">Hardcore</span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Plataforma</span>
                    <span class="meta-value"><i class="fab fa-java"></i> Java</span>
                </div>
            </div>
        </div>

        <!-- Bedrock Card -->
        <div class="bento-card bento-bedrock reveal reveal-delay-2">
            <div class="card-label">
                <span class="label-dot label-dot-bedrock"></span> Bedrock Edition
            </div>
            <div class="server-ip-box">
                <div class="ip-info">
                    <span class="ip-text ip-bedrock">mcj.duotics.com</span>
                    <span class="ip-port">Puerto 6076</span>
                </div>
                <button class="btn-copy" onclick="copyIP('mcj.duotics.com:6076')">
                    <i class="fas fa-copy"></i> Copiar
                </button>
            </div>
            <div class="server-meta">
                <div class="meta-item">
                    <span class="meta-label">Modo</span>
                    <span class="meta-value">Survival</span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Dificultad</span>
                    <span class="meta-value" style="color:var(--danger)">Hardcore</span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Plataforma</span>
                    <span class="meta-value"><i class="fas fa-mobile-alt"></i> Bedrock</span>
                </div>
            </div>
        </div>

        <!-- Status Card -->
        <div class="bento-card bento-status reveal reveal-delay-3">
            <div class="card-label">
                <span class="label-dot label-dot-status"></span> Estado en vivo
            </div>
            <div class="status-indicator">
                <div class="status-dot" id="statusDot"></div>
                <span class="status-text loading" id="statusText">Consultando...</span>
            </div>
            <div class="status-details">
                <div class="status-row">
                    <span class="status-key">Versión</span>
                    <span class="status-val" id="serverVersion">—</span>
                </div>
                <div class="status-row">
                    <span class="status-key">Jugadores</span>
                    <span class="status-val" id="playerCount">—</span>
                </div>
            </div>
        </div>

        <!-- MVP Card -->
        <div class="bento-card bento-mvp reveal reveal-delay-4">
            <div class="card-label">
                <span class="label-dot label-dot-gold"></span> Miembro MVP
            </div>
            <div class="mvp-layout">
                <img src="data/images/frank-barraza.jpg" alt="Frank Barraza" class="mvp-avatar">
                <div>
                    <p class="mvp-name">Frank Barraza</p>
                    <span class="mvp-rank"><i class="fas fa-crown"></i> GOD</span>
                </div>
            </div>
        </div>

        <!-- Info Card -->
        <div class="bento-card bento-info reveal reveal-delay-5">
            <div class="card-label">
                <span class="label-dot label-dot-info"></span> Estadísticas
            </div>
            <div class="info-stats">
                <div class="stat-box">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Online</div>
                </div>
                <div class="stat-box">
                    <div class="stat-number">1.21+</div>
                    <div class="stat-label">Versión</div>
                </div>
                <div class="stat-box">
                    <div class="stat-number">2</div>
                    <div class="stat-label">Ediciones</div>
                </div>
                <div class="stat-box">
                    <div class="stat-number">&infin;</div>
                    <div class="stat-label">Aventura</div>
                </div>
            </div>
        </div>
    </div>
</section>
