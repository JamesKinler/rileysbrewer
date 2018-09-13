<?php
$product = pintsandcrafts_edge_return_woocommerce_global_variable();

if ( $product->is_on_sale() ) { ?>
	<span class="edgtf-<?php echo esc_attr( $class_name ); ?>-onsale"><?php esc_html_e( 'Sale', 'pintsandcrafts' ); ?></span>
<?php } ?>

<?php if ( ! $product->is_in_stock() ) { ?>
	<span class="edgtf-<?php echo esc_attr( $class_name ); ?>-out-of-stock"><?php esc_html_e( 'Sold', 'pintsandcrafts' ); ?></span>
<?php }

$new = get_post_meta( get_the_ID(), 'edgtf_show_new_sign_woo_meta', true );

if ( $new === 'yes' ) { ?>
	<span class="edgtf-<?php echo esc_attr( $class_name ); ?>-new-product"><?php esc_html_e( 'New', 'pintsandcrafts' ); ?></span>
<?php }

$hover_image = get_post_meta(get_the_ID(), 'edgtf_product_hover_featured_image_meta', true);

$product_image_size = 'shop_catalog';
if ( $image_size === 'full' ) {
	$product_image_size = 'full';
} else if ( $image_size === 'square' ) {
	$product_image_size = 'pintsandcrafts_edge_square';
} else if ( $image_size === 'landscape' ) {
	$product_image_size = 'pintsandcrafts_edge_landscape';
} else if ( $image_size === 'portrait' ) {
	$product_image_size = 'pintsandcrafts_edge_portrait';
} else if ( $image_size === 'medium' ) {
	$product_image_size = 'medium';
} else if ( $image_size === 'large' ) {
	$product_image_size = 'large';
} else if ( $image_size === 'shop_thumbnail' ) {
	$product_image_size = 'shop_thumbnail';
}

if ( has_post_thumbnail() ) {
	the_post_thumbnail( apply_filters( 'pintsandcrafts_edge_filter_product_list_image_size', $product_image_size ) );
}

if(!empty($hover_image)) {
    echo '<img class="edgtf-attachment-shop-catalog" src="'.esc_url($hover_image).'" alt="'.esc_attr__('Product List Hover Image', 'pintsandcrafts').'" />';
}