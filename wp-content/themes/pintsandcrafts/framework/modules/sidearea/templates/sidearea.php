<section class="edgtf-side-menu">
	<div class="edgtf-close-side-menu-holder">
		<a <?php pintsandcrafts_edge_class_attribute( $side_area_close_icon_class ); ?> href="#">
			<?php echo pintsandcrafts_edge_get_side_area_close_icon_html(); ?>
		</a>
	</div>
	<?php if ( is_active_sidebar( 'sidearea' ) ) {
		dynamic_sidebar( 'sidearea' );
	} ?>
</section>