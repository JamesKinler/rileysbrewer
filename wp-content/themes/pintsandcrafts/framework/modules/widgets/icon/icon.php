<?php

class PintsAndCraftsPhpClassIconWidget extends PintsAndCraftsPhpClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_icon_widget',
			esc_html__( 'Edge Icon Widget', 'pintsandcrafts' ),
			array( 'description' => esc_html__( 'Add icons to widget areas', 'pintsandcrafts' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array_merge(
			pintsandcrafts_edge_icon_collections()->getIconWidgetParamsArray(),
			array(
				array(
					'type'  => 'textfield',
					'name'  => 'icon_text',
					'title' => esc_html__( 'Icon Text', 'pintsandcrafts' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'link',
					'title' => esc_html__( 'Link', 'pintsandcrafts' )
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'target',
					'title'   => esc_html__( 'Target', 'pintsandcrafts' ),
					'options' => pintsandcrafts_edge_get_link_target_array()
				),
				array(
					'type'  => 'textfield',
					'name'  => 'icon_size',
					'title' => esc_html__( 'Icon Size (px)', 'pintsandcrafts' )
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'icon_color',
					'title' => esc_html__( 'Icon Color', 'pintsandcrafts' )
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'icon_hover_color',
					'title' => esc_html__( 'Icon Hover Color', 'pintsandcrafts' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'text_size',
					'title' => esc_html__( 'Text Size (px)', 'pintsandcrafts' )
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'text_color',
					'title' => esc_html__( 'Text Color', 'pintsandcrafts' )
				),
				array(
					'type'        => 'textfield',
					'name'        => 'icon_margin',
					'title'       => esc_html__( 'Margin', 'pintsandcrafts' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'pintsandcrafts' )
				)
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$holder_classes = array( 'edgtf-icon-widget-holder' );
		if ( ! empty( $instance['icon_hover_color'] ) ) {
			$holder_classes[] = 'edgtf-icon-has-hover';
		}
		
		$data   = array();
		$data[] = ! empty( $instance['icon_hover_color'] ) ? pintsandcrafts_edge_get_inline_attr( $instance['icon_hover_color'], 'data-hover-color' ) : '';
		$data   = implode( ' ', $data );
		
		$holder_styles = array();
		if ( $instance['icon_margin'] !== '' ) {
			$holder_styles[] = 'margin: ' . $instance['icon_margin'];
		}
		
		$icon_styles = array();
		if ( ! empty( $instance['icon_size'] ) ) {
			$icon_styles[] = 'font-size: ' . pintsandcrafts_edge_filter_px( $instance['icon_size'] ) . 'px';
		}
		if ( ! empty( $instance['icon_color'] ) ) {
			$icon_styles[] = 'color: ' . $instance['icon_color'];
		}
		
		$text_styles = array();
		if ( ! empty( $instance['text_size'] ) ) {
			$text_styles[] = 'font-size: ' . pintsandcrafts_edge_filter_px( $instance['text_size'] ) . 'px';
		}
		if ( ! empty( $instance['text_color'] ) ) {
			$text_styles[] = 'color: ' . $instance['text_color'];
		}
		
		$link   = ! empty( $instance['link'] ) ? $instance['link'] : '#';
		$target = ! empty( $instance['target'] ) ? $instance['target'] : '_self';
		
		$icon_holder_html = '';
		if ( ! empty( $instance['icon_pack'] ) ) {
			$icon_class   = array();
			$icon_class[] = ! empty( $instance['fa_icon'] ) && $instance['icon_pack'] === 'font_awesome' ? 'fa ' . $instance['fa_icon'] : '';
			$icon_class[] = ! empty( $instance['fe_icon'] ) && $instance['icon_pack'] === 'font_elegant' ? $instance['fe_icon'] : '';
			$icon_class[] = ! empty( $instance['ion_icon'] ) && $instance['icon_pack'] === 'ion_icons' ? $instance['ion_icon'] : '';
			
			$icon_class = array_filter( $icon_class, function ( $value ) {
				return $value !== '';
			} );
			
			if ( ! empty( $icon_class ) ) {
				$icon_class = implode( ' ', $icon_class );
				
				$icon_holder_html = '<span class="edgtf-icon-element ' . esc_attr( $icon_class ) . '" ' . pintsandcrafts_edge_get_inline_style( $icon_styles ) . '></span>';
			}
		}
		
		$icon_text_html  = '';
		$icon_text_class = ! empty( $icon_holder_html ) ? '' : 'edgtf-no-icon';
		if ( ! empty( $instance['icon_text'] ) ) {
			$icon_text_html = '<span class="edgtf-icon-text ' . esc_attr( $icon_text_class ) . '" ' . pintsandcrafts_edge_get_inline_style( $text_styles ) . '>' . esc_html( $instance['icon_text'] ) . '</span>';
		}
		?>
		
		<a <?php pintsandcrafts_edge_class_attribute( $holder_classes ); ?> <?php echo wp_kses_post( $data ); ?> href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ); ?>" <?php echo pintsandcrafts_edge_get_inline_style( $holder_styles ); ?>>
			<?php echo wp_kses( $icon_holder_html, array(
				'span' => array(
					'class' => true,
					'style' => true
				)
			) ); ?>
			<?php echo wp_kses( $icon_text_html, array(
				'span' => array(
					'class' => true,
					'style' => true
				)
			) ); ?>
		</a>
		<?php
	}
}