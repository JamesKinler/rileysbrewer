<?php

if(!function_exists('pintsandcrafts_edge_register_sticky_sidebar_widget')) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function pintsandcrafts_edge_register_sticky_sidebar_widget($widgets) {
		$widgets[] = 'PintsAndCraftsPhpClassStickySidebar';
		
		return $widgets;
	}
	
	add_filter('pintsandcrafts_edge_filter_register_widgets', 'pintsandcrafts_edge_register_sticky_sidebar_widget');
}