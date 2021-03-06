<?php
$edgtf_blog_type = 'masonry';
pintsandcrafts_edge_include_blog_helper_functions('lists', $edgtf_blog_type);
$edgtf_holder_params = pintsandcrafts_edge_get_holder_params_blog();
?>
<?php get_header(); ?>
<?php pintsandcrafts_edge_get_title(); ?>
<?php get_template_part('slider'); ?>
<?php do_action('pintsandcrafts_edge_action_before_main_content'); ?>
    <div class="<?php echo esc_attr($edgtf_holder_params['holder']); ?>">
        <?php do_action('pintsandcrafts_edge_action_after_container_open'); ?>
        <div class="<?php echo esc_attr($edgtf_holder_params['inner']); ?>">
	        <?php pintsandcrafts_edge_get_blog($edgtf_blog_type); ?>
	    </div>
	    <?php do_action('pintsandcrafts_edge_action_before_container_close'); ?>
	</div>
	<?php do_action('pintsandcrafts_edge_action_blog_list_additional_tags'); ?>
<?php get_footer(); ?>