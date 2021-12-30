<?php

// Allow SVG File Upload
if ( !empty( get_option( 'wpm_svg_upload' ) ) ) {
	add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
		$filetype = wp_check_filetype( $filename, $mimes );
			return [
				'ext'             => $filetype['ext'],
				'type'            => $filetype['type'],
				'proper_filename' => $data['proper_filename']
			];

	}, 10, 4 );

	function cc_mime_types( $mimes ){
		if ( !current_user_can( 'edit_theme_options' ) ) {
			return $mimes;
		}

		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter( 'upload_mimes', 'cc_mime_types' );
};