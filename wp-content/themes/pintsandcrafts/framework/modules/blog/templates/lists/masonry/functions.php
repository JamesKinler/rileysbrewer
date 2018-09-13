<?php

if ( ! function_exists( 'pintsandcrafts_edge_register_blog_masonry_template_file' ) ) {
	/**
	 * Function that register blog masonry template
	 */
	function pintsandcrafts_edge_register_blog_masonry_template_file( $templates ) {
		$templates['blog-masonry'] = esc_html__( 'Blog: Masonry', 'pintsandcrafts' );
		
		return $templates;
	}
	
	add_filter( 'pintsandcrafts_edge_filter_register_blog_templates', 'pintsandcrafts_edge_register_blog_masonry_template_file' );
}

if ( ! function_exists( 'pintsandcrafts_edge_set_blog_masonry_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function pintsandcrafts_edge_set_blog_masonry_type_global_option( $options ) {
		$options['masonry'] = esc_html__( 'Blog: Masonry', 'pintsandcrafts' );
		
		return $options;
	}
	
	add_filter( 'pintsandcrafts_edge_filter_blog_list_type_global_option', 'pintsandcrafts_edge_set_blog_masonry_type_global_option' );
}