<div class="edgtf-testimonials-holder clearfix <?php echo esc_attr($holder_classes); ?>">
    <div class="edgtf-testimonials edgtf-owl-slider" <?php echo pintsandcrafts_edge_get_inline_attrs( $data_attr ); ?>>

    <?php if ( $query_results->have_posts() ):
        while ( $query_results->have_posts() ) : $query_results->the_post();
            $title    = get_post_meta( get_the_ID(), 'edgtf_testimonial_title', true );
            $text     = get_post_meta( get_the_ID(), 'edgtf_testimonial_text', true );
            $author   = get_post_meta( get_the_ID(), 'edgtf_testimonial_author', true );
            $position = get_post_meta( get_the_ID(), 'edgtf_testimonial_author_position', true );

            $current_id = get_the_ID();
    ?>

	    <div class="edgtf-testimonial-content" id="edgtf-testimonials-<?php echo esc_attr( $current_id ) ?>">
	        <div class="edgtf-testimonial-text-holder">
	            <?php if ( ! empty( $text ) ) { ?>
	                <p class="edgtf-testimonial-text"><?php echo esc_html( $text ); ?></p>
	            <?php } ?>
	            <?php if ( ! empty( $author ) ) { ?>
	                <h5 class="edgtf-testimonial-author">
	                    <span class="edgtf-testimonials-author-name"><?php echo esc_html( $author ); ?></span>
	                    <?php if ( ! empty( $position ) ) { ?>
	                        <span class="edgtf-testimonials-author-job"><?php echo esc_html( $position ); ?></span>
	                    <?php } ?>
	                </h5>
	            <?php } ?>
	        </div>
	    </div>

    <?php
        endwhile;
    else:
        echo esc_html__( 'Sorry, no posts matched your criteria.', 'pintsandcrafts-core' );
    endif;

    wp_reset_postdata();
    ?>

    </div>
</div>