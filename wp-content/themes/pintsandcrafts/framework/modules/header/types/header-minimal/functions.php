<?php

if ( ! function_exists( 'pintsandcrafts_edge_register_header_minimal_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function pintsandcrafts_edge_register_header_minimal_type( $header_types ) {
		$header_type = array(
			'header-minimal' => 'PintsAndCraftsNamespace\Modules\Header\Types\HeaderMinimal'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'pintsandcrafts_edge_init_register_header_minimal_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function pintsandcrafts_edge_init_register_header_minimal_type() {
		add_filter( 'pintsandcrafts_edge_filter_register_header_type_class', 'pintsandcrafts_edge_register_header_minimal_type' );
	}
	
	add_action( 'pintsandcrafts_edge_action_before_header_function_init', 'pintsandcrafts_edge_init_register_header_minimal_type' );
}

if ( ! function_exists( 'pintsandcrafts_edge_include_header_minimal_full_screen_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function pintsandcrafts_edge_include_header_minimal_full_screen_menu( $menus ) {
		$menus['popup-navigation'] = esc_html__( 'Full Screen Navigation', 'pintsandcrafts' );
		
		return $menus;
	}
	
	if ( pintsandcrafts_edge_check_is_header_type_enabled( 'header-minimal' ) ) {
		add_filter( 'pintsandcrafts_edge_filter_register_headers_menu', 'pintsandcrafts_edge_include_header_minimal_full_screen_menu' );
	}
}

if ( ! function_exists( 'pintsandcrafts_edge_get_fullscreen_menu_icon_class' ) ) {
	/**
	 * Loads full screen menu icon class
	 */
	function pintsandcrafts_edge_get_fullscreen_menu_icon_class() {

		$fullscreen_menu_icon_source = pintsandcrafts_edge_options()->getOptionValue( 'fullscreen_menu_icon_source' );

		$fullscreen_menu_icon_class_array = array(
			'edgtf-fullscreen-menu-opener'
		);

		$fullscreen_menu_icon_class_array[] = $fullscreen_menu_icon_source == 'icon_pack' ? 'edgtf-fullscreen-menu-opener-icon-pack' : 'edgtf-fullscreen-menu-opener-svg-path';

		return $fullscreen_menu_icon_class_array;
	}
}

if ( ! function_exists( 'pintsandcrafts_edge_get_fullscreen_menu_icon_html' ) ) {
	/**
	 * Loads fullscreen menu icon HTML
	 */
	function pintsandcrafts_edge_get_fullscreen_menu_icon_html() {

		$fullscreen_menu_icon_source	= pintsandcrafts_edge_options()->getOptionValue( 'fullscreen_menu_icon_source' );
		$fullscreen_menu_icon_pack		= pintsandcrafts_edge_options()->getOptionValue( 'fullscreen_menu_icon_pack' );
		$fullscreen_menu_icon_svg_path 	= pintsandcrafts_edge_options()->getOptionValue( 'fullscreen_menu_icon_svg_path' );

		$fullscreen_menu_icon_html = '';

		if ( ( $fullscreen_menu_icon_source == 'icon_pack' ) && ( isset( $fullscreen_menu_icon_pack ) ) ) {
			$fullscreen_menu_icon_html .= pintsandcrafts_edge_icon_collections()->getMenuIcon($fullscreen_menu_icon_pack);
		} else if ( isset( $fullscreen_menu_icon_svg_path ) ) {
			$fullscreen_menu_icon_html .= $fullscreen_menu_icon_svg_path; 
		}

		return $fullscreen_menu_icon_html;
	}
}

if ( ! function_exists( 'pintsandcrafts_edge_get_fullscreen_menu_close_icon_html' ) ) {
	/**
	 * Loads fullscreen menu close icon HTML
	 */
	function pintsandcrafts_edge_get_fullscreen_menu_close_icon_html() {

		$fullscreen_menu_icon_source			= pintsandcrafts_edge_options()->getOptionValue( 'fullscreen_menu_icon_source' );
		$fullscreen_menu_icon_pack				= pintsandcrafts_edge_options()->getOptionValue( 'fullscreen_menu_icon_pack' );
		$fullscreen_menu_close_icon_svg_path 	= pintsandcrafts_edge_options()->getOptionValue( 'fullscreen_menu_close_icon_svg_path' );

		$fullscreen_menu_close_icon_html = '';

		if ( ( $fullscreen_menu_icon_source == 'icon_pack' ) && ( isset( $fullscreen_menu_icon_pack ) ) ) {
			$fullscreen_menu_close_icon_html .= pintsandcrafts_edge_icon_collections()->getMenuCloseIcon($fullscreen_menu_icon_pack);
		} else if ( isset( $fullscreen_menu_close_icon_svg_path ) ) {
			$fullscreen_menu_close_icon_html .= $fullscreen_menu_close_icon_svg_path; 
		}

		return $fullscreen_menu_close_icon_html;
	}
}

if ( ! function_exists( 'pintsandcrafts_edge_register_header_minimal_full_screen_menu_widgets' ) ) {
	/**
	 * Registers additional widget areas for this header type
	 */
	function pintsandcrafts_edge_register_header_minimal_full_screen_menu_widgets() {
		register_sidebar(
			array(
				'id'            => 'fullscreen_menu_above',
				'name'          => esc_html__( 'Fullscreen Menu Top', 'pintsandcrafts' ),
				'description'   => esc_html__( 'This widget area is rendered above full screen menu', 'pintsandcrafts' ),
				'before_widget' => '<div class="%2$s edgtf-fullscreen-menu-above-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="edgtf-widget-title">',
				'after_title'   => '</h5>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'fullscreen_menu_below',
				'name'          => esc_html__( 'Fullscreen Menu Bottom', 'pintsandcrafts' ),
				'description'   => esc_html__( 'This widget area is rendered below full screen menu', 'pintsandcrafts' ),
				'before_widget' => '<div class="%2$s edgtf-fullscreen-menu-below-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="edgtf-widget-title">',
				'after_title'   => '</h5>'
			)
		);
	}
	
	if ( pintsandcrafts_edge_check_is_header_type_enabled( 'header-minimal' ) ) {
		add_action( 'widgets_init', 'pintsandcrafts_edge_register_header_minimal_full_screen_menu_widgets' );
	}
}