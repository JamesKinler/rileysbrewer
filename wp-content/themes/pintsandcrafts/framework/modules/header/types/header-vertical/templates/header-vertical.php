<?php do_action('pintsandcrafts_edge_action_before_page_header'); ?>

<aside class="edgtf-vertical-menu-area <?php echo esc_html($holder_class); ?>">
	<div class="edgtf-vertical-menu-area-inner">
		<div class="edgtf-vertical-area-background"></div>
		<?php if(!$hide_logo) {
			pintsandcrafts_edge_get_logo();
		} ?>
		<?php pintsandcrafts_edge_get_header_vertical_main_menu(); ?>
		<div class="edgtf-vertical-area-widget-holder">
			<?php pintsandcrafts_edge_get_header_vertical_widget_areas(); ?>
		</div>
	</div>
</aside>

<?php do_action('pintsandcrafts_edge_action_after_page_header'); ?>