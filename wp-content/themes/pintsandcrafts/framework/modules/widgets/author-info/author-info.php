<?php

class PintsAndCraftsPhpClassAuthorInfoWidget extends PintsAndCraftsPhpClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_author_info_widget',
			esc_html__( 'Edge Author Info Widget', 'pintsandcrafts' ),
			array( 'description' => esc_html__( 'Add author info element to widget areas', 'pintsandcrafts' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'  => 'textfield',
				'name'  => 'widget_title',
				'title' => esc_html__( 'Widget Title', 'pintsandcrafts' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'extra_class',
				'title' => esc_html__( 'Custom CSS Class', 'pintsandcrafts' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'author_username',
				'title' => esc_html__( 'Author Username', 'pintsandcrafts' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		extract( $args );
		
		$extra_class = '';
		if ( ! empty( $instance['extra_class'] ) ) {
			$extra_class = $instance['extra_class'];
		}
		
		$authorID = 1;
		if ( ! empty( $instance['author_username'] ) ) {
			$author = get_user_by( 'login', $instance['author_username'] );
			
			if ( $author ) {
				$authorID = $author->ID;
			}
		}

		$author_info = get_the_author_meta( 'description', $authorID );
		?>

		<div class="widget edgtf-author-info-widget <?php echo esc_html( $extra_class ); ?>">
			<?php if ( ! empty( $instance['widget_title'] ) ) {
				echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
			} ?>
			<div class="edgtf-aiw-inner">
				<a itemprop="url" class="edgtf-aiw-image" href="<?php echo esc_url( get_author_posts_url( $authorID ) ); ?>">
					<?php echo pintsandcrafts_edge_kses_img( get_avatar( $authorID, 254 ) ); ?>
				</a>
				<?php if ( $author_info !== "" ) { ?>
					<h4 class="qodef-aiw-title vcard author">
						<a itemprop="url" href="<?php echo esc_url( get_author_posts_url( $authorID ) ); ?>" title="<?php the_title_attribute(); ?>">
							<span class="fn">
								<?php
								if ( get_the_author_meta( 'first_name', $authorID ) != "" || get_the_author_meta( 'last_name', $authorID ) != "" ) {
									echo esc_html( get_the_author_meta( 'first_name', $authorID ) ) . " " . esc_html( get_the_author_meta( 'last_name', $authorID ) );
								} else {
									echo esc_html( get_the_author_meta( 'display_name', $authorID ) );
								}
								?>
							</span>
						</a>
					</h4>
					<p itemprop="description" class="qodef-aiw-text"><?php echo wp_kses_post( $author_info ); ?></p>
				<?php } ?>
			</div>
		</div>
		<?php
	}
}