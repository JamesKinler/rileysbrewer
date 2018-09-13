<?php

if ( ! function_exists( 'pintsandcrafts_edge_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function pintsandcrafts_edge_register_separator_widget( $widgets ) {
		$widgets[] = 'PintsAndCraftsPhpClassSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'pintsandcrafts_edge_filter_register_widgets', 'pintsandcrafts_edge_register_separator_widget' );
}