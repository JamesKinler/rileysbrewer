<?php

if ( ! function_exists( 'pintsandcrafts_edge_breadcrumbs_title_type_options_meta_boxes' ) ) {
	function pintsandcrafts_edge_breadcrumbs_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_breadcrumbs_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Breadcrumbs Color', 'pintsandcrafts' ),
				'description' => esc_html__( 'Choose a color for breadcrumbs text', 'pintsandcrafts' ),
				'parent'      => $show_title_area_meta_container
			)
		);
	}
	
	add_action( 'pintsandcrafts_edge_action_additional_title_area_meta_boxes', 'pintsandcrafts_edge_breadcrumbs_title_type_options_meta_boxes' );
}