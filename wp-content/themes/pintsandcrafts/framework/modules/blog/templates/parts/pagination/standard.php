<?php
if($max_num_pages > 1) {
	$number_of_pages = $max_num_pages;
	$current_page    = $paged;
	$range           = 3;
	?>
	
	<div class="edgtf-blog-pagination">
		<ul>
			<?php if ($current_page > 1) { ?>
				<li class="edgtf-pag-prev">
					<a itemprop="url" href="<?php echo esc_url(get_pagenum_link($current_page - 1)); ?>">
						<span class="fa fa-arrow-left"></span>
					</a>
				</li>
			<?php } ?>
			<?php for ($i=1; $i <= $number_of_pages; $i++) { ?>
				<?php if (!($i >= $current_page + $range+1 || $i <= $current_page - $range-1) || $number_of_pages <= $range ) { ?>
					<?php if($current_page == $i) { ?>
						<li class="edgtf-pag-number">
							<a class="edgtf-pag-active" href="#"><?php echo esc_attr($i); ?></a>
						</li>
					<?php } else { ?>
						<li class="edgtf-pag-number">
							<a itemprop="url" class="edgtf-pag-inactive" href="<?php echo get_pagenum_link($i); ?>"><?php echo esc_attr($i); ?></a>
						</li>
					<?php } ?>
				<?php } ?>
			<?php } ?>
			<?php if ($current_page < $number_of_pages) { ?>
				<li class="edgtf-pag-next">
					<a itemprop="url" href="<?php echo esc_url(get_pagenum_link($current_page + 1)); ?>">
						<span class="fa fa-arrow-right"></span>
					</a>
				</li>
			<?php } ?>
		</ul>
	</div>
	
	<div class="edgtf-blog-pagination-wp">
		<?php echo get_the_posts_pagination(); ?>
	</div>
	
	<?php
}