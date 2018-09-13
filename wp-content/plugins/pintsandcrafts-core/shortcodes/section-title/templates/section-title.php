<div class="edgtf-section-title-holder <?php echo esc_attr($holder_classes); ?>" <?php echo pintsandcrafts_edge_get_inline_style($holder_styles); ?>>
	<div class="edgtf-st-inner">
		<?php if(!empty($title)) { ?>
			<div class="edgtf-st-title-wrap">
				<?php if(!empty($subtitle)) { ?>
					<h5 class="edgtf-st-subtitle"><?php echo esc_html($subtitle); ?></h5>
				<?php } ?>
				<<?php echo esc_attr($title_tag); ?> class="edgtf-st-title" <?php echo pintsandcrafts_edge_get_inline_style($title_styles); ?>>
					<?php echo esc_html($title); ?>
				</<?php echo esc_attr($title_tag); ?>>
				<?php if ( $waves === 'yes' ) {
					echo wp_kses( pintsandcrafts_edge_wave_svg(), pintsandcrafts_edge_wp_kses_svg_tags() );
				} ?>
			</div>
		<?php } ?>
		<?php if(!empty($content)) { ?>
			<div class="edgtf-st-text" <?php echo pintsandcrafts_edge_get_inline_style($text_styles); ?>>
				<?php echo wp_kses_post( do_shortcode($content) ); ?>
			</div>
		<?php } ?>
	</div>
</div>