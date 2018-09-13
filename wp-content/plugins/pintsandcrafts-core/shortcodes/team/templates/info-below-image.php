<div class="edgtf-team-holder <?php echo esc_attr($holder_classes); ?>">
	<div class="edgtf-team-inner">
		<?php if ($team_image !== '') { ?>
			<div class="edgtf-team-image">
                <?php echo wp_get_attachment_image($team_image, 'full'); ?>
				<?php if (!empty($team_social_icons)) { ?>
					<div class="edgtf-team-social-holder">
						<?php foreach( $team_social_icons as $team_social_icon ) { ?>
							<span class="edgtf-team-icon"><?php echo wp_kses_post($team_social_icon); ?></span>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
		<div class="edgtf-team-info">
			<?php if ($team_name !== '') { ?>
				<<?php echo esc_attr($team_name_tag); ?> class="edgtf-team-name" <?php echo pintsandcrafts_edge_get_inline_style($team_name_styles); ?>><?php echo esc_html($team_name); ?></<?php echo esc_attr($team_name_tag); ?>>
			<?php } ?>
			<?php if ($team_position !== "") { ?>
				<h6 class="edgtf-team-position" <?php echo pintsandcrafts_edge_get_inline_style($team_position_styles); ?>><?php echo esc_html($team_position); ?></h6>
			<?php } ?>
			<?php if ($team_text !== "") { ?>
				<p class="edgtf-team-text" <?php echo pintsandcrafts_edge_get_inline_style($team_text_styles); ?>><?php echo esc_html($team_text); ?></p>
			<?php } ?>
		</div>
	</div>
</div>