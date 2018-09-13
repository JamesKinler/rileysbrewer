<?php

if ( ! function_exists( 'pintsandcrafts_edge_set_search_slide_from_wt_global_option' ) ) {
    /**
     * This function set search type value for search options map
     */
    function pintsandcrafts_edge_set_search_slide_from_wt_global_option( $search_type_options ) {
        $search_type_options['slide-from-window-top'] = esc_html__( 'Slide From Window Top', 'pintsandcrafts' );

        return $search_type_options;
    }

    add_filter( 'pintsandcrafts_edge_filter_search_type_global_option', 'pintsandcrafts_edge_set_search_slide_from_wt_global_option' );
}