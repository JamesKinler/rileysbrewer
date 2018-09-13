<?php

if ( ! function_exists( 'pintsandcrafts_edge_portfolio_category_additional_fields' ) ) {
	function pintsandcrafts_edge_portfolio_category_additional_fields() {
		
		$fields = pintsandcrafts_edge_add_taxonomy_fields(
			array(
				'scope' => 'portfolio-category',
				'name'  => 'portfolio_category_options'
			)
		);
		
		pintsandcrafts_edge_add_taxonomy_field(
			array(
				'name'   => 'edgtf_portfolio_category_image_meta',
				'type'   => 'image',
				'label'  => esc_html__( 'Category Image', 'pintsandcrafts-core' ),
				'parent' => $fields
			)
		);
	}
	
	add_action( 'pintsandcrafts_edge_action_custom_taxonomy_fields', 'pintsandcrafts_edge_portfolio_category_additional_fields' );
}