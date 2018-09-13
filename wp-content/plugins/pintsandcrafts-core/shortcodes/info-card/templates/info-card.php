<div class="edgtf-if-holder <?php echo esc_attr($holder_classes); ?>">
    <div class="edgtf-if-text-holder" <?php echo pintsandcrafts_edge_get_inline_style($holder_styles); ?>>
	    <div class="edgtf-if-text-outer">
		    <div class="edgtf-if-text-inner">
		        <?php if(!empty($title)) { ?>
		            <<?php echo esc_attr($title_tag); ?> class="edgtf-if-title" <?php echo pintsandcrafts_edge_get_inline_style($title_styles); ?>>
		                <?php echo wp_kses($title, array('span' => array('class' => true))); ?>
	                </<?php echo esc_attr($title_tag); ?>>
		        <?php } ?>
			    <?php if(!empty($content)) { ?>
				    <p><?php echo wp_kses_post($content); ?></p>
			    <?php } ?>
				<?php if(!empty($link) && !empty($link_text)) { ?>
					<div class="edgtf-if-btn-wrap" <?php echo pintsandcrafts_edge_get_inline_style($link_styles); ?>>
						<?php echo pintsandcrafts_edge_get_button_html(array(
							'link'              => esc_url($link),
							'text'              => esc_html($link_text),
							'type'              => 'bordered',
                            'predefined_styles' => 'yellow-black',
							'size'              => 'medium',
							'target'            => esc_attr($target)
						)); ?>
		            </div>
		        <?php } ?>
			</div>
		</div>
	</div>
</div>