<?php

if ( ! function_exists( 'pintsandcrafts_edge_map_post_audio_meta' ) ) {
	function pintsandcrafts_edge_map_post_audio_meta() {
		$audio_post_format_meta_box = pintsandcrafts_edge_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'pintsandcrafts' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Choose audio type', 'pintsandcrafts' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'pintsandcrafts' ),
					'self'            => esc_html__( 'Self Hosted', 'pintsandcrafts' )
				)
			)
		);
		
		$edgtf_audio_embedded_container = pintsandcrafts_edge_add_admin_container(
			array(
				'parent' => $audio_post_format_meta_box,
				'name'   => 'edgtf_audio_embedded_container'
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'pintsandcrafts' ),
				'description' => esc_html__( 'Enter audio URL', 'pintsandcrafts' ),
				'parent'      => $edgtf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'edgtf_audio_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'pintsandcrafts' ),
				'description' => esc_html__( 'Enter audio link', 'pintsandcrafts' ),
				'parent'      => $edgtf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'edgtf_audio_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'pintsandcrafts_edge_action_meta_boxes_map', 'pintsandcrafts_edge_map_post_audio_meta', 23 );
}