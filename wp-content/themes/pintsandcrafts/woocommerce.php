<?php
/*
Template Name: WooCommerce
*/
?>
<?php
$edgtf_sidebar_layout = pintsandcrafts_edge_sidebar_layout();

get_header();
pintsandcrafts_edge_get_title();
get_template_part( 'slider' );
do_action('pintsandcrafts_edge_action_before_main_content');

//Woocommerce content
if ( ! is_singular( 'product' ) ) { ?>
	<div class="edgtf-container">
		<div class="edgtf-container-inner clearfix">
			<div class="edgtf-grid-row">
				<div <?php echo pintsandcrafts_edge_get_content_sidebar_class(); ?>>
					<?php pintsandcrafts_edge_woocommerce_content(); ?>
				</div>
				<?php if ( $edgtf_sidebar_layout !== 'no-sidebar' ) { ?>
					<div <?php echo pintsandcrafts_edge_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
			<div class="edgtf-grid-row">
				<div class="edgtf-woo-pagination-wrap">
					<?php do_action('pintsandcrafts_edge_action_after_woo_main_content'); ?>
				</div>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="edgtf-container">
		<div class="edgtf-container-inner clearfix">
			<?php pintsandcrafts_edge_woocommerce_content(); ?>
		</div>
	</div>
<?php } ?>
<?php get_footer(); ?>