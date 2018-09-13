<?php do_action('pintsandcrafts_edge_action_after_sticky_header'); ?>

<div class="edgtf-sticky-header">
    <?php do_action('pintsandcrafts_edge_action_after_sticky_menu_html_open'); ?>
    <div class="edgtf-sticky-holder">
        <?php if ($sticky_header_in_grid && pintsandcrafts_edge_options()->getOptionValue( 'fullscreen_in_grid' ) === 'yes' ) : ?>
        <div class="edgtf-grid">
            <?php endif; ?>
            <div class=" edgtf-vertical-align-containers">
                <div class="edgtf-position-left"><!--
                 --><div class="edgtf-position-left-inner">
                        <?php if (!$hide_logo) {
                            pintsandcrafts_edge_get_logo('sticky');
                        } ?>
                    </div>
                </div>
                <div class="edgtf-position-right"><!--
                 --><div class="edgtf-position-right-inner">
                        <a href="javascript:void(0)" <?php pintsandcrafts_edge_class_attribute( $fullscreen_menu_icon_class ); ?>>
                            <span class="edgtf-fullscreen-menu-close-icon">
                                <?php echo pintsandcrafts_edge_get_fullscreen_menu_close_icon_html(); ?>
                            </span>
	                        <span class="edgtf-fullscreen-menu-opener-icon">
								<span class="edgtf-fm-lines">
									<span class="edgtf-fm-line edgtf-line-1"></span>
									<span class="edgtf-fm-line edgtf-line-2"></span>
									<span class="edgtf-fm-line edgtf-line-3"></span>
								</span>
							</span>
                        </a>
                    </div>
                </div>
            </div>
            <?php if ($sticky_header_in_grid) : ?>
        </div>
    <?php endif; ?>
    </div>
</div>

<?php do_action('pintsandcrafts_edge_action_after_sticky_header'); ?>
