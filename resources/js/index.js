// ========================================
// CONFIGURACIÓN DEL SERVIDOR
// ========================================
const serverIP = "mcj.duotics.com";
const serverPort = 6066;

// ========================================
// SLIDER DE FONDO SIMPLE
// ========================================
class MinecraftSlider {
    constructor() {
        this.slides = document.querySelectorAll('.slide');
        this.indicators = document.querySelectorAll('.indicator');
        this.currentSlide = 0;
        this.isTransitioning = false;
        this.autoSlideInterval = null;
        
        this.init();
    }
    
    init() {
        this.startAutoSlide();
        this.addEventListeners();
        this.preloadImages();
    }
    
    preloadImages() {
        const imageUrls = [
            'data/bgs/bg-01.jpg',
            'data/bgs/bg-02.jpg',
            'data/bgs/bg-03.jpg',
            'data/bgs/bg-04.jpg',
            'data/bgs/bg-05.jpg',
            'data/bgs/bg-06.jpg'
        ];
        
        imageUrls.forEach(url => {
            const img = new Image();
            img.src = url;
        });
    }
    
    addEventListeners() {
        // Pausar autoplay en hover
        document.querySelector('.header').addEventListener('mouseenter', () => {
            this.pauseAutoSlide();
        });
        
        document.querySelector('.header').addEventListener('mouseleave', () => {
            this.startAutoSlide();
        });
        
        // Controles de teclado
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') this.changeSlide(-1);
            if (e.key === 'ArrowRight') this.changeSlide(1);
        });
    }
    
    changeSlide(direction) {
        if (this.isTransitioning) return;
        
        this.isTransitioning = true;
        this.pauseAutoSlide();
        
        // Cambiar slide sin cortina
        this.slides[this.currentSlide].classList.remove('active');
        this.indicators[this.currentSlide].classList.remove('active');
        
        if (direction > 0) {
            this.currentSlide = (this.currentSlide + 1) % this.slides.length;
        } else {
            this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
        }
        
        this.slides[this.currentSlide].classList.add('active');
        this.indicators[this.currentSlide].classList.add('active');
        
        setTimeout(() => {
            this.isTransitioning = false;
            this.startAutoSlide();
        }, 500);
    }
    
    goToSlide(index) {
        if (this.isTransitioning || index === this.currentSlide) return;
        
        const direction = index > this.currentSlide ? 1 : -1;
        this.currentSlide = index;
        this.changeSlide(direction);
    }
    
    startAutoSlide() {
        this.pauseAutoSlide();
        this.autoSlideInterval = setInterval(() => {
            this.changeSlide(1);
        }, 5000);
    }
    
    pauseAutoSlide() {
        if (this.autoSlideInterval) {
            clearInterval(this.autoSlideInterval);
            this.autoSlideInterval = null;
        }
    }
}

// ========================================
// FUNCIONES GLOBALES PARA EL SLIDER
// ========================================
let slider;

function changeSlide(direction) {
    if (slider) slider.changeSlide(direction);
}

function goToSlide(index) {
    if (slider) slider.goToSlide(index);
}

// ========================================
// SISTEMA DE LUCIÉRNAGAS VERDES
// ========================================
class MinecraftFireflies {
    constructor() {
        this.canvas = document.createElement('canvas');
        this.ctx = this.canvas.getContext('2d');
        this.fireflies = [];
        this.setup();
    }
    
    setup() {
        this.canvas.style.position = 'absolute';
        this.canvas.style.top = '0';
        this.canvas.style.left = '0';
        this.canvas.style.width = '100%';
        this.canvas.style.height = '100%';
        this.canvas.style.pointerEvents = 'none';
        this.canvas.style.zIndex = '5';
        
        document.querySelector('.header').appendChild(this.canvas);
        
        this.resize();
        this.createFireflies();
        this.animate();
        
        window.addEventListener('resize', () => this.resize());
    }
    
    resize() {
        this.canvas.width = window.innerWidth;
        this.canvas.height = window.innerHeight;
    }
    
    createFireflies() {
        const fireflyCount = Math.min(30, Math.floor(window.innerWidth / 50));
        
        for (let i = 0; i < fireflyCount; i++) {
            this.fireflies.push({
                x: Math.random() * this.canvas.width,
                y: Math.random() * this.canvas.height,
                size: Math.random() * 3 + 1,
                speedX: (Math.random() - 0.5) * 0.8,
                speedY: (Math.random() - 0.5) * 0.8,
                opacity: Math.random() * 0.7 + 0.3,
                glowIntensity: Math.random() * 0.5 + 0.3,
                pulseSpeed: Math.random() * 0.02 + 0.01,
                pulsePhase: Math.random() * Math.PI * 2
            });
        }
    }
    
    animate() {
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        
        this.fireflies.forEach(firefly => {
            // Actualizar posición con movimiento orgánico
            firefly.x += firefly.speedX;
            firefly.y += firefly.speedY;
            
            // Cambiar dirección suavemente
            if (Math.random() < 0.02) {
                firefly.speedX += (Math.random() - 0.5) * 0.1;
                firefly.speedY += (Math.random() - 0.5) * 0.1;
                
                // Limitar velocidad
                firefly.speedX = Math.max(-1, Math.min(1, firefly.speedX));
                firefly.speedY = Math.max(-1, Math.min(1, firefly.speedY));
            }
            
            // Rebotar suavemente en los bordes
            if (firefly.x <= 0 || firefly.x >= this.canvas.width) {
                firefly.speedX *= -0.8;
                firefly.x = Math.max(0, Math.min(this.canvas.width, firefly.x));
            }
            if (firefly.y <= 0 || firefly.y >= this.canvas.height) {
                firefly.speedY *= -0.8;
                firefly.y = Math.max(0, Math.min(this.canvas.height, firefly.y));
            }
            
            // Actualizar efecto de pulso
            firefly.pulsePhase += firefly.pulseSpeed;
            const pulseFactor = Math.sin(firefly.pulsePhase) * 0.3 + 0.7;
            const currentOpacity = firefly.opacity * pulseFactor;
            const currentGlow = firefly.glowIntensity * pulseFactor;
            
            // Dibujar resplandor exterior (halo)
            const gradient = this.ctx.createRadialGradient(
                firefly.x, firefly.y, 0,
                firefly.x, firefly.y, firefly.size * 8
            );
            gradient.addColorStop(0, `rgba(87, 166, 57, ${currentGlow})`);
            gradient.addColorStop(0.3, `rgba(87, 166, 57, ${currentGlow * 0.3})`);
            gradient.addColorStop(1, 'rgba(87, 166, 57, 0)');
            
            this.ctx.fillStyle = gradient;
            this.ctx.beginPath();
            this.ctx.arc(firefly.x, firefly.y, firefly.size * 8, 0, Math.PI * 2);
            this.ctx.fill();
            
            // Dibujar luciérnaga central
            this.ctx.beginPath();
            this.ctx.arc(firefly.x, firefly.y, firefly.size, 0, Math.PI * 2);
            this.ctx.fillStyle = `rgba(144, 238, 144, ${currentOpacity})`;
            this.ctx.fill();
            
            // Núcleo brillante
            this.ctx.beginPath();
            this.ctx.arc(firefly.x, firefly.y, firefly.size * 0.4, 0, Math.PI * 2);
            this.ctx.fillStyle = `rgba(255, 255, 255, ${currentOpacity * 0.8})`;
            this.ctx.fill();
        });
        
        requestAnimationFrame(() => this.animate());
    }
}

// ========================================
// EFECTOS ADICIONALES SIMPLIFICADOS
// ========================================
class MinecraftEffects {
    static init() {
        this.addScrollEffects();
        this.addHoverEffects();
    }
    
    static addScrollEffects() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);
        
        // Observar elementos que deben animarse al scroll
        document.querySelectorAll('.server-info, .list-group-item').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 0.6s ease';
            observer.observe(el);
        });
    }
    
    static addHoverEffects() {
        // Efecto de hover mejorado para botones
        document.querySelectorAll('.btn-custom').forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px) scale(1.05)';
            });
            
            btn.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    }
}

// ========================================
// CONSULTA DEL SERVIDOR
// ========================================
async function fetchServerData() {
    try {
        const response = await fetch(`https://mcapi.us/server/status?ip=${serverIP}&port=${serverPort}`);
        const data = await response.json();

        // Actualizar estado del servidor con animación
        updateServerStatus(data.online ? "✅ Online" : "❌ Offline");
        updateServerVersion(data.server?.name || "N/A");
        updatePlayerCount(`${data.players?.now || 0} / ${data.players?.max || 0}`);
        
        // Agregar efecto de parpadeo si el servidor está online
        if (data.online) {
            document.getElementById("server-status").classList.add('text-success');
        } else {
            document.getElementById("server-status").classList.add('text-danger');
        }
        
    } catch (error) {
        console.error("Error al consultar la API:", error);
        updateServerStatus("❌ Error");
        updateServerVersion("N/A");
        updatePlayerCount("N/A");
    }
}

function updateServerStatus(status) {
    const element = document.getElementById("server-status");
    element.style.opacity = '0';
    setTimeout(() => {
        element.textContent = status;
        element.style.opacity = '1';
    }, 200);
}

function updateServerVersion(version) {
    const element = document.getElementById("server-version");
    element.style.opacity = '0';
    setTimeout(() => {
        element.textContent = version;
        element.style.opacity = '1';
    }, 200);
}

function updatePlayerCount(count) {
    const element = document.getElementById("player-count");
    element.style.opacity = '0';
    setTimeout(() => {
        element.textContent = count;
        element.style.opacity = '1';
    }, 200);
}

// ========================================
// INICIALIZACIÓN SIMPLIFICADA
// ========================================
document.addEventListener('DOMContentLoaded', function() {
    // Inicializar slider simple
    slider = new MinecraftSlider();
    
    // Inicializar luciérnagas verdes
    new MinecraftFireflies();
    
    // Inicializar efectos básicos
    MinecraftEffects.init();
    
    // Consultar datos del servidor
    fetchServerData();
    setInterval(fetchServerData, 30000); // Actualizar cada 30 segundos
    
    // Smooth scrolling para enlaces internos
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    console.log('🎮 Minecraft Duotics - Sistema iniciado correctamente 🟢');
});