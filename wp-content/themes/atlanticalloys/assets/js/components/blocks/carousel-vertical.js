window.addEventListener('load', function () {
    if (document.querySelectorAll('.carousel-vertical').length) {
        const $carousel = jQuery('.carousel-vertical__slides');

        jQuery(window).resize(function () {
            showCarousel()
        })

        function showCarousel() {
            if ($carousel.data('owlCarousel') !== 'undefined') {
                if (window.matchMedia('(min-width: 1023px)').matches) {
                    initialCarousel()
                } else {
                    destroyCarousel()
                }
            }
        }
        showCarousel()

        function initialCarousel() {
            $carousel.addClass('owl-carousel').owlCarousel({
                loop: true,
                margin: 20,
                nav: false,
                dots: true,
                items: 1,
                animateOut: 'fadeOut',
                autoplay: true,
                autoplayTimeout: 10000,
                autoplayHoverPause: true,
                smartSpeed: 1000
            })
        }

        function destroyCarousel() {
            $carousel.trigger('destroy.owl.carousel').removeClass('owl-carousel')
        }
    }
})