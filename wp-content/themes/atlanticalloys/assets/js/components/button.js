window.addEventListener('load', function () {
	if (document.querySelectorAll('.button, .wp-block-button__link').length) {
        jQuery('.button, .wp-block-button__link').append('<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="4 4.5 16 16"><path d="M5 12.5H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 5.5L19 12.5L12 19.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>');
    }
})