<?php

if ( ! function_exists( 'pintsandcrafts_edge_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function pintsandcrafts_edge_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'PintsAndCraftsPhpClassSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'pintsandcrafts_edge_filter_register_widgets', 'pintsandcrafts_edge_register_sidearea_opener_widget' );
}