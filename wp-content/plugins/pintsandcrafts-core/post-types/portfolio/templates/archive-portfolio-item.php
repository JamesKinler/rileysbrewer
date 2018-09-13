<?php
get_header();
pintsandcrafts_edge_get_title();
do_action( 'pintsandcrafts_edge_action_before_main_content' ); ?>
<div class="edgtf-container edgtf-default-page-template">
	<?php do_action( 'pintsandcrafts_edge_action_after_container_open' ); ?>
	<div class="edgtf-container-inner clearfix">
		<?php
			$pintsandcrafts_taxonomy_id   = get_queried_object_id();
			$pintsandcrafts_taxonomy_type = is_tax( 'portfolio-tag' ) ? 'portfolio-tag' : 'portfolio-category';
			$pintsandcrafts_taxonomy      = ! empty( $pintsandcrafts_taxonomy_id ) ? get_term_by( 'id', $pintsandcrafts_taxonomy_id, $pintsandcrafts_taxonomy_type ) : '';
			$pintsandcrafts_taxonomy_slug = ! empty( $pintsandcrafts_taxonomy ) ? $pintsandcrafts_taxonomy->slug : '';
			$pintsandcrafts_taxonomy_name = ! empty( $pintsandcrafts_taxonomy ) ? $pintsandcrafts_taxonomy->taxonomy : '';
			
			pintsandcrafts_core_get_archive_portfolio_list( $pintsandcrafts_taxonomy_slug, $pintsandcrafts_taxonomy_name );
		?>
	</div>
	<?php do_action( 'pintsandcrafts_edge_action_before_container_close' ); ?>
</div>
<?php get_footer(); ?>
