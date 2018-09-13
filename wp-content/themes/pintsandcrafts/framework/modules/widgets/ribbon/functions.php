<?php

if ( ! function_exists( 'pintsandcrafts_edge_register_ribbon_widget' ) ) {
	/**
	 * Function that register ribbon widget
	 */
	function pintsandcrafts_edge_register_ribbon_widget( $widgets ) {
		$widgets[] = 'PintsAndCraftsPhpClassRibbonOpener';
		
		return $widgets;
	}
	
	add_filter( 'pintsandcrafts_edge_filter_register_widgets', 'pintsandcrafts_edge_register_ribbon_widget' );
}