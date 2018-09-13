<?php
	if ( ! empty( $project_id ) ) {
		$params['image']   = get_term_meta( $project_id, 'edgtf_portfolio_category_image_meta', true );
		$params['title']   = get_the_title($project_id);
		$params['excerpt'] = get_the_excerpt($project_id);
		?>
		<div class="edgtf-pcl-item <?php echo esc_attr( $holder_classes ); ?>">
			<div class="edgtf-pcli-inner">
				<?php if($disable_featured_image !== 'yes') {
					echo pintsandcrafts_core_get_cpt_shortcode_module_template_part( 'portfolio', 'portfolio-item', 'parts/image', '', $params );
				} ?>
				<div class="edgtf-pcli-text-holder">
					<?php echo pintsandcrafts_core_get_cpt_shortcode_module_template_part( 'portfolio', 'portfolio-item', 'parts/title', '', $params ); ?>
					<div class="edgtf-pcli-text-wrapper">
						<div class="edgtf-pcli-text">
							<?php echo pintsandcrafts_core_get_cpt_shortcode_module_template_part( 'portfolio', 'portfolio-item', 'parts/excerpt', '', $params ); ?>
						</div>
						<div class="edgtf-pcli-custom">
							<?php echo pintsandcrafts_core_get_cpt_shortcode_module_template_part( 'portfolio', 'portfolio-item', 'parts/custom-fields', '', $params ); ?>
						</div>
						<?php echo pintsandcrafts_core_get_cpt_shortcode_module_template_part( 'portfolio', 'portfolio-item', 'parts/extra-section', '', $params ); ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	} else {
		echo pintsandcrafts_core_get_cpt_shortcode_module_template_part( 'portfolio', 'portfolio-item', 'parts/posts-not-found', '', $params );
	}
?>