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

