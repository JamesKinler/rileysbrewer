<?php

if ( ! function_exists( 'pintsandcrafts_edge_map_post_quote_meta' ) ) {
	function pintsandcrafts_edge_map_post_quote_meta() {
		$quote_post_format_meta_box = pintsandcrafts_edge_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'pintsandcrafts' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'pintsandcrafts' ),
				'description' => esc_html__( 'Enter Quote text', 'pintsandcrafts' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'pintsandcrafts' ),
				'description' => esc_html__( 'Enter Quote author', 'pintsandcrafts' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
	}
	
	add_action( 'pintsandcrafts_edge_action_meta_boxes_map', 'pintsandcrafts_edge_map_post_quote_meta', 25 );
}