<article class="edgtf-item-space <?php echo esc_attr($item_classes) ?>">
	<div class="edgtf-mg-content">
		<div class="edgtf-mg-image">
			<?php the_post_thumbnail(); ?>
		</div>
		<?php if ( ! empty( $item_link ) ) { ?>
			<a itemprop="url" href="<?php echo esc_url( $item_link ); ?>" target="<?php echo esc_attr( $item_link_target ); ?>" class="edgtf-mg-item-link"></a>
		<?php } ?>
	</div>
</article>
