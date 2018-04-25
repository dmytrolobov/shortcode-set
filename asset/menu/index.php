<?php
	/**
		* The Admin Page
		*
		* @package WordPress
		* @subpackage WowKnowledgeBase
		* @since WowKnowledgeBase 1.0
	*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$query['return'] = admin_url();
$link_with_return = add_query_arg( $query, admin_url( 'customize.php' ) );
?>
<div class="wrap about-wrap wow-wrap">
	<h1>Wow-Comapny <small><em>(Make Your Website Legendary)</em></small></h1>	
	
	<div class="wow-about">
		<?php esc_attr_e( 'Get ready to build something unique & beautiful. Let\'s Go Make Your Website Legendary', 'wowknowledgebase' ); ?>
		
		<p style=""><?php esc_attr_e( 'We hope you enjoy it!', 'wowknowledgebase' ); ?> </p>
	</div>
	
	<?php
		$current = ( isset( $_GET['tab'] ) ) ? sanitize_text_field( wp_unslash( $_GET['tab'] ) ) : 'plugins';
		$tabs = array(			
			'plugins' => __( 'Plugins', 'wowknowledgebase' ),						
		);		
		echo '<h2 class="nav-tab-wrapper">';
		foreach ( $tabs as $tab => $name ) {
			$class = ( $tab === $current ) ? ' nav-tab-active' : '';
			echo '<a class="nav-tab' .esc_attr( $class ) . '" href="?page=wow-company&tab=' . esc_attr( $tab ) . '">' . esc_attr( $name ) . '</a>';
		}
		echo '</h2>';
		echo '<div class="wow-content">';
		include( plugin_dir_path( __FILE__ ) . $current . '.php');		
		echo '</div>';
	?>
	
	<div class="wow-thanks">
		<?php esc_attr_e( 'Thank you for choosing wow. We hope that making your experience perfect.', 'wowknowledgebase' ); ?>
	</div>
</div>
