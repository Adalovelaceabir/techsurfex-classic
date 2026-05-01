(function() {
    const mobileBtn = document.getElementById('mobileMenuToggle');
    const navMenu = document.getElementById('navMenuList');
    if (mobileBtn && navMenu) {
        mobileBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            navMenu.classList.toggle('show');
            const icon = mobileBtn.querySelector('i');
            if (navMenu.classList.contains('show')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
        // Close on link click
        navMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) navMenu.classList.remove('show');
            });
        });
    }
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768 && navMenu && navMenu.classList.contains('show')) {
            navMenu.classList.remove('show');
        }
    });
})();
