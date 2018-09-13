<?php

if ( ! function_exists( 'pintsandcrafts_edge_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function pintsandcrafts_edge_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'pintsandcrafts_edge_filter_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'pintsandcrafts_edge_header_standard_meta_map' ) ) {
	function pintsandcrafts_edge_header_standard_meta_map( $parent ) {
		$hide_dep_options = pintsandcrafts_edge_get_hide_dep_for_header_standard_meta_boxes();
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'edgtf_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'pintsandcrafts' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'pintsandcrafts' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'pintsandcrafts' ),
					'left'   => esc_html__( 'Left', 'pintsandcrafts' ),
					'right'  => esc_html__( 'Right', 'pintsandcrafts' ),
					'center' => esc_html__( 'Center', 'pintsandcrafts' )
				),
				'dependency' => array(
					'hide' => array(
						'edgtf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'pintsandcrafts_edge_action_additional_header_area_meta_boxes_map', 'pintsandcrafts_edge_header_standard_meta_map' );
}