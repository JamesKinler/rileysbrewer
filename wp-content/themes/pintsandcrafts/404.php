<?php get_header(); ?>
				<div class="edgtf-page-not-found">
					<?php
					$edgtf_title_image_404 = pintsandcrafts_edge_options()->getOptionValue( '404_page_title_image' );
					$edgtf_title_404       = pintsandcrafts_edge_options()->getOptionValue( '404_title' );
					$edgtf_subtitle_404    = pintsandcrafts_edge_options()->getOptionValue( '404_subtitle' );
					$edgtf_text_404        = pintsandcrafts_edge_options()->getOptionValue( '404_text' );
					$edgtf_button_label    = pintsandcrafts_edge_options()->getOptionValue( '404_back_to_home' );
					$edgtf_button_style    = pintsandcrafts_edge_options()->getOptionValue( '404_button_style' );
					
					if ( ! empty( $edgtf_title_image_404 ) ) { ?>
						<div class="edgtf-404-title-image">
							<img src="<?php echo esc_url( $edgtf_title_image_404 ); ?>" alt="<?php esc_attr_e( '404 Title Image', 'pintsandcrafts' ); ?>" />
						</div>
					<?php } ?>
					
					<h1 class="edgtf-404-title">
						<?php if ( ! empty( $edgtf_title_404 ) ) {
							echo esc_html( $edgtf_title_404 );
						} ?>
					</h1>

					<h2 class="edgtf-404-subtitle">
						<?php if ( ! empty( $edgtf_subtitle_404 ) ) {
							echo esc_html( $edgtf_subtitle_404 );
						} else {
							esc_html_e( 'Page you are looking is not found', 'pintsandcrafts' );
						} ?>
					</h2>
					
					<p class="edgtf-404-text">
						<?php if ( ! empty( $edgtf_text_404 ) ) {
							echo esc_html( $edgtf_text_404 );
						} else {
							esc_html_e( 'Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'pintsandcrafts' );
						} ?>
					</p>
					
					<?php
						$button_params = array(
                            'type'                  => 'bordered',
                            'predefined_styles'     => 'yellow-white',
							'link'                  => esc_url( home_url( '/' ) ),
							'text'                  => ! empty( $edgtf_button_label ) ? $edgtf_button_label : esc_html__( 'Back to home', 'pintsandcrafts' )
						);
					
						if ( $edgtf_button_style == 'light-style' ) {
							$button_params['custom_class'] = 'edgtf-btn-light-style';
						}
						
						echo pintsandcrafts_edge_return_button_html( $button_params );
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
