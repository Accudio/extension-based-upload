<?php

/**
 * @link				https://accudio.com/development
 * @since				0.1.0
 * @package				Extension_Based_Upload
 * @subpackage			Extension_Based_Upload/Settings_Display
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


?>
<div class="wrap">
	<h1>Extension Based Upload</h1>
	<p class="description">On upload, automatically move files of certain file extensions to directories inside /wp-content/uploads/. Format as pipe ( | ) seperated lists with the first extension corresponding to the first location and so on. For example, with settings of 'png|jpg|txt' and '/pngfolder|/jpgfolder|/txtfolder', all files with the extension png will be uploaded to /wp-content/uploads/pngfolder/, all jpg to /wp-content/uploads/jpgfolder, and all txt to /wp-content/uploads/txtfolder.</p>
	<hr>

	<form action="<?php echo admin_url('admin-post.php') ?>" method="POST">

		<div id="extension_based_upload_settings">
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row">
							<label for="extension_based_upload_extensions">File Extensions</label>
						</th>
						<td>
							<input name="extension_based_upload_extensions" type="text" id="extension_based_upload_extensions" class="accudio_upload" value="<?php echo $extension_based_upload_extensions_value; ?>">
							<p class="description">Seperated by | (pipe). e.g, 'png|jpg|txt'</p>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="extension_based_upload_locations">Locations in /wp-content/uploads/</label>
						</th>
						<td>
							<input name="extension_based_upload_locations" type="text" id="extension_based_upload_locations" class="accudio_upload" value="<?php echo $extension_based_upload_locations_value; ?>">
							<p class="description">Separated by | (pipe), leading slash, from uploads/ folder. e.g, '/pngfolder|/jpgfolder|/txtfolder'</p>
						</td>
					</tr>
				</tbody>
			</table>
			<hr>
		</div>

		<?php wp_nonce_field( 'extension_based_upload_settings_save', 'extension_based_upload_settings_nonce' ); ?>
		<input type="hidden" name="action" value="extension_based_upload_update_options">
		<input type="submit" value="Save Changes" aria-label="Save Changes" class="button button-primary button-large">

	</form>
</div>