<?php
/**
 * Custom Fields Permalink 2.
 *
 * @package   WordPress_Custom_Fields_Permalink
 * @author    Atlantic Alloys
 * @copyright 2016 Atlantic Alloys or Company Name
 * @license   GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Custom Fields Permalink 2
 * Plugin URI: http://athlan.pl/wordpress-custom-fields-permalink-plugin
 * Description: Plugin allows to use post's custom fields values in permalink structure by adding %field_fieldname%, for posts, pages and custom post types.
 * Author: Piotr Pelczar
 * Version: 1.0.3
 * Author URI: http://athlan.pl/
 */

use WL\Theme;

define( 'WL_VERSION', wp_get_theme()->version );
define( 'WL_DIR', __DIR__ );
define( 'WL_URL', get_template_directory_uri() );

require_once WL_DIR . '/vendor/autoload.php';

function wl_is_dev() {
	return apply_filters( 'wl_is_dev', defined( 'WP_ENV' ) && 'development' === WP_ENV );
}

/**
 * Setup theme.
 *
 * @since 1.0.0
 */
add_action( 'after_setup_theme', 'wl_setup_theme' );

function wl_setup_theme() {
	// Enable support for post thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	$components = array(
		'acfjson'              => new WL\Theme\Acfjson(),
		'acfoptions'           => new WL\Theme\Options(),
		'acfblocks'            => new WL\Theme\Blocks(),
		'assets'               => new WL\Theme\Assets(),
		'customizer'           => new WL\Theme\Customizer(),
		'body_slug_classes'    => new WL\Theme\BodySlugClasses(),
		'images'               => new WL\Theme\Images(),
		'mimetypes'            => new WL\Theme\MimeTypes(),
		'posttype'             => new WL\Theme\PostType(),
		'taxonomy'             => new WL\Theme\Taxonomy(),
		'scripts'              => new WL\Theme\Scripts(),
		'structure_content'    => new WL\Theme\Structure\Content(),
		'structure_comments'   => new WL\Theme\Structure\Comments(),
		'structure_navigation' => new WL\Theme\Structure\Navigation(),
		'structure_sidebar'    => new WL\Theme\Structure\Sidebar(),
		'styles'               => new WL\Theme\Styles(),
		'widgets'              => new WL\Theme\Widgets(),
	);
	/**
	 * Remove/add components.
	 *
	 * Note: if you add a component, make sure it implements a method "ready()".
	 */
	$components = apply_filters( 'wl_starter_components', $components );

	foreach ( $components as $instance ) {
		if ( method_exists( $instance, 'ready' ) ) {
			$instance->ready();
		}
	}
}

add_filter(
	'default_page_template_title',
	function() {
		return __( '-- SELECIONE UM MODELO --', 'wl_setup_theme' );
	}
);
