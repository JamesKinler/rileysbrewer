<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	/**
	 * pintsandcrafts_edge_action_header_meta hook
	 *
	 * @see pintsandcrafts_edge_header_meta() - hooked with 10
	 * @see pintsandcrafts_edge_user_scalable_meta - hooked with 10
	 * @see pintsandcrafts_core_set_open_graph_meta - hooked with 10
	 */
	do_action( 'pintsandcrafts_edge_action_header_meta' );
	
	wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<?php
	/**
	 * pintsandcrafts_edge_action_after_body_tag hook
	 *
	 * @see pintsandcrafts_edge_get_side_area() - hooked with 10
	 * @see pintsandcrafts_edge_smooth_page_transitions() - hooked with 10
	 */
	do_action( 'pintsandcrafts_edge_action_after_body_tag' ); ?>

    <div class="edgtf-wrapper">
        <div class="edgtf-wrapper-inner">
            <?php
            /**
             * pintsandcrafts_edge_action_after_wrapper_inner hook
             *
             * @see pintsandcrafts_edge_get_header() - hooked with 10
             * @see pintsandcrafts_edge_get_mobile_header() - hooked with 20
             * @see pintsandcrafts_edge_back_to_top_button() - hooked with 30
             * @see pintsandcrafts_edge_get_header_minimal_full_screen_menu() - hooked with 40
             * @see pintsandcrafts_edge_get_header_bottom_navigation() - hooked with 40
             */
            do_action( 'pintsandcrafts_edge_action_after_wrapper_inner' ); ?>
	        
            <div class="edgtf-content" <?php pintsandcrafts_edge_content_elem_style_attr(); ?>>
                <div class="edgtf-content-inner">