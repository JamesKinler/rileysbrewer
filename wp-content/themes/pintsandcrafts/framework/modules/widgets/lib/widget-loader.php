<?php

if ( ! function_exists( 'pintsandcrafts_edge_register_widgets' ) ) {
	function pintsandcrafts_edge_register_widgets() {
		$widgets = apply_filters( 'pintsandcrafts_edge_filter_register_widgets', $widgets = array() );

		foreach ( $widgets as $widget ) {
			register_widget( $widget );
		}
	}
	
	add_action( 'widgets_init', 'pintsandcrafts_edge_register_widgets' );
}