<?php

if(!function_exists('pintsandcrafts_edge_design_styles')) {
    /**
     * Generates general custom styles
     */
    function pintsandcrafts_edge_design_styles() {
	    $font_family = pintsandcrafts_edge_options()->getOptionValue( 'google_fonts' );
	    if ( ! empty( $font_family ) && pintsandcrafts_edge_is_font_option_valid( $font_family ) ) {
		    $font_family_selector = array(
			    'body'
		    );
		    echo pintsandcrafts_edge_dynamic_css( $font_family_selector, array( 'font-family' => pintsandcrafts_edge_get_font_option_val( $font_family ) ) );
	    }

		$first_main_color = pintsandcrafts_edge_options()->getOptionValue('first_color');
        if(!empty($first_main_color)) {
            $color_selector = array(
                'h1 a:hover',
                'h2 a:hover',
                'h3 a:hover',
                'h4 a:hover',
                'h5 a:hover',
                'h6 a:hover',
                'a:hover',
                'p a:hover',
                '.edgtf-mobile-header .edgtf-mobile-nav ul li a:hover',
                '.edgtf-mobile-header .edgtf-mobile-nav ul li h5:hover',
                '.edgtf-mobile-header .edgtf-mobile-nav .edgtf-grid > ul > li.edgtf-active-item > a',
	            '.edgtf-search-page-holder .edgtf-search-page-form .edgtf-form-holder .edgtf-search-submit:hover',
	            '.edgtf-search-page-holder article.sticky .edgtf-post-title-area h3 a',
	            '.edgtf-blog-holder article.sticky .edgtf-post-title a',
	            '.edgtf-blog-holder article .edgtf-post-info>div a:hover',
	            '.edgtf-social-share-holder.edgtf-dropdown .edgtf-social-share-dropdown-opener:hover',
	            '.edgtf-single-tags-holder .edgtf-tags a:hover',
	            '.edgtf-author-description .edgtf-author-description-text-holder .edgtf-author-name a:hover',
	            '.edgtf-author-description .edgtf-author-description-text-holder .edgtf-author-social-icons a:hover',
	            '.edgtf-related-posts-holder .edgtf-related-post .edgtf-post-info a:hover',
	            '.edgtf-blog-single-navigation .edgtf-blog-single-prev .edgtf-blog-single-clickable:hover .edgtf-blog-single-nav-mark',
				'.edgtf-blog-single-navigation .edgtf-blog-single-next .edgtf-blog-single-clickable:hover .edgtf-blog-single-nav-mark',
	            '.edgtf-single-links-pages .edgtf-single-links-pages-inner > a:hover',
				'.edgtf-single-links-pages .edgtf-single-links-pages-inner > span:hover',
	            '.edgtf-blog-list-holder .edgtf-bli-info > div a:hover',
	            '.edgtf-blog-list-holder.edgtf-classic-layout .edgtf-bli-title a:hover',
	            '.edgtf-portfolio-accordion-holder .edgtf-pa-menu-nav .edgtf-pa-category-items ul li a:hover',
                '.edgtf-portfolio-accordion-holder .edgtf-pa-menu-nav .edgtf-pa-category-items ul li a.edgtf-pa-active',
	            '.widget.widget_text a:hover',
                '.widget.widget_calendar a:hover',
                '.widget.widget_rss a:hover',
                '.widget.widget_search a:hover',
                '.widget.widget_pages a:hover',
                '.widget.widget_archive a:hover',
                '.widget.widget_categories a:hover',
                '.widget.widget_meta a:hover',
                '.widget.widget_nav_menu a:hover',
                '.widget.widget_recent_entries a:hover',
                '.widget.widget_recent_comments a:hover',
                '.widget.widget_tag_cloud a:hover',
	            '.widget.widget_search button:hover',
	            'footer .edgtf-footer-top .widget.widget_text a:hover',
	            'footer .edgtf-footer-top .widget.widget_calendar a:hover',
	            'footer .edgtf-footer-top .widget.widget_rss a:hover',
	            'footer .edgtf-footer-top .widget.widget_search a:hover',
	            'footer .edgtf-footer-top .widget.widget_pages a:hover',
	            'footer .edgtf-footer-top .widget.widget_archive a:hover',
	            'footer .edgtf-footer-top .widget.widget_categories a:hover',
	            'footer .edgtf-footer-top .widget.widget_meta a:hover',
	            'footer .edgtf-footer-top .widget.widget_nav_menu a:hover',
	            'footer .edgtf-footer-top .widget.widget_recent_entries a:hover',
	            'footer .edgtf-footer-top .widget.widget_recent_comments a:hover',
	            'footer .edgtf-footer-top .widget.widget_tag_cloud a:hover',
				'.edgtf-top-bar .widget.widget_text a:hover',
				'.edgtf-top-bar .widget.widget_calendar a:hover',
				'.edgtf-top-bar .widget.widget_rss a:hover',
				'.edgtf-top-bar .widget.widget_search a:hover',
				'.edgtf-top-bar .widget.widget_pages a:hover',
				'.edgtf-top-bar .widget.widget_archive a:hover',
				'.edgtf-top-bar .widget.widget_categories a:hover',
				'.edgtf-top-bar .widget.widget_meta a:hover',
				'.edgtf-top-bar .widget.widget_nav_menu a:hover',
				'.edgtf-top-bar .widget.widget_recent_entries a:hover',
				'.edgtf-top-bar .widget.widget_recent_comments a:hover',
				'.edgtf-top-bar .widget.widget_tag_cloud a:hover',
	            'footer .edgtf-footer-top .widget.widget_tag_cloud a:hover',
				'.edgtf-top-bar .widget.widget_tag_cloud a:hover',
	            '.widget.widget_edgtf_twitter_widget .edgtf-twitter-widget li .edgtf-tweet-text a:hover',
				'.edgtf-footer-top-holder .widget.widget_edgtf_twitter_widget .edgtf-twitter-widget li .edgtf-tweet-text a:hover',
	            '.edgtf-social-icon-widget-holder:hover',
	            '.edgtf-top-bar .edgtf-social-icon-widget-holder:hover',
				'footer .edgtf-footer-top .edgtf-social-icon-widget-holder:hover',
	            'footer .edgtf-footer-top .widget.edgtf-blog-list-widget a:hover',
				'.edgtf-top-bar .widget.edgtf-blog-list-widget a:hover',
	            'footer .edgtf-footer-top .widget.edgtf-blog-list-widget .edgtf-blog-list-holder .edgtf-bli-title a:hover',
				'.edgtf-top-bar .widget.edgtf-blog-list-widget .edgtf-blog-list-holder .edgtf-bli-title a:hover',
	            '.edgtf-mobile-header .edgtf-mobile-nav ul ul li.current-menu-ancestor>a',
                '.edgtf-mobile-header .edgtf-mobile-nav ul ul li.current-menu-item>a'
            );

            $woo_color_selector = array();
            if(pintsandcrafts_edge_is_woocommerce_installed()) {
                $woo_color_selector = array(
					'.woocommerce-page .edgtf-content .edgtf-quantity-buttons .edgtf-quantity-minus:hover',
					'.woocommerce-page .edgtf-content .edgtf-quantity-buttons .edgtf-quantity-plus:hover',
					'div.woocommerce .edgtf-quantity-buttons .edgtf-quantity-minus:hover',
					'div.woocommerce .edgtf-quantity-buttons .edgtf-quantity-plus:hover',
	                '.edgtf-woocommerce-page.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a',
	                '.edgtf-woocommerce-page.woocommerce-account .woocommerce table.shop_table td.order-number a:hover',
	                '.widget.woocommerce.widget_shopping_cart .widget_shopping_cart_content ul li a:not(.remove):hover',
	                '.widget.woocommerce.widget_shopping_cart .widget_shopping_cart_content ul li .remove:hover',
	                '.widget.woocommerce.widget_layered_nav_filters a:hover',
	                '.edgtf-shopping-cart-dropdown .edgtf-item-info-holder .remove:hover'
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

	        $color_important_selector = array(
		        '.edgtf-portfolio-list-holder.edgtf-pl-hover-overlay-background article .edgtf-pli-text .edgtf-pli-category-holder a:hover'
	        );

            $background_color_selector = array(
                '.edgtf-st-loader .pulse',
                '.edgtf-st-loader .double_pulse .double-bounce1', 
                '.edgtf-st-loader .double_pulse .double-bounce2',
                '.edgtf-st-loader .cube',
                '.edgtf-st-loader .rotating_cubes .cube1',
                '.edgtf-st-loader .rotating_cubes .cube2',
                '.edgtf-st-loader .stripes > div',
                '.edgtf-st-loader .wave > div',
                '.edgtf-st-loader .two_rotating_circles .dot1',
                '.edgtf-st-loader .two_rotating_circles .dot2',
                '.edgtf-st-loader .five_rotating_circles .container1 > div',
                '.edgtf-st-loader .five_rotating_circles .container2 > div',
                '.edgtf-st-loader .five_rotating_circles .container3 > div',
                '.edgtf-st-loader .atom .ball-1:before',
                '.edgtf-st-loader .atom .ball-2:before',
                '.edgtf-st-loader .atom .ball-3:before',
                '.edgtf-st-loader .atom .ball-4:before',
                '.edgtf-st-loader .clock .ball:before',
                '.edgtf-st-loader .mitosis .ball',
                '.edgtf-st-loader .lines .line1',
                '.edgtf-st-loader .lines .line2',
                '.edgtf-st-loader .lines .line3',
                '.edgtf-st-loader .lines .line4',
                '.edgtf-st-loader .fussion .ball',
                '.edgtf-st-loader .fussion .ball-1',
                '.edgtf-st-loader .fussion .ball-2',
                '.edgtf-st-loader .fussion .ball-3',
                '.edgtf-st-loader .fussion .ball-4',
                '.edgtf-st-loader .wave_circles .ball',
                '.edgtf-st-loader .pulse_circles .ball',
                '#submit_comment:hover',
                '.post-password-form input[type=\'submit\']:hover',
                'input.wpcf7-form-control.wpcf7-submit',
                '#edgtf-back-to-top > span',
	            '.edgtf-btn.edgtf-btn-solid',
	            '.edgtf-icon-shortcode.circle',
                '.edgtf-icon-shortcode.square',
	            '.widget #wp-calendar td#today',
	            '.edgtf-progress-bar .edgtf-pb-content-holder .edgtf-pb-content'
            );

            $woo_background_color_selector = array();
            if(pintsandcrafts_edge_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
	                '.woocommerce-page .edgtf-content a.button',
					'.woocommerce-page .edgtf-content a.added_to_cart',
					'.woocommerce-page .edgtf-content input[type="submit"]',
					'.woocommerce-page .edgtf-content button[type="submit"]',
					'div.woocommerce a.button',
					'div.woocommerce a.added_to_cart',
					'div.woocommerce input[type="submit"]',
					'div.woocommerce button[type="submit"]',
	                '.woocommerce-page .edgtf-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
					'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
	                '.edgtf-shopping-cart-dropdown .edgtf-cart-bottom .edgtf-view-cart'
                );
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

            $border_color_selector = array(
                '.edgtf-st-loader .pulse_circles .ball',
                '#edgtf-back-to-top > span',
	            '.edgtf-btn.edgtf-btn-solid'
            );

            echo pintsandcrafts_edge_dynamic_css($color_selector, array('color' => $first_main_color));
	        echo pintsandcrafts_edge_dynamic_css($color_important_selector, array('color' => $first_main_color.'!important'));
	        echo pintsandcrafts_edge_dynamic_css($background_color_selector, array('background-color' => $first_main_color));
	        echo pintsandcrafts_edge_dynamic_css($border_color_selector, array('border-color' => $first_main_color));
        }
	
	    $page_background_color = pintsandcrafts_edge_options()->getOptionValue( 'page_background_color' );
	    if ( ! empty( $page_background_color ) ) {
		    $background_color_selector = array(
			    'body',
			    '.edgtf-content'
		    );
		    echo pintsandcrafts_edge_dynamic_css( $background_color_selector, array( 'background-color' => $page_background_color ) );
	    }
	
	    $page_background_image  = pintsandcrafts_edge_options()->getOptionValue( 'page_background_image' );
        $page_background_repeat = pintsandcrafts_edge_options()->getOptionValue( 'page_background_image_repeat' );

	    if ( ! empty( $page_background_image ) ) {

            if($page_background_repeat === 'yes') {
                $background_image_style = array(
                    'background-image'    => 'url(' . esc_url( $page_background_image ) . ')',
                    'background-repeat'   => 'repeat',
                    'background-position' => '0 0',
                );
            } else {
                $background_image_style = array(
                    'background-image'    => 'url(' . esc_url( $page_background_image ) . ')',
                    'background-repeat'   => 'no-repeat',
                    'background-position' => 'center 0',
                    'background-size'     => 'cover'
                );
            }
		    
		    echo pintsandcrafts_edge_dynamic_css( '.edgtf-content', $background_image_style );
	    }
	
	    $selection_color = pintsandcrafts_edge_options()->getOptionValue( 'selection_color' );
	    if ( ! empty( $selection_color ) ) {
		    echo pintsandcrafts_edge_dynamic_css( '::selection', array( 'background' => $selection_color ) );
		    echo pintsandcrafts_edge_dynamic_css( '::-moz-selection', array( 'background' => $selection_color ) );
	    }
	
	    $preload_background_styles = array();
	
	    if ( pintsandcrafts_edge_options()->getOptionValue( 'preload_pattern_image' ) !== "" ) {
		    $preload_background_styles['background-image'] = 'url(' . pintsandcrafts_edge_options()->getOptionValue( 'preload_pattern_image' ) . ') !important';
	    }
	
	    echo pintsandcrafts_edge_dynamic_css( '.edgtf-preload-background', $preload_background_styles );
    }

    add_action('pintsandcrafts_edge_action_style_dynamic', 'pintsandcrafts_edge_design_styles');
}

if ( ! function_exists( 'pintsandcrafts_edge_content_styles' ) ) {
	function pintsandcrafts_edge_content_styles() {
		$content_style = array();
		
		$padding = pintsandcrafts_edge_options()->getOptionValue( 'content_padding' );
		if ( $padding !== '' ) {
			$content_style['padding'] = $padding;
		}
		
		$content_selector = array(
			'.edgtf-content .edgtf-content-inner > .edgtf-full-width > .edgtf-full-width-inner',
		);
		
		echo pintsandcrafts_edge_dynamic_css( $content_selector, $content_style );
		
		$content_style_in_grid = array();
		
		$padding_in_grid = pintsandcrafts_edge_options()->getOptionValue( 'content_padding_in_grid' );
		if ( $padding_in_grid !== '' ) {
			$content_style_in_grid['padding'] = $padding_in_grid;
		}
		
		$content_selector_in_grid = array(
			'.edgtf-content .edgtf-content-inner > .edgtf-container > .edgtf-container-inner',
		);
		
		echo pintsandcrafts_edge_dynamic_css( $content_selector_in_grid, $content_style_in_grid );
	}
	
	add_action( 'pintsandcrafts_edge_action_style_dynamic', 'pintsandcrafts_edge_content_styles' );
}

if ( ! function_exists( 'pintsandcrafts_edge_h1_styles' ) ) {
	function pintsandcrafts_edge_h1_styles() {
		$margin_top    = pintsandcrafts_edge_options()->getOptionValue( 'h1_margin_top' );
		$margin_bottom = pintsandcrafts_edge_options()->getOptionValue( 'h1_margin_bottom' );
		
		$item_styles = pintsandcrafts_edge_get_typography_styles( 'h1' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = pintsandcrafts_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = pintsandcrafts_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h1'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo pintsandcrafts_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'pintsandcrafts_edge_action_style_dynamic', 'pintsandcrafts_edge_h1_styles' );
}

if ( ! function_exists( 'pintsandcrafts_edge_h2_styles' ) ) {
	function pintsandcrafts_edge_h2_styles() {
		$margin_top    = pintsandcrafts_edge_options()->getOptionValue( 'h2_margin_top' );
		$margin_bottom = pintsandcrafts_edge_options()->getOptionValue( 'h2_margin_bottom' );
		
		$item_styles = pintsandcrafts_edge_get_typography_styles( 'h2' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = pintsandcrafts_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = pintsandcrafts_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h2'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo pintsandcrafts_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'pintsandcrafts_edge_action_style_dynamic', 'pintsandcrafts_edge_h2_styles' );
}

if ( ! function_exists( 'pintsandcrafts_edge_h3_styles' ) ) {
	function pintsandcrafts_edge_h3_styles() {
		$margin_top    = pintsandcrafts_edge_options()->getOptionValue( 'h3_margin_top' );
		$margin_bottom = pintsandcrafts_edge_options()->getOptionValue( 'h3_margin_bottom' );
		
		$item_styles = pintsandcrafts_edge_get_typography_styles( 'h3' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = pintsandcrafts_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = pintsandcrafts_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h3'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo pintsandcrafts_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'pintsandcrafts_edge_action_style_dynamic', 'pintsandcrafts_edge_h3_styles' );
}

if ( ! function_exists( 'pintsandcrafts_edge_h4_styles' ) ) {
	function pintsandcrafts_edge_h4_styles() {
		$margin_top    = pintsandcrafts_edge_options()->getOptionValue( 'h4_margin_top' );
		$margin_bottom = pintsandcrafts_edge_options()->getOptionValue( 'h4_margin_bottom' );
		
		$item_styles = pintsandcrafts_edge_get_typography_styles( 'h4' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = pintsandcrafts_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = pintsandcrafts_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h4'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo pintsandcrafts_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'pintsandcrafts_edge_action_style_dynamic', 'pintsandcrafts_edge_h4_styles' );
}

if ( ! function_exists( 'pintsandcrafts_edge_h5_styles' ) ) {
	function pintsandcrafts_edge_h5_styles() {
		$margin_top    = pintsandcrafts_edge_options()->getOptionValue( 'h5_margin_top' );
		$margin_bottom = pintsandcrafts_edge_options()->getOptionValue( 'h5_margin_bottom' );
		
		$item_styles = pintsandcrafts_edge_get_typography_styles( 'h5' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = pintsandcrafts_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = pintsandcrafts_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h5'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo pintsandcrafts_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'pintsandcrafts_edge_action_style_dynamic', 'pintsandcrafts_edge_h5_styles' );
}

if ( ! function_exists( 'pintsandcrafts_edge_h6_styles' ) ) {
	function pintsandcrafts_edge_h6_styles() {
		$margin_top    = pintsandcrafts_edge_options()->getOptionValue( 'h6_margin_top' );
		$margin_bottom = pintsandcrafts_edge_options()->getOptionValue( 'h6_margin_bottom' );
		
		$item_styles = pintsandcrafts_edge_get_typography_styles( 'h6' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = pintsandcrafts_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = pintsandcrafts_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h6'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo pintsandcrafts_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'pintsandcrafts_edge_action_style_dynamic', 'pintsandcrafts_edge_h6_styles' );
}

if ( ! function_exists( 'pintsandcrafts_edge_text_styles' ) ) {
	function pintsandcrafts_edge_text_styles() {
		$item_styles = pintsandcrafts_edge_get_typography_styles( 'text' );
		
		$item_selector = array(
			'p'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo pintsandcrafts_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'pintsandcrafts_edge_action_style_dynamic', 'pintsandcrafts_edge_text_styles' );
}

if ( ! function_exists( 'pintsandcrafts_edge_link_styles' ) ) {
	function pintsandcrafts_edge_link_styles() {
		$link_styles      = array();
		$link_color       = pintsandcrafts_edge_options()->getOptionValue( 'link_color' );
		$link_font_style  = pintsandcrafts_edge_options()->getOptionValue( 'link_fontstyle' );
		$link_font_weight = pintsandcrafts_edge_options()->getOptionValue( 'link_fontweight' );
		$link_decoration  = pintsandcrafts_edge_options()->getOptionValue( 'link_fontdecoration' );
		
		if ( ! empty( $link_color ) ) {
			$link_styles['color'] = $link_color;
		}
		if ( ! empty( $link_font_style ) ) {
			$link_styles['font-style'] = $link_font_style;
		}
		if ( ! empty( $link_font_weight ) ) {
			$link_styles['font-weight'] = $link_font_weight;
		}
		if ( ! empty( $link_decoration ) ) {
			$link_styles['text-decoration'] = $link_decoration;
		}
		
		$link_selector = array(
			'a',
			'p a'
		);
		
		if ( ! empty( $link_styles ) ) {
			echo pintsandcrafts_edge_dynamic_css( $link_selector, $link_styles );
		}
	}
	
	add_action( 'pintsandcrafts_edge_action_style_dynamic', 'pintsandcrafts_edge_link_styles' );
}

if ( ! function_exists( 'pintsandcrafts_edge_link_hover_styles' ) ) {
	function pintsandcrafts_edge_link_hover_styles() {
		$link_hover_styles     = array();
		$link_hover_color      = pintsandcrafts_edge_options()->getOptionValue( 'link_hovercolor' );
		$link_hover_decoration = pintsandcrafts_edge_options()->getOptionValue( 'link_hover_fontdecoration' );
		
		if ( ! empty( $link_hover_color ) ) {
			$link_hover_styles['color'] = $link_hover_color;
		}
		if ( ! empty( $link_hover_decoration ) ) {
			$link_hover_styles['text-decoration'] = $link_hover_decoration;
		}
		
		$link_hover_selector = array(
			'a:hover',
			'p a:hover'
		);
		
		if ( ! empty( $link_hover_styles ) ) {
			echo pintsandcrafts_edge_dynamic_css( $link_hover_selector, $link_hover_styles );
		}
		
		$link_heading_hover_styles = array();
		
		if ( ! empty( $link_hover_color ) ) {
			$link_heading_hover_styles['color'] = $link_hover_color;
		}
		
		$link_heading_hover_selector = array(
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover'
		);
		
		if ( ! empty( $link_heading_hover_styles ) ) {
			echo pintsandcrafts_edge_dynamic_css( $link_heading_hover_selector, $link_heading_hover_styles );
		}
	}
	
	add_action( 'pintsandcrafts_edge_action_style_dynamic', 'pintsandcrafts_edge_link_hover_styles' );
}

if ( ! function_exists( 'pintsandcrafts_edge_smooth_page_transition_styles' ) ) {
	function pintsandcrafts_edge_smooth_page_transition_styles( $style ) {
		$id            = pintsandcrafts_edge_get_page_id();
		$loader_style  = array();
		$current_style = '';
		
		$background_color = pintsandcrafts_edge_get_meta_field_intersect( 'smooth_pt_bgnd_color', $id );
		if ( ! empty( $background_color ) ) {
			$loader_style['background-color'] = $background_color;
		}
		
		$loader_selector = array(
			'.edgtf-smooth-transition-loader'
		);
		
		if ( ! empty( $loader_style ) ) {
			$current_style .= pintsandcrafts_edge_dynamic_css( $loader_selector, $loader_style );
		}
		
		$spinner_style = array();
		$spinner_color = pintsandcrafts_edge_get_meta_field_intersect( 'smooth_pt_spinner_color', $id );
		if ( ! empty( $spinner_color ) ) {
			$spinner_style['background-color'] = $spinner_color;
		}
		
		$spinner_selectors = array(
			'.edgtf-st-loader .edgtf-rotate-circles > div',
			'.edgtf-st-loader .pulse',
			'.edgtf-st-loader .double_pulse .double-bounce1',
			'.edgtf-st-loader .double_pulse .double-bounce2',
			'.edgtf-st-loader .cube',
			'.edgtf-st-loader .rotating_cubes .cube1',
			'.edgtf-st-loader .rotating_cubes .cube2',
			'.edgtf-st-loader .stripes > div',
			'.edgtf-st-loader .wave > div',
			'.edgtf-st-loader .two_rotating_circles .dot1',
			'.edgtf-st-loader .two_rotating_circles .dot2',
			'.edgtf-st-loader .five_rotating_circles .container1 > div',
			'.edgtf-st-loader .five_rotating_circles .container2 > div',
			'.edgtf-st-loader .five_rotating_circles .container3 > div',
			'.edgtf-st-loader .atom .ball-1:before',
			'.edgtf-st-loader .atom .ball-2:before',
			'.edgtf-st-loader .atom .ball-3:before',
			'.edgtf-st-loader .atom .ball-4:before',
			'.edgtf-st-loader .clock .ball:before',
			'.edgtf-st-loader .mitosis .ball',
			'.edgtf-st-loader .lines .line1',
			'.edgtf-st-loader .lines .line2',
			'.edgtf-st-loader .lines .line3',
			'.edgtf-st-loader .lines .line4',
			'.edgtf-st-loader .fussion .ball',
			'.edgtf-st-loader .fussion .ball-1',
			'.edgtf-st-loader .fussion .ball-2',
			'.edgtf-st-loader .fussion .ball-3',
			'.edgtf-st-loader .fussion .ball-4',
			'.edgtf-st-loader .wave_circles .ball',
			'.edgtf-st-loader .pulse_circles .ball'
		);
		
		if ( ! empty( $spinner_style ) ) {
			$current_style .= pintsandcrafts_edge_dynamic_css( $spinner_selectors, $spinner_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'pintsandcrafts_edge_filter_add_page_custom_style', 'pintsandcrafts_edge_smooth_page_transition_styles' );
}