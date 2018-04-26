<?php
	/**
		* Plugin Name:       Shortcode Set
		* Plugin URI:        https://wordpress.org/plugins/shortcode-set/
		* Description:       The shortcode set
		* Version:           1.0.1
		* Author:            Wow-Company
		* Author URI:        https://wow-company.com
		* License:           GPL-2.0+
		* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
		* Text Domain:       shortcode-set
	*/
	if ( ! defined( 'WPINC' ) ) {die;}
	// Declaration Wow-Company class
	if( !class_exists( 'Wow_Company' )) {
		require_once plugin_dir_path( __FILE__ ) . 'asset/class-wow-company.php';
	}
	// Declaration of the plugin class
	if( !class_exists( 'Wow_Shortcodes' ) ) {
		class Wow_Shortcodes
		{
			function __construct() {
				$this->name = 'Shortcode Set';
				$this->menuname = 'Shortcode Set';
				$this->version = '1.0';
				$this->pluginname = dirname( plugin_basename(__FILE__) );
				$this->plugindir = plugin_dir_path( __FILE__ );
				$this->pluginurl = plugin_dir_url( __FILE__ );
				add_action('init', array($this, 'load_textdomain'));
				add_action( 'admin_menu', array( $this, 'add_menu_page' ) );
				add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
				add_filter( 'plugin_action_links', array($this, 'action_links'), 10, 2 );
			}
			function load_textdomain(){
				load_plugin_textdomain('shortcode-set', FALSE, dirname( plugin_basename(__FILE__) ) . '/languages/');
			}
			function add_menu_page() {
				add_submenu_page('wow-company', $this->name.' version '.$this->version, $this->menuname, 'manage_options', $this->pluginname, array( $this, 'plugin_admin' ));
			}
			function plugin_admin() {
				require_once plugin_dir_path( __FILE__ ) . 'admin/index.php';
			}
			function admin_scripts(){
				// include Font Awesome 5.0.6
				wp_enqueue_style( 'wow-fontawesome', $this->pluginurl . 'shortcodes/assets/fonts/font-awesome/css/fontawesome-all.min.css', null, '5.0.6' );
				// include Color Picker
				wp_enqueue_style('wp-color-picker');
				wp_enqueue_script('wp-color-picker');
				// iconpicker
				wp_enqueue_script('wow-fonticonpicker', $this->pluginurl . 'asset/fonticonpicker/fonticonpicker.min.js', array('jquery'));
				wp_enqueue_style('wow-fonticonpicker', $this->pluginurl . 'asset/fonticonpicker/css/fonticonpicker.css');
				wp_enqueue_style('wow-fonticonpicker-darkgrey', $this->pluginurl . 'asset/fonticonpicker/fonticonpicker.darkgrey.min.css');
			}
			function action_links( $actions, $plugin_file ){
				if( false === strpos( $plugin_file, basename(__FILE__) ) )
				return $actions;
				$settings_link = '<a href="admin.php?page='. $this->pluginname .'">Settings</a>';
				array_unshift( $actions, $settings_link );
				return $actions;
			}
		}
		$plugin = new Wow_Shortcodes();
	}
	require_once plugin_dir_path( __FILE__ ) . 'shortcodes/shortcodes.php';