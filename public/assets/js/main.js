// ==========================================================================
// Inisialisasi Mobile Burger Menu Dropdown Super Smooth
// ==========================================================================
function initMobileMenu() {
    const header = document.getElementById('main-header');
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

    // Toggle menu saat tombol burger diklik
    menuBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        toggleMenu();
    });

    // Tutup menu saat salah satu link navigasi diklik
    const menuLinks = menuWrapper.querySelectorAll('a');
    menuLinks.forEach(function (link) {
        link.addEventListener('click', function () {
            toggleMenu(false);
        });
    });

    // Tutup menu saat pengguna mengklik di luar area menu
    document.addEventListener('click', function (e) {
        if (menuWrapper.classList.contains('is-open') && !menuWrapper.contains(e.target) && !menuBtn.contains(e.target)) {
            toggleMenu(false);
        }
    });

    // Tutup otomatis jika ukuran layar di-resize ke desktop (>= 768px)
    window.addEventListener('resize', function () {
        if (window.innerWidth >= 768 && menuWrapper.classList.contains('is-open')) {
            toggleMenu(false);
        }
    });
}

// ==========================================================================
// Inisialisasi Lenis Smooth Scroll
// ==========================================================================
document.addEventListener('DOMContentLoaded', function () {
    // Inisialisasi mobile menu burger
    initMobileMenu();
    if (typeof Lenis !== 'undefined') {
        const lenis = new Lenis({
            duration: 1.2,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), // Easing eksponensial lembut
            orientation: 'vertical',
            gestureOrientation: 'vertical',
            smoothWheel: true,
            wheelMultiplier: 1,
            touchMultiplier: 2,
            infinite: false,
        });

        // Loop animasi requestAnimationFrame untuk update pergerakan Lenis
        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }
        requestAnimationFrame(raf);

        // Integrasi smooth scroll saat mengklik anchor link (seperti #lowongan, #perusahaan, dll.)
        document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
            anchor.addEventListener('click', function (e) {
                const targetId = this.getAttribute('href');
                if (targetId && targetId !== '#') {
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        e.preventDefault();
                        lenis.scrollTo(targetElement, {
                            offset: -20,
                            duration: 1.3,
                        });
                    }
                }
            });
        });

        // Simpan instance Lenis di window agar dapat diakses global jika diperlukan
        window.lenis = lenis;
    }

    // Inisialisasi animasi floating pill navbar
    initNavbarScroll();
});

// ==========================================================================
// Animasi Navbar Mengecil Menjadi Floating Pill Saat Scroll
// ==========================================================================
function initNavbarScroll() {
    const header = document.getElementById('main-header');
    if (!header) return;

    const scrollThreshold = 35; // Jarak scroll (px) sebelum navbar berubah menjadi pill

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

    // Jalankan cek posisi saat pertama kali load
    updateNavbar();

    // Event listener scroll bawaan browser
    window.addEventListener('scroll', updateNavbar, { passive: true });

    // Sinkronisasi dengan Lenis scroll jika aktif
    if (window.lenis) {
        window.lenis.on('scroll', updateNavbar);
    }
}

