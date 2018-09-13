<?php

if ( ! function_exists( 'pintsandcrafts_edge_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function pintsandcrafts_edge_register_blog_list_widget( $widgets ) {
		$widgets[] = 'PintsAndCraftsPhpClassBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'pintsandcrafts_edge_filter_register_widgets', 'pintsandcrafts_edge_register_blog_list_widget' );
}