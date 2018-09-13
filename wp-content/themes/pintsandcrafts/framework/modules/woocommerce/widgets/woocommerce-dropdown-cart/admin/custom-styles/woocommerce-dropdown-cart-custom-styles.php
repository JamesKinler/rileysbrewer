<?php

if ( ! function_exists( 'pintsandcrafts_edge_dropdown_cart_icon_styles' ) ) {
	/**
	 * Generates styles for dropdown cart icon
	 */
	function pintsandcrafts_edge_dropdown_cart_icon_styles() {
		$icon_color       = pintsandcrafts_edge_options()->getOptionValue( 'dropdown_cart_icon_color' );
		$icon_hover_color = pintsandcrafts_edge_options()->getOptionValue( 'dropdown_cart_hover_color' );
		
		if ( ! empty( $icon_color ) ) {
			echo pintsandcrafts_edge_dynamic_css( '.edgtf-shopping-cart-holder .edgtf-header-cart a', array( 'color' => $icon_color ) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo pintsandcrafts_edge_dynamic_css( '.edgtf-shopping-cart-holder .edgtf-header-cart a:hover', array( 'color' => $icon_hover_color ) );
		}
	}
	
	add_action( 'pintsandcrafts_edge_action_style_dynamic', 'pintsandcrafts_edge_dropdown_cart_icon_styles' );
}