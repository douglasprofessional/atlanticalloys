window.addEventListener('scroll', function () {
    if (document.querySelectorAll('.hero').length) {
        function rotateDivOnScroll() {
            const heroMapLeft = document.getElementById('heroMapLeft');
            const heroMapRight = document.getElementById('heroMapRight');
            const maxRotation = 10;

            let scrollPosition = window.scrollY;
            let rotation = Math.min(scrollPosition / 10, maxRotation);

            heroMapLeft.style.transform = 'rotate(-' + rotation + 'deg) scale(1.8)';
            heroMapRight.style.transform = 'rotate(' + rotation + 'deg) scale(1.8)';
        }

        window.addEventListener('scroll', rotateDivOnScroll);
    }
}, { passive: true })