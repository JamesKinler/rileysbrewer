<?php

if ( ! function_exists( 'pintsandcrafts_edge_register_social_icon_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function pintsandcrafts_edge_register_social_icon_widget( $widgets ) {
		$widgets[] = 'PintsAndCraftsPhpClassSocialIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'pintsandcrafts_edge_filter_register_widgets', 'pintsandcrafts_edge_register_social_icon_widget' );
}