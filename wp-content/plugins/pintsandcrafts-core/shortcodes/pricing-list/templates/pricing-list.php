<div class="pintsandcrafts-pricing-list clearfix <?php echo esc_attr($item_space); ?>">
	<?php if ( ! empty( $title ) ) { ?>
		<div class="pintsandcrafts-pl-title-holder" <?php pintsandcrafts_edge_inline_style($title_holder_styles); ?>>
			<h4 class="pintsandcrafts-pl-title"><?php echo esc_html($title); ?></h4>
		</div>
	<?php } ?>
	<div class="pintsandcrafts-pl-wrapper">
		<?php echo do_shortcode($content); ?>
	</div>

	<?php if ( ! empty( $button_text ) ) { ?>
		<div class="pintsandcrafts-pli-link-holder">
			<a class="pintsandcrafts-pli-link" <?php echo ! empty( $link ) ? 'href="'.  esc_url($link).'"' : '#'; ?> target="<?php echo ! empty($target) ? $target : '_self'; ?>">
				<span><?php echo esc_html($button_text); ?></span>
			</a>
		</div>
	<?php } ?>
</div>