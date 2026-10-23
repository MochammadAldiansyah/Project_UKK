// kode untuk burger button
    const menuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const iconBurger = document.getElementById('icon-burger');
    const iconClose = document.getElementById('icon-close');

    if (menuBtn && mobileMenu) {
        // Toggle buka/tutup menu saat tombol burger diklik
        menuBtn.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
            iconBurger.classList.toggle('hidden');
            iconClose.classList.toggle('hidden');
        });

        // Tutup menu saat salah satu link navigasi diklik
        const menuLinks = mobileMenu.querySelectorAll('a');
        menuLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                mobileMenu.classList.add('hidden');
                iconBurger.classList.remove('hidden');
                iconClose.classList.add('hidden');
            });
        });
    }

// ==========================================================================
// Inisialisasi Lenis Smooth Scroll
// ==========================================================================
document.addEventListener('DOMContentLoaded', function () {
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

