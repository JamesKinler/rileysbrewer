<?php
namespace PintsAndCraftsCore\CPT\Shortcodes\PricingTable;

use PintsAndCraftsCore\Lib;

class PricingTable implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_pricing_table';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                    => esc_html__( 'Pricing Table', 'pintsandcrafts-core' ),
					'base'                    => $this->base,
					'as_parent'               => array( 'only' => 'edgtf_pricing_table_item' ),
					'content_element'         => true,
					'category'                => esc_html__( 'by PintsAndCrafts', 'pintsandcrafts-core' ),
					'icon'                    => 'icon-wpb-pricing-table extended-custom-icon',
					'show_settings_on_create' => true,
					'js_view'                 => 'VcColumnView',
					'params'                  => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'columns',
							'heading'     => esc_html__( 'Number of Columns', 'pintsandcrafts-core' ),
							'value'       => array(
								esc_html__( 'One', 'pintsandcrafts-core' )   => 'edgtf-one-column',
								esc_html__( 'Two', 'pintsandcrafts-core' )   => 'edgtf-two-columns',
								esc_html__( 'Three', 'pintsandcrafts-core' ) => 'edgtf-three-columns',
								esc_html__( 'Four', 'pintsandcrafts-core' )  => 'edgtf-four-columns',
								esc_html__( 'Five', 'pintsandcrafts-core' )  => 'edgtf-five-columns',
							),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'space_between_items',
							'heading'     => esc_html__( 'Space Between Items', 'pintsandcrafts-core' ),
							'value'       => array_flip( pintsandcrafts_edge_get_space_between_items_array() ),
							'save_always' => true
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'columns'             => 'edgtf-two-columns',
			'space_between_items' => 'normal'
		);
		$params = shortcode_atts( $args, $atts );
		
		$holder_class = $this->getHolderClasses( $params, $args );
		
		$html = '<div class="edgtf-pricing-tables clearfix ' . esc_attr( $holder_class ) . '">';
			$html .= '<div class="edgtf-pt-wrapper edgtf-outer-space">';
				$html .= do_shortcode( $content );
			$html .= '</div>';
		$html .= '</div>';
		
		return $html;
	}
	
	private function getHolderClasses( $params, $args ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['columns'] ) ? $params['columns'] : $args['columns'];
		$holderClasses[] = ! empty( $params['space_between_items'] ) ? 'edgtf-' . $params['space_between_items'] . '-space' : 'edgtf-' . $args['space_between_items'] . '-space';
		
		return implode( ' ', $holderClasses );
	}
}