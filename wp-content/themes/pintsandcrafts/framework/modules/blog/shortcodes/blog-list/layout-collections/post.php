<li class="edgtf-bl-item edgtf-item-space clearfix">
	<div class="edgtf-bli-inner">
		<div class="edgtf-bli-heading">
			<?php if ( $post_info_image == 'yes' && has_post_thumbnail() ) {
				pintsandcrafts_edge_get_module_template_part( 'templates/parts/media', 'blog', '', $params );
				
				if ( $post_info_date == 'yes' ) {
					pintsandcrafts_edge_get_module_template_part('templates/parts/post-info/date', 'blog', '', $params);
				}
			} ?>
		</div>
        <div class="edgtf-bli-content">
	        <?php pintsandcrafts_edge_get_module_template_part('templates/parts/title', 'blog', '', $params); ?>
	        
	        <?php if ($post_info_section == 'yes') { ?>
		        <div class="edgtf-bli-info">
			        <?php
			        if ( $post_info_author == 'yes' ) {
				        pintsandcrafts_edge_get_module_template_part( 'templates/parts/post-info/author', 'blog', '', $params );
			        }
			        if ( $post_info_category == 'yes' ) {
				        pintsandcrafts_edge_get_module_template_part( 'templates/parts/post-info/category', 'blog', '', $params );
			        }
			        if ( $post_info_comments == 'yes' ) {
				        pintsandcrafts_edge_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $params );
			        }
			        if ( ! has_post_thumbnail() && $post_info_date == 'yes' ) {
				        pintsandcrafts_edge_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params );
			        }
			        ?>
		        </div>
	        <?php } ?>
	
	        <div class="edgtf-bli-excerpt">
		        <?php pintsandcrafts_edge_get_module_template_part( 'templates/parts/excerpt', 'blog', '', $params ); ?>
		        <?php pintsandcrafts_edge_get_module_template_part( 'templates/parts/post-info/read-more', 'blog', '', $params ); ?>
	        </div>
        </div>
	</div>
</li>