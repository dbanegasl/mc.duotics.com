/* =============================================
   EL COFRE DE FRANK — Main JS
   ============================================= */

(function () {
    'use strict';

    /* ----- Hero Slider ----- */
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.hero-dot');
    let currentSlide = 0;
    let slideTimer;

    function goToSlide(index) {
        slides[currentSlide].classList.remove('active');
        dots[currentSlide].classList.remove('active');
        currentSlide = (index + slides.length) % slides.length;
        slides[currentSlide].classList.add('active');
        dots[currentSlide].classList.add('active');
    }

    function nextSlide() {
        goToSlide(currentSlide + 1);
    }

    function startSlider() {
        slideTimer = setInterval(nextSlide, 6000);
    }

    dots.forEach(function (dot) {
        dot.addEventListener('click', function () {
            clearInterval(slideTimer);
            goToSlide(parseInt(this.dataset.slide, 10));
            startSlider();
        });
    });

    if (slides.length > 1) startSlider();

    /* ----- Chest Animation (auto open/close) ----- */
    const chest = document.getElementById('chestWrapper');
    let chestOpen = false;

    function toggleChest() {
        chestOpen = !chestOpen;
        if (chestOpen) {
            chest.classList.add('chest-open');
        } else {
            chest.classList.remove('chest-open');
        }
    }

    // Auto-cycle every 5 seconds
    setInterval(function () {
        toggleChest();
        // Auto close after 2.5s if open
        if (chestOpen) {
            setTimeout(function () {
                if (chestOpen) toggleChest();
            }, 2500);
        }
    }, 5000);

    // Click to toggle
    if (chest) {
        chest.addEventListener('click', function () {
            toggleChest();
        });
    }

    /* ----- Navbar scroll ----- */
    var navbar = document.getElementById('mainNavbar');

    function onScroll() {
        if (window.scrollY > 60) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    /* ----- Mobile nav toggle ----- */
    var navToggle = document.getElementById('navToggle');
    var navLinks = document.getElementById('navLinks');

    if (navToggle && navLinks) {
        navToggle.addEventListener('click', function () {
            navLinks.classList.toggle('open');
            var icon = navToggle.querySelector('i');
            if (navLinks.classList.contains('open')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Close on link click
        navLinks.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                navLinks.classList.remove('open');
                var icon = navToggle.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            });
        });
    }

    /* ----- Reveal on scroll ----- */
    var reveals = document.querySelectorAll('.reveal');

    var revealObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    reveals.forEach(function (el) {
        revealObserver.observe(el);
    });

    /* ----- Bento card mouse tracking ----- */
    document.querySelectorAll('.bento-card').forEach(function (card) {
        card.addEventListener('mousemove', function (e) {
            var rect = card.getBoundingClientRect();
            card.style.setProperty('--mouse-x', (e.clientX - rect.left) + 'px');
            card.style.setProperty('--mouse-y', (e.clientY - rect.top) + 'px');
        });
    });

    /* ----- Copy IP ----- */
    window.copyIP = function (ip) {
        navigator.clipboard.writeText(ip).then(function () {
            // Find the button that was clicked
            var btns = document.querySelectorAll('.btn-copy');
            btns.forEach(function (btn) {
                if (btn.getAttribute('onclick').indexOf(ip) !== -1) {
                    btn.classList.add('copied');
                    btn.innerHTML = '<i class="fas fa-check"></i> Copiado';
                    setTimeout(function () {
                        btn.classList.remove('copied');
                        btn.innerHTML = '<i class="fas fa-copy"></i> Copiar';
                    }, 2000);
                }
            });
        });
    };

    /* ----- Server Status ----- */
    function fetchServerStatus() {
        var statusDot = document.getElementById('statusDot');
        var statusText = document.getElementById('statusText');
        var serverVersion = document.getElementById('serverVersion');
        var playerCount = document.getElementById('playerCount');

        var apiURL = 'https://mcapi.us/server/status?ip=mcj.duotics.com&port=6066';

        fetch(apiURL)
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (data.online) {
                    statusDot.classList.add('online');
                    statusText.textContent = 'Online';
                    statusText.className = 'status-text online';
                    serverVersion.textContent = data.server ? data.server.name : '—';
                    playerCount.textContent = (data.players ? data.players.now : 0) + ' / ' + (data.players ? data.players.max : '?');
                } else {
                    statusDot.classList.remove('online');
                    statusText.textContent = 'Offline';
                    statusText.className = 'status-text offline';
                    serverVersion.textContent = '—';
                    playerCount.textContent = '0';
                }
            })
            .catch(function () {
                statusText.textContent = 'Error';
                statusText.className = 'status-text offline';
            });
    }

    fetchServerStatus();
    setInterval(fetchServerStatus, 60000);

    /* ----- Hero Particles Canvas ----- */
    var canvas = document.getElementById('heroParticles');
    if (canvas) {
        var ctx = canvas.getContext('2d');
        var particles = [];
        var particleCount = 35;

        function resizeCanvas() {
            canvas.width = canvas.parentElement.offsetWidth;
            canvas.height = canvas.parentElement.offsetHeight;
        }

        resizeCanvas();
        window.addEventListener('resize', resizeCanvas);

        function Particle() {
            this.reset();
        }

        Particle.prototype.reset = function () {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 2 + 0.5;
            this.speedX = (Math.random() - 0.5) * 0.3;
            this.speedY = -Math.random() * 0.4 - 0.1;
            this.opacity = Math.random() * 0.5 + 0.1;
            this.color = Math.random() > 0.5 ? '#c8a24e' : '#4ade80';
        };

        Particle.prototype.update = function () {
            this.x += this.speedX;
            this.y += this.speedY;
            this.opacity -= 0.001;

            if (this.opacity <= 0 || this.y < -10 || this.x < -10 || this.x > canvas.width + 10) {
                this.reset();
                this.y = canvas.height + 10;
            }
        };

        Particle.prototype.draw = function () {
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fillStyle = this.color;
            ctx.globalAlpha = this.opacity;
            ctx.fill();
        };

        for (var i = 0; i < particleCount; i++) {
            particles.push(new Particle());
        }

        function animateParticles() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(function (p) {
                p.update();
                p.draw();
            });
            ctx.globalAlpha = 1;
            requestAnimationFrame(animateParticles);
        }

        animateParticles();
    }

})();