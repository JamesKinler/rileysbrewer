<div class="edgtf-grid-row">
	<div class="edgtf-grid-col-6">
		<div class="edgtf-ps-image-holder">
			<div class="edgtf-ps-image-inner edgtf-owl-slider">
				<?php
				$media = pintsandcrafts_core_get_portfolio_single_media();
				
				if(is_array($media) && count($media)) : ?>
					<?php foreach($media as $single_media) : ?>
						<div class="edgtf-ps-image">
							<?php pintsandcrafts_core_get_portfolio_single_media_html($single_media); ?>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="edgtf-grid-col-6">
		<div class="edgtf-ps-info-holder">
			<?php
			//get portfolio content section
			pintsandcrafts_core_get_cpt_single_module_template_part('templates/single/parts/content', 'portfolio', $item_layout);

			//get portfolio custom fields section
			pintsandcrafts_core_get_cpt_single_module_template_part('templates/single/parts/custom-fields', 'portfolio', $item_layout);

			//get portfolio extra fields section
			pintsandcrafts_core_get_cpt_single_module_template_part( 'templates/single/parts/extra-section', 'portfolio', $item_layout );

			//get portfolio categories section
			pintsandcrafts_core_get_cpt_single_module_template_part('templates/single/parts/categories', 'portfolio', $item_layout);

			//get portfolio tags section
			pintsandcrafts_core_get_cpt_single_module_template_part('templates/single/parts/tags', 'portfolio', $item_layout);

			//get portfolio share section
			pintsandcrafts_core_get_cpt_single_module_template_part('templates/single/parts/social', 'portfolio', $item_layout);
			?>
		</div>
	</div>
</div>