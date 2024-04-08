window.addEventListener('load', function () {
    if (document.querySelectorAll('.texts-and-carousel').length) {
        var arrowPrev  = '<svg class="arrow-prev" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="4 4.5 16 16">';
            arrowPrev += '<path d="M5 12.5L19 12.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>';
            arrowPrev += '<path d="M12 19.5L19 12.5L12 5.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>';     
            arrowPrev += '</svg>';

        var arrowNext  = '<svg class="arrow-next" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="4 4.5 16 16">';
            arrowNext += '<path d="M5 12.5L19 12.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>';
            arrowNext += '<path d="M12 19.5L19 12.5L12 5.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>';
            arrowNext += '</svg>';

        jQuery('.texts-and-carousel__owl-carousel').owlCarousel({
            loop:false,
            margin:10,
            nav:true,
            navText: [
                arrowPrev,
                arrowNext
            ],
            dots:false,
            items:1,
            autoplay: true,
            autoplayTimeout: 10000,
            autoplayHoverPause: true,
            smartSpeed: 1000
        })
    }
})