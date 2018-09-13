<?php

if ( ! function_exists( 'pintsandcrafts_edge_map_woocommerce_meta' ) ) {
	function pintsandcrafts_edge_map_woocommerce_meta() {
		
		$woocommerce_meta_box = pintsandcrafts_edge_add_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'pintsandcrafts' ),
				'name'  => 'woo_product_meta'
			)
		);
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_product_featured_image_size',
				'type'        => 'select',
				'label'       => esc_html__( 'Dimensions for Product List Shortcode', 'pintsandcrafts' ),
				'description' => esc_html__( 'Choose image layout when it appears in Edge Product List - Masonry layout shortcode', 'pintsandcrafts' ),
				'options'     => array(
					''                                   => esc_html__( 'Default', 'pintsandcrafts' ),
					'edgtf-woo-image-small'              => esc_html__( 'Small', 'pintsandcrafts' ),
					'edgtf-woo-image-large-width'        => esc_html__( 'Large Width', 'pintsandcrafts' ),
					'edgtf-woo-image-large-height'       => esc_html__( 'Large Height', 'pintsandcrafts' ),
					'edgtf-woo-image-large-width-height' => esc_html__( 'Large Width Height', 'pintsandcrafts' )
				),
				'parent'      => $woocommerce_meta_box
			)
		);

        pintsandcrafts_edge_add_meta_box_field(
            array(
                'name'          => 'edgtf_product_hover_featured_image_meta',
                'type'          => 'image',
                'label'         => esc_html__( 'Hover Featured Image', 'pintsandcrafts' ),
                'description'   => esc_html__('Choose an switched featured image for Product Lists','pintsandcrafts' ),
                'parent'        => $woocommerce_meta_box
            )
        );
		
		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_show_title_area_woo_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'pintsandcrafts' ),
				'options'       => pintsandcrafts_edge_get_yes_no_select_array(),
				'parent'        => $woocommerce_meta_box
			)
		);

		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_show_new_sign_woo_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show New Sign', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Enabling this option will show new sign mark on product', 'pintsandcrafts' ),
				'parent'        => $woocommerce_meta_box
			)
		);

		pintsandcrafts_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_contents_woo_meta',
				'type'          => 'text',
				'label'         => esc_html__( 'Item Contents', 'pintsandcrafts' ),
				'description'   => esc_html__( 'Add contents description that will appear bellow category on shop list', 'pintsandcrafts' ),
				'parent'        => $woocommerce_meta_box
			)
		);
	}
	
	add_action( 'pintsandcrafts_edge_action_meta_boxes_map', 'pintsandcrafts_edge_map_woocommerce_meta', 99 );
}