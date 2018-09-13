<?php

if ( ! function_exists( 'pintsandcrafts_edge_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function pintsandcrafts_edge_register_search_opener_widget( $widgets ) {
		$widgets[] = 'PintsAndCraftsPhpClassSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'pintsandcrafts_edge_filter_register_widgets', 'pintsandcrafts_edge_register_search_opener_widget' );
}