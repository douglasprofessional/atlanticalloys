<?php

 namespace WL\Theme;

 /**
 * WL AcfJson.
 *
 * ACF inputs saved in json
 */

class Acfjson {
	public function ready() {
		add_action( 'acf/settings/save_json', array( $this, 'my_acf_json_save_point' ) );
	}

	function my_acf_json_save_point( $path ) {
		$path = get_stylesheet_directory() . '/acf-json';

		return $path;
	}
}

