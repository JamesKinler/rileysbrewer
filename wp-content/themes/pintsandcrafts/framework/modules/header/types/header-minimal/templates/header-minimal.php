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
				 --><div class="edgtf-position-left-inner">
						<?php if(!$hide_logo) {
							pintsandcrafts_edge_get_logo();
						} ?>
					</div>
				</div>
				<div class="edgtf-position-right"><!--
				 --><div class="edgtf-position-right-inner">
						<a href="javascript:void(0)" <?php pintsandcrafts_edge_class_attribute( $fullscreen_menu_icon_class ); ?>>
							<span class="edgtf-fullscreen-menu-close-icon">
								<?php echo pintsandcrafts_edge_get_fullscreen_menu_close_icon_html(); ?>
							</span>
							<span class="edgtf-fullscreen-menu-opener-icon">
								<span class="edgtf-fm-lines">
									<span class="edgtf-fm-line edgtf-line-1"></span>
									<span class="edgtf-fm-line edgtf-line-2"></span>
									<span class="edgtf-fm-line edgtf-line-3"></span>
								</span>
							</span>
						</a>
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
		pintsandcrafts_edge_get_sticky_header('minimal', 'header/types/header-minimal');
	} ?>
	
	<?php do_action('pintsandcrafts_edge_action_before_page_header_html_close'); ?>
</header>