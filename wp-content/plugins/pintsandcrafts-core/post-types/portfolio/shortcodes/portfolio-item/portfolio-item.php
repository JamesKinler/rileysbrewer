<?php

namespace PintsAndCraftsCore\CPT\Shortcodes\Portfolio;

use PintsAndCraftsCore\Lib;

class PortfolioItem implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'edgtf_portfolio_item';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
		
		//Portfolio project id filter
		add_filter( 'vc_autocomplete_edgtf_portfolio_item_project_id_callback', array( &$this, 'portfolioIdAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array
		
		//Portfolio project id render
		add_filter( 'vc_autocomplete_edgtf_portfolio_item_project_id_render', array( &$this, 'portfolioIdAutocompleteRender', ), 10, 1 ); // Render exact portfolio. Must return an array (label,value)
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'     => esc_html__( 'Portfolio Item', 'pintsandcrafts-core' ),
					'base'     => $this->getBase(),
					'category' => esc_html__( 'by PintsAndCrafts', 'pintsandcrafts-core' ),
					'icon'     => 'icon-wpb-portfolio-item extended-custom-icon',
					'params'   => array(
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'project_id',
							'heading'     => esc_html__( 'Selected Project', 'pintsandcrafts-core' ),
							'settings'    => array(
								'sortable'      => true,
								'unique_values' => true
							),
							'description' => esc_html__( 'If you left this field empty then project ID will be of the current page', 'pintsandcrafts-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Project Title Tag', 'pintsandcrafts-core' ),
							'value'       => array_flip( pintsandcrafts_edge_get_title_tag( true, array( 'p' => 'p' ) ) ),
							'description' => esc_html__( 'Set title tag for project title element', 'pintsandcrafts-core' ),
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'custom_size',
							'heading'     => esc_html__( 'Use Custom Title Size', 'pintsandcrafts-core' ),
							'value'       => array_flip( pintsandcrafts_edge_get_yes_no_select_array( false ) ),
							'description' => esc_html__( 'Use our custom size for title', 'pintsandcrafts-core' ),
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'disable_featured_image',
							'heading'     => esc_html__( 'Disable Featured Image', 'pintsandcrafts-core' ),
							'value'       => array_flip( pintsandcrafts_edge_get_yes_no_select_array( false ) )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'offset',
							'heading'     => esc_html__( 'Enable Image Offset', 'pintsandcrafts-core' ),
							'value'       => array_flip( pintsandcrafts_edge_get_yes_no_select_array( false ) ),
							'description' => esc_html__( 'If enabled image will go over a description with a slight offset', 'pintsandcrafts-core' ),
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'project_id'             => '',
			'title_tag'              => 'h4',
			'custom_size'            => 'no',
			'disable_featured_image' => 'no',
			'offset'                 => 'no'
		);
		$params = shortcode_atts( $args, $atts );

		$params['project_id']      = ! empty( $params['project_id'] ) ? $params['project_id'] : get_the_ID();
		$params['title_tag']       = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];
		$params['holder_classes']  = $this->getHolderClasses( $params );

		$html = pintsandcrafts_core_get_cpt_shortcode_module_template_part( 'portfolio', 'portfolio-item', 'portfolio-item', '', $params );

		return $html;
	}

	public function getHolderClasses( $params ) {
		$classes = array();

		$classes[] = $params['custom_size'] === 'yes' ? 'edgtf-pcl-custom-size' : '';
		$classes[] = $params['disable_featured_image'] === 'yes' ? 'edgtf-pcl-no-image' : '';
		$classes[] = $params['offset'] === 'yes' ? 'edgtf-pcl-image-offset' : '';

		return implode( ' ', $classes );
	}

	
	/**
	 * Filter portfolios by ID or Title
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioIdAutocompleteSuggester( $query ) {
		global $wpdb;
		$portfolio_id    = (int) $query;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT ID AS id, post_title AS title
					FROM {$wpdb->posts}
					WHERE post_type = 'portfolio-item' AND ( ID = '%d' OR post_title LIKE '%%%s%%' )", $portfolio_id > 0 ? $portfolio_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );
		
		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['id'];
				$data['label'] = esc_html__( 'Id', 'pintsandcrafts-core' ) . ': ' . $value['id'] . ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . esc_html__( 'Title', 'pintsandcrafts-core' ) . ': ' . $value['title'] : '' );
				$results[]     = $data;
			}
		}
		
		return $results;
	}
	
	/**
	 * Find portfolio by id
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function portfolioIdAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio
			$portfolio = get_post( (int) $query );
			if ( ! is_wp_error( $portfolio ) ) {
				
				$portfolio_id    = $portfolio->ID;
				$portfolio_title = $portfolio->post_title;
				
				$portfolio_title_display = '';
				if ( ! empty( $portfolio_title ) ) {
					$portfolio_title_display = ' - ' . esc_html__( 'Title', 'pintsandcrafts-core' ) . ': ' . $portfolio_title;
				}
				
				$portfolio_id_display = esc_html__( 'Id', 'pintsandcrafts-core' ) . ': ' . $portfolio_id;
				
				$data          = array();
				$data['value'] = $portfolio_id;
				$data['label'] = $portfolio_id_display . $portfolio_title_display;
				
				return ! empty( $data ) ? $data : false;
			}
			
			return false;
		}
		
		return false;
	}
}