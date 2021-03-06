<?php

namespace PintsAndCraftsCore\CPT\Shortcodes\ProductList;

use PintsAndCraftsCore\Lib;

class ProductList implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_product_list';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Product List', 'pintsandcrafts' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-product-list extended-custom-icon',
					'category'                  => esc_html__( 'by PintsAndCrafts', 'pintsandcrafts' ),
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'type',
							'heading'     => esc_html__( 'Type', 'pintsandcrafts' ),
							'value'       => array(
								esc_html__( 'Standard', 'pintsandcrafts' ) => 'standard',
								esc_html__( 'Masonry', 'pintsandcrafts' )  => 'masonry'
							),
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'info_position',
							'heading'     => esc_html__( 'Product Info Position', 'pintsandcrafts' ),
							'value'       => array(
								esc_html__( 'Info On Image Hover', 'pintsandcrafts' ) => 'info-on-image',
								esc_html__( 'Info Below Image', 'pintsandcrafts' )    => 'info-below-image'
							),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'number_of_posts',
							'heading'    => esc_html__( 'Number of Products', 'pintsandcrafts' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_columns',
							'heading'     => esc_html__( 'Number of Columns', 'pintsandcrafts' ),
							'value'       => array(
								esc_html__( 'One', 'pintsandcrafts' )   => '1',
								esc_html__( 'Two', 'pintsandcrafts' )   => '2',
								esc_html__( 'Three', 'pintsandcrafts' ) => '3',
								esc_html__( 'Four', 'pintsandcrafts' )  => '4',
								esc_html__( 'Five', 'pintsandcrafts' )  => '5',
								esc_html__( 'Six', 'pintsandcrafts' )   => '6'
							),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'space_between_items',
							'heading'     => esc_html__( 'Space Between Items', 'pintsandcrafts' ),
							'value'       => array_flip( pintsandcrafts_edge_get_space_between_items_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'orderby',
							'heading'     => esc_html__( 'Order By', 'pintsandcrafts' ),
							'value'       => array_flip( pintsandcrafts_edge_get_query_order_by_array( false, array( 'on-sale' => esc_html__( 'On Sale', 'pintsandcrafts' ) ) ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'order',
							'heading'     => esc_html__( 'Order', 'pintsandcrafts' ),
							'value'       => array_flip( pintsandcrafts_edge_get_query_order_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'taxonomy_to_display',
							'heading'     => esc_html__( 'Choose Sorting Taxonomy', 'pintsandcrafts' ),
							'value'       => array(
								esc_html__( 'Category', 'pintsandcrafts' ) => 'category',
								esc_html__( 'Tag', 'pintsandcrafts' )      => 'tag',
								esc_html__( 'Id', 'pintsandcrafts' )       => 'id'
							),
							'save_always' => true,
							'description' => esc_html__( 'If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display', 'pintsandcrafts' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'taxonomy_values',
							'heading'     => esc_html__( 'Enter Taxonomy Values', 'pintsandcrafts' ),
							'description' => esc_html__( 'Separate values (category slugs, tags, or post IDs) with a comma', 'pintsandcrafts' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'image_size',
							'heading'    => esc_html__( 'Image Proportions', 'pintsandcrafts' ),
							'value'      => array(
								esc_html__( 'Default', 'pintsandcrafts' )        => '',
								esc_html__( 'Original', 'pintsandcrafts' )       => 'full',
								esc_html__( 'Square', 'pintsandcrafts' )         => 'square',
								esc_html__( 'Landscape', 'pintsandcrafts' )      => 'landscape',
								esc_html__( 'Portrait', 'pintsandcrafts' )       => 'portrait',
								esc_html__( 'Medium', 'pintsandcrafts' )         => 'medium',
								esc_html__( 'Large', 'pintsandcrafts' )          => 'large',
								esc_html__( 'Shop Catalog', 'pintsandcrafts' )   => 'shop_catalog',
								esc_html__( 'Shop Single', 'pintsandcrafts' )    => 'shop_single',
								esc_html__( 'Shop Thumbnail', 'pintsandcrafts' ) => 'shop_thumbnail'
							),
							'save_always' => true
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_title',
							'heading'    => esc_html__( 'Display Title', 'pintsandcrafts' ),
							'value'      => array_flip( pintsandcrafts_edge_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'pintsandcrafts' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'product_info_skin',
							'heading'    => esc_html__( 'Product Info Skin', 'pintsandcrafts' ),
							'value'      => array(
								esc_html__( 'Default', 'pintsandcrafts' ) => 'default',
								esc_html__( 'Light', 'pintsandcrafts' )   => 'light',
								esc_html__( 'Dark', 'pintsandcrafts' )    => 'dark'
							),
							'dependency' => array( 'element' => 'info_position', 'value' => array( 'info-on-image' ) ),
							'group'      => esc_html__( 'Product Info Style', 'pintsandcrafts' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_tag',
							'heading'    => esc_html__( 'Title Tag', 'pintsandcrafts' ),
							'value'      => array_flip( pintsandcrafts_edge_get_title_tag( true ) ),
							'dependency' => array( 'element' => 'display_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'pintsandcrafts' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_transform',
							'heading'    => esc_html__( 'Title Text Transform', 'pintsandcrafts' ),
							'value'      => array_flip( pintsandcrafts_edge_get_text_transform_array( true ) ),
							'dependency' => array( 'element' => 'display_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'pintsandcrafts' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_category',
							'heading'    => esc_html__( 'Display Category', 'pintsandcrafts' ),
							'value'      => array_flip( pintsandcrafts_edge_get_yes_no_select_array( false ) ),
							'group'      => esc_html__( 'Product Info', 'pintsandcrafts' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_content_info',
							'heading'    => esc_html__( 'Display Content Info', 'pintsandcrafts' ),
							'value'      => array_flip( pintsandcrafts_edge_get_yes_no_select_array( false ) ),
							'group'      => esc_html__( 'Product Info', 'pintsandcrafts' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_excerpt',
							'heading'    => esc_html__( 'Display Excerpt', 'pintsandcrafts' ),
							'value'      => array_flip( pintsandcrafts_edge_get_yes_no_select_array( false ) ),
							'group'      => esc_html__( 'Product Info', 'pintsandcrafts' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'excerpt_length',
							'heading'     => esc_html__( 'Excerpt Length', 'pintsandcrafts' ),
							'description' => esc_html__( 'Number of characters', 'pintsandcrafts' ),
							'dependency'  => array( 'element' => 'display_excerpt', 'value' => array( 'yes' ) ),
							'group'       => esc_html__( 'Product Info Style', 'pintsandcrafts' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_rating',
							'heading'    => esc_html__( 'Display Rating', 'pintsandcrafts' ),
							'value'      => array_flip( pintsandcrafts_edge_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'pintsandcrafts' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_price',
							'heading'    => esc_html__( 'Display Price', 'pintsandcrafts' ),
							'value'      => array_flip( pintsandcrafts_edge_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'pintsandcrafts' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_button',
							'heading'    => esc_html__( 'Display Button', 'pintsandcrafts' ),
							'value'      => array_flip( pintsandcrafts_edge_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'pintsandcrafts' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'button_skin',
							'heading'    => esc_html__( 'Button Skin', 'pintsandcrafts' ),
							'value'      => array(
								esc_html__( 'Default', 'pintsandcrafts' ) => 'default',
								esc_html__( 'Light', 'pintsandcrafts' )   => 'light',
							),
							'dependency' => array( 'element' => 'display_button', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'pintsandcrafts' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'shader_background_color',
							'heading'    => esc_html__( 'Shader Background Color', 'pintsandcrafts' ),
							'group'      => esc_html__( 'Product Info Style', 'pintsandcrafts' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'info_bottom_text_align',
							'heading'    => esc_html__( 'Product Info Text Alignment', 'pintsandcrafts' ),
							'value'      => array(
								esc_html__( 'Default', 'pintsandcrafts' ) => '',
								esc_html__( 'Left', 'pintsandcrafts' )    => 'left',
								esc_html__( 'Center', 'pintsandcrafts' )  => 'center',
								esc_html__( 'Right', 'pintsandcrafts' )   => 'right'
							),
							'dependency' => array( 'element' => 'info_position', 'value'   => array( 'info-below-image' ) ),
							'group'      => esc_html__( 'Product Info Style', 'pintsandcrafts' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'info_bottom_margin',
							'heading'    => esc_html__( 'Product Info Bottom Margin (px)', 'pintsandcrafts' ),
							'dependency' => array( 'element' => 'info_position', 'value'   => array( 'info-below-image' ) ),
							'group'      => esc_html__( 'Product Info Style', 'pintsandcrafts' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'type'                    => 'standard',
			'info_position'           => 'info-on-image',
			'number_of_posts'         => '8',
			'number_of_columns'       => '4',
			'space_between_items'     => 'normal',
			'orderby'                 => 'date',
			'order'                   => 'ASC',
			'taxonomy_to_display'     => 'category',
			'taxonomy_values'         => '',
			'image_size'              => 'full',
			'display_title'           => 'yes',
			'product_info_skin'       => '',
			'title_tag'               => 'h5',
			'title_transform'         => '',
			'display_category'        => 'no',
			'display_content_info'    => 'no',
			'display_excerpt'         => 'no',
			'excerpt_length'          => '20',
			'display_rating'          => 'yes',
			'display_price'           => 'yes',
			'display_button'          => 'yes',
			'button_skin'             => 'default',
			'shader_background_color' => '',
			'info_bottom_text_align'  => '',
			'info_bottom_margin'      => ''
		);
		$params       = shortcode_atts( $default_atts, $atts );
		
		$params['class_name']     = 'pli';
		$params['type']           = ! empty( $params['type'] ) ? $params['type'] : $default_atts['type'];
		$params['info_position']  = ! empty( $params['info_position'] ) ? $params['info_position'] : $default_atts['info_position'];
		$params['title_tag']      = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $default_atts['title_tag'];
		
		$additional_params                   = array();
		$additional_params['holder_classes'] = $this->getHolderClasses( $params, $default_atts );
		
		$queryArray                        = $this->generateProductQueryArray( $params );
		$query_result                      = new \WP_Query( $queryArray );
		$additional_params['query_result'] = $query_result;
		
		$params['this_object'] = $this;
		
		$html = pintsandcrafts_edge_get_woo_shortcode_module_template_part( 'templates/product-list', 'product-list', $params['type'], $params, $additional_params );
		
		return $html;
	}
	
	private function getHolderClasses( $params, $default_atts ) {
		$holderClasses   = array();
		$holderClasses[] = ! empty( $params['type'] ) ? 'edgtf-' . $params['type'] . '-layout' : 'edgtf-' . $default_atts['type'] . '-layout';
		$holderClasses[] = ! empty( $params['space_between_items'] ) ? 'edgtf-' . $params['space_between_items'] . '-space' : 'edgtf-' . $default_atts['space_between_items'] . '-space';
		$holderClasses[] = $this->getColumnNumberClass( $params );
		$holderClasses[] = ! empty( $params['info_position'] ) ? 'edgtf-' . $params['info_position'] : 'edgtf-' . $default_atts['info_position'];
		$holderClasses[] = ! empty( $params['product_info_skin'] ) ? 'edgtf-product-info-' . $params['product_info_skin'] : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getColumnNumberClass( $params ) {
		$columnsNumber = '';
		$columns       = $params['number_of_columns'];
		
		switch ( $columns ) {
			case 1:
				$columnsNumber = 'edgtf-one-column';
				break;
			case 2:
				$columnsNumber = 'edgtf-two-columns';
				break;
			case 3:
				$columnsNumber = 'edgtf-three-columns';
				break;
			case 4:
				$columnsNumber = 'edgtf-four-columns';
				break;
			case 5:
				$columnsNumber = 'edgtf-five-columns';
				break;
			case 6:
				$columnsNumber = 'edgtf-six-columns';
				break;
			default:
				$columnsNumber = 'edgtf-four-columns';
				break;
		}
		
		return $columnsNumber;
	}
	
	private function generateProductQueryArray( $params ) {
		$queryArray = array(
			'post_status'         => 'publish',
			'post_type'           => 'product',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $params['number_of_posts'],
			'orderby'             => $params['orderby'],
			'order'               => $params['order']
		);
		
		if ( $params['orderby'] === 'on-sale' ) {
			$queryArray['no_found_rows'] = 1;
			$queryArray['post__in']      = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'category' ) {
			$queryArray['product_cat'] = $params['taxonomy_values'];
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'tag' ) {
			$queryArray['product_tag'] = $params['taxonomy_values'];
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'id' ) {
			$idArray                = $params['taxonomy_values'];
			$ids                    = explode( ',', $idArray );
			$queryArray['post__in'] = $ids;
		}
		
		return $queryArray;
	}
	
	public function getItemClasses( $params ) {
		$itemClasses = array();
		
		$image_size_meta = get_post_meta( get_the_ID(), 'edgtf_product_featured_image_size', true );
        $hover_image_meta = get_post_meta(get_the_ID(), 'edgtf_product_hover_featured_image_meta', true);

		if ( ! empty( $image_size_meta ) ) {
			$itemClasses[] = $image_size_meta;
		}

        if (!empty($hover_image_meta)) {
            $itemClasses[] = 'edgtf-has-hover-image';
        }

		return implode( ' ', $itemClasses );
	}
	
	public function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['title_transform'];
		}
		
		return implode( ';', $styles );
	}
	
	public function getShaderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['shader_background_color'] ) ) {
			$styles[] = 'background-color: ' . $params['shader_background_color'];
		}
		
		return implode( ';', $styles );
	}
	
	public function getTextWrapperStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['info_bottom_text_align'] ) ) {
			$styles[] = 'text-align: ' . $params['info_bottom_text_align'];
		}
		
		if ( $params['info_bottom_margin'] !== '' ) {
			$styles[] = 'margin-bottom: ' . pintsandcrafts_edge_filter_px( $params['info_bottom_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}
}