<?php
	/**
		* The free plugins from Dmytro Lobov
		*
		* @package WordPress
		* @subpackage WowKnowledgeBase
		* @since WowKnowledgeBase 1.0
	*/
?>
<style>
	.height_screen{height:270px; background:#fff;}
	.height_screen img{max-width:100%;}
	.height_screen span{padding: 10px; font-size:16px; font-weight:500; display:block;}
	.height_screen a{color:#000; text-decoration:none;}
	.themes {overflow:hidden;}
</style>
<div class="wrap">
	<div class="theme-browser">
		<div class="themes">
			
			<?php echo wow_add_get_feed(); ?>
			
		</div>
	</div>
</div>



<?php
function wow_add_get_feed() {
	$cache = get_transient( 'wow_comapny_feed_plugins' );
	$cache = false;
	if ( false === $cache ) {
		$url = 'https://wow-estore.com/list-items/myplug.php';
		$feed = wp_remote_get( esc_url_raw( $url ), array(
			'sslverify' => false,
		) );
		if ( ! is_wp_error( $feed ) ) {
			if ( isset( $feed['body'] ) && strlen( $feed['body'] ) > 0 ) {
				$cache = wp_remote_retrieve_body( $feed );
				set_transient( 'wow_comapny_feed_plugins', $cache, 3600 );
			}
		} else {
			$cache = '<div class="error"><p>There was an error retrieving the extensions list from the server. Please try again later.</div>';
		}
	}
	return $cache;
}
?>
