<?php

if ( ! function_exists( 'pintsandcrafts_core_map_portfolio_settings_meta' ) ) {
	function pintsandcrafts_core_map_portfolio_settings_meta() {
		$meta_box = pintsandcrafts_edge_add_meta_box( array(
			'scope' => 'portfolio-item',
			'title' => esc_html__( 'Portfolio Settings', 'pintsandcrafts-core' ),
			'name'  => 'portfolio_settings_meta_box'
		) );
		
		pintsandcrafts_edge_add_meta_box_field( array(
			'name'        => 'edgtf_portfolio_single_template_meta',
			'type'        => 'select',
			'label'       => esc_html__( 'Portfolio Type', 'pintsandcrafts-core' ),
			'description' => esc_html__( 'Choose a default type for Single Project pages', 'pintsandcrafts-core' ),
			'parent'      => $meta_box,
			'options'     => array(
				''                  => esc_html__( 'Default', 'pintsandcrafts-core' ),
				'images'            => esc_html__( 'Portfolio Images', 'pintsandcrafts-core' ),
				'small-images'      => esc_html__( 'Portfolio Small Images', 'pintsandcrafts-core' ),
				'slider'            => esc_html__( 'Portfolio Slider', 'pintsandcrafts-core' ),
				'small-slider'      => esc_html__( 'Portfolio Small Slider', 'pintsandcrafts-core' ),
				'gallery'           => esc_html__( 'Portfolio Gallery', 'pintsandcrafts-core' ),
				'small-gallery'     => esc_html__( 'Portfolio Small Gallery', 'pintsandcrafts-core' ),
				'masonry'           => esc_html__( 'Portfolio Masonry', 'pintsandcrafts-core' ),
				'small-masonry'     => esc_html__( 'Portfolio Small Masonry', 'pintsandcrafts-core' ),
				'custom'            => esc_html__( 'Portfolio Custom', 'pintsandcrafts-core' ),
				'full-width-custom' => esc_html__( 'Portfolio Full Width Custom', 'pintsandcrafts-core' )
			)
		) );
		
		/***************** Gallery Layout *****************/
		
		$gallery_type_meta_container = pintsandcrafts_edge_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'edgtf_gallery_type_meta_container',
				'dependency' => array(
					'show' => array(
						'edgtf_portfolio_single_template_meta'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_portfolio_single_gallery_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'pintsandcrafts-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'pintsandcrafts-core' ),
				'parent'        => $gallery_type_meta_container,
				'options'       => array(
					''      => esc_html__( 'Default', 'pintsandcrafts-core' ),
					'two'   => esc_html__( '2 Columns', 'pintsandcrafts-core' ),
					'three' => esc_html__( '3 Columns', 'pintsandcrafts-core' ),
					'four'  => esc_html__( '4 Columns', 'pintsandcrafts-core' )
				)
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_portfolio_single_gallery_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'pintsandcrafts-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'pintsandcrafts-core' ),
				'default_value' => '',
				'options'       => pintsandcrafts_edge_get_space_between_items_array( true ),
				'parent'        => $gallery_type_meta_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$masonry_type_meta_container = pintsandcrafts_edge_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'edgtf_masonry_type_meta_container',
				'dependency' => array(
					'show' => array(
						'edgtf_portfolio_single_template_meta'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_portfolio_single_masonry_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'pintsandcrafts-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'pintsandcrafts-core' ),
				'parent'        => $masonry_type_meta_container,
				'options'       => array(
					''      => esc_html__( 'Default', 'pintsandcrafts-core' ),
					'two'   => esc_html__( '2 Columns', 'pintsandcrafts-core' ),
					'three' => esc_html__( '3 Columns', 'pintsandcrafts-core' ),
					'four'  => esc_html__( '4 Columns', 'pintsandcrafts-core' )
				)
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_portfolio_single_masonry_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'pintsandcrafts-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'pintsandcrafts-core' ),
				'default_value' => '',
				'options'       => pintsandcrafts_edge_get_space_between_items_array( true ),
				'parent'        => $masonry_type_meta_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_show_title_area_portfolio_single_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'pintsandcrafts-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single portfolio page', 'pintsandcrafts-core' ),
				'parent'        => $meta_box,
				'options'       => pintsandcrafts_edge_get_yes_no_select_array()
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'portfolio_info_top_padding',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Info Top Padding', 'pintsandcrafts-core' ),
				'description' => esc_html__( 'Set top padding for portfolio info elements holder. This option works only for Portfolio Images, Slider, Gallery and Masonry portfolio types', 'pintsandcrafts-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'portfolio_external_link',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio External Link', 'pintsandcrafts-core' ),
				'description' => esc_html__( 'Enter URL to link from Portfolio List page', 'pintsandcrafts-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_portfolio_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Featured Image', 'pintsandcrafts-core' ),
				'description' => esc_html__( 'Choose an image for Portfolio Lists shortcode where Hover Type option is Switch Featured Images', 'pintsandcrafts-core' ),
				'parent'      => $meta_box
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_portfolio_masonry_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Fixed Proportion', 'pintsandcrafts-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is fixed', 'pintsandcrafts-core' ),
				'default_value' => 'default',
				'parent'        => $meta_box,
				'options'       => array(
					'default'            => esc_html__( 'Default', 'pintsandcrafts-core' ),
					'large-width'        => esc_html__( 'Large Width', 'pintsandcrafts-core' ),
					'large-height'       => esc_html__( 'Large Height', 'pintsandcrafts-core' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'pintsandcrafts-core' )
				)
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_portfolio_masonry_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Original Proportion', 'pintsandcrafts-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is original', 'pintsandcrafts-core' ),
				'default_value' => 'default',
				'parent'        => $meta_box,
				'options'       => array(
					'default'     => esc_html__( 'Default', 'pintsandcrafts-core' ),
					'large-width' => esc_html__( 'Large Width', 'pintsandcrafts-core' )
				)
			)
		);
		
		$all_pages = array();
		$pages     = get_pages();
		foreach ( $pages as $page ) {
			$all_pages[ $page->ID ] = $page->post_title;
		}
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'portfolio_single_back_to_link',
				'type'        => 'select',
				'label'       => esc_html__( '"Back To" Link', 'pintsandcrafts-core' ),
				'description' => esc_html__( 'Choose "Back To" page to link from portfolio Single Project page', 'pintsandcrafts-core' ),
				'parent'      => $meta_box,
				'options'     => $all_pages,
				'args'        => array(
					'select2' => true
				)
			)
		);
	}
	
	add_action( 'pintsandcrafts_edge_action_meta_boxes_map', 'pintsandcrafts_core_map_portfolio_settings_meta', 41 );
}