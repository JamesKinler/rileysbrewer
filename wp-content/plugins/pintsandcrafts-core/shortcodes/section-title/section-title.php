<?php
namespace PintsAndCraftsCore\CPT\Shortcodes\SectionTitle;

use PintsAndCraftsCore\Lib;

class SectionTitle implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_section_title';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Section Title', 'pintsandcrafts-core' ),
					'base'                      => $this->base,
					'category'                  => esc_html__( 'by PintsAndCrafts', 'pintsandcrafts-core' ),
					'icon'                      => 'icon-wpb-section-title extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'pintsandcrafts-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'pintsandcrafts-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'position',
							'heading'     => esc_html__( 'Horizontal Position', 'pintsandcrafts-core' ),
							'value'       => array(
								esc_html__( 'Default', 'pintsandcrafts-core' ) => '',
								esc_html__( 'Left', 'pintsandcrafts-core' )    => 'left',
								esc_html__( 'Center', 'pintsandcrafts-core' )  => 'center',
								esc_html__( 'Right', 'pintsandcrafts-core' )   => 'right'
							),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'holder_padding',
							'heading'    => esc_html__( 'Holder Side Padding (px or %)', 'pintsandcrafts-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'subtitle',
							'heading'     => esc_html__( 'Subtitle', 'pintsandcrafts-core' ),
							'admin_label' => true
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title',
							'heading'     => esc_html__( 'Title', 'pintsandcrafts-core' ),
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'pintsandcrafts-core' ),
							'value'       => array_flip( pintsandcrafts_edge_get_title_tag( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'pintsandcrafts-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'pintsandcrafts-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true ),
							'group'      => esc_html__( 'Title Style', 'pintsandcrafts-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title_bottom_margin',
							'heading'    => esc_html__( 'Title Bottom Margin (px)', 'pintsandcrafts-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true ),
							'group'      => esc_html__( 'Title Style', 'pintsandcrafts-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'waves',
							'heading'     => esc_html__( 'Enable waves line bellow title', 'pintsandcrafts-core' ),
							'value'       => array_flip( pintsandcrafts_edge_get_yes_no_select_array( false ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'pintsandcrafts-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title_bold_words',
							'heading'     => esc_html__( 'Words with Bold Font Weight', 'pintsandcrafts-core' ),
							'description' => esc_html__( 'Enter the positions of the words you would like to display in a "bold" font weight. Separate the positions with commas (e.g. if you would like the first, second, and third word to have a light font weight, you would enter "1,2,3")', 'pintsandcrafts-core' ),
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'pintsandcrafts-core' )
						),
						array(
							'type'       => 'textarea_html',
							'param_name' => 'content',
							'heading'    => esc_html__( 'Text', 'pintsandcrafts-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_margin',
							'heading'    => esc_html__( 'Text Top Margin (px)', 'pintsandcrafts-core' ),
							'group'      => esc_html__( 'Text Style', 'pintsandcrafts-core' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'        => '',
			'columns_space'       => 'normal',
			'position'            => '',
			'holder_padding'      => '',
			'subtitle'            => '',
			'title'               => '',
			'waves'               => 'no',
			'title_tag'           => 'h2',
			'title_color'         => '',
			'title_bottom_margin' => '',
			'text'                => '',
			'text_margin'         => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes'] = $this->getHolderClasses( $params, $args );
		$params['holder_styles']  = $this->getHolderStyles( $params );
		$params['title_tag']      = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles']   = $this->getTitleStyles( $params );
		$params['text_styles']    = $this->getTextStyles( $params );
		$params['content']        = $content;
		
		$html = pintsandcrafts_core_get_shortcode_module_template_part( 'templates/section-title', 'section-title', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params, $args ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['columns_space'] ) ? 'edgtf-st-' . $params['columns_space'] . '-space' : 'edgtf-st-' . $args['columns_space'] . '-space';

		return implode( ' ', $holderClasses );
	}
	
	private function getHolderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['holder_padding'] ) ) {
			$styles[] = 'padding: 0 ' . $params['holder_padding'];
		}
		
		if ( ! empty( $params['position'] ) ) {
			$styles[] = 'text-align: ' . $params['position'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}
		
		if ( $params['title_bottom_margin'] !== '' ) {
			$styles[] = 'margin-bottom: ' . pintsandcrafts_edge_filter_px( $params['title_bottom_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}
	
	private function getTextStyles( $params ) {
		$styles = array();
		
		if ( $params['text_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . pintsandcrafts_edge_filter_px( $params['text_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}
}