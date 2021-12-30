<?php

if (!empty( get_option( 'wpm_smtp_settings' ) ) ) {
	function my_admin_submenu() {
		add_submenu_page( 'wpm-options', 'WP SMTP Settings', 'SMTP Settings', 'manage_options', 'wpm-smtp-settings', 'wpm_smtp_settings');
	}
	add_action( 'admin_menu', 'my_admin_submenu' );
};

// Create SMTP SubPage Skeleton
function wpm_smtp_settings() { ?>
<div class="wrap wpm-page">
	<h1><?php esc_html_e( 'SMTP Settings', 'wpmasters' ); ?></h1>
	<?php settings_errors(); ?>
    <form method="POST" action="options.php">
		<?php
		settings_fields( 'wpm-smtp-settings' );
		do_settings_sections( 'wpm-smtp-settings' );
		submit_button();
		?>
    </form>
</div>
<?php }

function smtp_settings_init() {

    add_settings_section (
        'wpm_smtp_admin_section',
        '',
        'wpm_options_callback_function',
        'wpm-smtp-settings'
    );

	add_settings_field (
	   'wpm_smtp_from',
	   __( 'Emailadres Afzender', 'wpmasters' ),
	   'wpm_smtp_setting_from',
	   'wpm-smtp-settings',
	   'wpm_smtp_admin_section'
	);
	register_setting ( 'wpm-smtp-settings', 'wpm_smtp_from' );
	
	add_settings_field (
	   'wpm_smtp_name',
	   __( 'Naam Afzender', 'wpmasters' ),
	   'wpm_smtp_setting_name',
	   'wpm-smtp-settings',
	   'wpm_smtp_admin_section'
	);
	register_setting ( 'wpm-smtp-settings', 'wpm_smtp_name' );
	
	add_settings_field (
	   'wpm_smtp_host',
	   __( 'SMTP Host', 'wpmasters' ),
	   'wpm_smtp_setting_host',
	   'wpm-smtp-settings',
	   'wpm_smtp_admin_section'
	);
	register_setting ( 'wpm-smtp-settings', 'wpm_smtp_host' );
	
	add_settings_field (
	   'wpm_smtp_encrypt',
	   __( 'Versleuteling', 'wpmasters' ),
	   'wpm_smtp_setting_encrypt',
	   'wpm-smtp-settings',
	   'wpm_smtp_admin_section'
	);
	register_setting ( 'wpm-smtp-settings', 'wpm_smtp_encrypt' );
	
	add_settings_field (
	   'wpm_smtp_port',
	   __( 'SMTP Poort', 'wpmasters' ),
	   'wpm_smtp_setting_port',
	   'wpm-smtp-settings',
	   'wpm_smtp_admin_section'
	);
	register_setting ( 'wpm-smtp-settings', 'wpm_smtp_port' );
	
	add_settings_field (
	   'wpm_smtp_user',
	   __( 'SMTP Gebruiker', 'wpmasters' ),
	   'wpm_smtp_setting_user',
	   'wpm-smtp-settings',
	   'wpm_smtp_admin_section'
	);
	register_setting ( 'wpm-smtp-settings', 'wpm_smtp_user' );
	
	add_settings_field (
	   'wpm_smtp_pass',
	   __( 'SMTP Wachtwoord', 'wpmasters' ),
	   'wpm_smtp_setting_pass',
	   'wpm-smtp-settings',
	   'wpm_smtp_admin_section'
	);
	register_setting ( 'wpm-smtp-settings', 'wpm_smtp_pass' );
	
}
add_action( 'admin_init', 'smtp_settings_init' );

function wpm_smtp_settings_callback_function() {}

// Add input to admin page
function wpm_smtp_setting_from() { ?>
    <label for="my-input" style="display: none;"><?php _e( 'Afzendadres' ); ?></label>
    <input style="width: 300px;" type="text" id="wpm_smtp_from" name="wpm_smtp_from" value="<?php echo get_option( 'wpm_smtp_from' ); ?>" placeholder="changeme@example.com">
<?php }

function wpm_smtp_setting_name() { ?>
    <label for="my-input" style="display: none;"><?php _e( 'Afzendadres' ); ?></label>
    <input style="width: 300px;" type="text" id="wpm_smtp_name" name="wpm_smtp_name" value="<?php echo get_option( 'wpm_smtp_name' ); ?>" placeholder="Bedrijfsnaam">
<?php }

function wpm_smtp_setting_host() { ?>
    <label for="my-input" style="display: none;"><?php _e( 'Afzendadres' ); ?></label>
    <input style="width: 300px;" type="text" id="wpm_smtp_host" name="wpm_smtp_host" value="<?php echo get_option( 'wpm_smtp_host' ); ?>" placeholder="smtp.example.com">
<?php }

function wpm_smtp_setting_encrypt() { ?>
    <label for="my-input" style="display: none;"><?php _e( 'Versleuteling' ); ?></label>
	<select style="width: 300px;" id="wpm_smtp_pass" name="wpm_smtp_encrypt" value="<?php echo get_option( 'wpm_smtp_encrypt' ); ?>">
		<option value="ssl" <?php $smtp_encryption = get_option('wpm_smtp_encrypt'); if ($smtp_encryption  == 'ssl') { ?><?php echo 'selected'; ?><?php } ?>>SSL</option>
		<option value="tls" <?php $smtp_encryption = get_option('wpm_smtp_encrypt'); if ($smtp_encryption  == 'tls') { ?><?php echo 'selected'; ?><?php } ?>>TLS</option>
	</select>
<?php }

function wpm_smtp_setting_port() { ?>
    <label for="my-input" style="display: none;"><?php _e( 'SMTP Port' ); ?></label>
    <input style="width: 300px;" type="text" id="wpm_smtp_port" name="wpm_smtp_port" value="<?php echo get_option( 'wpm_smtp_port' ); ?>" placeholder="123">
<?php }

function wpm_smtp_setting_user() { ?>
    <label for="my-input" style="display: none;"><?php _e( 'Afzendadres' ); ?></label>
    <input style="width: 300px;" type="text" id="wpm_smtp_user" name="wpm_smtp_user" value="<?php echo get_option( 'wpm_smtp_user' ); ?>">
<?php }

function wpm_smtp_setting_pass() { ?>
    <label for="my-input" style="display: none;"><?php _e( 'Afzendadres' ); ?></label>
    <input style="width: 300px;" type="password" id="wpm_smtp_pass" name="wpm_smtp_pass" value="<?php echo get_option( 'wpm_smtp_pass' ); ?>">
<?php }

// SMTP Authentication
add_action( 'phpmailer_init', 'send_smtp_email' );
function send_smtp_email( $phpmailer ) {
  	$phpmailer->isSMTP();
   	$phpmailer->Host       = SMTP_HOST;
   	$phpmailer->SMTPAuth   = SMTP_AUTH;
   	$phpmailer->Port       = SMTP_PORT;
   	$phpmailer->Username   = SMTP_USER;
   	$phpmailer->Password   = SMTP_PASS;
   	$phpmailer->SMTPSecure = SMTP_SECURE;
   	$phpmailer->From       = SMTP_FROM;
   	$phpmailer->FromName   = SMTP_NAME;
}

// SMTP Authentication
define( 'SMTP_USER',   'user@example.com' );    // Username to use for SMTP authentication
define( 'SMTP_PASS',   'smtp password' );       // Password to use for SMTP authentication
define( 'SMTP_HOST',   'smtp.example.com' );    // The hostname of the mail server
define( 'SMTP_FROM',   'website@example.com' ); // SMTP From email address
define( 'SMTP_NAME',   'e.g Website Name' );    // SMTP From name
define( 'SMTP_PORT',   '25' );                  // SMTP port number - likely to be 25, 465 or 587
define( 'SMTP_SECURE', 'tls' );                 // Encryption system to use - ssl or tls
define( 'SMTP_AUTH',    true );                 // Use SMTP authentication (true|false)
define( 'SMTP_DEBUG',   0 );                    // for debugging purposes only set to 1 or 2