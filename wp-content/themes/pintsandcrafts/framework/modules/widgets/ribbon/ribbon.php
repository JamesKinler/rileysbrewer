<?php

class PintsAndCraftsPhpClassRibbonOpener extends PintsAndCraftsPhpClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_ribbon_opener',
			esc_html__( 'Edge Ribbon Opener', 'pintsandcrafts' ),
			array( 'description' => esc_html__( 'Display a "search" icon that opens the search form', 'pintsandcrafts' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {

		$search_icon_params = array(
			array(
				'type'        => 'textfield',
				'name'        => 'title',
				'title'       => esc_html__( 'Widget Title', 'pintsandcrafts' ),
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'last_color',
				'title'       => esc_html__( 'Last Word Color', 'pintsandcrafts' ),
				'description' => esc_html__( 'Define color for the last word in title. Default is #fff', 'pintsandcrafts' )
			),
		);

		$search_icon_pack_params = array(
			array(
				'type'        => 'textfield',
				'name'        => 'search_icon_size',
				'title'       => esc_html__( 'Icon Size (px)', 'pintsandcrafts' ),
				'description' => esc_html__( 'Define size for search icon', 'pintsandcrafts' )
			)
		);

		if ( pintsandcrafts_edge_options()->getOptionValue( 'search_icon_pack' ) == 'icon_pack' ) {
			$this->params = array_merge( $search_icon_pack_params, $search_icon_params );
		} else {
			$this->params = $search_icon_params;
		}

	}
	
	public function widget( $args, $instance ) {
		$title      = isset( $instance['title'] ) ? $instance['title'] : '';
		$last_color = isset( $instance['last_color'] ) ? $instance['last_color'] : '';


		$mod_title = explode(' ', $title);
		$length = count($mod_title);

		if ( is_array($mod_title) && ! empty($mod_title) ) {
			$mod_title[$length-1] = '<span style="color: '. ( ! empty( $last_color ) ? esc_attr($last_color) : '#fff' ) .'">' . $mod_title[$length-1] . '</span>';
		}

		$mod_title = implode(' ', $mod_title);
		?>
		
		<div class="edgtf-ribbon">
			<div class="edgtf-ribbon-opener">
				<?php if ( ! empty( $mod_title ) ) { ?>
				<h5 class="edgtf-ribbon-title"><?php echo wp_kses($mod_title, array(
						'span' => array(
							'style' => true
						)
				)); ?></h5>
				<?php } ?>
			</div>
			<div class="edgtf-ribbon-content">
				<?php dynamic_sidebar('ribbon'); ?>
			</div>
		</div>
	<?php }
}