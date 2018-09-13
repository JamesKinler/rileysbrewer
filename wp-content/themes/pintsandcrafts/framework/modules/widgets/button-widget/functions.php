<?php

if ( ! function_exists( 'pintsandcrafts_edge_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function pintsandcrafts_edge_register_button_widget( $widgets ) {
		$widgets[] = 'PintsAndCraftsPhpClassButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'pintsandcrafts_edge_filter_register_widgets', 'pintsandcrafts_edge_register_button_widget' );
}