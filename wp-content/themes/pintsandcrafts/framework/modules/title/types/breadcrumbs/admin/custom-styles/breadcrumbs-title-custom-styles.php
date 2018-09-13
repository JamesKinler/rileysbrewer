<?php

if ( ! function_exists( 'pintsandcrafts_edge_breadcrumbs_title_area_typography_style' ) ) {
	function pintsandcrafts_edge_breadcrumbs_title_area_typography_style() {
		
		$item_styles = pintsandcrafts_edge_get_typography_styles( 'page_breadcrumb' );
		
		$item_selector = array(
			'.edgtf-title-holder .edgtf-title-wrapper .edgtf-breadcrumbs'
		);
		
		echo pintsandcrafts_edge_dynamic_css( $item_selector, $item_styles );
		
		
		$breadcrumb_hover_color = pintsandcrafts_edge_options()->getOptionValue( 'page_breadcrumb_hovercolor' );
		
		$breadcrumb_hover_styles = array();
		if ( ! empty( $breadcrumb_hover_color ) ) {
			$breadcrumb_hover_styles['color'] = $breadcrumb_hover_color;
		}
		
		$breadcrumb_hover_selector = array(
			'.edgtf-title-holder .edgtf-title-wrapper .edgtf-breadcrumbs a:hover'
		);
		
		echo pintsandcrafts_edge_dynamic_css( $breadcrumb_hover_selector, $breadcrumb_hover_styles );
	}
	
	add_action( 'pintsandcrafts_edge_action_style_dynamic', 'pintsandcrafts_edge_breadcrumbs_title_area_typography_style' );
}