<?php

if ( ! function_exists( 'pintsandcrafts_edge_get_title_types_meta_boxes' ) ) {
	function pintsandcrafts_edge_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'pintsandcrafts_edge_filter_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'pintsandcrafts' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'pintsandcrafts_edge_map_title_meta' ) ) {
	function pintsandcrafts_edge_map_title_meta() {
		$title_type_meta_boxes = pintsandcrafts_edge_get_title_types_meta_boxes();
		
		$title_meta_box = pintsandcrafts_edge_add_meta_box(
			array(
				'scope' => apply_filters( 'pintsandcrafts_edge_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'pintsandcrafts' ),
				'name'  => 'title_meta'
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'pintsandcrafts' ),
				'parent'        => $title_meta_box,
				'options'       => pintsandcrafts_edge_get_yes_no_select_array()
			)
		);
		
			$show_title_area_meta_container = pintsandcrafts_edge_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'edgtf_show_title_area_meta_container',
					'dependency' => array(
						'hide' => array(
							'edgtf_show_title_area_meta' => 'no'
						)
					)
				)
			);
		
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'pintsandcrafts' ),
						'description'   => esc_html__( 'Choose title type', 'pintsandcrafts' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'pintsandcrafts' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'pintsandcrafts' ),
						'options'       => pintsandcrafts_edge_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'pintsandcrafts' ),
						'description' => esc_html__( 'Set a height for Title Area', 'pintsandcrafts' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'pintsandcrafts' ),
						'description' => esc_html__( 'Choose a background color for title area', 'pintsandcrafts' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'pintsandcrafts' ),
						'description' => esc_html__( 'Choose an Image for title area', 'pintsandcrafts' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'pintsandcrafts' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'pintsandcrafts' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'pintsandcrafts' ),
							'hide'                => esc_html__( 'Hide Image', 'pintsandcrafts' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'pintsandcrafts' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'pintsandcrafts' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'pintsandcrafts' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'pintsandcrafts' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'pintsandcrafts' )
						)
					)
				);
				
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'pintsandcrafts' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'pintsandcrafts' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'pintsandcrafts' ),
							'header-bottom' => esc_html__( 'From Bottom of Header', 'pintsandcrafts' ),
							'window-top'    => esc_html__( 'From Window Top', 'pintsandcrafts' )
						)
					)
				);
				
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'pintsandcrafts' ),
						'options'       => pintsandcrafts_edge_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'pintsandcrafts' ),
						'description' => esc_html__( 'Choose a color for title text', 'pintsandcrafts' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_enable_separator_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Enable Title Separator', 'pintsandcrafts' ),
						'options'       => pintsandcrafts_edge_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'pintsandcrafts' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'pintsandcrafts' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'pintsandcrafts' ),
						'options'       => pintsandcrafts_edge_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'pintsandcrafts' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'pintsandcrafts' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'pintsandcrafts_edge_action_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'pintsandcrafts_edge_action_meta_boxes_map', 'pintsandcrafts_edge_map_title_meta', 60 );
}