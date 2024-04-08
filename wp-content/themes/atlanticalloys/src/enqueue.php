<?php

namespace WL;

/**
 * Enqueue scripts and styles
 */
add_action(
	'wp_enqueue_scripts',
	function () {

		$min_ext = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		// JS
		wp_enqueue_script(
			'wl_js',
			WL_URL . "/dist/main{$min_ext}.js",
			array(),
			WL_VERSION,
			true
		);

		// CSS
		wp_enqueue_style(
			'wl_css',
			WL_URL . "/dist/main{$min_ext}.css",
			array(),
			WL_VERSION,
			''
		);
	}
);
