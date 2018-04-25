<?php
	/**
		* Page with Shortcodes
		*
		* @package     Shortcode Set
		* @subpackage  Admin
		* @copyright   Copyright (c) 2018, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	// Enable shortdoces in sidebar default Text widget
	add_filter('widget_text', 'do_shortcode');
	
	// 	Include JS and CSS for Shortcodes
	function wow_shortcodes_scripts() {
		// include style
		wp_enqueue_script('wow-shortcodes', plugin_dir_url( __FILE__) . 'assets/js/frontend.js', array('jquery'), null, true );
		// include script
		wp_enqueue_style( 'wow-shortcodes', plugin_dir_url( __FILE__) . 'assets/css/frontend.min.css' );
		
		$param = get_option('wow_shortcode');
		$main_color = !empty( $param['main_color'] ) ? $param['main_color'] : '#02C285';
		$second_color = !empty( $param['second_color'] ) ? $param['second_color'] : '#363636';
		$border_color = !empty( $param['border_color'] ) ? $param['border_color'] : '#cccccc';
		$background_color = !empty( $param['background_color'] ) ? $param['background_color'] : '#ffffff';
		
		// Custom Style
		$css ='
		.accordion-wrap .accordion-block, .accordion-wrap .accordion-block:last-child, .wow-toggle, .tabs__caption li, .tabs__content {
		border-color: '.$border_color.';
		}
		.accordion-wrap .accordion-title, .tabs__caption .active {
		color: '.$main_color.';
		}
		.tabs__caption li, .tabs__caption .active:after, .tabs__content {
		background: '.$background_color.';
		}
		.accordion-title .plus, .accordion-title .minus {
		color: '.$main_color.';
		}
		.btn-1, .btn-2, .btn-7, .btn-7:hover, .btn-8, .btn-8:before, .btn-9, .btn-10, .btn-11, .btn-12 {
		border-color: '.$border_color.';
		}
		.btn-1:hover, .btn-2:before, .btn-2:after, .btn-3:before, .btn-3:after, .btn-3 span:before, .btn-3 span:after, .btn-4:before, .btn-4:after, .btn-4 span:before, .btn-4 span:after, .btn-5:before, .btn-5:after, .btn-5 span:before, .btn-5 span:after, .btn-6:before, .btn-6:after, .btn-6 span:before, .btn-6 span:after, .btn-7:before, .btn-7:hover, .btn-8:hover, .btn-8:before, .btn-9:before, .btn-9:after, .btn-9:hover, .btn-10:before, .btn-10:after, .btn-10:hover, .btn-11:before, .btn-11:after, .btn-11:hover, .btn-12:after {
		background: '.$border_color.';
		}
		.btn-1:hover, .btn-7:hover, .btn-8:hover, .btn-9:hover, .btn-10:hover, .btn-11:hover, .btn-12:hover {
		color: '.$second_color.';
		}';
		$css = trim( preg_replace( '~\s+~s', ' ', $css ) );
		wp_add_inline_style('wow-shortcodes', $css);		
	}
	add_action( 'wp_enqueue_scripts', 'wow_shortcodes_scripts' );
	
	/*-----------------------------------------------------------------------------------*/
	/*	Accordion
	/*-----------------------------------------------------------------------------------*/
	function wow_shortcode_accordion( $atts, $content = null ) {
		$item = '<div class="accordion-wrap">'.do_shortcode($content).'</div>';
		return $item;
	}
	add_shortcode('w-accordion', 'wow_shortcode_accordion');
	
	function wow_shortcode_accordion_block( $atts, $content = null ) {
		extract(shortcode_atts(array(
		'title' => ''
		), $atts));
		$item = '<div class="accordion-block"><div class="accordion-title"><span class="plus">+</span><span class="minus">-</span>'.$title.'</div><div class="accordion-content">'.do_shortcode($content).'</div></div>';		
		return $item;		
	}
	add_shortcode('accordion_block', 'wow_shortcode_accordion_block');
	
	/*-----------------------------------------------------------------------------------*/
	/*	Tabs
	/*-----------------------------------------------------------------------------------*/
	
	function wow_shortcode_tabs( $atts, $content = null ) {
		global $shortcode_tabs;
		extract(shortcode_atts(array(
		'style' => ''
		), $atts));		
		do_shortcode($content);		
		$tab_items = '';
		$tab_content = '';
		$id = base_convert(microtime(), 10, 36);		
		if (is_array($shortcode_tabs)) {			
			for ($i = 0; $i < count($shortcode_tabs); $i++) {
				$active_class = ($i == 0) ? ' active' : '';
				$tab_items .= '<li class="'.$active_class.'">'.$shortcode_tabs[$i]['title'].'</li>';				
				$tab_content .= '<div class="tabs__content'.$active_class.'">'.do_shortcode($shortcode_tabs[$i]['content']).'</div>';
			}			
			$finished_tabs = '<div class="tabs '.$style.'"><ul class="tabs__caption">'.$tab_items.'</ul>'.$tab_content.'</div>';
		}
		$shortcode_tabs = '';
		return $finished_tabs;		
	}
	add_shortcode('w-tabs', 'wow_shortcode_tabs');	
	
	// Single Tab
	function wow_shortcode_shortcode_tab( $atts, $content = null ) {
		global $shortcode_tabs;
		extract(shortcode_atts(array(
		'title' => ''
		), $atts));
		
		$tab_elements['title'] = $title;
		$tab_elements['content'] = do_shortcode($content);		
		$shortcode_tabs[] = $tab_elements;	
	}
	add_shortcode('w-tab', 'wow_shortcode_shortcode_tab');	
	
	/*-----------------------------------------------------------------------------------*/
	/*	Toggle
	/*-----------------------------------------------------------------------------------*/
	function wow_shortcode_toggle( $atts, $content = null ) {
		extract(shortcode_atts(array(
		'title' => ''
		), $atts));
		$id = base_convert(microtime(), 10, 36);		
		$item = '<div class="wow-toggle"><div class="wow-toggle-action"><span class="plus">+</span><span class="minus">-</span><a href="#'.sanitize_title($title).'">'.$title.'</a></div><div class="wow-toggle-content">'.do_shortcode($content).'</div></div>';		
		return $item;		
	}
	add_shortcode('w-toggle', 'wow_shortcode_toggle');
	
	/*-----------------------------------------------------------------------------------*/
	/*	Columns
	/*-----------------------------------------------------------------------------------*/
	function wow_shortcode_column_row( $atts, $content = null ) {
		extract(shortcode_atts(array(
		'class' => '',		
		), $atts));
		$class = !empty( $class ) ? ' '.$class : '';
		return '<div class="wrow'.$class.'">'. do_shortcode($content) .'</div>';
	}
	add_shortcode('w-row', 'wow_shortcode_column_row');
	
	function wow_shortcode_column( $atts, $content = null ) {
		return '<div class="wcolumn">'. do_shortcode($content) .'</div>';
	}
	add_shortcode('w-column', 'wow_shortcode_column');
	
	/*-----------------------------------------------------------------------------------*/
	/*	Alerts
	/*-----------------------------------------------------------------------------------*/
	
	function wow_shortcode_alert( $atts, $content = null ) {
		extract(shortcode_atts(array(
		'type' => '',
		), $atts));
		$type = !empty($type) ? $type : 'info';
		switch ($type) {
			case 'info':
			$icon = '<i class="fas fa-info-circle"></i>';
			break;
			case 'success':
			$icon = '<i class="fas fa-check-circle"></i>';
			break;
			case 'warning':
			$icon = '<i class="fas fa-exclamation-circle"></i>';
			break;
			case 'error':
			$icon = '<i class="fas fa-times-circle"></i>';
			break;
		}
		return '<div class="message_'.$type.'">'.$icon. do_shortcode($content) . '</div>';
	}	
	add_shortcode('w-alert', 'wow_shortcode_alert');
	
	/*-----------------------------------------------------------------------------------*/
	/*	Buttons
	/*-----------------------------------------------------------------------------------*/
	function wow_shortcode_button( $atts, $content = null ) {
		extract(shortcode_atts(array(
		'type'  => '',
		'link'  => '',
		'class' => '',
		'id'    => '',
		), $atts));
		$class = !empty($class) ? ' '.$class : '';
		$id = !empty($class) ? ' id="'.$id.'"' : '';
		$link = !empty($link) ? ' onclick="window.location.href=\''.$link.'\';"' : '';
		$type = !empty($type) ? $type : '1';
		switch ($type) {
			case '1':
			$button = '<button class="wow-button btn-1'.$class.'"'.$id.$link.'>'.do_shortcode($content).'</button>';
			break;
			case '2':
			$button = '<button class="wow-button btn-2'.$class.'"'.$id.$link.'>'.do_shortcode($content).'</button>';
			break;
			case '3':
			$button = '<button class="wow-button btn-3'.$class.'"'.$id.$link.'><span>'.do_shortcode($content).'</span></button>';
			break;
			case '4':
			$button = '<button class="wow-button btn-4'.$class.'"'.$id.$link.'><span>'.do_shortcode($content).'</span></button>';
			break;
			case '5':
			$button = '<button class="wow-button btn-5'.$class.'"'.$id.$link.'><span>'.do_shortcode($content).'</span></button>';
			break;
			case '6':
			$button = '<button class="wow-button btn-6'.$class.'"'.$id.$link.'><span>'.do_shortcode($content).'</span></button>';
			break;
			case '7':
			$button = '<button class="wow-button btn-7'.$class.'"'.$id.$link.'>'.do_shortcode($content).'</button>';
			break;
			case '8':
			$button = '<button class="wow-button btn-8'.$class.'"'.$id.$link.'>'.do_shortcode($content).'</button>';
			break;
			case '9':
			$button = '<button class="wow-button btn-9'.$class.'"'.$id.$link.'>'.do_shortcode($content).'</button>';
			break;
			case '10':
			$button = '<button class="wow-button btn-10'.$class.'"'.$id.$link.'>'.do_shortcode($content).'</button>';
			break;
			case '11':
			$button = '<button class="wow-button btn-11'.$class.'"'.$id.$link.'>'.do_shortcode($content).'</button>';
			break;
			case '12':
			$button = '<button class="wow-button btn-12'.$class.'"'.$id.$link.'>'.do_shortcode($content).'</button>';
			break;
		}
		return $button;		
	}
	
	add_shortcode('w-button', 'wow_shortcode_button');
	
	/*-----------------------------------------------------------------------------------*/
	/*	Icons
	/*-----------------------------------------------------------------------------------*/
	
	function wow_shortcode_icon( $atts, $content = null ) {
		extract(shortcode_atts(array(
		'name'          => '',
		'color'         => '',
		'size'          => '',
		'shape'         => '',
		'colorshape'    => '',
		'align'         => '',
		), $atts));
				
		if( $shape !== 'none' ) {
			$width = $size*2;
			if ( $shape == 'fas fa-ban' ) {
				$code = '<span class="fa-stack fa-2x" style="font-size:' . $size . 'px;"><i class="' . $name . ' fa-stack-1x fa-inverse" style="color:' . $color . ';"></i><i class="' . $shape . ' fa-stack-2x" style="color:' . $colorshape . ';"></i></span>';
			}
			else {
				$code = '<span class="fa-stack fa-2x" style="font-size:' . $size . 'px;"><i class="' . $shape . ' fa-stack-2x" style="color:' . $colorshape . ';"></i><i class="' . $name . ' fa-stack-1x fa-inverse" style="color:' . $color . ';"></i></span>';
			}
		}
		else {
			$width = $size;
			$code = '<i class="' . $name . '" style="color:' . $color . ';font-size:' . $size . 'px;"></i>';
		}		
		$code = '<span class="align'.$align.'" style="width:'.$width.'px;">'.$code.'</span>';		
		return $code;		
	}	
	add_shortcode('w-icon', 'wow_shortcode_icon');
	
	/*-----------------------------------------------------------------------------------*/
	/*	Add button in Editor
	/*-----------------------------------------------------------------------------------*/
	
	function wow_shortcodes_add_button() {		
		if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( 'true' == get_user_option( 'rich_editing' ) ) {
			add_filter( 'mce_external_plugins', 'wow_shortcodes_add_tinymce_script' );
			add_filter( 'mce_buttons_2', 'wow_shortcodes_register_button' );
		}
	}
	add_action('admin_head', 'wow_shortcodes_add_button');
	
	function wow_shortcodes_add_tinymce_script( $plugin_array ) {
		$plugin_array['wow_shortcodes_button'] = plugin_dir_url( __FILE__) . 'assets/js/admin-button.js';
		return $plugin_array;
	}
	
	function wow_shortcodes_register_button( $buttons ) {
		array_push( $buttons, 'wow_shortcodes_button' );
		return $buttons;
	}
	
	/*-----------------------------------------------------------------------------------*/
	/*	Add Icon button in Editor
	/*-----------------------------------------------------------------------------------*/
	
	function wow_icon_picker_button() {		
		$img = plugin_dir_url( __FILE__) . 'assets/img/icon.png';
		$container_id = 'wow-icons';
		$title = 'Icons';
		$context = '<a class="thickbox button" id="icon-picker-button" title="'.$title.'" style="outline: medium none !important; cursor: pointer;" ><img class="icon" src="'.$img.'" alt="Icons"/>Icons</a>';
		echo $context;
		add_action('admin_footer', 'wow_icon_picker_add');
	}
	add_action('media_buttons', 'wow_icon_picker_button', 15 );
	
	
	function wow_icon_picker_add(){
		wp_enqueue_style( 'wow-icon-button',  plugin_dir_url( __FILE__) . 'assets/css/admin.css');
		wp_enqueue_script( 'wow-icon-button', plugin_dir_url( __FILE__) . 'assets/js/admin-icon.js', array( 'wp-color-picker' ));
		require_once plugin_dir_path( __FILE__ ). 'assets/php/button.php';
		if(get_current_screen()->parent_base == 'wow-company') {
			wp_enqueue_style( 'wow-shortcodes-frontend',  plugin_dir_url( __FILE__) . 'assets/css/frontend.css');
		}
	}
	
	function wow_tiny_mce_buttons( $buttons_array ){
		if ( !in_array( 'underline', $buttons_array ) && in_array( 'italic', $buttons_array ) ){
			$key = array_search( 'italic', $buttons_array );
			$inserted = array( 'underline' );
			array_splice( $buttons_array, $key + 1, 0, $inserted );
		}
		if ( !in_array( 'alignjustify', $buttons_array ) && in_array( 'alignright', $buttons_array ) ){
			$key = array_search( 'alignright', $buttons_array );
			$inserted = array( 'alignjustify' );
			array_splice( $buttons_array, $key + 1, 0, $inserted );
		}
		return $buttons_array;
	}
	
add_filter( 'mce_buttons', 'wow_tiny_mce_buttons', 5 );