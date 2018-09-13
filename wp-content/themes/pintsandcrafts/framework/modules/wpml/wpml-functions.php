<?php

if ( ! function_exists( 'pintsandcrafts_edge_disable_wpml_css' ) ) {
	function pintsandcrafts_edge_disable_wpml_css() {
		define( 'ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true );
	}
	
	add_action( 'after_setup_theme', 'pintsandcrafts_edge_disable_wpml_css' );
}