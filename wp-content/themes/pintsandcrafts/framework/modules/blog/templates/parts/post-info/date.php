<?php
$day   = get_the_time('d');
$month = get_the_time('M');
$year  = get_the_time('Y');
$title = get_the_title();
$unique_format_enabled = pintsandcrafts_edge_options()->getOptionValue('enable_unique_date_format') === 'yes';
?>
<div itemprop="dateCreated" class="edgtf-post-info-date entry-date published updated">
    <?php if(empty($title) && pintsandcrafts_edge_blog_item_has_link()) { ?>
        <a itemprop="url" href="<?php the_permalink() ?>">
    <?php } else { ?>
        <a itemprop="url" href="<?php echo get_month_link($year, $month); ?>">
    <?php } ?>
	        <?php if ( $unique_format_enabled ) { ?>
		        <span class="edgtf-post-month"><?php echo esc_html($month); ?></span>
		        <span class="edgtf-post-day"><?php echo esc_html($day) ?></span>
	        <?php } else {
		        the_time( get_option( 'date_format' ) );
	        } ?>
        </a>
    <meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(pintsandcrafts_edge_get_page_id()); ?>"/>
</div>