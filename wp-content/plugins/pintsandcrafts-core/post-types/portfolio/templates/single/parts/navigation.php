<?php if(pintsandcrafts_edge_options()->getOptionValue('portfolio_single_hide_pagination') !== 'yes') : ?>
    <?php
    $back_to_link = get_post_meta(get_the_ID(), 'portfolio_single_back_to_link', true);
    $nav_same_category = pintsandcrafts_edge_options()->getOptionValue('portfolio_single_nav_same_category') == 'yes';
    ?>
    <div class="edgtf-ps-navigation">
        <?php if(get_previous_post() !== '') : ?>
            <div class="edgtf-ps-prev">
                <?php if($nav_same_category) {
	                previous_post_link('%link', sprintf('<span class="edgtf-ps-nav-mark fa fa-arrow-left"><span>%s</span></span>', esc_html__('Prev Flavor', 'pintsandcrafts') ), true, '', 'portfolio-category');
                } else {
	                previous_post_link('%link', sprintf('<span class="edgtf-ps-nav-mark fa fa-arrow-left"><span>%s</span></span>', esc_html__('Prev Flavor', 'pintsandcrafts') ) );
                } ?>
            </div>
        <?php endif; ?>

        <?php if($back_to_link !== '') : ?>
            <div class="edgtf-ps-back-btn">
                <a itemprop="url" href="<?php echo esc_url(get_permalink($back_to_link)); ?>">
	                <span class="square"></span>
	                <span class="square"></span>
	                <span class="square"></span>
	                <span class="square"></span>
	                <span class="square"></span>
	                <span class="square"></span>
	                <span class="square"></span>
	                <span class="square"></span>
	                <span class="square"></span>
                </a>
            </div>
        <?php endif; ?>

        <?php if(get_next_post() !== '') : ?>
            <div class="edgtf-ps-next">
                <?php if($nav_same_category) {
                    next_post_link('%link', sprintf('<span class="edgtf-ps-nav-mark fa fa-arrow-right"><span>%s</span></span>', esc_html__('Next Flavor', 'pintsandcrafts') ), true, '', 'portfolio-category');
                } else {
                    next_post_link('%link', sprintf('<span class="edgtf-ps-nav-mark fa fa-arrow-right"><span>%s</span></span>', esc_html__('Next Flavor', 'pintsandcrafts') ) );
                } ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>