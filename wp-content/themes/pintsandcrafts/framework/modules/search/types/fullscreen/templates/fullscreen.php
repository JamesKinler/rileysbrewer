<div class="edgtf-fullscreen-search-holder">
	<a <?php pintsandcrafts_edge_class_attribute( $search_close_icon_class ); ?> href="javascript:void(0)">
		<?php echo pintsandcrafts_edge_get_search_close_icon_html(); ?>
	</a>
	<div class="edgtf-fullscreen-search-table">
		<div class="edgtf-fullscreen-search-cell">
			<div class="edgtf-fullscreen-search-inner">
				<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="edgtf-fullscreen-search-form" method="get">
					<div class="edgtf-form-holder">
						<div class="edgtf-form-holder-inner">
							<div class="edgtf-field-holder">
								<input type="text" placeholder="<?php esc_attr_e( 'Search for...', 'pintsandcrafts' ); ?>" name="s" class="edgtf-search-field" autocomplete="off"/>
							</div>
							<button type="submit" <?php pintsandcrafts_edge_class_attribute( $search_submit_icon_class ); ?>>
								<?php echo pintsandcrafts_edge_get_search_icon_html(); ?>
							</button>
							<div class="edgtf-line"></div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>