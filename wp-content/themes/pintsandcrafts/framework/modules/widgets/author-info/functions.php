<?php

if ( ! function_exists( 'pintsandcrafts_edge_register_author_info_widget' ) ) {
	/**
	 * Function that register author info widget
	 */
	function pintsandcrafts_edge_register_author_info_widget( $widgets ) {
		$widgets[] = 'PintsAndCraftsPhpClassAuthorInfoWidget';
		
		return $widgets;
	}
	
	add_filter( 'pintsandcrafts_edge_filter_register_widgets', 'pintsandcrafts_edge_register_author_info_widget' );
}