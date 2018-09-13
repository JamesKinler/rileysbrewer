<?php
namespace PintsAndCraftsCore\CPT\Shortcodes\PricingList;

use PintsAndCraftsCore\Lib;

class PricingList implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'pintsandcrafts_pricing_list';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map(
			array(
				'name'                    => esc_html__( 'Pricing list', 'pintsandcrafts-core' ),
				'base'                    => $this->base,
				'as_parent'               => array( 'only' => 'pintsandcrafts_pricing_list_item' ),
				'content_element'         => true,
				'category'                => esc_html__( 'by PintsAndCrafts', 'pintsandcrafts-core' ),
				'icon'                    => 'icon-wpb-pricing-list extended-custom-icon',
				'show_settings_on_create' => true,
				'js_view'                 => 'VcColumnView',
				'params'                  => array(
					array(
						'type'        => 'dropdown',
						'param_name'  => 'item_space',
						'heading'     => esc_html__('Space between items', 'pintsandcrafts-core'),
						'value'       => array(
							esc_html__( 'Normal', 'pintsandcrafts-core' ) => 'pintsandcrafts-pli-normal-space',
							esc_html__( 'Large', 'pintsandcrafts-core' )  => 'pintsandcrafts-pli-large-space'
						),
						'save_always' => true
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'button_text',
						'heading'     => esc_html__('Button Text', 'pintsandcrafts-core'),
					),
					array(
						'type'       => 'textfield',
						'param_name' => 'link',
						'heading'    => esc_html__('Button Link', 'pintsandcrafts-core'),
						'dependency'  => array('element' => 'button_text', 'not_empty' => true)
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'target',
						'heading'     => esc_html__('Link Target', 'pintsandcrafts-core'),
						'value'       => array_flip(pintsandcrafts_edge_get_link_target_array()),
						'dependency'  => array('element' => 'link', 'not_empty' => true)
					),
				)
			)
		);
	}

	public function render($atts, $content = null) {
		$args = array(
			'item_space'        => 'pintsandcrafts-pli-normal-space',
			'button_text'       => '',
			'link'              => '',
			'target'            => '_self',
		);

		$params = shortcode_atts($args, $atts);

		$params['title_holder_styles'] = $this->getTitleHolderStyles($params);
		$params['content']             = $content;
		
		$html = pintsandcrafts_core_get_shortcode_module_template_part('templates/pricing-list', 'pricing-list', '', $params);

		return $html;
	}

	private function getTitleHolderStyles($params) {
		$styles = array();

		if(!empty($params['title_align'])) {
			$styles[] = 'text-align: '. $params['title_align'];
		}

		return implode( ';', $styles );
	}
}