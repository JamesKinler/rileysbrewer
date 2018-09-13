<?php
namespace PintsAndCraftsCore\CPT\Shortcodes\PricingListItem;

use PintsAndCraftsCore\Lib;

class PricingListItem implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'pintsandcrafts_pricing_list_item';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Pricing List Item', 'pintsandcrafts-core'),
			'base' => $this->base,
			'icon' => 'icon-wpb-pricing-list-item extended-custom-icon',
			'category' => esc_html__('by PintsAndCrafts', 'pintsandcrafts-core'),
			'allowed_container_element' => 'vc_row',
			'as_child' => array('only' => 'pintsandcrafts_pricing_list'),
			'params' => array(
				array(
					'type'        => 'attach_image',
					'param_name'  => 'image',
					'heading'     => esc_html__('Image', 'pintsandcrafts-core'),
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'title',
					'heading'     => esc_html__('Title', 'pintsandcrafts-core'),
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'title_tag',
					'heading'     => esc_html__( 'Title Tag', 'pintsandcrafts-core' ),
					'value'       => array_flip( pintsandcrafts_edge_get_title_tag( true ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'title', 'not_empty' => true )
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'description',
					'heading'     => esc_html__('Description', 'pintsandcrafts-core'),
				),
				array(
					'type'       => 'textfield',
					'param_name' => 'price',
					'heading'    => esc_html__('Price', 'pintsandcrafts-core')
				),
				array(
					'type'       => 'textfield',
					'param_name' => 'link',
					'heading'    => esc_html__('Item Link', 'pintsandcrafts-core'),
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'target',
					'heading'     => esc_html__('Link Target', 'pintsandcrafts-core'),
					'value'       => array_flip(pintsandcrafts_edge_get_link_target_array())
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'active',
					'heading'     => esc_html__('Set this item as active', 'pintsandcrafts-core'),
					'value'       => array_flip(pintsandcrafts_edge_get_yes_no_select_array(false, false))
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'transform',
					'heading'     => esc_html__('Title Transform', 'pintsandcrafts-core'),
					'value'       => array_flip(pintsandcrafts_edge_get_text_transform_array(true))
				),
				array(
					'type'       => 'colorpicker',
					'param_name' => 'color_title',
					'heading'    => esc_html__('Title Color', 'pintsandcrafts-core'),
					'group'      => 'Style'
				),
				array(
					'type'       => 'colorpicker',
					'param_name' => 'color_description',
					'heading'    => esc_html__('Description Color', 'pintsandcrafts-core'),
					'group'      => 'Style'
				),
				array(
					'type'       => 'colorpicker',
					'param_name' => 'color_price',
					'heading'    => esc_html__('Price Color', 'pintsandcrafts-core'),
					'group'      => 'Style'
				),
				array(
					'type'       => 'colorpicker',
					'param_name' => 'color_separator',
					'heading'    => esc_html__('Separator Color', 'pintsandcrafts-core'),
					'group'      => 'Style'
				),
			)
		));
	}

	public function render($atts, $content = null) {
		$args = array(
			'image'             => '',
			'title'             => '',
			'title_tag'         => 'h3',
			'description'       => '',
			'price'             => '',
			'link'              => '',
			'target'            => '_self',
			'active'            => 'no',
			'transform'         => '',
			'color_title'       => '',
			'color_description' => '',
			'color_price'       => '',
			'color_separator'   => ''
		);
		
		$params = shortcode_atts($args, $atts);
		
		$params['title_tag']        = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles']     = $this->getPricingListItemTitleStyles($params);
		$params['desc_styles']      = $this->getPricingListItemDescStyles($params);
		$params['price_styles']     = $this->getPricingListItemPriceStyles($params);
		$params['separator_styles'] = $this->getPricingListItemSeparatorStyles($params);

		extract($params);

		$html = pintsandcrafts_core_get_shortcode_module_template_part('templates/pricing-list-item', 'pricing-list', '', $params);
		
		return $html;
	}

	private function getPricingListItemTitleStyles($params) {
		$styles = array();

		if(!empty($params['color_title'])) {
			$styles[] = 'color: '.$params['color_title'];
		}

		if(!empty($params['transform'])) {
			$styles[] = 'text-transform: '.$params['transform'];
		}

		return implode( ';', $styles );
	}

	private function getPricingListItemDescStyles($params) {
		$styles = array();

		if(!empty($params['color_description'])) {
			$styles[] = 'color: '.$params['color_description'];
		}

		return implode( ';', $styles );
	}

	private function getPricingListItemPriceStyles($params) {
		$styles = array();

		if(!empty($params['color_price'])) {
			$styles[] = 'color: '.$params['color_price'];
		}

		return implode( ';', $styles );
	}

	private function getPricingListItemSeparatorStyles($params) {
		$styles = array();

		if(!empty($params['color_separator'])) {
			$styles[] = 'border-color: '.$params['color_separator'];
		}

		return implode( ';', $styles );
	}
}