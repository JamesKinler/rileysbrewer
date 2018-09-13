<?php

if ( ! function_exists( 'pintsandcrafts_edge_get_hide_dep_for_header_menu_area_meta_boxes' ) ) {
	function pintsandcrafts_edge_get_hide_dep_for_header_menu_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'pintsandcrafts_edge_filter_header_menu_area_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'pintsandcrafts_edge_get_hide_dep_for_header_menu_area_widgets_meta_boxes' ) ) {
	function pintsandcrafts_edge_get_hide_dep_for_header_menu_area_widgets_meta_boxes() {
		$hide_dep_options = apply_filters( 'pintsandcrafts_edge_filter_header_menu_area_widgets_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'pintsandcrafts_edge_header_menu_area_meta_options_map' ) ) {
	function pintsandcrafts_edge_header_menu_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = pintsandcrafts_edge_get_hide_dep_for_header_menu_area_meta_boxes();
		$hide_dep_widgets = pintsandcrafts_edge_get_hide_dep_for_header_menu_area_widgets_meta_boxes();
		
		$menu_area_container = pintsandcrafts_edge_add_admin_container_no_style(
			array(
				'type'       => 'container',
				'name'       => 'menu_area_container',
				'parent'     => $header_meta_box,
				'dependency' => array(
					'hide' => array(
						'edgtf_header_type_meta' => $hide_dep_options
					)
				),
				'args'       => array(
					'enable_panels_for_default_value' => true
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_section_title(
			array(
				'parent' => $menu_area_container,
				'name'   => 'menu_area_style',
				'title'  => esc_html__( 'Menu Area Style', 'pintsandcrafts' )
			)
		);

		pintsandcrafts_edge_add_meta_box_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'text',
				'name'          => 'edgtf_menu_area_height_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Height', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enter header height', 'pintsandcrafts' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);

		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_disable_header_widget_menu_area_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Header Menu Area Widget', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enabling this option will hide widget area from the menu area', 'pintsandcrafts' ),
				'parent'        => $menu_area_container,
				'dependency' => array(
					'hide' => array(
						'edgtf_header_type_meta' => $hide_dep_widgets
					)
				)
			)
		);
		
		$pintsandcrafts_custom_sidebars = pintsandcrafts_edge_get_custom_sidebars();
		if ( count( $pintsandcrafts_custom_sidebars ) > 0 ) {
			pintsandcrafts_edge_add_meta_box_field(
				array(
					'name'        => 'edgtf_custom_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Menu Area', 'pintsandcrafts' ),
					'description' => esc_html__( 'Choose custom widget area to display in header menu area"', 'pintsandcrafts' ),
					'parent'      => $menu_area_container,
					'options'     => $pintsandcrafts_custom_sidebars,
					'dependency' => array(
						'hide' => array(
							'edgtf_header_type_meta' => $hide_dep_widgets
						)
					)
				)
			);
		}
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_menu_area_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area In Grid', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'pintsandcrafts' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => pintsandcrafts_edge_get_yes_no_select_array()
			)
		);
		
		$menu_area_in_grid_container = pintsandcrafts_edge_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_container',
				'parent'          => $menu_area_container,
				'dependency' => array(
					'show' => array(
						'edgtf_menu_area_in_grid_meta'  => 'yes'
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_menu_area_grid_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'pintsandcrafts' ),
				'description' => esc_html__( 'Set grid background color for menu area', 'pintsandcrafts' ),
				'parent'      => $menu_area_in_grid_container
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_menu_area_grid_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'pintsandcrafts' ),
				'description' => esc_html__( 'Set grid background transparency for menu area (0 = fully transparent, 1 = opaque)', 'pintsandcrafts' ),
				'parent'      => $menu_area_in_grid_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_menu_area_in_grid_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Shadow', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Set shadow on grid menu area', 'pintsandcrafts' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => pintsandcrafts_edge_get_yes_no_select_array()
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_menu_area_in_grid_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Border', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Set border on grid menu area', 'pintsandcrafts' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => pintsandcrafts_edge_get_yes_no_select_array()
			)
		);
		
		$menu_area_in_grid_border_container = pintsandcrafts_edge_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_border_container',
				'parent'          => $menu_area_in_grid_container,
				'dependency' => array(
					'show' => array(
						'edgtf_menu_area_in_grid_border_meta'  => 'yes'
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_menu_area_in_grid_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'pintsandcrafts' ),
				'description' => esc_html__( 'Set border color for grid area', 'pintsandcrafts' ),
				'parent'      => $menu_area_in_grid_border_container
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_menu_area_background_image_meta',
				'type'          => 'image',
				'label'         => esc_html__( 'Background Image', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Choose a background image for menu area', 'pintsandcrafts' ),
				'parent'        => $menu_area_container
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_menu_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'pintsandcrafts' ),
				'description' => esc_html__( 'Choose a background color for menu area', 'pintsandcrafts' ),
				'parent'      => $menu_area_container
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_menu_area_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Transparency', 'pintsandcrafts' ),
				'description' => esc_html__( 'Choose a transparency for the menu area background color (0 = fully transparent, 1 = opaque)', 'pintsandcrafts' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_menu_area_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Shadow', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Set shadow on menu area', 'pintsandcrafts' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => pintsandcrafts_edge_get_yes_no_select_array()
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_menu_area_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Border', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Set border on menu area', 'pintsandcrafts' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => pintsandcrafts_edge_get_yes_no_select_array()
			)
		);
		
		$menu_area_border_bottom_color_container = pintsandcrafts_edge_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_border_bottom_color_container',
				'parent'          => $menu_area_container,
				'dependency' => array(
					'show' => array(
						'edgtf_menu_area_border_meta'  => 'yes'
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_menu_area_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'pintsandcrafts' ),
				'description' => esc_html__( 'Choose color of header bottom border', 'pintsandcrafts' ),
				'parent'      => $menu_area_border_bottom_color_container
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'type'        => 'text',
				'name'        => 'edgtf_menu_area_side_padding_meta',
				'label'       => esc_html__( 'Menu Area Side Padding', 'pintsandcrafts' ),
				'description' => esc_html__( 'Enter value in px or percentage to define menu area side padding', 'pintsandcrafts' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => esc_html__( 'px or %', 'pintsandcrafts' )
				)
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'text',
				'name'          => 'edgtf_dropdown_top_position_meta',
				'label'         => esc_html__( 'Dropdown Position', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enter value in percentage of entire header height', 'pintsandcrafts' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => '%'
				)
			)
		);
		
		do_action( 'pintsandcrafts_edge_header_menu_area_additional_meta_boxes_map', $menu_area_container );
	}
	
	add_action( 'pintsandcrafts_edge_action_header_menu_area_meta_boxes_map', 'pintsandcrafts_edge_header_menu_area_meta_options_map', 10, 1 );
}