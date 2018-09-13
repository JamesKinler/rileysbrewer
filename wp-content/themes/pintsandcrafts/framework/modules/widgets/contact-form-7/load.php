<?php

if ( pintsandcrafts_edge_contact_form_7_installed() ) {
	include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';
	
	add_filter( 'pintsandcrafts_edge_filter_register_widgets', 'pintsandcrafts_edge_register_cf7_widget' );
}

if ( ! function_exists( 'pintsandcrafts_edge_register_cf7_widget' ) ) {
	/**
	 * Function that register cf7 widget
	 */
	function pintsandcrafts_edge_register_cf7_widget( $widgets ) {
		$widgets[] = 'PintsAndCraftsPhpClassContactForm7Widget';
		
		return $widgets;
	}
}