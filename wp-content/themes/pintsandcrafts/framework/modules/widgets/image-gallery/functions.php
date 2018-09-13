<?php

if ( ! function_exists( 'pintsandcrafts_edge_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function pintsandcrafts_edge_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'PintsAndCraftsPhpClassImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'pintsandcrafts_edge_filter_register_widgets', 'pintsandcrafts_edge_register_image_gallery_widget' );
}