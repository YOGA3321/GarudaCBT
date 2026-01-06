/**
 * Homepage JavaScript - GarudaCBT School Website
 * Enhanced animations and interactions
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // ===== Initialize AOS =====
    // Manual initialization approach to handle timing issues
    if (typeof AOS !== 'undefined') {
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 50,
            easing: 'ease-out-cubic',
            disableMutationObserver: false
        });
        
        // Force animate elements that are already in viewport
        const forceAnimateVisibleElements = () => {
            const windowHeight = window.innerHeight;
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            document.querySelectorAll('[data-aos]:not(.aos-animate)').forEach(el => {
                const rect = el.getBoundingClientRect();
                const elementTop = rect.top + scrollTop;
                const elementVisible = (elementTop < (scrollTop + windowHeight - 50));
                
                if (elementVisible) {
                    el.classList.add('aos-animate');
                }
            });
        };
        
        // Run immediately
        forceAnimateVisibleElements();
        
        // And after a short delay for late-loading content
        setTimeout(forceAnimateVisibleElements, 100);
        setTimeout(forceAnimateVisibleElements, 500);
        
        // Also on scroll
        window.addEventListener('scroll', forceAnimateVisibleElements, { passive: true });

        // FAIL-SAFE: Force show all elements after 1000ms to prevent blank page
        setTimeout(() => {
            const stuckElements = document.querySelectorAll('[data-aos]:not(.aos-animate)');
            if (stuckElements.length > 0) {
                // console.warn('AOS Fail-safe triggered: forcing visibility for ' + stuckElements.length + ' elements');
                stuckElements.forEach(el => {
                    el.classList.add('aos-animate');
                    el.style.opacity = '1';
                    el.style.transform = 'none';
                });
            }
        }, 1000);
    }

    // ===== Hero Swiper Slider =====
    if (typeof Swiper !== 'undefined' && document.querySelector('.heroSwiper')) {
        new Swiper('.heroSwiper', {
            effect: 'fade',
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            fadeEffect: { 
                crossFade: true 
            },
            speed: 1000,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }

    // ===== Counter Animation with IntersectionObserver =====
    const counters = document.querySelectorAll('.counter');
    
    if (counters.length > 0) {
        const animateCounter = (counter) => {
            if (counter.classList.contains('animated')) return; // Prevent double animation
            counter.classList.add('animated'); // Mark as animating
            
            const target = parseInt(counter.getAttribute('data-count')) || 0;
            const duration = 2000;
            const startTime = performance.now();
            
            const updateCounter = (currentTime) => {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                
                // Easing function for smooth animation
                const easeOutQuart = 1 - Math.pow(1 - progress, 4);
                const current = Math.floor(easeOutQuart * target);
                
                counter.innerText = current.toLocaleString('id-ID');
                
                if (progress < 1) {
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.innerText = target.toLocaleString('id-ID');
                }
            };
            
            requestAnimationFrame(updateCounter);
        };

        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
                    animateCounter(entry.target);
                }
            });
        }, {
            threshold: 0.1, // Lower threshold for earlier trigger
            rootMargin: '50px 0px 50px 0px' // Trigger earlier
        });

        counters.forEach(counter => {
            counter.innerText = '0';
            counterObserver.observe(counter);
        });
        
        // Also animate counters that are already visible on page load
        setTimeout(() => {
            counters.forEach(counter => {
                const rect = counter.getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom > 0) {
                    animateCounter(counter);
                }
            });
        }, 500);
    }

    // ===== Smart Navbar Scroll Effect =====
    const navbar = document.getElementById('navbar');
    if (navbar) {
        let lastScrollY = window.scrollY;
        let ticking = false;

        const updateNavbar = () => {
            const scrollY = window.scrollY;
            
            if (scrollY > 50) {
                navbar.classList.add('shadow-lg');
                navbar.classList.remove('py-4');
                navbar.classList.add('py-2');
                navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.98)';
            } else {
                navbar.classList.remove('shadow-lg');
                navbar.classList.add('py-4');
                navbar.classList.remove('py-2');
                navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.90)';
            }
            
            lastScrollY = scrollY;
            ticking = false;
        };

        window.addEventListener('scroll', () => {
            if (!ticking) {
                requestAnimationFrame(updateNavbar);
                ticking = true;
            }
        }, { passive: true });
    }

    // ===== Smooth Scroll for Anchor Links =====
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                const navHeight = navbar ? navbar.offsetHeight : 0;
                const targetPosition = targetElement.getBoundingClientRect().top + window.scrollY - navHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // ===== Mobile Menu =====
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
    
    if (mobileMenuButton && mobileMenuOverlay) {
        mobileMenuButton.addEventListener('click', () => {
            mobileMenuOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    }

    // ===== Lazy Load Images =====
    const lazyImages = document.querySelectorAll('img[data-src]');
    if (lazyImages.length > 0 && 'IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                    imageObserver.unobserve(img);
                }
            });
        }, {
            rootMargin: '50px 0px'
        });

        lazyImages.forEach(img => imageObserver.observe(img));
    }

    // ===== Parallax Effect for Hero =====
    const heroSection = document.querySelector('section.relative.bg-slate-900');
    if (heroSection && window.innerWidth > 768) {
        window.addEventListener('scroll', () => {
            const scrolled = window.scrollY;
            const heroImage = heroSection.querySelector('.swiper-slide img, .swiper-wrapper img');
            if (heroImage && scrolled < window.innerHeight) {
                heroImage.style.transform = `scale(1.1) translateY(${scrolled * 0.3}px)`;
            }
        }, { passive: true });
    }

    // ===== Stagger Animation for Cards =====
    const cards = document.querySelectorAll('[data-aos="fade-up"]');
    cards.forEach((card, index) => {
        if (!card.getAttribute('data-aos-delay')) {
            card.setAttribute('data-aos-delay', (index % 3) * 100);
        }
    });

    // ===== Add Hover Sound Effect (optional) =====
    // Uncomment if you want subtle hover sounds
    /*
    const hoverElements = document.querySelectorAll('a, button');
    hoverElements.forEach(el => {
        el.addEventListener('mouseenter', () => {
            // Add subtle hover feedback
            el.style.transition = 'all 0.2s ease';
        });
    });
    */

    console.log('🎓 GarudaCBT Homepage Loaded Successfully');
});

// ===== Global Close Mobile Menu Function =====
function closeMobileMenu() {
    const menu = document.getElementById('mobileMenuOverlay');
    if (menu) {
        menu.classList.remove('active');
        document.body.style.overflow = 'auto';
    }
}

// ===== Global Open Mobile Menu Function =====
function openMobileMenu() {
    const menu = document.getElementById('mobileMenuOverlay');
    if (menu) {
        menu.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
}

// ===== GLOBAL FAIL-SAFE FOR AOS & CUSTOM ANIMATIONS =====
// Run this check periodically to ensure content is visible
(function() {
    function checkAndFixAnimations() {
        // 1. Fix AOS elements
        const stuckAOS = document.querySelectorAll('[data-aos]:not(.aos-animate)');
        if (stuckAOS.length > 0) {
            stuckAOS.forEach(el => {
                const rect = el.getBoundingClientRect();
                // Force show if in viewport OR if page loaded long enough (safety fallback)
                // Removed viewport check to be aggressive and ensure visibility
                el.classList.add('aos-animate');
                el.style.opacity = '1';
                el.style.transform = 'none';
            });
        }

        // 2. Fix Custom .animate-on-scroll elements (Footer etc)
        const stuckCustom = document.querySelectorAll('.animate-on-scroll:not(.is-visible)');
        if (stuckCustom.length > 0) {
            stuckCustom.forEach(el => {
                el.classList.add('is-visible');
                el.style.opacity = '1';
                el.style.transform = 'none';
            });
        }
    }

    // Run checks at intervals
    setTimeout(checkAndFixAnimations, 500);
    setTimeout(checkAndFixAnimations, 1500);
    setTimeout(checkAndFixAnimations, 3000);
    
    // Also run on scroll just in case (for late loading content)
    window.addEventListener('scroll', () => {
        // Optimization: Debounce/Limit checks
        requestAnimationFrame(() => {
             checkAndFixAnimations();
        });
    }, { passive: true });
})();
