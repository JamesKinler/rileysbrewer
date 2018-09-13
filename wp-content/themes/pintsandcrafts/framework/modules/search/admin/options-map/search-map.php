<?php

if ( ! function_exists( 'pintsandcrafts_edge_get_search_types_options' ) ) {
    function pintsandcrafts_edge_get_search_types_options() {
        $search_type_options = apply_filters( 'pintsandcrafts_edge_filter_search_type_global_option', $search_type_options = array() );

        return $search_type_options;
    }
}

if ( ! function_exists( 'pintsandcrafts_edge_search_options_map' ) ) {
	function pintsandcrafts_edge_search_options_map() {
		
		pintsandcrafts_edge_add_admin_page(
			array(
				'slug'  => '_search_page',
				'title' => esc_html__( 'Search', 'pintsandcrafts' ),
				'icon'  => 'fa fa-search'
			)
		);
		
		$search_page_panel = pintsandcrafts_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Search Page', 'pintsandcrafts' ),
				'name'  => 'search_template',
				'page'  => '_search_page'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'search_page_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Layout', 'pintsandcrafts' ),
				'default_value' => 'in-grid',
				'description'   => esc_html__( 'Set layout. Default is in grid.', 'pintsandcrafts' ),
				'parent'        => $search_page_panel,
				'options'       => array(
					'in-grid'    => esc_html__( 'In Grid', 'pintsandcrafts' ),
					'full-width' => esc_html__( 'Full Width', 'pintsandcrafts' )
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'search_page_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'pintsandcrafts' ),
				'description'   => esc_html__( "Choose a sidebar layout for search page", 'pintsandcrafts' ),
				'default_value' => 'no-sidebar',
				'options'       => pintsandcrafts_edge_get_custom_sidebars_options(),
				'parent'        => $search_page_panel
			)
		);
		
		$pintsandcrafts_custom_sidebars = pintsandcrafts_edge_get_custom_sidebars();
		if ( count( $pintsandcrafts_custom_sidebars ) > 0 ) {
			pintsandcrafts_edge_add_admin_field(
				array(
					'name'        => 'search_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display', 'pintsandcrafts' ),
					'description' => esc_html__( 'Choose a sidebar to display on search page. Default sidebar is "Sidebar"', 'pintsandcrafts' ),
					'parent'      => $search_page_panel,
					'options'     => $pintsandcrafts_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		$search_panel = pintsandcrafts_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Search', 'pintsandcrafts' ),
				'name'  => 'search',
				'page'  => '_search_page'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'search_type',
				'default_value' => 'fullscreen',
				'label'         => esc_html__( 'Select Search Type', 'pintsandcrafts' ),
				'description'   => esc_html__( "Choose a type of Select search bar (Note: Slide From Header Bottom search type doesn't work with Vertical Header)", 'pintsandcrafts' ),
				'options'       => pintsandcrafts_edge_get_search_types_options()
			)
		);

		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'search_icon_source',
				'default_value' => 'icon_pack',
				'label'         => esc_html__( 'Select Search Icon Source', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Choose whether you would like to use icons from an icon pack or SVG icons', 'pintsandcrafts' ),
				'options'       => pintsandcrafts_edge_get_icon_sources_array()
			)
		);

		$search_icon_pack_container = pintsandcrafts_edge_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'search_icon_pack_container',
				'dependency' => array(
					'show' => array(
						'search_icon_source' => 'icon_pack'
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'        => $search_icon_pack_container,
				'type'          => 'select',
				'name'          => 'search_icon_pack',
				'default_value' => 'font_elegant',
				'label'         => esc_html__( 'Search Icon Pack', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Choose icon pack for search icon', 'pintsandcrafts' ),
				'options'       => pintsandcrafts_edge_icon_collections()->getIconCollectionsExclude( array( 'linea_icons', 'dripicons', 'simple_line_icons' ) )
			)
		);

		$search_svg_path_container = pintsandcrafts_edge_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'search_icon_svg_path_container',
				'dependency' => array(
					'show' => array(
						'search_icon_source' => 'svg_path'
					)
				)
			)
		);

		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'      => $search_svg_path_container,
				'type'        => 'textarea',
				'name'        => 'search_icon_svg_path',
				'label'       => esc_html__( 'Search Icon SVG Path', 'pintsandcrafts' ),
				'description' => esc_html__( 'Enter your search icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'pintsandcrafts' ),
			)
		);

		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'      => $search_svg_path_container,
				'type'        => 'textarea',
				'name'        => 'search_close_icon_svg_path',
				'label'       => esc_html__( 'Search Close Icon SVG Path', 'pintsandcrafts' ),
				'description' => esc_html__( 'Enter your search close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'pintsandcrafts' ),
			)
		);

        pintsandcrafts_edge_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'search_sidebar_columns',
                'parent'        => $search_panel,
                'default_value' => '3',
                'label'         => esc_html__( 'Search Sidebar Columns', 'pintsandcrafts' ),
                'description'   => esc_html__( 'Choose number of columns for FullScreen search sidebar area', 'pintsandcrafts' ),
                'options'       => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                )
            )
        );
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'yesno',
				'name'          => 'search_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Enable Grid Layout', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Set search area to be in grid. (Applied for Search covers header and Slide from Window Top types.', 'pintsandcrafts' ),
			)
		);
		
		pintsandcrafts_edge_add_admin_section_title(
			array(
				'parent' => $search_panel,
				'name'   => 'initial_header_icon_title',
				'title'  => esc_html__( 'Initial Search Icon in Header', 'pintsandcrafts' )
			)
		);

		$search_icon_pack_icon_styles_container = pintsandcrafts_edge_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'search_icon_pack_icon_styles_container',
				'dependency' => array(
					'show' => array(
						'search_icon_source' => 'icon_pack'
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'        => $search_icon_pack_icon_styles_container,
				'type'          => 'text',
				'name'          => 'header_search_icon_size',
				'default_value' => '',
				'label'         => esc_html__( 'Icon Size', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Set size for icon', 'pintsandcrafts' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$search_icon_color_group = pintsandcrafts_edge_add_admin_group(
			array(
				'parent'      => $search_panel,
				'title'       => esc_html__( 'Icon Colors', 'pintsandcrafts' ),
				'description' => esc_html__( 'Define color style for icon', 'pintsandcrafts' ),
				'name'        => 'search_icon_color_group'
			)
		);
		
		$search_icon_color_row = pintsandcrafts_edge_add_admin_row(
			array(
				'parent' => $search_icon_color_group,
				'name'   => 'search_icon_color_row'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_search_icon_color',
				'label'  => esc_html__( 'Color', 'pintsandcrafts' )
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_search_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'pintsandcrafts' )
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'yesno',
				'name'          => 'enable_search_icon_text',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Search Icon Text', 'pintsandcrafts' ),
				'description'   => esc_html__( "Enable this option to show 'Search' text next to search icon in header", 'pintsandcrafts' )
			)
		);
		
		$enable_search_icon_text_container = pintsandcrafts_edge_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'enable_search_icon_text_container',
				'dependency' => array(
					'show' => array(
						'enable_search_icon_text' => 'yes'
					)
				)
			)
		);
		
		$enable_search_icon_text_group = pintsandcrafts_edge_add_admin_group(
			array(
				'parent'      => $enable_search_icon_text_container,
				'title'       => esc_html__( 'Search Icon Text', 'pintsandcrafts' ),
				'name'        => 'enable_search_icon_text_group',
				'description' => esc_html__( 'Define style for search icon text', 'pintsandcrafts' )
			)
		);
		
		$enable_search_icon_text_row = pintsandcrafts_edge_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent' => $enable_search_icon_text_row,
				'type'   => 'colorsimple',
				'name'   => 'search_icon_text_color',
				'label'  => esc_html__( 'Text Color', 'pintsandcrafts' )
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent' => $enable_search_icon_text_row,
				'type'   => 'colorsimple',
				'name'   => 'search_icon_text_color_hover',
				'label'  => esc_html__( 'Text Hover Color', 'pintsandcrafts' )
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_font_size',
				'label'         => esc_html__( 'Font Size', 'pintsandcrafts' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_line_height',
				'label'         => esc_html__( 'Line Height', 'pintsandcrafts' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$enable_search_icon_text_row2 = pintsandcrafts_edge_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row2',
				'next'   => true
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_text_transform',
				'label'         => esc_html__( 'Text Transform', 'pintsandcrafts' ),
				'default_value' => '',
				'options'       => pintsandcrafts_edge_get_text_transform_array()
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'fontsimple',
				'name'          => 'search_icon_text_google_fonts',
				'label'         => esc_html__( 'Font Family', 'pintsandcrafts' ),
				'default_value' => '-1',
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_font_style',
				'label'         => esc_html__( 'Font Style', 'pintsandcrafts' ),
				'default_value' => '',
				'options'       => pintsandcrafts_edge_get_font_style_array(),
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_font_weight',
				'label'         => esc_html__( 'Font Weight', 'pintsandcrafts' ),
				'default_value' => '',
				'options'       => pintsandcrafts_edge_get_font_weight_array(),
			)
		);
		
		$enable_search_icon_text_row3 = pintsandcrafts_edge_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row3',
				'next'   => true
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row3,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'pintsandcrafts' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
	}
	
	add_action( 'pintsandcrafts_edge_action_options_map', 'pintsandcrafts_edge_search_options_map', 16 );
}