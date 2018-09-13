<?php
$extra_section      = get_post_meta($project_id, 'portfolio_extra_section', true);
$extra_section_img  = get_post_meta($project_id, 'portfolio_section_image', true);
$extra_section_desc = get_post_meta($project_id, 'portfolio_extra_section_desc', true);
?>
<div class="pcl-extra-section">
	<?php if ( ! empty( $extra_section ) ) { ?>
		<h4 class="pcl-es-title"><?php echo esc_html($extra_section); ?></h4>
	<?php } ?>
	<div class="pcl-es">
		<?php if ( ! empty( $extra_section_img ) ) { ?>
			<div class="pcl-es-img">
				<img src="<?php echo esc_url($extra_section_img); ?>" />
			</div>
		<?php } ?>
		<?php if ( ! empty( $extra_section_desc ) ) { ?>
			<p class="pcl-es-desc"><?php echo esc_html($extra_section_desc); ?></p>
		<?php } ?>
	</div>
</div>
