<?php

// Create Admin Menu Item
function my_admin_menu() {
    add_menu_page( 'WP Options', 'WP Options', 'manage_options', 'wpm-options', 'my_admin_page_contents', WPM_PLUGIN_PATH_FOR_SUBDIRS . '/assets/images/wp-icon.svg', 81 );	
}
add_action( 'admin_menu', 'my_admin_menu' );

// Create Admin Page Skeleton
function my_admin_page_contents() { ?>
<div class="wrap wpm-page">
	<h1><?php esc_html_e( 'WP Masters Options', 'wpmasters' ); ?></h1>
	<?php settings_errors(); ?>
    <form method="POST" action="options.php">
		<?php
		settings_fields( 'wpm-options' );
		do_settings_sections( 'wpm-options' );
		submit_button();
		?>
    </form>
</div>
<?php }
function wpm_settings_init() {

    add_settings_section (
        'wpm_admin_section',
        '',
        'wpm_options_callback_function',
        'wpm-options'
    );

	add_settings_field (
	   'wpm_ga',
	   __( 'Google Analytics Tag', 'wpmasters' ),
	   'wpm_setting_ga',
	   'wpm-options',
	   'wpm_admin_section'
	);
	register_setting ( 'wpm-options', 'wpm_ga' );
	
	add_settings_field (
	   'wpm_gtm',
	   __( 'Google Tag Manager', 'wpmasters' ),
	   'wpm_setting_gtm',
	   'wpm-options',
	   'wpm_admin_section'
	);
	register_setting ( 'wpm-options', 'wpm_gtm' );
	
	add_settings_field (
	   'wpm_gad',
	   __( 'Google Ads', 'wpmasters' ),
	   'wpm_setting_gad',
	   'wpm-options',
	   'wpm_admin_section'
	);
	register_setting ( 'wpm-options', 'wpm_gad' );
	
	add_settings_field (
	   'wpm_fb',
	   __( 'Facebook Verification', 'wpmasters' ),
	   'wpm_setting_fb',
	   'wpm-options',
	   'wpm_admin_section'
	);
	register_setting ( 'wpm-options', 'wpm_fb' );
	
	add_settings_field (
	   'wpm_fbp',
	   __( 'Facebook Pixel', 'wpmasters' ),
	   'wpm_setting_fbp',
	   'wpm-options',
	   'wpm_admin_section'
	);
	register_setting ( 'wpm-options', 'wpm_fbp' );
	
	add_settings_field (
	   'wpm_cb',
	   __( 'Cookiebot', 'wpmasters' ),
	   'wpm_setting_cb',
	   'wpm-options',
	   'wpm_admin_section'
	);
	register_setting ( 'wpm-options', 'wpm_cb' );
	
	add_settings_field (
	   'wpm_media',
	   __( 'Media Folder', 'wpmasters' ),
	   'wpm_setting_media_folder',
	   'wpm-options',
	   'wpm_admin_section'
	);
	register_setting ( 'wpm-options', 'wpm_media' );
	
	add_settings_field (
	   'wpm_svg_upload',
	   __( 'SVG Upload', 'wpmasters' ),
	   'wpm_setting_svg_upload',
	   'wpm-options',
	   'wpm_admin_section'
	);
	register_setting ( 'wpm-options', 'wpm_svg_upload' );
	
	add_settings_field (
	   'wpm_security_headers',
	   __( 'Security Headers', 'wpmasters' ),
	   'wpm_setting_security_headers',
	   'wpm-options',
	   'wpm_admin_section'
	);
	register_setting ( 'wpm-options', 'wpm_security_headers' );
	
	add_settings_field (
	   'wpm_smtp_settings',
	   __( 'SMTP Settings', 'wpmasters' ),
	   'wpm_setting_smtp_settings',
	   'wpm-options',
	   'wpm_admin_section'
	);
	register_setting ( 'wpm-options', 'wpm_smtp_settings' );
}
add_action( 'admin_init', 'wpm_settings_init' );

function wpm_options_callback_function() {}


// Add input to admin page
function wpm_setting_ga() { ?>
    <label for="my-input" style="display: none;"><?php _e( 'Google Analytics Tag' ); ?></label>
    <input style="width: 300px;" type="text" id="wpm_ga" name="wpm_ga" value="<?php echo get_option( 'wpm_ga' ); ?>" placeholder="UA-XXXXX-Y">
<?php }

function wpm_setting_gtm() { ?>
    <label for="my-input" style="display: none;"><?php _e( 'Google Tag Manager' ); ?></label>
    <input style="width: 300px;" type="text" id="wpm_gtm" name="wpm_gtm" value="<?php echo get_option( 'wpm_gtm' ); ?>" placeholder="GTM-XXXXXX">
<?php }

function wpm_setting_gad() { ?>
    <label for="my-input" style="display: none;"><?php _e( 'Google Ads' ); ?></label>
    <input style="width: 300px;" type="text" id="wpm_gad" name="wpm_gad" value="<?php echo get_option( 'wpm_gad' ); ?>" placeholder="AW-123456789">
<?php }

function wpm_setting_fb() { ?>
    <label for="my-input" style="display: none;"><?php _e( 'Facebook Verification' ); ?></label>
    <input style="width: 300px;" type="text" id="wpm_fb" name="wpm_fb" value="<?php echo get_option( 'wpm_fb' ); ?>">
<?php }

function wpm_setting_fbp() { ?>
    <label for="my-input" style="display: none;"><?php _e( 'Facebook Pixel' ); ?></label>
    <input style="width: 300px;" type="text" id="wpm_fbp" name="wpm_fbp" value="<?php echo get_option( 'wpm_fbp' ); ?>">
<?php }

function wpm_setting_cb() { ?>
    <label for="my-input" style="display: none;"><?php _e( 'Cookiebot' ); ?></label>
    <input style="width: 300px;" type="text" id="wpm_cb" name="wpm_cb" value="<?php echo get_option( 'wpm_cb' ); ?>" placeholder="Domain Group ID">
<?php }

function wpm_setting_media_folder() { ?>
    <label class="switch">
	  	<input type="checkbox" class="wpm_media" name="wpm_media" value="true" 
			<?php if( !empty( get_option( 'wpm_media' ) ) ): ?><?php echo 'checked'; ?><?php endif; ?>>
	  	<span class="slider round"></span>
	</label>
<?php }

function wpm_setting_svg_upload() { ?>
    <label class="switch">
	  	<input type="checkbox" class="wpm_svg_upload" name="wpm_svg_upload" value="true" 
			<?php if( !empty( get_option( 'wpm_svg_upload' ) ) ): ?><?php echo 'checked'; ?><?php endif; ?>>
	  	<span class="slider round"></span>
	</label>
<?php }

function wpm_setting_security_headers() { ?>
    <label class="switch">
	  	<input type="checkbox" class="wpm_security_headers" name="wpm_security_headers" value="true" 
			<?php if( !empty( get_option( 'wpm_security_headers' ) ) ): ?><?php echo 'checked'; ?><?php endif; ?>>
	  	<span class="slider round"></span>
	</label>
<?php }

function wpm_setting_smtp_settings() { ?>
    <label class="switch">
	  	<input type="checkbox" class="wpm_smtp_settings" name="wpm_smtp_settings" value="true" 
			<?php if( !empty( get_option( 'wpm_smtp_settings' ) ) ): ?><?php echo 'checked'; ?><?php endif; ?>>
	  	<span class="slider round"></span>
	</label>
<?php }


// Add styling from style.css to admin page
function load_admin_style() {
    wp_enqueue_style( 'admin_css', WPM_PLUGIN_PATH_FOR_SUBDIRS . '/assets/styles/style.css', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'load_admin_style' );