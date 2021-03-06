<?php

if ( ! function_exists( 'pintsandcrafts_edge_add_product_list_carousel_shortcode' ) ) {
	function pintsandcrafts_edge_add_product_list_carousel_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'PintsAndCraftsCore\CPT\Shortcodes\ProductListCarousel\ProductListCarousel',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	if ( pintsandcrafts_edge_core_plugin_installed() ) {
		add_filter( 'pintsandcrafts_core_filter_add_vc_shortcode', 'pintsandcrafts_edge_add_product_list_carousel_shortcode' );
	}
}

if ( ! function_exists( 'pintsandcrafts_edge_add_product_list_carousel_into_shortcodes_list' ) ) {
	function pintsandcrafts_edge_add_product_list_carousel_into_shortcodes_list( $woocommerce_shortcodes ) {
		$woocommerce_shortcodes[] = 'edgtf_product_list_carousel';
		
		return $woocommerce_shortcodes;
	}
	
	add_filter( 'edgtf_themename_filter_woocommerce_shortcodes_list', 'pintsandcrafts_edge_add_product_list_carousel_into_shortcodes_list' );
}