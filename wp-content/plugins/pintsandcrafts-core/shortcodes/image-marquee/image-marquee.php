<?php
namespace PintsAndCraftsCore\CPT\Shortcodes\ImageMarquee;

use PintsAndCraftsCore\Lib;

class ImageMarquee implements Lib\ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'edgtf_image_marquee';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Image Marquee', 'pintsandcrafts-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by PintsAndCrafts', 'pintsandcrafts-core' ),
					'icon'                      => 'icon-wpb-image-marquee extended-custom-icon',
					'params'                    => array(
							array(
							'type'        => 'attach_image',
							'param_name'  => 'image',
							'heading'     => esc_html__( 'Image', 'pintsandcrafts-core' ),
							'description' => esc_html__( 'Select Image from Image Gallery', 'pintsandcrafts-core' )
						)
					)
				)
			);
		}
	}

	public function render( $atts, $content = null ) {
		$args   = array(
			'image' => ''
		);
		$params = shortcode_atts( $args, $atts );

		$html = pintsandcrafts_core_get_shortcode_module_template_part( 'templates/image-marquee-template', 'image-marquee', '', $params );

		return $html;
	}
}