<?php
/**
 * Plugin Name: Master Plugin
 * Plugin URI:  https://wpmasters.nl/
 * Description: An all-inclusive plugin by WP Masters
 * Text Domain: wpmasters
 * Domain Path: /languages
 * Author: WP Masters <info@wpmasters.nl>
 * Version: 1.21w50a
 * Author URI: https://wpmasters.nl
 */

if( ! defined( 'WPM_PLUGIN_PATH' ) ) {

	// Define a constant to always include the absolute path
	define('WPM_PLUGIN_PATH', plugin_dir_path( __FILE__ ));
	define('WPM_PLUGIN_URL', plugins_url( '', __FILE__ ));
	define('WPM_PLUGIN_PATH_FOR_SUBDIRS', plugins_url(str_replace(dirname(dirname(__FILE__)), '', dirname(__FILE__))));
	
	// Include Improved Security
  	include ( WPM_PLUGIN_PATH . 'includes/improved-security.php');
	
	// Include Security Headers
  	include ( WPM_PLUGIN_PATH . 'includes/security-headers.php');
	
	// Include Header Scripts
  	include ( WPM_PLUGIN_PATH . 'includes/header-scripts.php');
	
	// Include Admin Page
  	include ( WPM_PLUGIN_PATH . 'includes/admin-page.php');
	
	// Include Custom Login
  	include ( WPM_PLUGIN_PATH . 'includes/custom-login.php');
	
	// Include Disable Dashboard Widgets
  	include ( WPM_PLUGIN_PATH . 'includes/disable-widgets.php');
	
	// Include Custom Dashboard Widget
  	include ( WPM_PLUGIN_PATH . 'includes/dashboard-widget.php');
	
	// Include Allow Admin SVG Upload
  	include ( WPM_PLUGIN_PATH . 'includes/allow-filetypes.php');

  	// Include Defined Constants
  	include ( WPM_PLUGIN_PATH . 'includes/defined-constants.php');
	
	// Include SMTP Settings
  	include ( WPM_PLUGIN_PATH . 'includes/smtp-settings.php');

}