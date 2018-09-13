<?php
$share_type = isset($share_type) ? $share_type : 'list';
?>
<?php if(pintsandcrafts_edge_options()->getOptionValue('enable_social_share') === 'yes' && pintsandcrafts_edge_options()->getOptionValue('enable_social_share_on_post') === 'yes') { ?>
    <div class="edgtf-blog-share">
        <?php echo pintsandcrafts_edge_get_social_share_html(array('type' => $share_type, 'title' => esc_html__('Share:', 'pintsandcrafts'))); ?>
    </div>
<?php } ?>