<?php
$contents = get_post_meta( get_the_ID(), 'edgtf_contents_woo_meta', true );

if ( ! empty( $contents ) && $display_content_info === 'yes' ) { ?>
	<p class="edgtf-pl-contents"><?php echo esc_html( $contents ); ?></p>
<?php }
