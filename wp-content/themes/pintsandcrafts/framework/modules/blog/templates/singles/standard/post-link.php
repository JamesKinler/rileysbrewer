<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="edgtf-post-content">
        <div class="edgtf-post-text">
            <div class="edgtf-post-text-inner">
                <div class="edgtf-post-text-main">
                    <div class="edgtf-post-mark">
                        <span class="fa fa-link edgtf-link-mark"></span>
                    </div>
                    <?php pintsandcrafts_edge_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="edgtf-post-additional-content">
        <?php the_content(); ?>
    </div>
</article>