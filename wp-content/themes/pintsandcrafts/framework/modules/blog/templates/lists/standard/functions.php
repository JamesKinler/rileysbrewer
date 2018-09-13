<?php

if ( ! function_exists( 'pintsandcrafts_edge_register_blog_standard_template_file' ) ) {
	/**
	 * Function that register blog standard template
	 */
	function pintsandcrafts_edge_register_blog_standard_template_file( $templates ) {
		$templates['blog-standard'] = esc_html__( 'Blog: Standard', 'pintsandcrafts' );
		
		return $templates;
	}
	
	add_filter( 'pintsandcrafts_edge_filter_register_blog_templates', 'pintsandcrafts_edge_register_blog_standard_template_file' );
}

if ( ! function_exists( 'pintsandcrafts_edge_set_blog_standard_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function pintsandcrafts_edge_set_blog_standard_type_global_option( $options ) {
		$options['standard'] = esc_html__( 'Blog: Standard', 'pintsandcrafts' );
		
		return $options;
	}
	
	add_filter( 'pintsandcrafts_edge_filter_blog_list_type_global_option', 'pintsandcrafts_edge_set_blog_standard_type_global_option' );
}