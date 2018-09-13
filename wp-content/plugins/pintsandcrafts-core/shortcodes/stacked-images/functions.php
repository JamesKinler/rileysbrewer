<?php

if ( ! function_exists( 'pintsandcrafts_core_add_stacked_images_shortcode' ) ) {
	function pintsandcrafts_core_add_stacked_images_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'PintsAndCraftsCore\CPT\Shortcodes\StackedImages\StackedImages',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'pintsandcrafts_core_filter_add_vc_shortcode', 'pintsandcrafts_core_add_stacked_images_shortcode' );
}

if ( ! function_exists( 'pintsandcrafts_core_set_stacked_images_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for stacked images shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function pintsandcrafts_core_set_stacked_images_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-stacked-images';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'pintsandcrafts_core_filter_add_vc_shortcodes_custom_icon_class', 'pintsandcrafts_core_set_stacked_images_icon_class_name_for_vc_shortcodes' );
}