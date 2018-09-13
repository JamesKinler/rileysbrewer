<?php

if ( ! function_exists('pintsandcrafts_edge_breadcrumbs_title_type_options_map') ) {
	function pintsandcrafts_edge_breadcrumbs_title_type_options_map($panel_typography) {
		
		pintsandcrafts_edge_add_admin_section_title(
			array(
				'name'   => 'type_section_breadcrumbs',
				'title'  => esc_html__( 'Breadcrumbs', 'pintsandcrafts' ),
				'parent' => $panel_typography
			)
		);
	
		$group_page_breadcrumbs_styles = pintsandcrafts_edge_add_admin_group(
			array(
				'name'        => 'group_page_breadcrumbs_styles',
				'title'       => esc_html__( 'Breadcrumbs', 'pintsandcrafts' ),
				'description' => esc_html__( 'Define styles for page breadcrumbs', 'pintsandcrafts' ),
				'parent'      => $panel_typography
			)
		);
	
			$row_page_breadcrumbs_styles_1 = pintsandcrafts_edge_add_admin_row(
				array(
					'name'   => 'row_page_breadcrumbs_styles_1',
					'parent' => $group_page_breadcrumbs_styles
				)
			);
		
				pintsandcrafts_edge_add_admin_field(
					array(
						'type'   => 'colorsimple',
						'name'   => 'page_breadcrumb_color',
						'label'  => esc_html__( 'Text Color', 'pintsandcrafts' ),
						'parent' => $row_page_breadcrumbs_styles_1
					)
				);
				
				pintsandcrafts_edge_add_admin_field(
					array(
						'type'          => 'textsimple',
						'name'          => 'page_breadcrumb_font_size',
						'default_value' => '',
						'label'         => esc_html__( 'Font Size', 'pintsandcrafts' ),
						'parent'        => $row_page_breadcrumbs_styles_1,
						'args'          => array(
							'suffix' => 'px'
						)
					)
				);
				
				pintsandcrafts_edge_add_admin_field(
					array(
						'type'          => 'textsimple',
						'name'          => 'page_breadcrumb_line_height',
						'default_value' => '',
						'label'         => esc_html__( 'Line Height', 'pintsandcrafts' ),
						'parent'        => $row_page_breadcrumbs_styles_1,
						'args'          => array(
							'suffix' => 'px'
						)
					)
				);
				
				pintsandcrafts_edge_add_admin_field(
					array(
						'type'          => 'selectblanksimple',
						'name'          => 'page_breadcrumb_text_transform',
						'default_value' => '',
						'label'         => esc_html__( 'Text Transform', 'pintsandcrafts' ),
						'options'       => pintsandcrafts_edge_get_text_transform_array(),
						'parent'        => $row_page_breadcrumbs_styles_1
					)
				);
	
			$row_page_breadcrumbs_styles_2 = pintsandcrafts_edge_add_admin_row(
				array(
					'name'   => 'row_page_breadcrumbs_styles_2',
					'parent' => $group_page_breadcrumbs_styles,
					'next'   => true
				)
			);
	
				pintsandcrafts_edge_add_admin_field(
					array(
						'type'          => 'fontsimple',
						'name'          => 'page_breadcrumb_google_fonts',
						'default_value' => '-1',
						'label'         => esc_html__( 'Font Family', 'pintsandcrafts' ),
						'parent'        => $row_page_breadcrumbs_styles_2
					)
				);
				
				pintsandcrafts_edge_add_admin_field(
					array(
						'type'          => 'selectblanksimple',
						'name'          => 'page_breadcrumb_font_style',
						'default_value' => '',
						'label'         => esc_html__( 'Font Style', 'pintsandcrafts' ),
						'options'       => pintsandcrafts_edge_get_font_style_array(),
						'parent'        => $row_page_breadcrumbs_styles_2
					)
				);
				
				pintsandcrafts_edge_add_admin_field(
					array(
						'type'          => 'selectblanksimple',
						'name'          => 'page_breadcrumb_font_weight',
						'default_value' => '',
						'label'         => esc_html__( 'Font Weight', 'pintsandcrafts' ),
						'options'       => pintsandcrafts_edge_get_font_weight_array(),
						'parent'        => $row_page_breadcrumbs_styles_2
					)
				);
				
				pintsandcrafts_edge_add_admin_field(
					array(
						'type'          => 'textsimple',
						'name'          => 'page_breadcrumb_letter_spacing',
						'default_value' => '',
						'label'         => esc_html__( 'Letter Spacing', 'pintsandcrafts' ),
						'parent'        => $row_page_breadcrumbs_styles_2,
						'args'          => array(
							'suffix' => 'px'
						)
					)
				);
	
			$row_page_breadcrumbs_styles_3 = pintsandcrafts_edge_add_admin_row(
				array(
					'name'   => 'row_page_breadcrumbs_styles_3',
					'parent' => $group_page_breadcrumbs_styles,
					'next'   => true
				)
			);
		
				pintsandcrafts_edge_add_admin_field(
					array(
						'type'   => 'colorsimple',
						'name'   => 'page_breadcrumb_hovercolor',
						'label'  => esc_html__( 'Hover/Active Text Color', 'pintsandcrafts' ),
						'parent' => $row_page_breadcrumbs_styles_3
					)
				);
    }

	add_action( 'pintsandcrafts_edge_action_additional_title_typography_options_map', 'pintsandcrafts_edge_breadcrumbs_title_type_options_map');
}