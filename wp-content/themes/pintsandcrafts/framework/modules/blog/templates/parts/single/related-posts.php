<?php
$show_related = pintsandcrafts_edge_options()->getOptionValue('blog_single_related_posts') == 'yes' ? true : false;
$related_post_number = pintsandcrafts_edge_sidebar_layout() === 'no-sidebar' ? 4 : 3;
$related_posts_options = array(
    'posts_per_page' => $related_post_number
);
$related_posts = pintsandcrafts_edge_get_blog_related_post_type(get_the_ID(), $related_posts_options);
$related_posts_image_size = isset($related_posts_image_size) ? $related_posts_image_size : 'full';
$unique_format_enabled = pintsandcrafts_edge_options()->getOptionValue('enable_unique_date_format') === 'yes';
?>
<?php if($show_related) { ?>
    <div class="edgtf-related-posts-holder clearfix">
        <div class="edgtf-related-posts-holder-inner">
            <?php if ( $related_posts && $related_posts->have_posts() ) : ?>
                <div class="edgtf-related-posts-title">
                    <h3><?php esc_html_e('RELATED POSTS', 'pintsandcrafts' ); ?></h3>
                </div>
                <div class="edgtf-related-posts-inner clearfix">
                    <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                        <div class="edgtf-related-post">
                            <div class="edgtf-related-post-inner">
	                            <div class="edgtf-post-heading">
				                    <?php if (has_post_thumbnail()) { ?>
	                                <div class="edgtf-related-post-image">
	                                    <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	                                         <?php the_post_thumbnail($related_posts_image_size); ?>
	                                    </a>
	                                </div>
				                    <?php if ($unique_format_enabled) {
				                    	pintsandcrafts_edge_get_module_template_part('templates/parts/post-info/date', 'blog', '', $params);
				                    } ?>
				                    <?php }	?>
	                            </div>
                                <h4 itemprop="name" class="entry-title edgtf-post-title"><a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                                <div class="edgtf-post-info">
	                                <?php pintsandcrafts_edge_get_module_template_part('templates/parts/post-info/author', 'blog', '', $params); ?>
	                                <?php pintsandcrafts_edge_get_module_template_part('templates/parts/post-info/category', 'blog', '', $params); ?>
	                                <?php if ( ! has_post_thumbnail() && ! $unique_format_enabled ) { ?>
						                <?php pintsandcrafts_edge_get_module_template_part('templates/parts/post-info/date', 'blog', '', $params); ?>
					                <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
<?php } ?>