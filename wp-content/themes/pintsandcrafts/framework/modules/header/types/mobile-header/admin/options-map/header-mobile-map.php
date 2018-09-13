<?php

if ( ! function_exists( 'pintsandcrafts_edge_mobile_header_options_map' ) ) {
	function pintsandcrafts_edge_mobile_header_options_map() {
		
		pintsandcrafts_edge_add_admin_page(
			array(
				'slug'  => '_mobile_header',
				'title' => esc_html__( 'Mobile Header', 'pintsandcrafts' ),
				'icon'  => 'fa fa-mobile'
			)
		);
		
		$panel_mobile_header = pintsandcrafts_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Mobile Header', 'pintsandcrafts' ),
				'name'  => 'panel_mobile_header',
				'page'  => '_mobile_header'
			)
		);
		
		$mobile_header_group = pintsandcrafts_edge_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_header_group',
				'title'  => esc_html__( 'Mobile Header Styles', 'pintsandcrafts' )
			)
		);
		
		$mobile_header_row1 = pintsandcrafts_edge_add_admin_row(
			array(
				'parent' => $mobile_header_group,
				'name'   => 'mobile_header_row1'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'   => 'mobile_header_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Height', 'pintsandcrafts' ),
				'parent' => $mobile_header_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'   => 'mobile_header_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Background Color', 'pintsandcrafts' ),
				'parent' => $mobile_header_row1
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'   => 'mobile_header_border_bottom_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Border Bottom Color', 'pintsandcrafts' ),
				'parent' => $mobile_header_row1
			)
		);
		
		$mobile_menu_group = pintsandcrafts_edge_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_menu_group',
				'title'  => esc_html__( 'Mobile Menu Styles', 'pintsandcrafts' )
			)
		);
		
		$mobile_menu_row1 = pintsandcrafts_edge_add_admin_row(
			array(
				'parent' => $mobile_menu_group,
				'name'   => 'mobile_menu_row1'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'   => 'mobile_menu_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Background Color', 'pintsandcrafts' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'   => 'mobile_menu_border_bottom_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Border Bottom Color', 'pintsandcrafts' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'   => 'mobile_menu_separator_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Menu Item Separator Color', 'pintsandcrafts' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'        => 'mobile_logo_height',
				'type'        => 'text',
				'label'       => esc_html__( 'Logo Height For Mobile Header', 'pintsandcrafts' ),
				'description' => esc_html__( 'Define logo height for screen size smaller than 1024px', 'pintsandcrafts' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'        => 'mobile_logo_height_phones',
				'type'        => 'text',
				'label'       => esc_html__( 'Logo Height For Mobile Devices', 'pintsandcrafts' ),
				'description' => esc_html__( 'Define logo height for screen size smaller than 480px', 'pintsandcrafts' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_section_title(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_header_fonts_title',
				'title'  => esc_html__( 'Typography', 'pintsandcrafts' )
			)
		);
		
		$first_level_group = pintsandcrafts_edge_add_admin_group(
			array(
				'parent'      => $panel_mobile_header,
				'name'        => 'first_level_group',
				'title'       => esc_html__( '1st Level Menu', 'pintsandcrafts' ),
				'description' => esc_html__( 'Define styles for 1st level in Mobile Menu Navigation', 'pintsandcrafts' )
			)
		);
		
		$first_level_row1 = pintsandcrafts_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row1'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'   => 'mobile_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Text Color', 'pintsandcrafts' ),
				'parent' => $first_level_row1
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'   => 'mobile_text_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Hover/Active Text Color', 'pintsandcrafts' ),
				'parent' => $first_level_row1
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'   => 'mobile_text_google_fonts',
				'type'   => 'fontsimple',
				'label'  => esc_html__( 'Font Family', 'pintsandcrafts' ),
				'parent' => $first_level_row1
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'   => 'mobile_text_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Font Size', 'pintsandcrafts' ),
				'parent' => $first_level_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$first_level_row2 = pintsandcrafts_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row2'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'   => 'mobile_text_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Line Height', 'pintsandcrafts' ),
				'parent' => $first_level_row2,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'    => 'mobile_text_text_transform',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Text Transform', 'pintsandcrafts' ),
				'parent'  => $first_level_row2,
				'options' => pintsandcrafts_edge_get_text_transform_array()
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'    => 'mobile_text_font_style',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Style', 'pintsandcrafts' ),
				'parent'  => $first_level_row2,
				'options' => pintsandcrafts_edge_get_font_style_array()
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'    => 'mobile_text_font_weight',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Weight', 'pintsandcrafts' ),
				'parent'  => $first_level_row2,
				'options' => pintsandcrafts_edge_get_font_weight_array()
			)
		);
		
		$first_level_row3 = pintsandcrafts_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row3'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'mobile_text_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'pintsandcrafts' ),
				'default_value' => '',
				'parent'        => $first_level_row3,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$second_level_group = pintsandcrafts_edge_add_admin_group(
			array(
				'parent'      => $panel_mobile_header,
				'name'        => 'second_level_group',
				'title'       => esc_html__( 'Dropdown Menu', 'pintsandcrafts' ),
				'description' => esc_html__( 'Define styles for drop down menu items in Mobile Menu Navigation', 'pintsandcrafts' )
			)
		);
		
		$second_level_row1 = pintsandcrafts_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row1'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Text Color', 'pintsandcrafts' ),
				'parent' => $second_level_row1
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Hover/Active Text Color', 'pintsandcrafts' ),
				'parent' => $second_level_row1
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_google_fonts',
				'type'   => 'fontsimple',
				'label'  => esc_html__( 'Font Family', 'pintsandcrafts' ),
				'parent' => $second_level_row1
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Font Size', 'pintsandcrafts' ),
				'parent' => $second_level_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$second_level_row2 = pintsandcrafts_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row2'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Line Height', 'pintsandcrafts' ),
				'parent' => $second_level_row2,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_text_transform',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Text Transform', 'pintsandcrafts' ),
				'parent'  => $second_level_row2,
				'options' => pintsandcrafts_edge_get_text_transform_array()
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_font_style',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Style', 'pintsandcrafts' ),
				'parent'  => $second_level_row2,
				'options' => pintsandcrafts_edge_get_font_style_array()
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_font_weight',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Weight', 'pintsandcrafts' ),
				'parent'  => $second_level_row2,
				'options' => pintsandcrafts_edge_get_font_weight_array()
			)
		);
		
		$second_level_row3 = pintsandcrafts_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row3'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'mobile_dropdown_text_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'pintsandcrafts' ),
				'default_value' => '',
				'parent'        => $second_level_row3,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_section_title(
			array(
				'name'   => 'mobile_opener_panel',
				'parent' => $panel_mobile_header,
				'title'  => esc_html__( 'Mobile Menu Opener', 'pintsandcrafts' )
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'        => 'mobile_menu_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Mobile Navigation Title', 'pintsandcrafts' ),
				'description' => esc_html__( 'Enter title for mobile menu navigation', 'pintsandcrafts' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'   => 'mobile_icon_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Mobile Navigation Icon Color', 'pintsandcrafts' ),
				'parent' => $panel_mobile_header
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'   => 'mobile_icon_hover_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Mobile Navigation Icon Hover Color', 'pintsandcrafts' ),
				'parent' => $panel_mobile_header
			)
		);
	}
	
	add_action( 'pintsandcrafts_edge_action_options_map', 'pintsandcrafts_edge_mobile_header_options_map', 5 );
}