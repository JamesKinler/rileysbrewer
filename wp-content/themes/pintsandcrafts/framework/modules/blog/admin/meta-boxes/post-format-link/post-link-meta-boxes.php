<?php

if ( ! function_exists( 'pintsandcrafts_edge_map_post_link_meta' ) ) {
	function pintsandcrafts_edge_map_post_link_meta() {
		$link_post_format_meta_box = pintsandcrafts_edge_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'pintsandcrafts' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'pintsandcrafts' ),
				'description' => esc_html__( 'Enter link', 'pintsandcrafts' ),
				'parent'      => $link_post_format_meta_box
			)
		);
	}
	
	add_action( 'pintsandcrafts_edge_action_meta_boxes_map', 'pintsandcrafts_edge_map_post_link_meta', 24 );
}