<?php
/**
 * WL Assets
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
 * Theme assets.
 *
 * @since  1.0.0
 * @author Nucleus
 */
class Assets {


	/**
	 * Base URL for public assets.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	private $base_uri;

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		 $this->base_uri = get_stylesheet_directory_uri() . '/dist/images/';
	}

	/**
	 * Setup hooks.
	 *
	 * @since 1.0.0
	 */
	public function ready() {
		add_action( 'wp_head', array( $this, 'favicon' ) );
		add_action( 'login_head', array( $this, 'admin_favicon' ) );
		add_action( 'admin_head', array( $this, 'admin_favicon' ) );
	}

	/**
	 * Add admin favicon.
	 *
	 * @since 1.0.0
	 */
	public function admin_favicon() {
		printf(
			'<link rel="shortcut icon" href="%s">',
			esc_url( $this->base_uri . 'atlantic.ico' )
		);
	}

	/**
	 * Add favicon.
	 *
	 * @since 1.0.0
	 */
	public function favicon() {
		printf(
			'<link rel="shortcut icon" href="%s">',
			esc_url( $this->base_uri . 'atlantic.ico' )
		);
	}
}
