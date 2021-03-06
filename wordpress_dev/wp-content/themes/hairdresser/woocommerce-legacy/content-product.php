<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
    $woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
    $woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}
// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ) {
    $classes[] = 'first';
}
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
    $classes[] = 'last';
}

global $anps_shop_data;

if( isset($anps_shop_data['shop_columns']) && ( is_shop() || is_product_category() || is_product_tag() ) ) {
	switch( $anps_shop_data['shop_columns'] ) {
		case '2 columns': $classes[] = 'col-sm-6'; break;
		case '3 columns': $classes[] = 'col-sm-4'; break;
		case '4 columns': $classes[] = 'col-sm-3'; break;
	}
} elseif(isset($anps_shop_data['shop_columns'])) { 
        switch( $anps_shop_data['shop_columns'] ) {
		case '2 columns': $classes[] = 'col-sm-6'; break;
		case '3 columns': $classes[] = 'col-sm-4'; break;
		case '4 columns': $classes[] = 'col-sm-3'; break;
	}
}else {
	$classes[] = 'col-sm-3';
}

?>
<li <?php post_class( $classes ); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

		<div class="product-header">
			<?php
				/**
				 * woocommerce_before_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked woocommerce_template_loop_product_thumbnail - 10
				 */
				do_action( 'woocommerce_before_shop_loop_item_title' );

				echo '<div class="add-to-cart-wrapper">';
				echo apply_filters( 'woocommerce_loop_add_to_cart_link',
					sprintf( '<a href="%s" rel="nofollow" data-quantity="1" data-product_id="%s" data-product_sku="%s" class="btn btn-md %s %s product_type_%s">%s</a>',
						esc_url( $product->add_to_cart_url() ),
						esc_attr( $product->id ),
						esc_attr( $product->get_sku() ),
						'yes' === get_option( 'woocommerce_enable_ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
						$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
						esc_attr( $product->product_type ),
						esc_html( $product->add_to_cart_text() )
					),
				$product );
				echo '</div>';
			?>
		</div>

		<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>

		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>

	

	<?php
 
        /**
         * woocommerce_after_shop_loop_item hook
         *
         * @hooked woocommerce_template_loop_add_to_cart - 10
         */
        do_action( 'woocommerce_after_shop_loop_item' );
 
        ?>

</li>