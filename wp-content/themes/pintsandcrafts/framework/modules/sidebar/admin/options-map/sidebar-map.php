<?php

if ( ! function_exists( 'pintsandcrafts_edge_sidebar_options_map' ) ) {
	function pintsandcrafts_edge_sidebar_options_map() {
		
		pintsandcrafts_edge_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'pintsandcrafts' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = pintsandcrafts_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'pintsandcrafts' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		pintsandcrafts_edge_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'pintsandcrafts' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'pintsandcrafts' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => pintsandcrafts_edge_get_custom_sidebars_options()
		) );
		
		$pintsandcrafts_custom_sidebars = pintsandcrafts_edge_get_custom_sidebars();
		if ( count( $pintsandcrafts_custom_sidebars ) > 0 ) {
			pintsandcrafts_edge_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'pintsandcrafts' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'pintsandcrafts' ),
				'parent'      => $sidebar_panel,
				'options'     => $pintsandcrafts_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'pintsandcrafts_edge_action_options_map', 'pintsandcrafts_edge_sidebar_options_map', 9 );
}