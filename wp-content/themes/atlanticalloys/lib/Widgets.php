<?php
/**
 * WL Widgets.
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
 * Theme widgets.
 *
 * @since  1.0.0
 * @author Nucleus
 */
class Widgets {


	/**
	 * Setup hooks.
	 *
	 * @since 1.0.0
	 */
	public function ready() {
		add_action( 'widgets_init', array( $this, 'register_sidebars' ) );
	}

	/**
	 * Register sidebars.
	 *
	 * @since 1.0.0
	 */
	public function register_sidebars() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar', 'atlanticalloys' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'atlanticalloys' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget__title">',
				'after_title'   => '</h3>',
			)
		);
	}
}