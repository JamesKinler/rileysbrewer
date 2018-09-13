<?php

if ( ! function_exists( 'pintsandcrafts_edge_sticky_header_meta_boxes_options_map' ) ) {
	function pintsandcrafts_edge_sticky_header_meta_boxes_options_map( $header_meta_box ) {
		
		$sticky_amount_container = pintsandcrafts_edge_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_amount_container_meta_container',
				'dependency' => array(
					'hide' => array(
						'edgtf_header_behaviour_meta'  => array( '', 'no-behavior','fixed-on-scroll','sticky-header-on-scroll-up' )
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_scroll_amount_for_sticky_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll Amount for Sticky Header Appearance', 'pintsandcrafts' ),
				'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'pintsandcrafts' ),
				'parent'      => $sticky_amount_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
		
		$pintsandcrafts_custom_sidebars = pintsandcrafts_edge_get_custom_sidebars();
		if ( count( $pintsandcrafts_custom_sidebars ) > 0 ) {
			pintsandcrafts_edge_add_meta_box_field(
				array(
					'name'        => 'edgtf_custom_sticky_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Sticky Header Menu Area', 'pintsandcrafts' ),
					'description' => esc_html__( 'Choose custom widget area to display in sticky header menu area"', 'pintsandcrafts' ),
					'parent'      => $header_meta_box,
					'options'     => $pintsandcrafts_custom_sidebars,
					'dependency' => array(
						'show' => array(
							'edgtf_header_behaviour_meta' => array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' )
						)
					)
				)
			);
		}
	}
	
	add_action( 'pintsandcrafts_edge_action_additional_header_area_meta_boxes_map', 'pintsandcrafts_edge_sticky_header_meta_boxes_options_map', 8, 1 );
}