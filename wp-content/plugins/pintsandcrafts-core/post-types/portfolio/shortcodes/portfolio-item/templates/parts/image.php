<?php if ( has_post_thumbnail($project_id) ) { ?>
	<div class="edgtf-pcli-image">
		<?php echo get_the_post_thumbnail($project_id); ?>
	</div>
<?php } ?>