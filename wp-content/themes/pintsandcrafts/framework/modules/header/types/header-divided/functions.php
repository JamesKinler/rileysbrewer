<?php

if ( ! function_exists( 'pintsandcrafts_edge_register_header_divided_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function pintsandcrafts_edge_register_header_divided_type( $header_types ) {
		$header_type = array(
			'header-divided' => 'PintsAndCraftsNamespace\Modules\Header\Types\HeaderDivided'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'pintsandcrafts_edge_init_register_header_divided_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function pintsandcrafts_edge_init_register_header_divided_type() {
		add_filter( 'pintsandcrafts_edge_filter_register_header_type_class', 'pintsandcrafts_edge_register_header_divided_type' );
	}
	
	add_action( 'pintsandcrafts_edge_action_before_header_function_init', 'pintsandcrafts_edge_init_register_header_divided_type' );
}

if ( ! function_exists( 'pintsandcrafts_edge_include_header_divided_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function pintsandcrafts_edge_include_header_divided_menu( $menus ) {
		$menus['divided-left-navigation']  = esc_html__( 'Divided Left Navigation', 'pintsandcrafts' );
		$menus['divided-right-navigation'] = esc_html__( 'Divided Right Navigation', 'pintsandcrafts' );
		
		return $menus;
	}
	
	if ( pintsandcrafts_edge_check_is_header_type_enabled( 'header-divided' ) ) {
		add_filter( 'pintsandcrafts_edge_filter_register_headers_menu', 'pintsandcrafts_edge_include_header_divided_menu' );
	}
}

if ( ! function_exists( 'pintsandcrafts_edge_get_divided_left_main_menu' ) ) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function pintsandcrafts_edge_get_divided_left_main_menu( $additional_class = 'edgtf-default-nav' ) {
		pintsandcrafts_edge_get_module_template_part( 'templates/divided-left-navigation', 'header/types/header-divided', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'pintsandcrafts_edge_get_sticky_divided_left_main_menu' ) ) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function pintsandcrafts_edge_get_sticky_divided_left_main_menu( $additional_class = 'edgtf-default-nav' ) {
		pintsandcrafts_edge_get_module_template_part( 'templates/sticky-divided-left-navigation', 'header/types/header-divided', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'pintsandcrafts_edge_get_divided_right_main_menu' ) ) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function pintsandcrafts_edge_get_divided_right_main_menu( $additional_class = 'edgtf-default-nav' ) {
		pintsandcrafts_edge_get_module_template_part( 'templates/divided-right-navigation', 'header/types/header-divided', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'pintsandcrafts_edge_get_sticky_divided_right_main_menu' ) ) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function pintsandcrafts_edge_get_sticky_divided_right_main_menu( $additional_class = 'edgtf-default-nav' ) {
		pintsandcrafts_edge_get_module_template_part( 'templates/sticky-divided-right-navigation', 'header/types/header-divided', '', array( 'additional_class' => $additional_class ) );
	}
}


if ( ! function_exists( 'pintsandcrafts_edge_register_header_divided_widgets' ) ) {
	/**
	 * Registers additional widget areas for this header type
	 */
	function pintsandcrafts_edge_register_header_divided_widgets() {
		register_sidebar(
			array(
				'id'            => 'edgtf-header-divided-left-widget-area',
				'name'          => esc_html__( 'Header Divided Left Widget Area', 'pintsandcrafts' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-header-divided-left-widget-area">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear left of the Header Divided left menu area', 'pintsandcrafts' )
			)
		);

		register_sidebar(
			array(
				'id'            => 'edgtf-header-divided-right-widget-area',
				'name'          => esc_html__( 'Header Divided Right Widget Area', 'pintsandcrafts' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-header-divided-right-widget-area">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear right of the Header Divided right menu area', 'pintsandcrafts' )
			)
		);
	}

	if ( pintsandcrafts_edge_check_is_header_type_enabled( 'header-divided' ) ) {
		add_action( 'widgets_init', 'pintsandcrafts_edge_register_header_divided_widgets' );
	}
}