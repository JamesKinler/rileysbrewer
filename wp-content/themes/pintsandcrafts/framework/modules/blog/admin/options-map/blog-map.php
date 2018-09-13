<?php

if ( ! function_exists( 'pintsandcrafts_edge_get_blog_list_types_options' ) ) {
	function pintsandcrafts_edge_get_blog_list_types_options() {
		$blog_list_type_options = apply_filters( 'pintsandcrafts_edge_filter_blog_list_type_global_option', $blog_list_type_options = array() );
		
		return $blog_list_type_options;
	}
}

if ( ! function_exists( 'pintsandcrafts_edge_blog_options_map' ) ) {
	function pintsandcrafts_edge_blog_options_map() {
		$blog_list_type_options = pintsandcrafts_edge_get_blog_list_types_options();
		
		pintsandcrafts_edge_add_admin_page(
			array(
				'slug'  => '_blog_page',
				'title' => esc_html__( 'Blog', 'pintsandcrafts' ),
				'icon'  => 'fa fa-files-o'
			)
		);
		
		/**
		 * Blog Lists
		 */
		$panel_blog_lists = pintsandcrafts_edge_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_lists',
				'title' => esc_html__( 'Blog Lists', 'pintsandcrafts' )
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'blog_list_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Blog Layout for Archive Pages', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Choose a default blog layout for archived blog post lists', 'pintsandcrafts' ),
				'default_value' => 'standard',
				'parent'        => $panel_blog_lists,
				'options'       => $blog_list_type_options
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'archive_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout for Archive Pages', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Choose a sidebar layout for archived blog post lists', 'pintsandcrafts' ),
				'default_value' => '',
				'parent'        => $panel_blog_lists,
                'options'       => pintsandcrafts_edge_get_custom_sidebars_options(),
			)
		);
		
		$pintsandcrafts_custom_sidebars = pintsandcrafts_edge_get_custom_sidebars();
		if ( count( $pintsandcrafts_custom_sidebars ) > 0 ) {
			pintsandcrafts_edge_add_admin_field(
				array(
					'name'        => 'archive_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display for Archive Pages', 'pintsandcrafts' ),
					'description' => esc_html__( 'Choose a sidebar to display on archived blog post lists. Default sidebar is "Sidebar Page"', 'pintsandcrafts' ),
					'parent'      => $panel_blog_lists,
					'options'     => pintsandcrafts_edge_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'blog_masonry_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Layout', 'pintsandcrafts' ),
				'default_value' => 'in-grid',
				'description'   => esc_html__( 'Set masonry layout. Default is in grid.', 'pintsandcrafts' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'in-grid'    => esc_html__( 'In Grid', 'pintsandcrafts' ),
					'full-width' => esc_html__( 'Full Width', 'pintsandcrafts' )
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'blog_masonry_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Number of Columns', 'pintsandcrafts' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for your masonry blog lists. Default value is 4 columns', 'pintsandcrafts' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'two'   => esc_html__( '2 Columns', 'pintsandcrafts' ),
					'three' => esc_html__( '3 Columns', 'pintsandcrafts' ),
					'four'  => esc_html__( '4 Columns', 'pintsandcrafts' ),
					'five'  => esc_html__( '5 Columns', 'pintsandcrafts' )
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'blog_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Space Between Items', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Set space size between posts for your masonry blog lists. Default value is normal', 'pintsandcrafts' ),
				'default_value' => 'normal',
				'options'       => pintsandcrafts_edge_get_space_between_items_array(),
				'parent'        => $panel_blog_lists
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'blog_list_featured_image_proportion',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'pintsandcrafts' ),
				'default_value' => 'fixed',
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'pintsandcrafts' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'fixed'    => esc_html__( 'Fixed', 'pintsandcrafts' ),
					'original' => esc_html__( 'Original', 'pintsandcrafts' )
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'blog_pagination_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'pintsandcrafts' ),
				'parent'        => $panel_blog_lists,
				'default_value' => 'standard',
				'options'       => array(
					'standard'        => esc_html__( 'Standard', 'pintsandcrafts' ),
					'load-more'       => esc_html__( 'Load More', 'pintsandcrafts' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'pintsandcrafts' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'pintsandcrafts' )
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'number_of_chars',
				'default_value' => '40',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'pintsandcrafts' ),
				'parent'        => $panel_blog_lists,
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		pintsandcrafts_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_tags_area_blog',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Enable Blog Tags on Standard List', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enabling this option will show tags on standard blog list', 'pintsandcrafts' ),
				'parent'        => $panel_blog_lists
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_unique_date_format',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Unique Date Format', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enabling this option will show unique date format on blog posts', 'pintsandcrafts' ),
				'parent'        => $panel_blog_lists
			)
		);
		
		/**
		 * Blog Single
		 */
		$panel_blog_single = pintsandcrafts_edge_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_single',
				'title' => esc_html__( 'Blog Single', 'pintsandcrafts' )
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'blog_single_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog Single pages', 'pintsandcrafts' ),
				'default_value' => '',
				'parent'        => $panel_blog_single,
                'options'       => pintsandcrafts_edge_get_custom_sidebars_options()
			)
		);
		
		if ( count( $pintsandcrafts_custom_sidebars ) > 0 ) {
			pintsandcrafts_edge_add_admin_field(
				array(
					'name'        => 'blog_single_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display', 'pintsandcrafts' ),
					'description' => esc_html__( 'Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'pintsandcrafts' ),
					'parent'      => $panel_blog_single,
					'options'     => pintsandcrafts_edge_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_blog',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'pintsandcrafts' ),
				'parent'        => $panel_blog_single,
				'options'       => pintsandcrafts_edge_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'blog_single_title_in_title_area',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Post Title in Title Area', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enabling this option will show post title in title area on single post pages', 'pintsandcrafts' ),
				'parent'        => $panel_blog_single,
				'dependency' => array(
					'hide' => array(
						'show_title_area_blog' => 'no'
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'blog_single_related_posts',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Related Posts', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enabling this option will show related posts on single post pages', 'pintsandcrafts' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'blog_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments Form', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enabling this option will show comments form on single post pages', 'pintsandcrafts' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_navigation',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Prev/Next Single Post Navigation Links', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enable navigation links through the blog posts (left and right arrows will appear)', 'pintsandcrafts' ),
				'parent'        => $panel_blog_single
			)
		);
		
		$blog_single_navigation_container = pintsandcrafts_edge_add_admin_container(
			array(
				'name'            => 'edgtf_blog_single_navigation_container',
				'parent'          => $panel_blog_single,
				'dependency' => array(
					'show' => array(
						'blog_single_navigation' => 'yes'
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Navigation Only in Current Category', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Limit your navigation only through current category', 'pintsandcrafts' ),
				'parent'        => $blog_single_navigation_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Info Box', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enabling this option will display author name and descriptions on single post pages', 'pintsandcrafts' ),
				'parent'        => $panel_blog_single
			)
		);
		
		$blog_single_author_info_container = pintsandcrafts_edge_add_admin_container(
			array(
				'name'            => 'edgtf_blog_single_author_info_container',
				'parent'          => $panel_blog_single,
				'dependency' => array(
					'show' => array(
						'blog_author_info' => 'yes'
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info_email',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Author Email', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enabling this option will show author email', 'pintsandcrafts' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_author_social',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Social Icons', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enabling this option will show author social icons on single post pages', 'pintsandcrafts' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		do_action( 'pintsandcrafts_edge_action_blog_single_options_map', $panel_blog_single );
	}
	
	add_action( 'pintsandcrafts_edge_action_options_map', 'pintsandcrafts_edge_blog_options_map', 13 );
}