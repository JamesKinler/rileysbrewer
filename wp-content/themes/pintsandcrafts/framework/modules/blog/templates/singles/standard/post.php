<?php
$unique_date_format_enabled = pintsandcrafts_edge_options()->getOptionValue( 'enable_unique_date_format' ) === 'yes';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="edgtf-post-content">
        <div class="edgtf-post-heading">
            <?php pintsandcrafts_edge_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
	        <?php if ( has_post_thumbnail() && $unique_date_format_enabled ) { ?>
	            <?php pintsandcrafts_edge_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
	        <?php } ?>
        </div>
        <div class="edgtf-post-text">
            <div class="edgtf-post-text-inner">
                <?php pintsandcrafts_edge_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                <div class="edgtf-post-info-top">
	                <?php pintsandcrafts_edge_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
                    <?php pintsandcrafts_edge_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
	                <?php if ( ! has_post_thumbnail() || ! $unique_date_format_enabled ) { ?>
		                <?php pintsandcrafts_edge_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
	                <?php } ?>
                </div>
                <div class="edgtf-post-text-main">
                    <?php the_content(); ?>
                    <?php do_action('pintsandcrafts_edge_action_single_link_pages'); ?>
                </div>
                <div class="edgtf-post-info-bottom clearfix">
                    <div class="edgtf-post-info-bottom-left">
                        <?php pintsandcrafts_edge_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
                    </div>
                    <div class="edgtf-post-info-bottom-right">
                        <?php pintsandcrafts_edge_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>