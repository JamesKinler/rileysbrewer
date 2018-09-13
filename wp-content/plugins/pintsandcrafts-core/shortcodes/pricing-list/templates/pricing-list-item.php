<div class="pintsandcrafts-pricing-list-item clearfix <?php echo ! empty($image) ? 'pintsandcrafts-pli-with-image' : ''; ?>">
    <?php if(!empty($image)){ ?>
        <div class="pintsandcrafts-pli-image-holder">
            <?php echo wp_get_attachment_image($image); ?>
        </div>
    <?php } ?>
    <div class="pintsandcrafts-pli-content clearfix">
        <?php if(!empty($title)): ?>
            <div class="pintsandcrafts-pli-title-holder">
                <<?php echo esc_attr($title_tag); ?> itemprop="name" class="pintsandcrafts-pli-title entry-title" <?php echo pintsandcrafts_edge_get_inline_style($title_styles); ?>>
                    <?php if(!empty($link)): ?><a  class="pintsandcrafts-pricing-list-item-link" itemprop="url" target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($link); ?>"><?php endif; ?>
                        <?php echo esc_html($title); ?>
                    <?php if(!empty($link)): ?></a><?php endif; ?>
                </<?php echo esc_attr($title_tag); ?>>
                <div class="pintsandcrafts-pli-line" <?php pintsandcrafts_edge_inline_style($separator_styles); ?>></div>
                <?php if(!empty($price)) : ?>
                    <div class="pintsandcrafts-pli-price-holder">
                        <span class="pintsandcrafts-pli-price" <?php echo pintsandcrafts_edge_get_inline_style($price_styles); ?>>
                            <span><?php echo esc_html($price); ?></span>
                        </span>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="pintsandcrafts-pli-bottom-content">
            <?php if(!empty($description)) : ?>
                <div class="pintsandcrafts-pli-desc" <?php echo pintsandcrafts_edge_get_inline_style($desc_styles); ?>>
                    <p><?php echo esc_html($description); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>