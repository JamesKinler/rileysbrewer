<?php

class PintsAndCraftsPhpClassSideAreaOpener extends PintsAndCraftsPhpClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_side_area_opener',
			esc_html__( 'Edge Side Area Opener', 'pintsandcrafts' ),
			array( 'description' => esc_html__( 'Display a "hamburger" icon that opens the side area', 'pintsandcrafts' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'        => 'colorpicker',
				'name'        => 'icon_color',
				'title'       => esc_html__( 'Side Area Opener Color', 'pintsandcrafts' ),
				'description' => esc_html__( 'Define color for side area opener', 'pintsandcrafts' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'icon_hover_color',
				'title'       => esc_html__( 'Side Area Opener Hover Color', 'pintsandcrafts' ),
				'description' => esc_html__( 'Define hover color for side area opener', 'pintsandcrafts' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'widget_margin',
				'title'       => esc_html__( 'Side Area Opener Margin', 'pintsandcrafts' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'pintsandcrafts' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'widget_title',
				'title' => esc_html__( 'Side Area Opener Title', 'pintsandcrafts' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$side_area_icon_class_array = array(
			'edgtf-side-menu-button-opener',
			'edgtf-icon-has-hover',
			'edgtf-side-menu-button-opener-icon-pack'
		);

		$holder_styles = array();
		
		if ( ! empty( $instance['icon_color'] ) ) {
			$holder_styles[] = 'color: ' . $instance['icon_color'] . ';';
		}
		if ( ! empty( $instance['widget_margin'] ) ) {
			$holder_styles[] = 'margin: ' . $instance['widget_margin'];
		}

		?>
		
		<a <?php pintsandcrafts_edge_class_attribute( $side_area_icon_class_array ); ?> <?php echo pintsandcrafts_edge_get_inline_attr( $instance['icon_hover_color'], 'data-hover-color' ); ?> href="javascript:void(0)" <?php pintsandcrafts_edge_inline_style( $holder_styles ); ?>>
			<?php if ( ! empty( $instance['widget_title'] ) ) { ?>
				<h5 class="edgtf-side-menu-title"><?php echo esc_html( $instance['widget_title'] ); ?></h5>
			<?php } ?>
			<span class="edgtf-fm-lines">
				<span class="edgtf-fm-line edgtf-line-1"></span>
				<span class="edgtf-fm-line edgtf-line-2"></span>
				<span class="edgtf-fm-line edgtf-line-3"></span>
			</span>
		</a>
	<?php }
}