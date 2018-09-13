<?php

class PintsAndCraftsPhpClassButtonWidget extends PintsAndCraftsPhpClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_button_widget',
			esc_html__( 'Edge Button Widget', 'pintsandcrafts' ),
			array( 'description' => esc_html__( 'Add button element to widget areas', 'pintsandcrafts' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Type', 'pintsandcrafts' ),
				'options' => array(
					'solid'   => esc_html__( 'Solid', 'pintsandcrafts' ),
					'outline' => esc_html__( 'Outline', 'pintsandcrafts' ),
					'simple'  => esc_html__( 'Simple', 'pintsandcrafts' )
				)
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'size',
				'title'       => esc_html__( 'Size', 'pintsandcrafts' ),
				'options'     => array(
					'small'  => esc_html__( 'Small', 'pintsandcrafts' ),
					'medium' => esc_html__( 'Medium', 'pintsandcrafts' ),
					'large'  => esc_html__( 'Large', 'pintsandcrafts' ),
					'huge'   => esc_html__( 'Huge', 'pintsandcrafts' )
				),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'pintsandcrafts' )
			),
			array(
				'type'    => 'textfield',
				'name'    => 'text',
				'title'   => esc_html__( 'Text', 'pintsandcrafts' ),
				'default' => esc_html__( 'Button Text', 'pintsandcrafts' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'link',
				'title' => esc_html__( 'Link', 'pintsandcrafts' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'target',
				'title'   => esc_html__( 'Link Target', 'pintsandcrafts' ),
				'options' => pintsandcrafts_edge_get_link_target_array()
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'pintsandcrafts' )
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'hover_color',
				'title' => esc_html__( 'Hover Color', 'pintsandcrafts' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'background_color',
				'title'       => esc_html__( 'Background Color', 'pintsandcrafts' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'pintsandcrafts' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_background_color',
				'title'       => esc_html__( 'Hover Background Color', 'pintsandcrafts' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'pintsandcrafts' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'border_color',
				'title'       => esc_html__( 'Border Color', 'pintsandcrafts' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'pintsandcrafts' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_border_color',
				'title'       => esc_html__( 'Hover Border Color', 'pintsandcrafts' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'pintsandcrafts' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'font_s',
				'title' => esc_html__( 'Font Size (px)', 'pintsandcrafts' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'margin',
				'title'       => esc_html__( 'Margin', 'pintsandcrafts' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'pintsandcrafts' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$params = '';
		
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		// Filter out all empty params
		$instance = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );
		
		// Default values
		if ( ! isset( $instance['text'] ) ) {
			$instance['text'] = esc_html__( 'Button Text', 'pintsandcrafts' );
		}

        // Default values
        if (isset($instance['font_s']) && !empty($instance['font_s'])) {
            $instance['font_size'] = $instance['font_s'];
        }
		
		// Generate shortcode params
		foreach ( $instance as $key => $value ) {
			$params .= " $key='$value' ";
		}
		
		echo '<div class="widget edgtf-button-widget">';
			echo do_shortcode( "[edgtf_button $params]" ); // XSS OK
		echo '</div>';
	}
}