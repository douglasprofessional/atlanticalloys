window.addEventListener('load', function () {
	if (document.querySelectorAll('.wpcf7').length) {
        jQuery('.wpcf7-file').parent('.wpcf7-form-control-wrap').append('<svg class="pointer-events-none" xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none"><path d="M12.5 9.57143V11.2857C12.5 12.2325 11.7325 13 10.7857 13H2.21429C1.26751 13 0.5 12.2325 0.5 11.2857V9.57143M6.5 9.57143V1M6.5 1L8.21429 2.71429M6.5 1L4.78571 2.71429" stroke="#8F8681" stroke-linecap="round" stroke-linejoin="round"/></svg>');
    }
})