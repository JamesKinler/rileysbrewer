<?php

if ( ! function_exists( 'pintsandcrafts_edge_footer_top_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer top area
	 */
	function pintsandcrafts_edge_footer_top_general_styles() {
		$item_styles      = array();
		$background_color = pintsandcrafts_edge_options()->getOptionValue( 'footer_top_background_color' );
		
		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
		
		echo pintsandcrafts_edge_dynamic_css( '.edgtf-page-footer .edgtf-footer-top-holder', $item_styles );
	}
	
	add_action( 'pintsandcrafts_edge_action_style_dynamic', 'pintsandcrafts_edge_footer_top_general_styles' );
}

if ( ! function_exists( 'pintsandcrafts_edge_footer_bottom_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer bottom area
	 */
	function pintsandcrafts_edge_footer_bottom_general_styles() {
		$item_styles      = array();
		$background_color = pintsandcrafts_edge_options()->getOptionValue( 'footer_bottom_background_color' );
		
		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
		
		echo pintsandcrafts_edge_dynamic_css( '.edgtf-page-footer .edgtf-footer-bottom-holder', $item_styles );
	}
	
	add_action( 'pintsandcrafts_edge_action_style_dynamic', 'pintsandcrafts_edge_footer_bottom_general_styles' );
}