<?php

/**
 * @link				https://accudio.com/development
 * @since				0.1.0
 * @package				Extension_Based_Upload
 * @subpackage			Extension_Based_Upload/Settings
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// function to create option page in admin under 'settings'
function extension_based_upload_settings_init() {

	$page_title = 'Extension Based Upload';
	$menu_title = 'Extension Upload';
	$capability = 'manage_options';
	$menu_slug = 'extension-based-upload';
	$function = 'extension_based_upload_settings_display';

	add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);
}

add_action('admin_menu', 'extension_based_upload_settings_init');


function extension_based_upload_settings_update() {

	// nonce technology helps ensure form submission is legitimate 
	if (isset( $_POST['extension_based_upload_settings_save'] ) && !wp_verify_nonce( $_POST['extension_based_upload_settings_nonce'], 'extension_based_upload_settings_save' )) {
		wp_die('Nonce verification failed');
	}

	if (isset($_POST['extension_based_upload_extensions'])) {
		update_option('extension_based_upload_extensions', $_POST['extension_based_upload_extensions']);
	};
	if (isset($_POST['extension_based_upload_locations'])) {
		update_option('extension_based_upload_locations', $_POST['extension_based_upload_locations']);
	};

	wp_redirect(admin_url('admin.php?page=extension-based-upload'), 303);
}
add_action('admin_post_extension_based_upload_update_options', 'extension_based_upload_settings_update');


// display option page
function extension_based_upload_settings_display() {

	// check current user is authorised to access page
	if (!current_user_can('manage_options')) {
		wp_die('You are not authorised to access this page');
	};

	// get values for form
	$extension_based_upload_extensions_value = get_option('extension_based_upload_extensions', '');
	$extension_based_upload_locations_value = get_option('extension_based_upload_locations', '');

	// load form
	include 'extension-based-upload-settings-display.php';
}
