<?php

if ( ! function_exists( 'pintsandcrafts_edge_logo_meta_box_map' ) ) {
	function pintsandcrafts_edge_logo_meta_box_map() {
		
		$logo_meta_box = pintsandcrafts_edge_add_meta_box(
			array(
				'scope' => apply_filters( 'pintsandcrafts_edge_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'pintsandcrafts' ),
				'name'  => 'logo_meta'
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'pintsandcrafts' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'pintsandcrafts' ),
				'parent'      => $logo_meta_box
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'pintsandcrafts' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'pintsandcrafts' ),
				'parent'      => $logo_meta_box
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'pintsandcrafts' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'pintsandcrafts' ),
				'parent'      => $logo_meta_box
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'pintsandcrafts' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'pintsandcrafts' ),
				'parent'      => $logo_meta_box
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'pintsandcrafts' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'pintsandcrafts' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'pintsandcrafts_edge_action_meta_boxes_map', 'pintsandcrafts_edge_logo_meta_box_map', 47 );
}