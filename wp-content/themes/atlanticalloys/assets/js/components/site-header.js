window.addEventListener('load', function () {
    if (document.querySelectorAll('.site-header').length) {
        jQuery('.site-header__open-mainmenu').on('click', function () {
            jQuery('.mainmenu').slideToggle('slow');
        });

        jQuery('.mainmenu__close').click(function () {
            jQuery('.mainmenu').slideUp();
        });

        if (localStorage.getItem('site-header') === 'scroll-activated') {
            document.getElementById('siteHeader').classList.add('scroll-activated')
        }

        const firstSection = document.querySelector('section');
        if (firstSection && firstSection.classList.contains('is-theme-dark')) {
            jQuery('.site-header').addClass('is-white-children');
        }
    }
})

window.addEventListener('scroll', function () {
    if (document.querySelectorAll('.site-header').length) {
        if (window.scrollY > 50) {
            document.getElementById('siteHeader').classList.add('scroll-activated')
            window.localStorage.setItem('site-header', 'scroll-activated')
        } else {
            document.getElementById('siteHeader').classList.remove('scroll-activated')
            window.localStorage.setItem('site-header', 'top')
        }
    }
}, { passive: true })