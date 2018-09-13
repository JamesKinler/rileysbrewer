<div class="edgtf-slide-from-header-bottom-holder">
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
		<div class="edgtf-form-holder">
			<input type="text" placeholder="<?php esc_attr_e( 'Search', 'pintsandcrafts' ); ?>" name="s" class="edgtf-search-field" autocomplete="off" />
			<button type="submit" <?php pintsandcrafts_edge_class_attribute( $search_submit_icon_class ); ?>>
				<?php echo pintsandcrafts_edge_get_search_icon_html(); ?>
			</button>
		</div>
	</form>
</div>