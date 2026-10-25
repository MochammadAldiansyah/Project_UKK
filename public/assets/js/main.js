// ==========================================================================
// Mobile Navigation Drawer
// ==========================================================================
function initMobileMenu() {
    const header = document.getElementById('main-navbar') || document.getElementById('main-header');
    const menuBtn = document.getElementById('mobile-menu-btn');
    const menuWrapper = document.getElementById('mobile-menu-wrapper');
    const iconBurger = document.getElementById('icon-burger');
    const iconClose = document.getElementById('icon-close');

    if (!menuBtn || !menuWrapper) return;

    function toggleMenu(open) {
        const isOpen = typeof open === 'boolean' ? open : !menuWrapper.classList.contains('is-open');

        if (isOpen) {
            menuWrapper.classList.add('is-open');
            if (header) header.classList.add('menu-is-open');
            menuBtn.setAttribute('aria-expanded', 'true');
            if (iconBurger && iconClose) {
                iconBurger.classList.add('opacity-0', 'scale-75', '-rotate-90');
                iconClose.classList.remove('opacity-0', 'scale-75', 'rotate-90');
                iconClose.classList.add('opacity-100', 'scale-100', 'rotate-0');
            }
        } else {
            menuWrapper.classList.remove('is-open');
            if (header) header.classList.remove('menu-is-open');
            menuBtn.setAttribute('aria-expanded', 'false');
            if (iconBurger && iconClose) {
                iconBurger.classList.remove('opacity-0', 'scale-75', '-rotate-90');
                iconClose.classList.add('opacity-0', 'scale-75', 'rotate-90');
                iconClose.classList.remove('opacity-100', 'scale-100', 'rotate-0');
            }
        }
    }

    // Toggle menu button
    menuBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        toggleMenu();
    });

    // Close menu when navigation link is clicked
    const menuLinks = menuWrapper.querySelectorAll('a');
    menuLinks.forEach(function (link) {
        link.addEventListener('click', function () {
            toggleMenu(false);
        });
    });

    // Close menu on click outside
    document.addEventListener('click', function (e) {
        if (menuWrapper.classList.contains('is-open') && !menuWrapper.contains(e.target) && !menuBtn.contains(e.target)) {
            toggleMenu(false);
        }
    });

    // Close on viewport resize to desktop
    window.addEventListener('resize', function () {
        if (window.innerWidth >= 768 && menuWrapper.classList.contains('is-open')) {
            toggleMenu(false);
        }
    });
}

// ==========================================================================
// Lenis Smooth Scroll
// ==========================================================================
document.addEventListener('DOMContentLoaded', function () {
    initMobileMenu();

    if (typeof Lenis !== 'undefined') {
        const lenis = new Lenis({
            duration: 1.2,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
            orientation: 'vertical',
            gestureOrientation: 'vertical',
            smoothWheel: true,
            wheelMultiplier: 1,
            touchMultiplier: 2,
            infinite: false,
        });

        // Request animation frame loop
        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }
        requestAnimationFrame(raf);

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
            anchor.addEventListener('click', function (e) {
                const targetId = this.getAttribute('href');
                if (targetId && targetId !== '#') {
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        e.preventDefault();
                        lenis.scrollTo(targetElement, {
                            offset: -85,
                            duration: 1.3,
                        });
                    }
                }
            });
        });

        window.lenis = lenis;
    }

    initNavbarScroll();
    initEcosystemTabs();
});

// ==========================================================================
// Floating Pill Navbar Scroll Animation
// ==========================================================================
function initNavbarScroll() {
    const header = document.getElementById('main-navbar') || document.getElementById('main-header');
    if (!header) return;

    const scrollThreshold = 20;

    function updateNavbar() {
        const scrollY = window.scrollY || document.documentElement.scrollTop;
        if (scrollY > scrollThreshold) {
            if (!header.classList.contains('is-scrolled')) {
                header.classList.add('is-scrolled');
            }
        } else {
            if (header.classList.contains('is-scrolled')) {
                header.classList.remove('is-scrolled');
            }
        }
    }

    updateNavbar();

    window.addEventListener('scroll', updateNavbar, { passive: true });

    if (window.lenis) {
        window.lenis.on('scroll', updateNavbar);
    }
}

// ==========================================================================
// Ecosystem Section Tabs
// ==========================================================================
function initEcosystemTabs() {
    const tabButtons = document.querySelectorAll('[data-tab-target]');
    const tabPanels = document.querySelectorAll('.tab-panel');

    if (!tabButtons.length || !tabPanels.length) return;

    tabButtons.forEach(button => {
        button.addEventListener('click', function () {
            const targetId = this.getAttribute('data-tab-target');
            const targetPanel = document.getElementById(targetId);

            if (!targetPanel) return;

            tabButtons.forEach(btn => {
                btn.classList.remove('bg-blue-600', 'text-white', 'shadow-md', 'shadow-blue-500/20');
                btn.classList.add('text-slate-600', 'hover:text-slate-900', 'hover:bg-slate-200/60');
            });

            this.classList.remove('text-slate-600', 'hover:text-slate-900', 'hover:bg-slate-200/60');
            this.classList.add('bg-blue-600', 'text-white', 'shadow-md', 'shadow-blue-500/20');

            tabPanels.forEach(panel => {
                if (panel.id === targetId) {
                    panel.classList.remove('hidden');
                    void panel.offsetWidth;
                    panel.classList.remove('opacity-0', 'translate-y-2');
                    panel.classList.add('opacity-100', 'translate-y-0');
                } else {
                    panel.classList.add('hidden', 'opacity-0', 'translate-y-2');
                    panel.classList.remove('opacity-100', 'translate-y-0');
                }
            });
        });
    });
}


