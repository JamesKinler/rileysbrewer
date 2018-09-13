<?php

if ( ! function_exists( 'pintsandcrafts_edge_logo_options_map' ) ) {
	function pintsandcrafts_edge_logo_options_map() {
		
		pintsandcrafts_edge_add_admin_page(
			array(
				'slug'  => '_logo_page',
				'title' => esc_html__( 'Logo', 'pintsandcrafts' ),
				'icon'  => 'fa fa-coffee'
			)
		);
		
		$panel_logo = pintsandcrafts_edge_add_admin_panel(
			array(
				'page'  => '_logo_page',
				'name'  => 'panel_logo',
				'title' => esc_html__( 'Logo', 'pintsandcrafts' )
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'parent'        => $panel_logo,
				'type'          => 'yesno',
				'name'          => 'hide_logo',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Logo', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enabling this option will hide logo image', 'pintsandcrafts' )
			)
		);
		
		$hide_logo_container = pintsandcrafts_edge_add_admin_container(
			array(
				'parent'          => $panel_logo,
				'name'            => 'hide_logo_container',
				'dependency' => array(
					'hide' => array(
						'hide_logo'  => 'yes'
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'logo_image',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Default', 'pintsandcrafts' ),
				'parent'        => $hide_logo_container
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'logo_image_dark',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Dark', 'pintsandcrafts' ),
				'parent'        => $hide_logo_container
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'logo_image_light',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo_white.png",
				'label'         => esc_html__( 'Logo Image - Light', 'pintsandcrafts' ),
				'parent'        => $hide_logo_container
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'logo_image_sticky',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Sticky', 'pintsandcrafts' ),
				'parent'        => $hide_logo_container
			)
		);
		
		pintsandcrafts_edge_add_admin_field(
			array(
				'name'          => 'logo_image_mobile',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Mobile', 'pintsandcrafts' ),
				'parent'        => $hide_logo_container
			)
		);
	}
	
	add_action( 'pintsandcrafts_edge_action_options_map', 'pintsandcrafts_edge_logo_options_map', 2 );
}