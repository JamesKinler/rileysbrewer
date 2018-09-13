<?php
if (!function_exists('pintsandcrafts_edge_register_side_area_sidebar')) {
    /**
     * Register side area sidebar
     */
    function pintsandcrafts_edge_register_side_area_sidebar() {
        register_sidebar(
            array(
                'id'            => 'sidearea',
                'name'          => esc_html__('Side Area', 'pintsandcrafts'),
                'description'   => esc_html__('Side Area', 'pintsandcrafts'),
                'before_widget' => '<div id="%1$s" class="widget edgtf-sidearea %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<div class="edgtf-widget-title-holder"><h4 class="edgtf-widget-title">',
                'after_title'   => '</h4></div>'
            )
        );
    }

    add_action('widgets_init', 'pintsandcrafts_edge_register_side_area_sidebar');
}

if (!function_exists('pintsandcrafts_edge_side_menu_body_class')) {
    /**
     * Function that adds body classes for different side menu styles
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function pintsandcrafts_edge_side_menu_body_class($classes) {

        if (is_active_widget(false, false, 'edgtf_side_area_opener')) {

            if (pintsandcrafts_edge_options()->getOptionValue('side_area_type')) {

                $classes[] = 'edgtf-' . pintsandcrafts_edge_options()->getOptionValue('side_area_type');

            }

        }

        return $classes;
    }

    add_filter('body_class', 'pintsandcrafts_edge_side_menu_body_class');
}

if (!function_exists('pintsandcrafts_edge_get_side_area')) {
    /**
     * Loads side area HTML
     */
    function pintsandcrafts_edge_get_side_area() {

        if (is_active_widget(false, false, 'edgtf_side_area_opener')) {

            $parameters = array(
                'side_area_close_icon_class' => pintsandcrafts_edge_get_side_area_close_icon_class()
            );

            pintsandcrafts_edge_get_module_template_part('templates/sidearea', 'sidearea', '', $parameters);
        }
    }

    add_action('pintsandcrafts_edge_action_after_body_tag', 'pintsandcrafts_edge_get_side_area', 10);
}

if (!function_exists('pintsandcrafts_edge_get_side_area_close_class')) {
    /**
     * Loads side area close icon class
     */
    function pintsandcrafts_edge_get_side_area_close_icon_class() {
        $side_area_close_icon_class_array = array(
            'edgtf-close-side-menu',
            'edgtf-close-side-menu-icon-pack'
        );

        return $side_area_close_icon_class_array;
    }
}

if (!function_exists('pintsandcrafts_edge_get_side_area_close_icon_html')) {
    /**
     * Loads side area close icon HTML
     */
    function pintsandcrafts_edge_get_side_area_close_icon_html() {
    	$side_area_close_icon_html = pintsandcrafts_edge_icon_collections()->getMenuCloseIcon('font_elegant');

        return $side_area_close_icon_html;
    }
}