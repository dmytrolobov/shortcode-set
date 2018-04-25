<?php
	/**
		* Admin page navigation
		*
		* @package     Shortcode Set
		* @subpackage  Admin
		* @copyright   Copyright (c) 2018, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	if ( ! defined( 'ABSPATH' ) ) exit;
	$link_support = 'admin.php?page=' . $pluginname . '&tool=support';
	$tool = (isset($_REQUEST["tool"])) ? sanitize_text_field($_REQUEST["tool"]) : 'shortcodes';
	$tabs = array(
		'shortcodes' => array( __( 'Shortcodes', 'wow-shortcodes' ), 'fas fa-code' ),
		'support'    => array( __( 'Support', 'wow-shortcodes' ), 'fas fa-life-ring' ),
	);
?>
<div class="wow">
	<span class="wow-plugin-title"><?php echo $name; ?></span> <span class="wow-plugin-version">(version <?php echo $version; ?>)</span>
	<?php echo '<ul class="wow-admin-menu">';
		foreach( $tabs as $tab => $tab_name ){
			$class = ( $tab == $tool ) ? 'active' : '';
			echo "<li><a class='$class' href='?page=" . $pluginname . "&tool=$tab'>$tab_name[0] <i class='$tab_name[1]'></i></a></li> ";
		}
		echo '</ul>';
	?>
	<div class="wowcolom">
		<div id="wow-leftcol">
			<div class="menu-box wow-admin">
				<div class="menu-panels">
					<div class="wowbox">
						<?php include_once ($tool.'.php'); ?>
					</div>
				</div>
			</div>
		</div>
		<div id="wow-rightcol">
			<div class="wowbox">
				<center><img src="<?php echo plugin_dir_url( __FILE__ ); ?>thankyou.png" alt=""  /></center>
				<hr/>
				<div class="wow-admin wow-plugins">
					<p><?php esc_attr_e( 'We will be very grateful if you leave a review on the our work', 'wow-shortcodes' ); ?>.</p>
					<p>
						<?php
							/* translators: %s is url to Customizer */
						printf( __( 'If you have suggestions on how to improve the plugin or create a new plug-in, write to us via the <a href="%s">support form</a>.', 'wow-shortcodes' ), esc_url( $link_support ) ); ?></p>
						<p><?php esc_attr_e( 'We really appreciate your reviews and suggestions.', 'wow-shortcodes' ); ?></p>
						<p>
						<b><em><?php esc_attr_e( 'Thank you for being a customer of Wow-Company', 'wow-shortcodes' ); ?>!</em></b></p>
						*****************<br/>
						<em><b><?php esc_attr_e( 'Best Regards', 'wow-shortcodes' ); ?></b>,<br/>
							<a href="https://wow-company.com" target="_blank">Wow-Company Team</a><br/>
							Dmytro Lobov<br/>
							<a href="mailto:support@wow-company.com">support@wow-company.com</a>
						</em>
				</div>
			</div>
		</div>
	</div>
</div>