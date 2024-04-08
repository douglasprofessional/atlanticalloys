<?php
/**
 * This file adds functions and actions for classes.
 *
 * @author Nucleus LLC
 * @since 1.0.0
 *
 * @package Nucleus
 */

namespace WL;

add_filter(
	'body_class',
	function ( $classes ) {

		if ( is_singular( array( 'post', 'page' ) ) ) {
			$classes[] = 'singular';
		}

		if ( is_front_page() ) {
			$classes[] = 'front-page';
		}

		return $classes;
	}
);
