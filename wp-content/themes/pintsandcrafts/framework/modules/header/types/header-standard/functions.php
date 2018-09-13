<?php

if ( ! function_exists( 'pintsandcrafts_edge_register_header_standard_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function pintsandcrafts_edge_register_header_standard_type( $header_types ) {
		$header_type = array(
			'header-standard' => 'PintsAndCraftsNamespace\Modules\Header\Types\HeaderStandard'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'pintsandcrafts_edge_init_register_header_standard_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function pintsandcrafts_edge_init_register_header_standard_type() {
		add_filter( 'pintsandcrafts_edge_filter_register_header_type_class', 'pintsandcrafts_edge_register_header_standard_type' );
	}
	
	add_action( 'pintsandcrafts_edge_action_before_header_function_init', 'pintsandcrafts_edge_init_register_header_standard_type' );
}