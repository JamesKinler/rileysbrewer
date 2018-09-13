<?php

if ( ! function_exists( 'pintsandcrafts_edge_map_general_meta' ) ) {
	function pintsandcrafts_edge_map_general_meta() {
		
		$general_meta_box = pintsandcrafts_edge_add_meta_box(
			array(
				'scope' => apply_filters( 'pintsandcrafts_edge_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'general_meta' ),
				'title' => esc_html__( 'General', 'pintsandcrafts' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'pintsandcrafts' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'pintsandcrafts' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'pintsandcrafts' ),
				'parent'        => $general_meta_box
			)
		);
		
		$edgtf_content_padding_group = pintsandcrafts_edge_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Style', 'pintsandcrafts' ),
				'description' => esc_html__( 'Define styles for Content area', 'pintsandcrafts' ),
				'parent'      => $general_meta_box
			)
		);
		
			$edgtf_content_padding_row = pintsandcrafts_edge_add_admin_row(
				array(
					'name'   => 'edgtf_content_padding_row',
					'next'   => true,
					'parent' => $edgtf_content_padding_group
				)
			);
		
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'   => 'edgtf_page_content_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Padding (e.g. 10px 5px 10px 5px)', 'pintsandcrafts' ),
						'parent' => $edgtf_content_padding_row,
					)
				);
				
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'    => 'edgtf_page_content_padding_mobile',
						'type'    => 'textsimple',
						'label'   => esc_html__( 'Content Padding for mobile (e.g. 10px 5px 10px 5px)', 'pintsandcrafts' ),
						'parent'  => $edgtf_content_padding_row,
					)
				);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_page_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'pintsandcrafts' ),
				'description' => esc_html__( 'Choose background color for page content', 'pintsandcrafts' ),
				'parent'      => $general_meta_box
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_page_background_image_meta',
                'type'          => 'image',
                'label'         => esc_html__( 'Page Background Image', 'pintsandcrafts' ),
                'description'   => esc_html__( 'Choose background image for page content', 'pintsandcrafts' ),
                'parent'        => $general_meta_box
			)
		);

        pintsandcrafts_edge_add_meta_box_field(
            array(
                'name'          => 'edgtf_page_background_repeat_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__( 'Background Image Repeat', 'pintsandcrafts' ),
                'options'       => pintsandcrafts_edge_get_yes_no_select_array(),
                'parent'        => $general_meta_box
            )
        );
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'    => 'edgtf_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'pintsandcrafts' ),
				'parent'  => $general_meta_box,
				'options' => pintsandcrafts_edge_get_yes_no_select_array()
			)
		);
		
			$boxed_container_meta = pintsandcrafts_edge_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'dependency' => array(
						'hide' => array(
							'edgtf_boxed_meta'  => array('','no')
						)
					)
				)
			);
		
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'pintsandcrafts' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'pintsandcrafts' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'pintsandcrafts' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'pintsandcrafts' ),
						'parent'      => $boxed_container_meta
					)
				);

				
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'pintsandcrafts' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'pintsandcrafts' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => 'fixed',
						'label'         => esc_html__( 'Background Image Attachment', 'pintsandcrafts' ),
						'description'   => esc_html__( 'Choose background image attachment', 'pintsandcrafts' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'pintsandcrafts' ),
							'fixed'  => esc_html__( 'Fixed', 'pintsandcrafts' ),
							'scroll' => esc_html__( 'Scroll', 'pintsandcrafts' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'pintsandcrafts' ),
				'parent'        => $general_meta_box,
				'options'       => pintsandcrafts_edge_get_yes_no_select_array(),
			)
		);
		
			$paspartu_container_meta = pintsandcrafts_edge_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'edgtf_paspartu_container_meta',
					'dependency' => array(
						'hide' => array(
							'edgtf_paspartu_meta'  => array('','no')
						)
					)
				)
			);
		
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'pintsandcrafts' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'pintsandcrafts' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'pintsandcrafts' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'pintsandcrafts' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_paspartu_responsive_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'pintsandcrafts' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'pintsandcrafts' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'edgtf_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'pintsandcrafts' ),
						'options'       => pintsandcrafts_edge_get_yes_no_select_array(),
					)
				);
		
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'edgtf_disable_bottom_paspartu_meta',
						'label'         => esc_html__( 'Disable Bottom Passepartout', 'pintsandcrafts' ),
						'options'       => pintsandcrafts_edge_get_yes_no_select_array(),
					)
				);
		
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'edgtf_enable_fixed_paspartu_meta',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'pintsandcrafts' ),
						'description'   => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'pintsandcrafts' ),
						'options'       => pintsandcrafts_edge_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Width Layout - begin **********************/
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'pintsandcrafts' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'pintsandcrafts' ),
					'edgtf-grid-1100' => esc_html__( '1100px', 'pintsandcrafts' ),
					'edgtf-grid-1300' => esc_html__( '1300px', 'pintsandcrafts' ),
					'edgtf-grid-1200' => esc_html__( '1200px', 'pintsandcrafts' ),
					'edgtf-grid-1000' => esc_html__( '1000px', 'pintsandcrafts' ),
					'edgtf-grid-800'  => esc_html__( '800px', 'pintsandcrafts' )
				)
			)
		);
		
		/***************** Content Width Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'pintsandcrafts' ),
				'parent'        => $general_meta_box,
				'options'       => pintsandcrafts_edge_get_yes_no_select_array()
			)
		);
		
			$page_transitions_container_meta = pintsandcrafts_edge_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'page_transitions_container_meta',
					'dependency' => array(
						'hide' => array(
							'edgtf_smooth_page_transitions_meta'  => array('','no')
						)
					)
				)
			);
		
				pintsandcrafts_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'pintsandcrafts' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'pintsandcrafts' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => pintsandcrafts_edge_get_yes_no_select_array()
					)
				);
				
				$page_transition_preloader_container_meta = pintsandcrafts_edge_add_admin_container(
					array(
						'parent'          => $page_transitions_container_meta,
						'name'            => 'page_transition_preloader_container_meta',
						'dependency' => array(
							'hide' => array(
								'edgtf_page_transition_preloader_meta'  => array('','no')
							)
						)
					)
				);
				
					pintsandcrafts_edge_add_meta_box_field(
						array(
							'name'   => 'edgtf_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'pintsandcrafts' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = pintsandcrafts_edge_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'pintsandcrafts' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'pintsandcrafts' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = pintsandcrafts_edge_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					pintsandcrafts_edge_add_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'edgtf_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'pintsandcrafts' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'pintsandcrafts' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'pintsandcrafts' ),
								'pulse'                 => esc_html__( 'Pulse', 'pintsandcrafts' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'pintsandcrafts' ),
								'cube'                  => esc_html__( 'Cube', 'pintsandcrafts' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'pintsandcrafts' ),
								'stripes'               => esc_html__( 'Stripes', 'pintsandcrafts' ),
								'wave'                  => esc_html__( 'Wave', 'pintsandcrafts' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'pintsandcrafts' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'pintsandcrafts' ),
								'atom'                  => esc_html__( 'Atom', 'pintsandcrafts' ),
								'clock'                 => esc_html__( 'Clock', 'pintsandcrafts' ),
								'mitosis'               => esc_html__( 'Mitosis', 'pintsandcrafts' ),
								'lines'                 => esc_html__( 'Lines', 'pintsandcrafts' ),
								'fussion'               => esc_html__( 'Fussion', 'pintsandcrafts' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'pintsandcrafts' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'pintsandcrafts' ),
                                'pint_loader'           => esc_html__( 'Pint Loader', 'pintsandcrafts' )
							)
						)
					);
					
					pintsandcrafts_edge_add_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'edgtf_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'pintsandcrafts' ),
							'parent' => $row_pt_spinner_animation_meta
						)
					);
					
					pintsandcrafts_edge_add_meta_box_field(
						array(
							'name'        => 'edgtf_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'pintsandcrafts' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'pintsandcrafts' ),
							'options'     => pintsandcrafts_edge_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'pintsandcrafts' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'pintsandcrafts' ),
				'parent'      => $general_meta_box,
				'options'     => pintsandcrafts_edge_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/
	}
	
	add_action( 'pintsandcrafts_edge_action_meta_boxes_map', 'pintsandcrafts_edge_map_general_meta', 10 );
}