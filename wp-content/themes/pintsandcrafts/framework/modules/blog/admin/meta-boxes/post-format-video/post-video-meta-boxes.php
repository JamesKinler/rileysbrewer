<?php

if ( ! function_exists( 'pintsandcrafts_edge_map_post_video_meta' ) ) {
	function pintsandcrafts_edge_map_post_video_meta() {
		$video_post_format_meta_box = pintsandcrafts_edge_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'pintsandcrafts' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Choose video type', 'pintsandcrafts' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'pintsandcrafts' ),
					'self'            => esc_html__( 'Self Hosted', 'pintsandcrafts' )
				)
			)
		);
		
		$edgtf_video_embedded_container = pintsandcrafts_edge_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name'   => 'edgtf_video_embedded_container'
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'pintsandcrafts' ),
				'description' => esc_html__( 'Enter Video URL', 'pintsandcrafts' ),
				'parent'      => $edgtf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'edgtf_video_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'pintsandcrafts' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'pintsandcrafts' ),
				'parent'      => $edgtf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'edgtf_video_type_meta' => 'self'
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'pintsandcrafts' ),
				'description' => esc_html__( 'Enter video image', 'pintsandcrafts' ),
				'parent'      => $edgtf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'edgtf_video_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'pintsandcrafts_edge_action_meta_boxes_map', 'pintsandcrafts_edge_map_post_video_meta', 22 );
}