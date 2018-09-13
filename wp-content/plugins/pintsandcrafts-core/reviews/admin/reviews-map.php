<?php

if ( ! function_exists( 'pintsandcrafts_core_reviews_map' ) ) {
	function pintsandcrafts_core_reviews_map() {
		
		$reviews_panel = pintsandcrafts_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Reviews', 'pintsandcrafts-core' ),
				'name'  => 'panel_reviews',
				'page'  => '_page_page'
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'      => $reviews_panel,
				'type'        => 'text',
				'name'        => 'reviews_section_title',
				'label'       => esc_html__( 'Reviews Section Title', 'pintsandcrafts-core' ),
				'description' => esc_html__( 'Enter title that you want to show before average rating for each room', 'pintsandcrafts-core' ),
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'      => $reviews_panel,
				'type'        => 'textarea',
				'name'        => 'reviews_section_subtitle',
				'label'       => esc_html__( 'Reviews Section Subtitle', 'pintsandcrafts-core' ),
				'description' => esc_html__( 'Enter subtitle that you want to show before average rating for each room', 'pintsandcrafts-core' ),
			)
		);
		
		do_action( 'pintsandcrafts_hotel_room_action_single_fields' );
	}
	
	add_action( 'pintsandcrafts_edge_action_additional_page_options_map', 'pintsandcrafts_core_reviews_map', 75 ); //one after elements
}