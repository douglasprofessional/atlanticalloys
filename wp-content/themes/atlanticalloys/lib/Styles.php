<?php
/**
 * WL Styles.
 *
 * WARNING: This file is part of the WL Base theme. DO NOT edit this file
 * under any circumstances, as the changes will be lost in the case of a theme update.
 * Please do all modifications in the form of a child theme.
 *
 * @since   1.0.0
 * @package WL\Theme\Base
 * @author  Nucleus
 * @license GPL-2.0+
 * @link    http://nucleus.eti.br/
 */

namespace WL\Theme;

/**
 * Theme styles.
 *
 * @since  1.0.0
 * @author Nucleus
 */
class Styles {


	/**
	 * Base URL for public assets.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	private $base_uri;
	private $base_dir;

	/**
	 * Assets suffix.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	private $suffix;

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->base_uri = get_stylesheet_directory_uri() . '/dist/';
		$this->base_dir = get_stylesheet_directory() . '/dist/';
		$this->suffix   = wl_is_dev() ? '' : '.min';
	}

	/**
	 * Setup hooks.
	 *
	 * @since 1.0.0
	 */
	public function ready() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
	}

	/**
	 * Enqueue scripts.
	 *
	 * Fired on `wp_enqueue_scripts`.
	 *
	 * @since 1.0.0
	 */
	public function enqueue() {
		wp_enqueue_style(
			'aos',
			get_template_directory_uri() . '/node_modules/aos/dist/aos.css',
			array(),
		);

		wp_enqueue_style(
			'carousel',
			get_template_directory_uri() . '/node_modules/owl.carousel/dist/assets/owl.carousel.min.css',
			array(),
		);

		wp_enqueue_style(
			'wl',
			$this->base_uri . "main{$this->suffix}.css",
			array(),
			filemtime( $this->base_dir . "main{$this->suffix}.css" )
		);
	}
}
