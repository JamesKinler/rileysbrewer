<?php if(pintsandcrafts_edge_options()->getOptionValue('enable_social_share') == 'yes' && pintsandcrafts_edge_options()->getOptionValue('enable_social_share_on_portfolio-item') == 'yes') : ?>
    <div class="edgtf-ps-info-item edgtf-ps-social-share">
	    <h4 class="edgtf-ps-info-title"><?php esc_html_e('Share:', 'pintsandcrafts'); ?></h4>
        <?php echo pintsandcrafts_edge_get_social_share_html() ?>
    </div>
<?php endif; ?>