<?php

if ( ! function_exists( 'pintsandcrafts_core_map_portfolio_meta' ) ) {
	function pintsandcrafts_core_map_portfolio_meta() {
		global $pintsandcrafts_php_global_Framework;
		
		$edgtf_pages = array();
		$pages       = get_pages();
		foreach ( $pages as $page ) {
			$edgtf_pages[ $page->ID ] = $page->post_title;
		}
		
		//Portfolio Images
		
		$edgtPortfolioImages = new PintsAndCraftsPhpClassMetaBox( 'portfolio-item', esc_html__( 'Portfolio Images (multiple upload)', 'pintsandcrafts-core' ), '', '', 'portfolio_images' );
		$pintsandcrafts_php_global_Framework->edgtMetaBoxes->addMetaBox( 'portfolio_images', $edgtPortfolioImages );
		
		$pintsandcrafts_portfolio_image_gallery = new PintsAndCraftsPhpClassMultipleImages( 'edgtf-portfolio-image-gallery', esc_html__( 'Portfolio Images', 'pintsandcrafts-core' ), esc_html__( 'Choose your portfolio images', 'pintsandcrafts-core' ) );
		$edgtPortfolioImages->addChild( 'edgtf-portfolio-image-gallery', $pintsandcrafts_portfolio_image_gallery );
		
		//Portfolio Single Upload Images/Videos 
		
		$pintsandcrafts_portfolio_images_videos = pintsandcrafts_edge_add_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Portfolio Images/Videos (single upload)', 'pintsandcrafts-core' ),
				'name'  => 'edgtf_portfolio_images_videos'
			)
		);
		pintsandcrafts_edge_add_repeater_field(
			array(
				'name'        => 'edgtf_portfolio_single_upload',
				'parent'      => $pintsandcrafts_portfolio_images_videos,
				'button_text' => esc_html__( 'Add Image/Video', 'pintsandcrafts-core' ),
				'fields'      => array(
					array(
						'type'        => 'select',
						'name'        => 'file_type',
						'label'       => esc_html__( 'File Type', 'pintsandcrafts-core' ),
						'options' => array(
							'image' => esc_html__('Image','pintsandcrafts-core'),
							'video' => esc_html__('Video','pintsandcrafts-core'),
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'single_image',
						'label'       => esc_html__( 'Image', 'pintsandcrafts-core' ),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'image'
							)
						)
					),
					array(
						'type'        => 'select',
						'name'        => 'video_type',
						'label'       => esc_html__( 'Video Type', 'pintsandcrafts-core' ),
						'options'	  => array(
							'youtube' => esc_html__('YouTube', 'pintsandcrafts-core'),
							'vimeo' => esc_html__('Vimeo', 'pintsandcrafts-core'),
							'self' => esc_html__('Self Hosted', 'pintsandcrafts-core'),
						),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'video'
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_id',
						'label'       => esc_html__( 'Video ID', 'pintsandcrafts-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => array('youtube','vimeo')
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_mp4',
						'label'       => esc_html__( 'Video mp4', 'pintsandcrafts-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'video_cover_image',
						'label'       => esc_html__( 'Video Cover Image', 'pintsandcrafts-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					)
				)
			)
		);
		
		//Portfolio Additional Sidebar Items
		
		$edgtAdditionalSidebarItems = pintsandcrafts_edge_add_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Additional Portfolio Sidebar Items', 'pintsandcrafts-core' ),
				'name'  => 'portfolio_properties'
			)
		);

		pintsandcrafts_edge_add_repeater_field(
			array(
				'name'        => 'edgtf_portfolio_properties',
				'parent'      => $edgtAdditionalSidebarItems,
				'button_text' => esc_html__( 'Add New Item', 'pintsandcrafts-core' ),
				'fields'      => array(
					array(
						'type'        => 'text',
						'name'        => 'item_title',
						'label'       => esc_html__( 'Item Title', 'pintsandcrafts-core' ),
					),
					array(
						'type'        => 'text',
						'name'        => 'item_text',
						'label'       => esc_html__( 'Item Text', 'pintsandcrafts-core' )
					),
					array(
						'type'        => 'text',
						'name'        => 'item_url',
						'label'       => esc_html__( 'Enter Full URL for Item Text Link', 'pintsandcrafts-core' )
					)
				)
			)
		);

		//Portfolio Glass / tasting & parings

		$edgtExtraSection = pintsandcrafts_edge_add_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Add additional section', 'pintsandcrafts-core' ),
				'name'  => 'portfolio_glass'
			)
		);

		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'portfolio_extra_section',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Additional Section Title', 'pintsandcrafts-core' ),
				'parent'      => $edgtExtraSection,
			)
		);

		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'portfolio_section_image',
				'type'        => 'image',
				'label'       => esc_html__( 'Portfolio Additional Section Image', 'pintsandcrafts-core' ),
				'parent'      => $edgtExtraSection,
			)
		);

		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'portfolio_extra_section_desc',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Additional Section Description', 'pintsandcrafts-core' ),
				'parent'      => $edgtExtraSection,
			)
		);
	}
	
	add_action( 'pintsandcrafts_edge_action_meta_boxes_map', 'pintsandcrafts_core_map_portfolio_meta', 40 );
}