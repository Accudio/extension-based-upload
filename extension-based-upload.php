<?php

/**
 * @link				https://accudio.com/development
 * @since				0.1.0
 * @package				Extension_Based_Upload
 *
 * @wordpress-plugin
 * Plugin Name:			Extension Based Upload
 * Plugin URI:			https://accudio.com/development
 * Description:			Configure uploaded files to be sorted into a custom directory under /wp-content/uploads/ based upon their file extensions.
 * Version:				0.1.0
 * Author:				Alistair Shepherd — Accudio
 * Author URI:			https://accudio.com/about
 * License:				GPL-3.0+
 * License URI:			http://www.gnu.org/licenses/gpl-3.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include_once plugin_dir_path( __FILE__ ) . 'includes/extension-based-upload-settings.php';


add_filter('wp_handle_upload_prefilter', 'extension_based_upload_pre_upload');
add_filter('wp_handle_upload', 'extension_based_upload_post_upload');

function extension_based_upload_pre_upload($file){
	add_filter('upload_dir', 'extension_based_upload_custom_upload_dir');
	return $file;
}

function extension_based_upload_post_upload($fileinfo){
	remove_filter('upload_dir', 'extension_based_upload_custom_upload_dir');
	return $fileinfo;
}

function extension_based_upload_custom_upload_dir($path){
	// get extension of new file, then get settings in format array( extension-array(), location-array() ).
	$fileext = substr(strrchr($_POST['name'],'.'),1);
	$extloc = array((explode("|",(get_option('extension_based_upload_extensions', '')))),(explode("|",(get_option('extension_based_upload_locations', '')))));

	if (!empty($path['error']) || !in_array($fileext,$extloc[0])) { return $path; } // error or unspecified filetype

	// extract directory location from arrays
	$dirloc = $extloc[1][(array_search($fileext, $extloc[0]))];

	// remove default subdirectory methods (year/month)
	$path['path']    = str_replace($path['subdir'], '', $path['path']);
	$path['url']     = str_replace($path['subdir'], '', $path['url']);

	// set custom directory location
	$path['subdir']  = $dirloc;
	$path['path']   .= $dirloc;
	$path['url']    .= $dirloc;
	return $path;
}
