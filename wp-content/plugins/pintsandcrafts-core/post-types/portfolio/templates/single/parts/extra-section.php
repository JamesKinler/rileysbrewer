<?php
$id = get_the_ID();
$extra_section      = get_post_meta($id, 'portfolio_extra_section', true);
$extra_section_img  = get_post_meta($id, 'portfolio_section_image', true);
$extra_section_desc = get_post_meta($id, 'portfolio_extra_section_desc', true);
?>
<div class="ps-extra-section">
	<?php if ( ! empty( $extra_section ) ) { ?>
		<h4 class="ps-es-title"><?php echo esc_html($extra_section); ?></h4>
	<?php } ?>
	<div class="ps-es">
		<?php if ( ! empty( $extra_section_img ) ) { ?>
			<div class="ps-es-img">
				<img src="<?php echo esc_url($extra_section_img); ?>" />
			</div>
		<?php } ?>
		<?php if ( ! empty( $extra_section_desc ) ) { ?>
			<p class="ps-es-desc"><?php echo esc_html($extra_section_desc); ?></p>
		<?php } ?>
	</div>
</div>
