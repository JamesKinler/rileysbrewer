<?php

if ( ! function_exists( 'pintsandcrafts_edge_get_hide_dep_for_header_standard_options' ) ) {
	function pintsandcrafts_edge_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'pintsandcrafts_edge_filter_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'pintsandcrafts_edge_header_standard_map' ) ) {
	function pintsandcrafts_edge_header_standard_map( $parent ) {
		$hide_dep_options = pintsandcrafts_edge_get_hide_dep_for_header_standard_options();
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'left',
				'label'           => esc_html__( 'Choose Menu Area Position', 'pintsandcrafts' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'pintsandcrafts' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'pintsandcrafts' ),
					'left'   => esc_html__( 'Left', 'pintsandcrafts' ),
					'center' => esc_html__( 'Center', 'pintsandcrafts' )
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'pintsandcrafts_edge_action_additional_header_menu_area_options_map', 'pintsandcrafts_edge_header_standard_map' );
}