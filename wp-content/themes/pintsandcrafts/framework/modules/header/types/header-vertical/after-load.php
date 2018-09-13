<?php

if ( ! function_exists( 'pintsandcrafts_edge_disable_behaviors_for_header_vertical' ) ) {
	/**
	 * This function is used to disable sticky header functions that perform processing variables their used in js for this header type
	 */
	function pintsandcrafts_edge_disable_behaviors_for_header_vertical( $allow_behavior ) {
		return false;
	}
	
	if ( pintsandcrafts_edge_check_is_header_type_enabled( 'header-vertical', pintsandcrafts_edge_get_page_id() ) ) {
		add_filter( 'pintsandcrafts_edge_filter_allow_sticky_header_behavior', 'pintsandcrafts_edge_disable_behaviors_for_header_vertical' );
		add_filter( 'pintsandcrafts_edge_filter_allow_content_boxed_layout', 'pintsandcrafts_edge_disable_behaviors_for_header_vertical' );
	}
}