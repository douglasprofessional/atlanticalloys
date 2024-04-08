<?php
/**
 * WL BodySlugClasses.
 */

namespace WL\Theme;

class BodySlugClasses {
	public function ready() {
		add_action( 'body_class', array( $this, 'add_slug_body_class' ) );
	}

	function add_slug_body_class( $classes ) {
		global $post;
		if ( isset( $post ) ) {
			$classes[] = $post->post_type . '-' . $post->post_name;
		}
		return $classes;
	}
}
