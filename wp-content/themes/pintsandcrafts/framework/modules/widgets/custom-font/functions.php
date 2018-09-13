<?php

if ( ! function_exists( 'pintsandcrafts_edge_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function pintsandcrafts_edge_register_custom_font_widget( $widgets ) {
		$widgets[] = 'PintsAndCraftsPhpClassCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'pintsandcrafts_edge_filter_register_widgets', 'pintsandcrafts_edge_register_custom_font_widget' );
}