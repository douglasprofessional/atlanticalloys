<?php

namespace WL\Theme;

/**
* WL MimeTypes.
*/

class MimeTypes {
	public function ready() {
		add_action( 'upload_mimes', array( $this, 'cc_mime_types' ) );
	}

	function cc_mime_types( $mimes ) {
		$mimes['jpg|jpeg|jpe'] = 'image/jpeg';
		$mimes['gif']          = 'image/gif';
		$mimes['png']          = 'image/png';
		$mimes['bmp']          = 'image/bmp';
		$mimes['tiff|tif']     = 'image/tiff';
		$mimes['ico']          = 'image/x-icon';
		$mimes['svg']          = 'image/svg+xml';
		$mimes['svgz']         = 'application/x-gzip';
		$mimes['doc']          = 'application/msword';
		$mimes['webp']         = 'image/webp';
		$types['csv']          = 'text/csv';
		$mimes['ttf']          = 'font/ttf';
		$mimes['woff']         = 'font/woff';
		$mimes['woff2']        = 'font/woff2';

		// unset( $mimes['exe'] );

		return $mimes;
	}
}
