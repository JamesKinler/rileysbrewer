<?php ?>
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="edgtf-search-slide-window-top" method="get">
	<?php if ( $search_in_grid ) { ?>
	<div class="edgtf-grid">
	<?php } ?>
		<div class="edgtf-search-form-inner">
			<span <?php pintsandcrafts_edge_class_attribute( $search_submit_icon_class ); ?>>
				<?php echo pintsandcrafts_edge_get_search_icon_html(); ?>
			</span>
			<input type="text" placeholder="<?php esc_attr_e( 'Search', 'pintsandcrafts' ); ?>" name="s" class="edgtf-swt-search-field" autocomplete="off"/>
			<a <?php pintsandcrafts_edge_class_attribute( $search_close_icon_class ); ?> href="#">
				<?php echo pintsandcrafts_edge_get_search_close_icon_html(); ?>
			</a>
		</div>
	<?php if ( $search_in_grid ) { ?>
	</div>
	<?php } ?>
</form>