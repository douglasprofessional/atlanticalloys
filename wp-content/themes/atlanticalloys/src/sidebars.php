<?php

namespace WL;

/**
 * Register widget area.
 */
add_action(
	'widgets_init',
	function () {

		register_sidebar(
			array(
				'name'          => esc_html( 'Sidebar' ),
				'id'            => 'sidebar',
				'description'   => '',
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			)
		);

	}
);
