<?php

pintsandcrafts_edge_get_single_post_format_html($blog_single_type);

do_action('pintsandcrafts_edge_action_after_article_content');

pintsandcrafts_edge_get_module_template_part('templates/parts/single/author-info', 'blog');

pintsandcrafts_edge_get_module_template_part('templates/parts/single/single-navigation', 'blog');

pintsandcrafts_edge_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

pintsandcrafts_edge_get_module_template_part('templates/parts/single/comments', 'blog');