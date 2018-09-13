<?php

if ( ! function_exists( 'pintsandcrafts_core_add_dropcaps_shortcodes' ) ) {
	function pintsandcrafts_core_add_dropcaps_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'PintsAndCraftsCore\CPT\Shortcodes\Dropcaps\Dropcaps'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'pintsandcrafts_core_filter_add_vc_shortcode', 'pintsandcrafts_core_add_dropcaps_shortcodes' );
}