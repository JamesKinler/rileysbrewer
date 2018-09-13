<?php

class PintsAndCraftsPhpClassImageGalleryWidget extends PintsAndCraftsPhpClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_image_gallery_widget',
			esc_html__( 'Edge Image Gallery Widget', 'pintsandcrafts' ),
			array( 'description' => esc_html__( 'Add image gallery element to widget areas', 'pintsandcrafts' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'  => 'textfield',
				'name'  => 'extra_class',
				'title' => esc_html__( 'Custom CSS Class', 'pintsandcrafts' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'widget_title',
				'title' => esc_html__( 'Widget Title', 'pintsandcrafts' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Gallery Type', 'pintsandcrafts' ),
				'options' => array(
					'grid'   => esc_html__( 'Image Grid', 'pintsandcrafts' ),
					'slider' => esc_html__( 'Slider', 'pintsandcrafts' )
				)
			),
			array(
				'type'        => 'textfield',
				'name'        => 'images',
				'title'       => esc_html__( 'Image ID\'s', 'pintsandcrafts' ),
				'description' => esc_html__( 'Add images id for your image gallery widget, separate id\'s with comma', 'pintsandcrafts' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'image_size',
				'title'       => esc_html__( 'Image Size', 'pintsandcrafts' ),
				'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size', 'pintsandcrafts' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'enable_image_shadow',
				'title'   => esc_html__( 'Enable Image Shadow', 'pintsandcrafts' ),
				'options' => pintsandcrafts_edge_get_yes_no_select_array()
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'image_behavior',
				'title'   => esc_html__( 'Image Behavior', 'pintsandcrafts' ),
				'options' => array(
					''            => esc_html__( 'None', 'pintsandcrafts' ),
					'lightbox'    => esc_html__( 'Open Lightbox', 'pintsandcrafts' ),
					'custom-link' => esc_html__( 'Open Custom Link', 'pintsandcrafts' ),
					'zoom'        => esc_html__( 'Zoom', 'pintsandcrafts' ),
					'grayscale'   => esc_html__( 'Grayscale', 'pintsandcrafts' )
				)
			),
			array(
				'type'        => 'textarea',
				'name'        => 'custom_links',
				'title'       => esc_html__( 'Custom Links', 'pintsandcrafts' ),
				'description' => esc_html__( 'Delimit links by comma', 'pintsandcrafts' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'custom_link_target',
				'title'   => esc_html__( 'Custom Link Target', 'pintsandcrafts' ),
				'options' => pintsandcrafts_edge_get_link_target_array()
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'number_of_columns',
				'title'   => esc_html__( 'Number of Columns', 'pintsandcrafts' ),
				'options' => array(
					'two'   => esc_html__( 'Two', 'pintsandcrafts' ),
					'three' => esc_html__( 'Three', 'pintsandcrafts' ),
					'four'  => esc_html__( 'Four', 'pintsandcrafts' ),
					'five'  => esc_html__( 'Five', 'pintsandcrafts' ),
					'six'   => esc_html__( 'Six', 'pintsandcrafts' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'space_between_columns',
				'title'   => esc_html__( 'Space Between Items', 'pintsandcrafts' ),
				'options' => pintsandcrafts_edge_get_space_between_items_array()
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'slider_navigation',
				'title'   => esc_html__( 'Enable Slider Navigation Arrows', 'pintsandcrafts' ),
				'options' => pintsandcrafts_edge_get_yes_no_select_array( false )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'slider_pagination',
				'title'   => esc_html__( 'Enable Slider Pagination', 'pintsandcrafts' ),
				'options' => pintsandcrafts_edge_get_yes_no_select_array( false )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		$extra_class      = ! empty( $instance['extra_class'] ) ? $instance['extra_class'] : '';
		$instance['type'] = ! empty( $instance['type'] ) ? $instance['type'] : 'grid';
		
		//prepare variables
		$params = '';
		
		//is instance empty?
		if ( is_array( $instance ) && count( $instance ) ) {
			//generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
		}
		?>
		
		<div class="widget edgtf-image-gallery-widget <?php echo esc_html( $extra_class ); ?>">
			<?php
			if ( ! empty( $instance['widget_title'] ) ) {
				echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
			}
			echo do_shortcode( "[edgtf_image_gallery $params]" ); // XSS OK
			?>
		</div>
		<?php
	}
}