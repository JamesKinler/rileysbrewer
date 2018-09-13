<?php

/*** Post Settings ***/

if ( ! function_exists( 'pintsandcrafts_edge_map_post_meta' ) ) {
	function pintsandcrafts_edge_map_post_meta() {
		
		$post_meta_box = pintsandcrafts_edge_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'pintsandcrafts' ),
				'name'  => 'post-meta'
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'pintsandcrafts' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
                'options'       => pintsandcrafts_edge_get_custom_sidebars_options( true )
			)
		);
		
		$pintsandcrafts_custom_sidebars = pintsandcrafts_edge_get_custom_sidebars();
		if ( count( $pintsandcrafts_custom_sidebars ) > 0 ) {
			pintsandcrafts_edge_add_meta_box_field( array(
				'name'        => 'edgtf_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'pintsandcrafts' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'pintsandcrafts' ),
				'parent'      => $post_meta_box,
				'options'     => pintsandcrafts_edge_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'pintsandcrafts' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'pintsandcrafts' ),
				'parent'      => $post_meta_box
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_blog_masonry_gallery_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Fixed Proportion', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in fixed proportion', 'pintsandcrafts' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'            => esc_html__( 'Default', 'pintsandcrafts' ),
					'large-width'        => esc_html__( 'Large Width', 'pintsandcrafts' ),
					'large-height'       => esc_html__( 'Large Height', 'pintsandcrafts' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'pintsandcrafts' )
				)
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_blog_masonry_gallery_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Original Proportion', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in original proportion', 'pintsandcrafts' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'     => esc_html__( 'Default', 'pintsandcrafts' ),
					'large-width' => esc_html__( 'Large Width', 'pintsandcrafts' )
				)
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'pintsandcrafts' ),
				'parent'        => $post_meta_box,
				'options'       => pintsandcrafts_edge_get_yes_no_select_array()
			)
		);

		do_action('pintsandcrafts_edge_action_blog_post_meta', $post_meta_box);
	}
	
	add_action( 'pintsandcrafts_edge_action_meta_boxes_map', 'pintsandcrafts_edge_map_post_meta', 20 );
}
