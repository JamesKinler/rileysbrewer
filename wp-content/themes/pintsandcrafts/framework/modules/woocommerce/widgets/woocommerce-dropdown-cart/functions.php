<?php

if ( ! function_exists( 'pintsandcrafts_edge_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register dropdown cart widget
	 */
	function pintsandcrafts_edge_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'PintsAndCraftsPhpClassWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'pintsandcrafts_edge_filter_register_widgets', 'pintsandcrafts_edge_register_woocommerce_dropdown_cart_widget' );
}

if ( ! function_exists( 'pintsandcrafts_edge_get_dropdown_cart_icon_class' ) ) {
	/**
	 * Returns dropdow cart icon class
	 */
	function pintsandcrafts_edge_get_dropdown_cart_icon_class() {
		$dropdown_cart_icon_source = pintsandcrafts_edge_options()->getOptionValue( 'dropdown_cart_icon_source' );
		
		$dropdown_cart_icon_class_array = array(
			'edgtf-header-cart'
		);
		
		$dropdown_cart_icon_class_array[] = $dropdown_cart_icon_source == 'icon_pack' ? 'edgtf-header-cart-icon-pack' : 'edgtf-header-cart-svg-path';
		
		return $dropdown_cart_icon_class_array;
	}
}

if ( ! function_exists( 'pintsandcrafts_edge_get_dropdown_cart_icon_html' ) ) {
	/**
	 * Returns dropdown cart icon HTML
	 */
	function pintsandcrafts_edge_get_dropdown_cart_icon_html() {
		$dropdown_cart_icon_source   = pintsandcrafts_edge_options()->getOptionValue( 'dropdown_cart_icon_source' );
		$dropdown_cart_icon_pack     = pintsandcrafts_edge_options()->getOptionValue( 'dropdown_cart_icon_pack' );
		$dropdown_cart_icon_svg_path = pintsandcrafts_edge_options()->getOptionValue( 'dropdown_cart_icon_svg_path' );
		
		$dropdown_cart_icon_html = '';
		
		if ( ( $dropdown_cart_icon_source == 'icon_pack' ) && ( isset( $dropdown_cart_icon_pack ) ) ) {
			$dropdown_cart_icon_html .= pintsandcrafts_edge_icon_collections()->getDropdownCartIcon( $dropdown_cart_icon_pack );
		} else if ( isset( $dropdown_cart_icon_svg_path ) ) {
			$dropdown_cart_icon_html .= $dropdown_cart_icon_svg_path;
		}
		
		return $dropdown_cart_icon_html;
	}
}