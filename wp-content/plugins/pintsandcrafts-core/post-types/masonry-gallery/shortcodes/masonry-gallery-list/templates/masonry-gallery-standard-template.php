<article class="edgtf-item-space <?php echo esc_attr($item_classes) ?>">
	<div class="edgtf-mg-content">
		<?php if (has_post_thumbnail()) { ?>
			<div class="edgtf-mg-image">
				<div class="edgtf-mg-image-overlay" style="background-image:url(<?php echo esc_url($background_image_url); ?>)"></div>
				<?php the_post_thumbnail(); ?>
			</div>
		<?php } ?>
		<div class="edgtf-mg-item-outer <?php echo esc_attr($item_skin); ?>">
			<div class="edgtf-mg-item-inner">
				<div class="edgtf-mg-item-content">
					<?php if(!empty($item_image)) { ?>
						<img itemprop="image" class="edgtf-mg-item-icon" src="<?php echo esc_url($item_image['url'])?>" alt="<?php echo esc_attr($item_image['alt']); ?>" />
					<?php } ?>
					<?php if (!empty($item_title)) { ?>
						<<?php echo esc_attr($item_title_tag); ?> itemprop="name" class="edgtf-mg-item-title entry-title"><?php echo wp_kses($item_title, array('br' => true)); ?></<?php echo esc_attr($item_title_tag); ?>>
					<?php } ?>
					<?php if (!empty($item_text)) { ?>
						<p class="edgtf-mg-item-text"><?php echo esc_html($item_text); ?></p>
					<?php } ?>
				</div>
				<?php if ( ! empty( $item_button_label ) && ! empty( $item_link ) ) {
					$button_params = array(
						'type'         => $item_button_type,
						'link'         => $item_link,
						'target'       => $item_link_target,
						'text'         => $item_button_label,
						'custom_class' => $item_button_type === 'bordered' ? 'edgtf-mg-item-button edgtf-btn-yellow-white' : 'edgtf-mg-item-button'
					);
					
					echo pintsandcrafts_edge_return_button_html( $button_params );
				} ?>
			</div>
		</div>
	</div>
</article>
