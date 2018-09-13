<?php

if ( ! function_exists( 'pintsandcrafts_core_map_testimonials_meta' ) ) {
	function pintsandcrafts_core_map_testimonials_meta() {
		$testimonial_meta_box = pintsandcrafts_edge_add_meta_box(
			array(
				'scope' => array( 'testimonials' ),
				'title' => esc_html__( 'Testimonial', 'pintsandcrafts-core' ),
				'name'  => 'testimonial_meta'
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_testimonial_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Title', 'pintsandcrafts-core' ),
				'description' => esc_html__( 'Enter testimonial title', 'pintsandcrafts-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_testimonial_text',
				'type'        => 'text',
				'label'       => esc_html__( 'Text', 'pintsandcrafts-core' ),
				'description' => esc_html__( 'Enter testimonial text', 'pintsandcrafts-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_testimonial_author',
				'type'        => 'text',
				'label'       => esc_html__( 'Author', 'pintsandcrafts-core' ),
				'description' => esc_html__( 'Enter author name', 'pintsandcrafts-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
	}
	
	add_action( 'pintsandcrafts_edge_action_meta_boxes_map', 'pintsandcrafts_core_map_testimonials_meta', 95 );
}