<?php

if ( ! function_exists( 'pintsandcrafts_core_map_masonry_gallery_meta' ) ) {
	function pintsandcrafts_core_map_masonry_gallery_meta() {
		
		$masonry_gallery_meta_box = pintsandcrafts_edge_add_meta_box(
			array(
				'scope' => array( 'masonry-gallery' ),
				'title' => esc_html__( 'Masonry Gallery General', 'pintsandcrafts-core' ),
				'name'  => 'masonry_gallery_meta'
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_masonry_gallery_item_title_tag',
				'type'          => 'select',
				'default_value' => 'h4',
				'label'         => esc_html__( 'Title Tag', 'pintsandcrafts-core' ),
				'parent'        => $masonry_gallery_meta_box,
				'options'       => pintsandcrafts_edge_get_title_tag()
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'   => 'edgtf_masonry_gallery_item_text',
				'type'   => 'text',
				'label'  => esc_html__( 'Text', 'pintsandcrafts-core' ),
				'parent' => $masonry_gallery_meta_box
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'   => 'edgtf_masonry_gallery_item_image',
				'type'   => 'image',
				'label'  => esc_html__( 'Custom Item Icon', 'pintsandcrafts-core' ),
				'parent' => $masonry_gallery_meta_box
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'   => 'edgtf_masonry_gallery_item_link',
				'type'   => 'text',
				'label'  => esc_html__( 'Link', 'pintsandcrafts-core' ),
				'parent' => $masonry_gallery_meta_box
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_masonry_gallery_item_link_target',
				'type'          => 'select',
				'default_value' => '_self',
				'label'         => esc_html__( 'Link Target', 'pintsandcrafts-core' ),
				'parent'        => $masonry_gallery_meta_box,
				'options'       => pintsandcrafts_edge_get_link_target_array()
			)
		);
		
		pintsandcrafts_edge_add_admin_section_title( array(
			'name'   => 'edgtf_section_style_title',
			'parent' => $masonry_gallery_meta_box,
			'title'  => esc_html__( 'Masonry Gallery Item Style', 'pintsandcrafts-core' )
		) );
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_masonry_gallery_item_size',
				'type'          => 'select',
				'default_value' => 'square-small',
				'label'         => esc_html__( 'Size', 'pintsandcrafts-core' ),
				'parent'        => $masonry_gallery_meta_box,
				'options'       => array(
					'square-small'        => esc_html__( 'Square Small', 'pintsandcrafts-core' ),
					'square-big'          => esc_html__( 'Square Big', 'pintsandcrafts-core' ),
					'rectangle-portrait'  => esc_html__( 'Rectangle Portrait', 'pintsandcrafts-core' ),
					'rectangle-landscape' => esc_html__( 'Rectangle Landscape', 'pintsandcrafts-core' )
				)
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_masonry_gallery_item_type',
				'type'          => 'select',
				'default_value' => 'standard',
				'label'         => esc_html__( 'Type', 'pintsandcrafts-core' ),
				'parent'        => $masonry_gallery_meta_box,
				'options'       => array(
					''                  => esc_html__( 'Default', 'pintsandcrafts-core' ),
					'standard'          => esc_html__( 'Standard', 'pintsandcrafts-core' ),
					'with-button'       => esc_html__( 'With Button', 'pintsandcrafts-core' ),
					'simple'            => esc_html__( 'Simple', 'pintsandcrafts-core' ),
                    'overlay-simple'    => esc_html__( 'Overlay Simple', 'pintsandcrafts-core' )
				)
			)
		);

        pintsandcrafts_edge_add_meta_box_field(
            array(
                'name'          => 'edgtf_masonry_gallery_item_shadow',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__( 'Item Shadow', 'pintsandcrafts-core' ),
                'parent'        => $masonry_gallery_meta_box,
                'options'       => pintsandcrafts_edge_get_yes_no_select_array(),
                'dependency' => array(
                    'hide' => array(
                        'edgtf_masonry_gallery_item_type'  => array( 'simple' )
                    )
                )
            )
        );
		
		$masonry_gallery_item_button_type_container = pintsandcrafts_edge_add_admin_container_no_style(
			array(
				'name'            => 'masonry_gallery_item_button_type_container',
				'parent'          => $masonry_gallery_meta_box,
				'dependency' => array(
					'hide' => array(
						'edgtf_masonry_gallery_item_type'  => array( 'standard', 'simple','overlay-simple', '' )
					)
				)
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'   => 'edgtf_masonry_gallery_button_label',
				'type'   => 'text',
				'label'  => esc_html__( 'Button Label', 'pintsandcrafts-core' ),
				'parent' => $masonry_gallery_item_button_type_container
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'    => 'edgtf_masonry_gallery_button_type',
				'type'    => 'select',
				'label'   => esc_html__( 'Button Type', 'pintsandcrafts-core' ),
				'options' => array(
					'solid'    => esc_html__( 'Solid', 'pintsandcrafts-core' ),
					'outline'  => esc_html__( 'Outline', 'pintsandcrafts-core' ),
					'bordered' => esc_html__( 'Bordered', 'pintsandcrafts-core' ),
				),
				'parent'  => $masonry_gallery_item_button_type_container
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'    => 'edgtf_masonry_gallery_item_skin',
				'type'    => 'select',
				'label'   => esc_html__( 'Text Color Skin', 'pintsandcrafts-core' ),
				'options' => array(
					'edgtf-light-skin'  => esc_html__( 'Light Skin', 'pintsandcrafts-core' ),
					'edgtf-dark-skin'   => esc_html__( 'Dark Skin', 'pintsandcrafts-core' ),
				),
				'parent' => $masonry_gallery_meta_box
			)
		);
	}
	
	add_action( 'pintsandcrafts_edge_action_meta_boxes_map', 'pintsandcrafts_core_map_masonry_gallery_meta', 45 );
}