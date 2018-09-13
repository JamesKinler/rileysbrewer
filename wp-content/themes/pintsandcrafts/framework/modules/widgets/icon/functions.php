<?php

if ( ! function_exists( 'pintsandcrafts_edge_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function pintsandcrafts_edge_register_icon_widget( $widgets ) {
		$widgets[] = 'PintsAndCraftsPhpClassIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'pintsandcrafts_edge_filter_register_widgets', 'pintsandcrafts_edge_register_icon_widget' );
}