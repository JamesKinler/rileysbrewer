<?php

if ( ! function_exists( 'pintsandcrafts_edge_map_footer_meta' ) ) {
	function pintsandcrafts_edge_map_footer_meta() {
		
		$footer_meta_box = pintsandcrafts_edge_add_meta_box(
			array(
				'scope' => apply_filters( 'pintsandcrafts_edge_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'pintsandcrafts' ),
				'name'  => 'footer_meta'
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_disable_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Disable Footer for this Page', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'pintsandcrafts' ),
				'options'       => pintsandcrafts_edge_get_yes_no_select_array(),
				'parent'        => $footer_meta_box
			)
		);

		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_footer_transparent_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Set Transparent Footer', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enabling this option will set Footer to be transparent', 'pintsandcrafts' ),
				'options'       => pintsandcrafts_edge_get_yes_no_select_array(),
				'parent'        => $footer_meta_box
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_footer_in_grid_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Footer in Grid', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'pintsandcrafts' ),
				'options'       => pintsandcrafts_edge_get_yes_no_select_array(),
				'parent'        => $footer_meta_box
			)
		);
		
		$show_footer_meta_container = pintsandcrafts_edge_add_admin_container(
			array(
				'name'       => 'edgtf_show_footer_meta_container',
				'parent'     => $footer_meta_box,
				'dependency' => array(
					'hide' => array(
						'edgtf_disable_footer_meta' => 'yes'
					)
				)
			)
		);
		
			pintsandcrafts_edge_add_meta_box_field(
				array(
					'name'          => 'edgtf_show_footer_top_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Top', 'pintsandcrafts' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'pintsandcrafts' ),
					'options'       => pintsandcrafts_edge_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
			
			pintsandcrafts_edge_add_meta_box_field(
				array(
					'name'          => 'edgtf_show_footer_bottom_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Bottom', 'pintsandcrafts' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'pintsandcrafts' ),
					'options'       => pintsandcrafts_edge_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);

        pintsandcrafts_edge_add_meta_box_field(
            array(
                'name'          => 'edgtf_uncovering_footer_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__( 'Uncovering Footer', 'pintsandcrafts' ),
                'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'pintsandcrafts' ),
                'options'       => pintsandcrafts_edge_get_yes_no_select_array(),
                'parent'        => $show_footer_meta_container,
            )
        );
	}
	
	add_action( 'pintsandcrafts_edge_action_meta_boxes_map', 'pintsandcrafts_edge_map_footer_meta', 70 );
}