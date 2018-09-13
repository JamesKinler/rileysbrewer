<?php
/*
Plugin Name: PintsAndCrafts Core
Description: Plugin that adds all post types needed by our theme
Author: Edge Themes
Version: 1.0.1
*/

require_once 'load.php';

add_action( 'after_setup_theme', array( PintsAndCraftsCore\CPT\PostTypesRegister::getInstance(), 'register' ) );

if ( ! function_exists( 'pintsandcrafts_core_activation' ) ) {
	/**
	 * Triggers when plugin is activated. It calls flush_rewrite_rules
	 * and defines pintsandcrafts_edge_action_core_on_activate action
	 */
	function pintsandcrafts_core_activation() {
		do_action( 'pintsandcrafts_edge_action_core_on_activate' );
		
		PintsAndCraftsCore\CPT\PostTypesRegister::getInstance()->register();
		flush_rewrite_rules();
	}
	
	register_activation_hook( __FILE__, 'pintsandcrafts_core_activation' );
}

if ( ! function_exists( 'pintsandcrafts_core_text_domain' ) ) {
	/**
	 * Loads plugin text domain so it can be used in translation
	 */
	function pintsandcrafts_core_text_domain() {
		load_plugin_textdomain( 'pintsandcrafts-core', false, PINTSANDCRAFTS_CORE_REL_PATH . '/languages' );
	}
	
	add_action( 'plugins_loaded', 'pintsandcrafts_core_text_domain' );
}

if ( ! function_exists( 'pintsandcrafts_core_version_class' ) ) {
	/**
	 * Adds plugins version class to body
	 *
	 * @param $classes
	 *
	 * @return array
	 */
	function pintsandcrafts_core_version_class( $classes ) {
		$classes[] = 'pintsandcrafts-core-' . PINTSANDCRAFTS_CORE_VERSION;
		
		return $classes;
	}
	
	add_filter( 'body_class', 'pintsandcrafts_core_version_class' );
}

if ( ! function_exists( 'pintsandcrafts_core_theme_installed' ) ) {
	/**
	 * Checks whether theme is installed or not
	 * @return bool
	 */
	function pintsandcrafts_core_theme_installed() {
		return defined( 'EDGE_ROOT' );
	}
}

if ( ! function_exists( 'pintsandcrafts_core_is_woocommerce_installed' ) ) {
	/**
	 * Function that checks if woocommerce is installed
	 * @return bool
	 */
	function pintsandcrafts_core_is_woocommerce_installed() {
		return function_exists( 'is_woocommerce' );
	}
}

if ( ! function_exists( 'pintsandcrafts_core_is_woocommerce_integration_installed' ) ) {
	//is Edge Woocommerce Integration installed?
	function pintsandcrafts_core_is_woocommerce_integration_installed() {
		return defined( 'PINTSANDCRAFTS_CHECKOUT_INTEGRATION' );
	}
}

if ( ! function_exists( 'pintsandcrafts_core_is_revolution_slider_installed' ) ) {
	function pintsandcrafts_core_is_revolution_slider_installed() {
		return class_exists( 'RevSliderFront' );
	}
}

if(!function_exists('pintsandcrafts_core_is_wpml_installed')) {
    /**
     * Function that checks if WPML plugin is installed
     * @return bool
     *
     * @version 0.1
     */
    function pintsandcrafts_core_is_wpml_installed() {
        return defined('ICL_SITEPRESS_VERSION');
    }
}

if ( ! function_exists( 'pintsandcrafts_core_theme_menu' ) ) {
	/**
	 * Function that generates admin menu for options page.
	 * It generates one admin page per options page.
	 */
	function pintsandcrafts_core_theme_menu() {
		if ( pintsandcrafts_core_theme_installed() ) {
			
			global $pintsandcrafts_php_global_Framework;
			pintsandcrafts_edge_init_theme_options();
			
			$page_hook_suffix = add_menu_page(
				esc_html__( 'PintsAndCrafts Options', 'pintsandcrafts-core' ), // The value used to populate the browser's title bar when the menu page is active
				esc_html__( 'PintsAndCrafts Options', 'pintsandcrafts-core' ), // The text of the menu in the administrator's sidebar
				'administrator',                            // What roles are able to access the menu
				'pintsandcrafts_edge_theme_menu',            // The ID used to bind submenu items to this menu
				array( $pintsandcrafts_php_global_Framework->getSkin(), 'renderOptions' ), // The callback function used to render this menu
				$pintsandcrafts_php_global_Framework->getSkin()->getSkinURI() . '/assets/img/admin-logo-icon.png', // Icon For menu Item
				100                                                                                            // Position
			);
			
			foreach ( $pintsandcrafts_php_global_Framework->edgtOptions->adminPages as $key => $value ) {
				$slug = "";
				
				if ( ! empty( $value->slug ) ) {
					$slug = "_tab" . $value->slug;
				}
				
				$subpage_hook_suffix = add_submenu_page(
					'pintsandcrafts_edge_theme_menu',
					esc_html__( 'PintsAndCrafts Options - ', 'pintsandcrafts-core' ) . $value->title, // The value used to populate the browser's title bar when the menu page is active
					$value->title,                                                 // The text of the menu in the administrator's sidebar
					'administrator',                                               // What roles are able to access the menu
					'pintsandcrafts_edge_theme_menu' . $slug,                       // The ID used to bind submenu items to this menu
					array( $pintsandcrafts_php_global_Framework->getSkin(), 'renderOptions' )
				);
				
				add_action( 'admin_print_scripts-' . $subpage_hook_suffix, 'pintsandcrafts_edge_enqueue_admin_scripts' );
				add_action( 'admin_print_styles-' . $subpage_hook_suffix, 'pintsandcrafts_edge_enqueue_admin_styles' );
			};
			
			add_action( 'admin_print_scripts-' . $page_hook_suffix, 'pintsandcrafts_edge_enqueue_admin_scripts' );
			add_action( 'admin_print_styles-' . $page_hook_suffix, 'pintsandcrafts_edge_enqueue_admin_styles' );
		}
	}
	
	add_action( 'admin_menu', 'pintsandcrafts_core_theme_menu' );
}

if ( ! function_exists( 'pintsandcrafts_core_theme_menu_backup_options' ) ) {
	/**
	 * Function that generates admin menu for options page.
	 * It generates one admin page per options page.
	 */
	function pintsandcrafts_core_theme_menu_backup_options() {
		if ( pintsandcrafts_core_theme_installed() ) {
			global $pintsandcrafts_php_global_Framework;
			
			$slug             = "_backup_options";
			$page_hook_suffix = add_submenu_page(
				'pintsandcrafts_edge_theme_menu',
				esc_html__( 'PintsAndCrafts Options - Backup Options', 'pintsandcrafts-core' ), // The value used to populate the browser's title bar when the menu page is active
				esc_html__( 'Backup Options', 'pintsandcrafts-core' ),                // The text of the menu in the administrator's sidebar
				'administrator',                                             // What roles are able to access the menu
				'pintsandcrafts_edge_theme_menu' . $slug,                     // The ID used to bind submenu items to this menu
				array( $pintsandcrafts_php_global_Framework->getSkin(), 'renderBackupOptions' )
			);
			
			add_action( 'admin_print_scripts-' . $page_hook_suffix, 'pintsandcrafts_edge_enqueue_admin_scripts' );
			add_action( 'admin_print_styles-' . $page_hook_suffix, 'pintsandcrafts_edge_enqueue_admin_styles' );
		}
	}
	
	add_action( 'admin_menu', 'pintsandcrafts_core_theme_menu_backup_options' );
}

if ( ! function_exists( 'pintsandcrafts_core_theme_admin_bar_menu_options' ) ) {
	/**
	 * Add a link to the WP Toolbar
	 */
	function pintsandcrafts_core_theme_admin_bar_menu_options( $wp_admin_bar ) {
		$args = array(
			'id'    => 'pintsandcrafts-admin-bar-options',
			'title' => sprintf( '<span class="ab-icon dashicons-before dashicons-admin-generic"></span> %s', esc_html__( 'PintsAndCrafts Options', 'pintsandcrafts-core' ) ),
			'href'  => esc_url( admin_url('admin.php?page=pintsandcrafts_edge_theme_menu') )
		);
		
		$wp_admin_bar->add_node( $args );
	}
	
	add_action( 'admin_bar_menu', 'pintsandcrafts_core_theme_admin_bar_menu_options', 999 );
}