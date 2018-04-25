<?php
	/**
		* Admin Pages
		*
		* @package     Shortcode Set
		* @copyright   Copyright (c) 2018, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	if ( ! defined( 'ABSPATH' ) ) exit;
	global $wow_company_plugin;
	$wow_company_plugin = true;
	$name = $this->name;
	$pluginname = $this->pluginname;
	$version = $this->version;
	include_once( plugin_dir_path( __FILE__ ) . 'partials/main.php' );
	wp_enqueue_script($pluginname.'-script', plugin_dir_url( __FILE__) . 'js/script.js');
