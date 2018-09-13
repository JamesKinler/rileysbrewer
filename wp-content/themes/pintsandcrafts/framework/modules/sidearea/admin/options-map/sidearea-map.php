<?php

if (!function_exists('pintsandcrafts_edge_sidearea_options_map')) {
    function pintsandcrafts_edge_sidearea_options_map() {

        pintsandcrafts_edge_add_admin_page(
            array(
                'slug'  => '_side_area_page',
                'title' => esc_html__('Side Area', 'pintsandcrafts'),
                'icon'  => 'fa fa-indent'
            )
        );

        $side_area_panel = pintsandcrafts_edge_add_admin_panel(
            array(
                'title' => esc_html__('Side Area', 'pintsandcrafts'),
                'name'  => 'side_area',
                'page'  => '_side_area_page'
            )
        );

        pintsandcrafts_edge_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_type',
                'default_value' => 'side-menu-slide-from-right',
                'label'         => esc_html__('Side Area Type', 'pintsandcrafts'),
                'description'   => esc_html__('Choose a type of Side Area', 'pintsandcrafts'),
                'options'       => array(
                    'side-menu-slide-from-right'       => esc_html__('Slide from Right Over Content', 'pintsandcrafts'),
                    'side-menu-slide-with-content'     => esc_html__('Slide from Right With Content', 'pintsandcrafts'),
                    'side-area-uncovered-from-content' => esc_html__('Side Area Uncovered from Content', 'pintsandcrafts'),
                ),
            )
        );

        pintsandcrafts_edge_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'text',
                'name'          => 'side_area_width',
                'default_value' => '',
                'label'         => esc_html__('Side Area Width', 'pintsandcrafts'),
                'description'   => esc_html__('Enter a width for Side Area (px or %). Default width: 405px.', 'pintsandcrafts'),
                'args'          => array(
                    'col_width' => 3,
                )
            )
        );

        $side_area_width_container = pintsandcrafts_edge_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_width_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_type' => 'side-menu-slide-from-right',
                    )
                )
            )
        );

        pintsandcrafts_edge_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'color',
                'name'          => 'side_area_content_overlay_color',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Color', 'pintsandcrafts'),
                'description'   => esc_html__('Choose a background color for a content overlay', 'pintsandcrafts'),
            )
        );

        pintsandcrafts_edge_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'text',
                'name'          => 'side_area_content_overlay_opacity',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Transparency', 'pintsandcrafts'),
                'description'   => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'pintsandcrafts'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        $side_area_icon_style_group = pintsandcrafts_edge_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'side_area_icon_style_group',
                'title'       => esc_html__('Side Area Icon Style', 'pintsandcrafts'),
                'description' => esc_html__('Define styles for Side Area icon', 'pintsandcrafts')
            )
        );

        $side_area_icon_style_row1 = pintsandcrafts_edge_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row1'
            )
        );

        pintsandcrafts_edge_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_color',
                'label'  => esc_html__('Color', 'pintsandcrafts')
            )
        );

        pintsandcrafts_edge_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_hover_color',
                'label'  => esc_html__('Hover Color', 'pintsandcrafts')
            )
        );

        $side_area_icon_style_row2 = pintsandcrafts_edge_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row2',
                'next'   => true
            )
        );

        pintsandcrafts_edge_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_color',
                'label'  => esc_html__('Close Icon Color', 'pintsandcrafts')
            )
        );

        pintsandcrafts_edge_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_hover_color',
                'label'  => esc_html__('Close Icon Hover Color', 'pintsandcrafts')
            )
        );

        pintsandcrafts_edge_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'color',
                'name'        => 'side_area_background_color',
                'label'       => esc_html__('Background Color', 'pintsandcrafts'),
                'description' => esc_html__('Choose a background color for Side Area', 'pintsandcrafts')
            )
        );

        pintsandcrafts_edge_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'text',
                'name'        => 'side_area_padding',
                'label'       => esc_html__('Padding', 'pintsandcrafts'),
                'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'pintsandcrafts'),
                'args'        => array(
                    'col_width' => 3
                )
            )
        );

        pintsandcrafts_edge_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'selectblank',
                'name'          => 'side_area_aligment',
                'default_value' => '',
                'label'         => esc_html__('Text Alignment', 'pintsandcrafts'),
                'description'   => esc_html__('Choose text alignment for side area', 'pintsandcrafts'),
                'options'       => array(
                    ''       => esc_html__('Default', 'pintsandcrafts'),
                    'left'   => esc_html__('Left', 'pintsandcrafts'),
                    'center' => esc_html__('Center', 'pintsandcrafts'),
                    'right'  => esc_html__('Right', 'pintsandcrafts')
                )
            )
        );
    }

    add_action('pintsandcrafts_edge_action_options_map', 'pintsandcrafts_edge_sidearea_options_map', 15);
}