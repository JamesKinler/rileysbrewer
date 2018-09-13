<?php

if ( ! function_exists( 'pintsandcrafts_edge_portfolio_options_map' ) ) {
	function pintsandcrafts_edge_portfolio_options_map() {
		
		pintsandcrafts_edge_add_admin_page(
			array(
				'slug'  => '_portfolio',
				'title' => esc_html__( 'Portfolio', 'pintsandcrafts-core' ),
				'icon'  => 'fa fa-camera-retro'
			)
		);
		
		$panel_archive = pintsandcrafts_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Archive', 'pintsandcrafts-core' ),
				'name'  => 'panel_portfolio_archive',
				'page'  => '_portfolio'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'        => 'portfolio_archive_number_of_items',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Items', 'pintsandcrafts-core' ),
				'description' => esc_html__( 'Set number of items for your portfolio list on archive pages. Default value is 12', 'pintsandcrafts-core' ),
				'parent'      => $panel_archive,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'portfolio_archive_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'pintsandcrafts-core' ),
				'default_value' => '4',
				'description'   => esc_html__( 'Set number of columns for your portfolio list on archive pages. Default value is 4 columns', 'pintsandcrafts-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'2' => esc_html__( '2 Columns', 'pintsandcrafts-core' ),
					'3' => esc_html__( '3 Columns', 'pintsandcrafts-core' ),
					'4' => esc_html__( '4 Columns', 'pintsandcrafts-core' ),
					'5' => esc_html__( '5 Columns', 'pintsandcrafts-core' )
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'portfolio_archive_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'pintsandcrafts-core' ),
				'description'   => esc_html__( 'Set space size between portfolio items for your portfolio list on archive pages. Default value is normal', 'pintsandcrafts-core' ),
				'default_value' => 'normal',
				'options'       => pintsandcrafts_edge_get_space_between_items_array(),
				'parent'        => $panel_archive
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'portfolio_archive_image_size',
				'type'          => 'select',
				'label'         => esc_html__( 'Image Proportions', 'pintsandcrafts-core' ),
				'default_value' => 'landscape',
				'description'   => esc_html__( 'Set image proportions for your portfolio list on archive pages. Default value is landscape', 'pintsandcrafts-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'full'      => esc_html__( 'Original', 'pintsandcrafts-core' ),
					'landscape' => esc_html__( 'Landscape', 'pintsandcrafts-core' ),
					'portrait'  => esc_html__( 'Portrait', 'pintsandcrafts-core' ),
					'square'    => esc_html__( 'Square', 'pintsandcrafts-core' )
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'portfolio_archive_item_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Item Style', 'pintsandcrafts-core' ),
				'default_value' => 'standard-shader',
				'description'   => esc_html__( 'Set item style for your portfolio list on archive pages. Default value is Standard - Shader', 'pintsandcrafts-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'standard-shader' => esc_html__( 'Standard - Shader', 'pintsandcrafts-core' ),
					'gallery-overlay' => esc_html__( 'Gallery - Overlay', 'pintsandcrafts-core' )
				)
			)
		);
		
		$panel = pintsandcrafts_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Single', 'pintsandcrafts-core' ),
				'name'  => 'panel_portfolio_single',
				'page'  => '_portfolio'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_template',
				'type'          => 'select',
				'label'         => esc_html__( 'Portfolio Type', 'pintsandcrafts-core' ),
				'default_value' => 'small-images',
				'description'   => esc_html__( 'Choose a default type for Single Project pages', 'pintsandcrafts-core' ),
				'parent'        => $panel,
				'options'       => array(
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
			)
		);
		
		/***************** Gallery Layout *****************/
		
		$portfolio_gallery_container = pintsandcrafts_edge_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_gallery_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'pintsandcrafts-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'pintsandcrafts-core' ),
				'parent'        => $portfolio_gallery_container,
				'options'       => array(
					'two'   => esc_html__( '2 Columns', 'pintsandcrafts-core' ),
					'three' => esc_html__( '3 Columns', 'pintsandcrafts-core' ),
					'four'  => esc_html__( '4 Columns', 'pintsandcrafts-core' )
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'pintsandcrafts-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'pintsandcrafts-core' ),
				'default_value' => 'normal',
				'options'       => pintsandcrafts_edge_get_space_between_items_array(),
				'parent'        => $portfolio_gallery_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$portfolio_masonry_container = pintsandcrafts_edge_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_masonry_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'pintsandcrafts-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'pintsandcrafts-core' ),
				'parent'        => $portfolio_masonry_container,
				'options'       => array(
					'two'   => esc_html__( '2 Columns', 'pintsandcrafts-core' ),
					'three' => esc_html__( '3 Columns', 'pintsandcrafts-core' ),
					'four'  => esc_html__( '4 Columns', 'pintsandcrafts-core' )
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'pintsandcrafts-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'pintsandcrafts-core' ),
				'default_value' => 'normal',
				'options'       => pintsandcrafts_edge_get_space_between_items_array(),
				'parent'        => $portfolio_masonry_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_portfolio_single',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'pintsandcrafts-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single projects', 'pintsandcrafts-core' ),
				'parent'        => $panel,
				'options'       => array(
					''    => esc_html__( 'Default', 'pintsandcrafts-core' ),
					'yes' => esc_html__( 'Yes', 'pintsandcrafts-core' ),
					'no'  => esc_html__( 'No', 'pintsandcrafts-core' )
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_images',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Images', 'pintsandcrafts-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for projects with images', 'pintsandcrafts-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_videos',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Videos', 'pintsandcrafts-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects', 'pintsandcrafts-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_enable_categories',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Categories', 'pintsandcrafts-core' ),
				'description'   => esc_html__( 'Enabling this option will enable category meta description on single projects', 'pintsandcrafts-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_date',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Date', 'pintsandcrafts-core' ),
				'description'   => esc_html__( 'Enabling this option will enable date meta on single projects', 'pintsandcrafts-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_sticky_sidebar',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Sticky Side Text', 'pintsandcrafts-core' ),
				'description'   => esc_html__( 'Enabling this option will make side text sticky on Single Project pages. This option works only for Full Width Images, Small Images, Small Gallery and Small Masonry portfolio types', 'pintsandcrafts-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments', 'pintsandcrafts-core' ),
				'description'   => esc_html__( 'Enabling this option will show comments on your page', 'pintsandcrafts-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_pagination',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Hide Pagination', 'pintsandcrafts-core' ),
				'description'   => esc_html__( 'Enabling this option will turn off portfolio pagination functionality', 'pintsandcrafts-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		$container_navigate_category = pintsandcrafts_edge_add_admin_container(
			array(
				'name'            => 'navigate_same_category_container',
				'parent'          => $panel,
				'dependency' => array(
					'hide' => array(
						'portfolio_single_hide_pagination'  => array(
							'yes'
						)
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_nav_same_category',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Pagination Through Same Category', 'pintsandcrafts-core' ),
				'description'   => esc_html__( 'Enabling this option will make portfolio pagination sort through current category', 'pintsandcrafts-core' ),
				'parent'        => $container_navigate_category,
				'default_value' => 'no'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'        => 'portfolio_single_slug',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Single Slug', 'pintsandcrafts-core' ),
				'description' => esc_html__( 'Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'pintsandcrafts-core' ),
				'parent'      => $panel,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'pintsandcrafts_edge_action_options_map', 'pintsandcrafts_edge_portfolio_options_map', 14 );
}