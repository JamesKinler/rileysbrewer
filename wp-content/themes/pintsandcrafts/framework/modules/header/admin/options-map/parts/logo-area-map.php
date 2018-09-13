<?php

if ( ! function_exists( 'pintsandcrafts_edge_get_hide_dep_for_header_logo_area_options' ) ) {
	function pintsandcrafts_edge_get_hide_dep_for_header_logo_area_options() {
		$hide_dep_options = apply_filters( 'pintsandcrafts_edge_filter_header_logo_area_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'pintsandcrafts_edge_header_logo_area_options_map' ) ) {
	function pintsandcrafts_edge_header_logo_area_options_map( $panel_header ) {
		$hide_dep_options = pintsandcrafts_edge_get_hide_dep_for_header_logo_area_options();
		
		$logo_area_container = pintsandcrafts_edge_add_admin_container_no_style(
			array(
				'parent'          => $panel_header,
				'name'            => 'logo_area_container',
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_section_title(
			array(
				'parent' => $logo_area_container,
				'name'   => 'logo_menu_area_title',
				'title'  => esc_html__( 'Logo Area', 'pintsandcrafts' )
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'yesno',
				'name'          => 'logo_area_in_grid',
				'default_value' => 'no',
				'label'         => esc_html__( 'Logo Area In Grid', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'pintsandcrafts' )
			)
		);
		
		$logo_area_in_grid_container = pintsandcrafts_edge_add_admin_container(
			array(
				'parent'     => $logo_area_container,
				'dependency' => array(
					'hide' => array(
						'logo_area_in_grid' => 'no'
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_container,
				'type'          => 'color',
				'name'          => 'logo_area_grid_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Color', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Set grid background color for logo area', 'pintsandcrafts' ),
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_container,
				'type'          => 'text',
				'name'          => 'logo_area_grid_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Transparency', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Set grid background transparency', 'pintsandcrafts' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_container,
				'type'          => 'yesno',
				'name'          => 'logo_area_in_grid_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Grid Area Border', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Set border on grid area', 'pintsandcrafts' )
			)
		);
		
		$logo_area_in_grid_border_container = pintsandcrafts_edge_add_admin_container(
			array(
				'parent'          => $logo_area_in_grid_container,
				'name'            => 'logo_area_in_grid_border_container',
				'dependency' => array(
					'hide' => array(
						'logo_area_in_grid_border'  => 'no'
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'      => $logo_area_in_grid_border_container,
				'type'        => 'color',
				'name'        => 'logo_area_in_grid_border_color',
				'label'       => esc_html__( 'Border Color', 'pintsandcrafts' ),
				'description' => esc_html__( 'Set border color for grid area', 'pintsandcrafts' ),
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'      => $logo_area_container,
				'type'        => 'color',
				'name'        => 'logo_area_background_color',
				'label'       => esc_html__( 'Background Color', 'pintsandcrafts' ),
				'description' => esc_html__( 'Set background color for logo area', 'pintsandcrafts' )
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'text',
				'name'          => 'logo_area_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Background Transparency', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Set background transparency for logo area', 'pintsandcrafts' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'yesno',
				'name'          => 'logo_area_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Logo Area Border', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Set border on logo area', 'pintsandcrafts' )
			)
		);
		
		$logo_area_border_container = pintsandcrafts_edge_add_admin_container(
			array(
				'parent'          => $logo_area_container,
				'name'            => 'logo_area_border_container',
				'dependency' => array(
					'hide' => array(
						'logo_area_border'  => 'no'
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'type'          => 'color',
				'name'          => 'logo_area_border_color',
				'label'         => esc_html__( 'Border Color', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Set border color for logo area', 'pintsandcrafts' ),
				'parent'        => $logo_area_border_container
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'logo_area_height',
				'label'         => esc_html__( 'Height', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enter logo area height (default is 90px)', 'pintsandcrafts' ),
				'parent'        => $logo_area_container,
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		do_action( 'pintsandcrafts_edge_header_logo_area_additional_options', $logo_area_container );
	}
	
	add_action( 'pintsandcrafts_edge_action_header_logo_area_options_map', 'pintsandcrafts_edge_header_logo_area_options_map', 10, 1 );
}