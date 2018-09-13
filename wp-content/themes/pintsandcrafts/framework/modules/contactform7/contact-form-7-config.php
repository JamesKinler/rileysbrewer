<?php

if ( ! function_exists('pintsandcrafts_edge_contact_form_map') ) {
	/**
	 * Map Contact Form 7 shortcode
	 * Hooks on vc_after_init action
	 */
	function pintsandcrafts_edge_contact_form_map() {
		vc_add_param('contact-form-7', array(
			'type' => 'dropdown',
			'heading' => esc_html__('Style', 'pintsandcrafts'),
			'param_name' => 'html_class',
			'value' => array(
				esc_html__('Default', 'pintsandcrafts') => 'default',
				esc_html__('Custom Style 1', 'pintsandcrafts') => 'cf7_custom_style_1',
				esc_html__('Custom Style 2', 'pintsandcrafts') => 'cf7_custom_style_2',
				esc_html__('Custom Style 3', 'pintsandcrafts') => 'cf7_custom_style_3'
			),
			'description' => esc_html__('You can style each form element individually in Edge Options > Contact Form 7', 'pintsandcrafts')
		));
	}
	
	add_action('vc_after_init', 'pintsandcrafts_edge_contact_form_map');
}