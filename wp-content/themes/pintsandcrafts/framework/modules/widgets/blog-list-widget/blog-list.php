<?php

class PintsAndCraftsPhpClassBlogListWidget extends PintsAndCraftsPhpClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_blog_list_widget',
			esc_html__( 'Edge Blog List Widget', 'pintsandcrafts' ),
			array( 'description' => esc_html__( 'Display a list of your blog posts', 'pintsandcrafts' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'  => 'textfield',
				'name'  => 'widget_title',
				'title' => esc_html__( 'Widget Title', 'pintsandcrafts' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Type', 'pintsandcrafts' ),
				'options' => array(
					'simple'  => esc_html__( 'Simple', 'pintsandcrafts' ),
					'minimal' => esc_html__( 'Minimal', 'pintsandcrafts' )
				)
			),
			array(
				'type'  => 'textfield',
				'name'  => 'number_of_posts',
				'title' => esc_html__( 'Number of Posts', 'pintsandcrafts' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'space_between_items',
				'title'   => esc_html__( 'Space Between Items', 'pintsandcrafts' ),
				'options' => pintsandcrafts_edge_get_space_between_items_array()
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'orderby',
				'title'   => esc_html__( 'Order By', 'pintsandcrafts' ),
				'options' => pintsandcrafts_edge_get_query_order_by_array()
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'order',
				'title'   => esc_html__( 'Order', 'pintsandcrafts' ),
				'options' => pintsandcrafts_edge_get_query_order_array()
			),
			array(
				'type'        => 'textfield',
				'name'        => 'category',
				'title'       => esc_html__( 'Category Slug', 'pintsandcrafts' ),
				'description' => esc_html__( 'Leave empty for all or use comma for list', 'pintsandcrafts' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'title_tag',
				'title'   => esc_html__( 'Title Tag', 'pintsandcrafts' ),
				'options' => pintsandcrafts_edge_get_title_tag( true )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'title_transform',
				'title'   => esc_html__( 'Title Text Transform', 'pintsandcrafts' ),
				'options' => pintsandcrafts_edge_get_text_transform_array( true )
			),
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		$instance['image_size']        = 'pintsandcrafts_edge_thumb';
		$instance['post_info_section'] = 'yes';
		$instance['number_of_columns'] = '1';
		
		// Filter out all empty params
		$instance         = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );
		$instance['type'] = ! empty( $instance['type'] ) ? $instance['type'] : 'simple';
		
		$params = '';
		//generate shortcode params
		foreach ( $instance as $key => $value ) {
			$params .= " $key='$value' ";
		}
		
		echo '<div class="widget edgtf-blog-list-widget">';
			if ( ! empty( $instance['widget_title'] ) ) {
				echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
			}
			
			echo do_shortcode( "[edgtf_blog_list $params]" ); // XSS OK
		echo '</div>';
	}
}