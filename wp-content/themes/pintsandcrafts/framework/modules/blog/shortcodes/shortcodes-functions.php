<?php

if ( ! function_exists( 'pintsandcrafts_edge_include_blog_shortcodes' ) ) {
	function pintsandcrafts_edge_include_blog_shortcodes() {
		include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/blog-list/blog-list.php';
		include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/blog-slider/blog-slider.php';
	}
	
	if ( pintsandcrafts_edge_core_plugin_installed() ) {
		add_action( 'pintsandcrafts_core_action_include_shortcodes_file', 'pintsandcrafts_edge_include_blog_shortcodes' );
	}
}

if ( ! function_exists( 'pintsandcrafts_edge_add_blog_shortcodes' ) ) {
	function pintsandcrafts_edge_add_blog_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'PintsAndCraftsCore\CPT\Shortcodes\BlogList\BlogList',
			'PintsAndCraftsCore\CPT\Shortcodes\BlogSlider\BlogSlider'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	if ( pintsandcrafts_edge_core_plugin_installed() ) {
		add_filter( 'pintsandcrafts_core_filter_add_vc_shortcode', 'pintsandcrafts_edge_add_blog_shortcodes' );
	}
}

if ( ! function_exists( 'pintsandcrafts_edge_set_blog_list_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for blog shortcodes to set our icon for Visual Composer shortcodes panel
	 */
	function pintsandcrafts_edge_set_blog_list_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-blog-list';
		$shortcodes_icon_class_array[] = '.icon-wpb-blog-slider';
		
		return $shortcodes_icon_class_array;
	}
	
	if ( pintsandcrafts_edge_core_plugin_installed() ) {
		add_filter( 'pintsandcrafts_core_filter_add_vc_shortcodes_custom_icon_class', 'pintsandcrafts_edge_set_blog_list_icon_class_name_for_vc_shortcodes' );
	}
}