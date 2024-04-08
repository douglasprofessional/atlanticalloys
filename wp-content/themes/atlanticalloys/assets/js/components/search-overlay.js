window.addEventListener('load', function () {
    if (document.querySelectorAll('.search-overlay').length) {
        jQuery('#siteHeaderSearch').on('click', function(){
            console.log('siteHeaderSearch');
            jQuery('.search-overlay').fadeIn('fast')
        })

        jQuery('#searchOverlayClose').on('click', function(){
            console.log('searchOverlayClose');
            jQuery('.search-overlay').fadeOut('fast')
        })
    }
})