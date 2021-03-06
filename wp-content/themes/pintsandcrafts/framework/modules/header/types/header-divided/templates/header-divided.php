<?php do_action('pintsandcrafts_edge_action_before_page_header'); ?>

<header class="edgtf-page-header">
	<?php do_action('pintsandcrafts_edge_action_after_page_header_html_open'); ?>
	
    <?php if($show_fixed_wrapper) : ?>
        <div class="edgtf-fixed-wrapper">
    <?php endif; ?>
	        
    <div class="edgtf-menu-area">
	    <?php do_action('pintsandcrafts_edge_action_after_header_menu_area_html_open'); ?>
	    
        <?php if($menu_area_in_grid) : ?>
            <div class="edgtf-grid">
        <?php endif; ?>
	            
        <div class="edgtf-vertical-align-containers">
            <div class="edgtf-position-left"><!--
             --><div class="edgtf-divided-left-widget-area">
		            <div class="edgtf-divided-left-widget-area-inner">
			            <?php pintsandcrafts_edge_get_divided_left_widget_area(); ?>
		            </div>
	            </div>
	            <div class="edgtf-position-left-inner">
                    <?php pintsandcrafts_edge_get_divided_left_main_menu(); ?>
                </div>
            </div>
            <div class="edgtf-position-center"><!--
             --><div class="edgtf-position-center-inner">
                    <?php if(!$hide_logo) {
                        pintsandcrafts_edge_get_logo();
                    } ?>
                </div>
            </div>
            <div class="edgtf-position-right"><!--
             --><div class="edgtf-position-right-inner">
                    <?php pintsandcrafts_edge_get_divided_right_main_menu(); ?>
                </div>
	            <div class="edgtf-divided-right-widget-area">
		            <div class="edgtf-divided-right-widget-area-inner">
			            <div class="edgtf-position-right-inner-wrap">
				            <?php pintsandcrafts_edge_get_divided_right_widget_area(); ?>
			            </div>
		            </div>
	            </div>
            </div>
        </div>
	            
        <?php if($menu_area_in_grid) : ?>
            </div>
        <?php endif; ?>
    </div>
	
    <?php if($show_fixed_wrapper) { ?>
        </div>
	<?php } ?>
	
	<?php if($show_sticky) {
		pintsandcrafts_edge_get_sticky_header('divided', 'header/types/header-divided');
	} ?>
	
	<?php do_action('pintsandcrafts_edge_action_before_page_header_html_close'); ?>
</header>

<?php do_action('pintsandcrafts_edge_action_after_page_header'); ?>