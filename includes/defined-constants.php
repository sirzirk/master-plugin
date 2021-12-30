<?php

// Create media folder in root
$wpm_media_folder = ABSPATH . 'media';
if ( ! is_dir( $wpm_media_folder ) ) {
		wp_mkdir_p( $wpm_media_folder );
		chmod( $wpm_media_folder, 0755 );
}

add_filter( 'option_uploads_use_yearmonth_folders', '__return_false', 100 );

if ( !empty( get_option( 'wpm_media' ) ) ) {
	define( 'UPLOADS', ''.'media' );
};