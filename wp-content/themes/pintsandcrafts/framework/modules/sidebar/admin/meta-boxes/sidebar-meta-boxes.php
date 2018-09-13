<?php

if ( ! function_exists( 'pintsandcrafts_edge_map_sidebar_meta' ) ) {
	function pintsandcrafts_edge_map_sidebar_meta() {
		$edgtf_sidebar_meta_box = pintsandcrafts_edge_add_meta_box(
			array(
				'scope' => apply_filters( 'pintsandcrafts_edge_filter_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'pintsandcrafts' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'pintsandcrafts' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'pintsandcrafts' ),
				'parent'      => $edgtf_sidebar_meta_box,
                'options'       => pintsandcrafts_edge_get_custom_sidebars_options( true )
			)
		);
		
		$edgtf_custom_sidebars = pintsandcrafts_edge_get_custom_sidebars();
		if ( count( $edgtf_custom_sidebars ) > 0 ) {
			pintsandcrafts_edge_add_meta_box_field(
				array(
					'name'        => 'edgtf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'pintsandcrafts' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'pintsandcrafts' ),
					'parent'      => $edgtf_sidebar_meta_box,
					'options'     => $edgtf_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'pintsandcrafts_edge_action_meta_boxes_map', 'pintsandcrafts_edge_map_sidebar_meta', 31 );
}