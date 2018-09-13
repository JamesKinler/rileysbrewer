<?php

if ( ! function_exists( 'pintsandcrafts_edge_set_title_standard_with_breadcrumbs_type_for_options' ) ) {
	/**
	 * This function set standard with breadcrumbs title type value for title options map and meta boxes
	 */
	function pintsandcrafts_edge_set_title_standard_with_breadcrumbs_type_for_options( $type ) {
		$type['standard-with-breadcrumbs'] = esc_html__( 'Standard With Breadcrumbs', 'pintsandcrafts' );
		
		return $type;
	}
	
	add_filter( 'pintsandcrafts_edge_filter_title_type_global_option', 'pintsandcrafts_edge_set_title_standard_with_breadcrumbs_type_for_options' );
	add_filter( 'pintsandcrafts_edge_filter_title_type_meta_boxes', 'pintsandcrafts_edge_set_title_standard_with_breadcrumbs_type_for_options' );
}