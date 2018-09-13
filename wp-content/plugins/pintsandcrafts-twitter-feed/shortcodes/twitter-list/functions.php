<?php

if ( ! function_exists( 'pintsandcrafts_twitter_add_twitter_list_shortcodes' ) ) {
	function pintsandcrafts_twitter_add_twitter_list_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'PintsAndCraftsTwitter\Shortcodes\TwitterList\TwitterList'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'pintsandcrafts_twitter_filter_add_vc_shortcode', 'pintsandcrafts_twitter_add_twitter_list_shortcodes' );
}

if ( ! function_exists( 'pintsandcrafts_twitter_set_twitter_list_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for twitter list shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function pintsandcrafts_twitter_set_twitter_list_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-twitter-list';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'edgtf_core_filter_add_vc_shortcodes_custom_icon_class', 'pintsandcrafts_twitter_set_twitter_list_icon_class_name_for_vc_shortcodes' );
}