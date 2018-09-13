<div class="edgtf-is-item <?php echo esc_attr($showcase_item_class); ?>">
	<?php if ( ! empty( $icon ) ) { ?>
		<div class="edgtf-is-icon">
			<?php echo wp_get_attachment_image( $icon, 'full' ); ?>
		</div>
	<?php } ?>
	<div class="edgtf-is-content">
		<?php if (!empty($item_title)) { ?>
			<<?php echo esc_attr($item_title_tag); ?> class="edgtf-is-title" <?php echo pintsandcrafts_edge_get_inline_style($item_title_styles); ?>>
				<?php if (!empty($item_link)) { ?><a href="<?php echo esc_url($item_link); ?>" target="<?php echo esc_attr($item_target); ?>"><?php } ?>
				<?php echo esc_html($item_title); ?>
				<?php if (!empty($item_link)) { ?></a><?php } ?>
			</<?php echo esc_attr($item_title_tag); ?>>
		<?php } ?>
		<?php if (!empty($item_text)) { ?>
			<<?php echo esc_attr($item_text_tag); ?> class="edgtf-is-text" <?php echo pintsandcrafts_edge_get_inline_style($item_text_styles); ?>><?php echo esc_html($item_text); ?></<?php echo esc_attr($item_text_tag); ?>>
		<?php } ?>
	</div>
</div>