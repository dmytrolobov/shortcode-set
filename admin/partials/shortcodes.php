<?php
	/**
		* Options Page
		*
		* @package     Shortcode Set
		* @subpackage  Admin
		* @copyright   Copyright (c) 2018, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	if ( ! defined( 'ABSPATH' ) ) exit;
	$param = get_option('wow_shortcode');
	$main_color = !empty( $param['main_color'] ) ? $param['main_color'] : '#02C285';
	$second_color = !empty( $param['second_color'] ) ? $param['second_color'] : '#363636';
	$border_color = !empty( $param['border_color'] ) ? $param['border_color'] : '#cccccc';
	$background_color = !empty( $param['background_color'] ) ? $param['background_color'] : '#ffffff';
?>
<form method="post" name="osago_options" action="options.php">
	<?php wp_nonce_field('update-options'); ?>
	<div class="wow-admin-col">
		<div class="wow-admin-col-6">
			Main Color <br/>
			<input type="text" name="wow_shortcode[main_color]" value="<?php echo $main_color; ?>" class="wp-color-picker-field" />
		</div>
		<div class="wow-admin-col-6">
			Border Color<br/>
			<input type="text" name="wow_shortcode[border_color]" value="<?php echo $border_color; ?>" class="wp-color-picker-field" />
		</div>
	</div>
	<div class="wow-admin-col">
		<div class="wow-admin-col-6">
			Background Color for Tabs <br/>
			<input type="text" name="wow_shortcode[background_color]" value="<?php echo $background_color; ?>" class="wp-color-picker-field" />
		</div>
		<div class="wow-admin-col-6">
			Hover Color for buttons<br/>
			<input type="text" name="wow_shortcode[second_color]" value="<?php echo $second_color; ?>" class="wp-color-picker-field" />
		</div>
	</div>
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="wow_shortcode" />
	<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>
</form>