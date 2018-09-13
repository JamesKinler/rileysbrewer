<?php

if ( ! function_exists( 'pintsandcrafts_edge_header_divided_area_meta_options_map' ) ) {
	function pintsandcrafts_edge_header_divided_area_meta_options_map( $header_meta_box ) {
		
		$pintsandcrafts_custom_sidebars = pintsandcrafts_edge_get_custom_sidebars();
		if ( count( $pintsandcrafts_custom_sidebars ) > 0 ) {
			pintsandcrafts_edge_add_meta_box_field(
				array(
					'name'        => 'edgtf_custom_divided_left_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area in Left Divided Header area', 'pintsandcrafts' ),
					'description' => esc_html__( 'Choose custom widget area to display in left widget area for divided header"', 'pintsandcrafts' ),
					'parent'      => $header_meta_box,
					'options'     => $pintsandcrafts_custom_sidebars
				)
			);
		}

		if ( count( $pintsandcrafts_custom_sidebars ) > 0 ) {
			pintsandcrafts_edge_add_meta_box_field(
				array(
					'name'        => 'edgtf_custom_divided_right_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area in Right Divided Header area', 'pintsandcrafts' ),
					'description' => esc_html__( 'Choose custom widget area to display in right widget area for divided header"', 'pintsandcrafts' ),
					'parent'      => $header_meta_box,
					'options'     => $pintsandcrafts_custom_sidebars
				)
			);
		}

	}
	
	add_action( 'pintsandcrafts_edge_action_additional_header_area_meta_boxes_map', 'pintsandcrafts_edge_header_divided_area_meta_options_map', 10, 1 );
}