// ===========================
// Global Variables
// ===========================
let currentSlide = 0;
let currentLanguage = 'tr';
const translations = {
    tr: {},
    en: {}
};

// ===========================
// Sayfa yükleme animasyonu (film rulosu)
// En az 700 ms görünür; sayfa yüklenince kaybolur; 5 s içinde her durumda kalkar.
// ===========================
(function initPageLoader() {
    const loader = document.getElementById('pageLoader');
    if (!loader) return;
    const shownAt = Date.now();
    const MIN_MS = 700;
    let done = false;
    function hide() {
        if (done) return;
        done = true;
        const wait = Math.max(0, MIN_MS - (Date.now() - shownAt));
        setTimeout(() => {
            loader.classList.add('is-hidden');
            setTimeout(() => loader.remove(), 500);
        }, wait);
    }
    if (document.readyState === 'complete') hide();
    else window.addEventListener('load', hide, { once: true });
    setTimeout(hide, 5000); // emniyet: bir kaynak takılırsa bile sayfa açılsın
})();

// ===========================
// DOM Content Loaded
// ===========================
document.addEventListener('DOMContentLoaded', function() {
    initNavbar();
    initCarousel();
    initLanguageSwitcher();
    initStatsCounter();
    initScrollAnimations();
    storeTranslations();
    initCookieBanner();
});

// ===========================
// Çerez Onay Bandı
// ===========================
function initCookieBanner() {
    const banner = document.getElementById('cookieBanner');
    if (!banner) return;

    let consent = null;
    try { consent = localStorage.getItem('cookieConsent'); } catch (e) {}

    // Daha önce yanıt verilmediyse bandı göster
    if (!consent) {
        banner.hidden = false;
        requestAnimationFrame(() => banner.classList.add('show'));
    }

    function respond(value) {
        try { localStorage.setItem('cookieConsent', value); } catch (e) {}
        // Dil tercihi her koşulda korunur (gerekli/işlevsel tercih, reddetsen bile silinmez).
        banner.classList.remove('show');
        setTimeout(() => { banner.hidden = true; }, 300);
    }

    const acceptBtn = document.getElementById('cookieAccept');
    const rejectBtn = document.getElementById('cookieReject');
    if (acceptBtn) acceptBtn.addEventListener('click', () => respond('accepted'));
    if (rejectBtn) rejectBtn.addEventListener('click', () => respond('rejected'));
}


// ===========================
// Navbar Functions
// ===========================
function initNavbar() {
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('navMenu');
    const navbar = document.getElementById('navbar');

    // Mobile menu toggle
    if (hamburger) {
        hamburger.addEventListener('click', function() {
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('active');
        });
    }

    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
        const isClickInside = navMenu.contains(event.target) || hamburger.contains(event.target);
        if (!isClickInside && navMenu.classList.contains('active')) {
            hamburger.classList.remove('active');
            navMenu.classList.remove('active');
        }
    });

    // Dropdown: üst "Ürünler" linki her cihazda normal şekilde products.php'ye gitsin.
    // (Alt menü masaüstünde hover ile açılır; Ürünler sayfası zaten tüm kategorileri listeler.)
    // Mobilde alt menüyü açmak için yalnızca ok simgesine dokunmak yeterlidir.
    document.querySelectorAll('.dropdown > a .dropdown-arrow').forEach(arrow => {
        arrow.addEventListener('click', function(e) {
            if (window.innerWidth <= 1024) {
                e.preventDefault();
                e.stopPropagation();
                this.closest('.dropdown').classList.toggle('active');
            }
        });
    });

    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href.length > 1) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    const offsetTop = target.offsetTop - 80;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
}

// ===========================
// Carousel Functions
// ===========================
function initCarousel() {
    const slides = document.querySelectorAll('.carousel-slide');
    const dots = document.querySelectorAll('.dot');
    const prevBtn = document.querySelector('.carousel-btn.prev');
    const nextBtn = document.querySelector('.carousel-btn.next');

    if (slides.length === 0) return;

    function showSlide(index) {
        // Remove active class from all slides
        slides.forEach(slide => {
            slide.classList.remove('active');
        });

        // Remove active class from all dots
        dots.forEach(dot => {
            dot.classList.remove('active');
        });

        // Wrap around if index is out of bounds
        if (index >= slides.length) {
            currentSlide = 0;
        } else if (index < 0) {
            currentSlide = slides.length - 1;
        } else {
            currentSlide = index;
        }

        // Add active class to current slide and dot
        slides[currentSlide].classList.add('active');
        if (dots[currentSlide]) {
            dots[currentSlide].classList.add('active');
        }
    }

    function nextSlide() {
        showSlide(currentSlide + 1);
    }

    function prevSlide() {
        showSlide(currentSlide - 1);
    }

    // Event listeners
    if (nextBtn) {
        nextBtn.addEventListener('click', nextSlide);
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', prevSlide);
    }

    // Dot navigation
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlide(index);
        });
    });

    // Auto advance carousel
    let autoAdvance = setInterval(nextSlide, 6000);

    // Pause auto advance on hover
    const carouselContainer = document.querySelector('.hero-carousel');
    if (carouselContainer) {
        carouselContainer.addEventListener('mouseenter', () => {
            clearInterval(autoAdvance);
        });

        carouselContainer.addEventListener('mouseleave', () => {
            autoAdvance = setInterval(nextSlide, 6000);
        });
    }

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            prevSlide();
            clearInterval(autoAdvance);
            autoAdvance = setInterval(nextSlide, 6000);
        } else if (e.key === 'ArrowRight') {
            nextSlide();
            clearInterval(autoAdvance);
            autoAdvance = setInterval(nextSlide, 6000);
        }
    });

    // Initialize first slide
    showSlide(0);
}

// ===========================
// Language Switcher
// ===========================
function storeTranslations() {
    // Store all translations on page load
    document.querySelectorAll('[data-tr]').forEach(element => {
        const tr = element.getAttribute('data-tr');
        const en = element.getAttribute('data-en');
        const key = element.textContent.trim();

        if (!translations.tr[key]) {
            translations.tr[key] = tr;
        }
        if (!translations.en[key]) {
            translations.en[key] = en;
        }
    });
}

function initLanguageSwitcher() {
    const langButtons = document.querySelectorAll('.lang-btn');

    // Daha önce seçilen dili hatırla (yalnızca çerez onayı verildiyse kalıcı olur)
    let savedLang = 'tr';
    try {
        savedLang = localStorage.getItem('polikonLang') || 'tr';
    } catch (e) {}

    function applyLang(lang) {
        langButtons.forEach(btn => {
            btn.classList.toggle('active', btn.getAttribute('data-lang') === lang);
        });
        currentLanguage = lang;
        updatePageLanguage(lang);
    }

    langButtons.forEach(button => {
        button.addEventListener('click', function() {
            const lang = this.getAttribute('data-lang');
            // Dil tercihi her zaman kalıcı saklanır (gerekli/işlevsel tercih)
            try { localStorage.setItem('polikonLang', lang); } catch (e) {}
            applyLang(lang);
        });
    });

    // Sayfa yüklendiğinde kayıtlı dili uygula
    applyLang(savedLang);
}

function updatePageLanguage(lang) {
    document.querySelectorAll('[data-tr]').forEach(element => {
        const translation = element.getAttribute('data-' + lang);
        if (translation) {
            // Check if element is an input or textarea
            if (element.tagName === 'INPUT' || element.tagName === 'TEXTAREA') {
                element.placeholder = translation;
            } else {
                element.textContent = translation;
            }
        }
    });

    // Update document language attribute
    document.documentElement.lang = lang;
}

// ===========================
// Stats Counter Animation
// ===========================
function initStatsCounter() {
    const stats = document.querySelectorAll('.stat-number');
    let counted = false;

    function isElementInViewport(el) {
        const rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    function countUp(element) {
        const target = parseInt(element.getAttribute('data-target'));
        const duration = 2000; // 2 seconds
        const increment = target / (duration / 16); // 60fps
        let current = 0;

        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                element.innerHTML = formatNumber(target) + (element.querySelector('span') ? '<span>+</span>' : '');
                clearInterval(timer);
            } else {
                element.innerHTML = formatNumber(Math.floor(current)) + (element.querySelector('span') ? '<span>+</span>' : '');
            }
        }, 16);
    }

    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function checkStats() {
        if (counted) return;

        stats.forEach(stat => {
            if (isElementInViewport(stat)) {
                countUp(stat);
                counted = true;
            }
        });
    }

    // Check on scroll
    window.addEventListener('scroll', checkStats);
    // Check on load
    checkStats();
}

// ===========================
// Scroll Animations
// ===========================
function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Add animation styles to elements
    const animatedElements = document.querySelectorAll('.product-card, .news-card, .stat-item');
    animatedElements.forEach((el, index) => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
        observer.observe(el);
    });
}

// ===========================
// Search Functionality
// ===========================
function initSearch() {
    const searchBtn = document.querySelector('.search-btn');
    const searchOverlay = document.getElementById('searchOverlay');
    const searchClose = document.getElementById('searchClose');
    const searchForm = document.getElementById('searchForm');
    const searchInput = searchOverlay ? searchOverlay.querySelector('.search-input') : null;

    if (!searchBtn || !searchOverlay) return;

    searchBtn.addEventListener('click', function(e) {
        e.preventDefault();
        searchOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
        setTimeout(function() {
            if (searchInput) searchInput.focus();
        }, 300);
    });

    if (searchClose) {
        searchClose.addEventListener('click', function() {
            searchOverlay.classList.remove('active');
            document.body.style.overflow = '';
        });
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && searchOverlay.classList.contains('active')) {
            searchOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }
    });

    searchOverlay.addEventListener('click', function(e) {
        if (e.target === searchOverlay || e.target === searchOverlay.querySelector('.search-overlay-content')) {
            searchOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }
    });

    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            var query = searchInput.value.trim();
            if (query) {
                window.location.href = 'search.php?q=' + encodeURIComponent(query);
            }
        });
    }
}
initSearch();

// ===========================
// Form Validation (for contact page)
// ===========================
function validateForm(formId) {
    const form = document.getElementById(formId);
    if (!form) return;

    form.addEventListener('submit', function(e) {
        const inputs = form.querySelectorAll('input[required], textarea[required], select[required]');
        let isValid = true;

        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.classList.add('error');
                setTimeout(() => { input.classList.remove('error'); }, 3000);
            } else {
                input.classList.remove('error');
            }
        });

        // Email validation
        const emailInput = form.querySelector('input[type="email"]');
        if (emailInput && emailInput.value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailInput.value)) {
                isValid = false;
                emailInput.classList.add('error');
                setTimeout(() => { emailInput.classList.remove('error'); }, 3000);
            }
        }

        // Geçersizse gönderimi engelle; geçerliyse formun sunucuya POST etmesine izin ver.
        if (!isValid) {
            e.preventDefault();
            const errorMessage = currentLanguage === 'tr'
                ? 'Lütfen tüm zorunlu alanları doldurun.'
                : 'Please fill in all required fields.';
            alert(errorMessage);
        }
    });
}

// Initialize form validation
validateForm('contactForm');

// ===========================
// Utility Functions
// ===========================

// Debounce function for performance
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Throttle function for scroll events
function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// Lazy load images
function lazyLoadImages() {
    const images = document.querySelectorAll('img[data-src]');

    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
                observer.unobserve(img);
            }
        });
    });

    images.forEach(img => imageObserver.observe(img));
}

// Initialize lazy loading
lazyLoadImages();

// ===========================
// Ürün detay: aralık çubukları (RangeBox) + eğimli görsel (TiltImage)
// polikon-website ProductDetail.jsx / TiltImage.jsx davranışının portu
// ===========================
function initRangeBoxes() {
    const boxes = document.querySelectorAll('.range-box');
    if (!boxes.length) return;
    if (!('IntersectionObserver' in window)) {
        boxes.forEach((b) => b.classList.add('is-visible'));
        return;
    }
    const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                io.unobserve(entry.target);
            }
        });
    }, { threshold: 0.4 });
    boxes.forEach((b) => io.observe(b));
}

function initTiltImages() {
    document.querySelectorAll('.tilt-image').forEach((el) => {
        el.addEventListener('mousemove', (e) => {
            const rect = el.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width - 0.5;
            const y = (e.clientY - rect.top) / rect.height - 0.5;
            el.style.setProperty('--tilt-x', `${(-y * 6).toFixed(2)}deg`);
            el.style.setProperty('--tilt-y', `${(x * 6).toFixed(2)}deg`);
        });
        el.addEventListener('mouseleave', () => {
            el.style.setProperty('--tilt-x', '0deg');
            el.style.setProperty('--tilt-y', '0deg');
        });
    });
}

initRangeBoxes();
initTiltImages();

// ===========================
// Back to Top Button
// ===========================
function createBackToTopButton() {
    const button = document.createElement('button');
    button.type = 'button';
    button.setAttribute('aria-label', 'Yukarı çık');
    // Yukarı yönlü ok (SVG)
    button.innerHTML = '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 19V5"></path><polyline points="5 12 12 5 19 12"></polyline></svg>';
    button.className = 'back-to-top';
    button.style.cssText = `
        position: fixed;
        bottom: 32px;
        right: 32px;
        width: 64px;
        height: 64px;
        border-radius: 50%;
        background-color: #f7941e;
        color: #fff;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        cursor: pointer;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.2s ease, background-color 0.2s ease;
        z-index: 999;
        box-shadow: 0 8px 22px rgba(247, 148, 30, 0.4);
    `;
    button.addEventListener('mouseenter', () => { button.style.transform = 'translateY(-3px)'; button.style.backgroundColor = '#e0821a'; });
    button.addEventListener('mouseleave', () => { button.style.transform = ''; button.style.backgroundColor = '#f7941e'; });

    button.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    document.body.appendChild(button);

    window.addEventListener('scroll', throttle(() => {
        if (window.scrollY > 500) {
            button.style.opacity = '1';
            button.style.visibility = 'visible';
        } else {
            button.style.opacity = '0';
            button.style.visibility = 'hidden';
        }
    }, 200));
}

// Create back to top button
createBackToTopButton();

// ===========================
// Console Message
// ===========================
console.log('%cPolikon', 'font-size: 24px; font-weight: bold; color: #d4af37;');
console.log('%cPremium BOPP & CPP Film Solutions', 'font-size: 14px; color: #b8b8b8;');
console.log('%c→ www.polikon.com.tr', 'font-size: 12px; color: #8a8a8a;');
