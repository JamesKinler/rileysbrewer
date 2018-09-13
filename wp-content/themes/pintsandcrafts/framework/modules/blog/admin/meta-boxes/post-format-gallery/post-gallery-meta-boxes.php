<?php

if ( ! function_exists( 'pintsandcrafts_edge_map_post_gallery_meta' ) ) {
	
	function pintsandcrafts_edge_map_post_gallery_meta() {
		$gallery_post_format_meta_box = pintsandcrafts_edge_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'pintsandcrafts' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		pintsandcrafts_edge_add_multiple_images_field(
			array(
				'name'        => 'edgtf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'pintsandcrafts' ),
				'description' => esc_html__( 'Choose your gallery images', 'pintsandcrafts' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'pintsandcrafts_edge_action_meta_boxes_map', 'pintsandcrafts_edge_map_post_gallery_meta', 21 );
}
