<?php

if ( ! function_exists( 'pintsandcrafts_edge_search_body_class' ) ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function pintsandcrafts_edge_search_body_class( $classes ) {
		$classes[] = 'edgtf-fullscreen-search';
		$classes[] = 'edgtf-search-fade';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'pintsandcrafts_edge_search_body_class' );
}

if ( ! function_exists( 'pintsandcrafts_edge_get_search' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function pintsandcrafts_edge_get_search() {
		pintsandcrafts_edge_load_search_template();
	}
	
	add_action( 'pintsandcrafts_edge_action_before_page_header', 'pintsandcrafts_edge_get_search' );
}

if ( ! function_exists( 'pintsandcrafts_edge_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function pintsandcrafts_edge_load_search_template() {
		$parameters = array(
			'search_close_icon_class' 	=> pintsandcrafts_edge_get_search_close_icon_class(),
			'search_submit_icon_class' 	=> pintsandcrafts_edge_get_search_submit_icon_class()
		);

        pintsandcrafts_edge_get_module_template_part( 'types/fullscreen/templates/fullscreen', 'search', '', $parameters );
	}
}