<?php
/**
 * The template for displaying product content within loops.
 *
 * @author  AngelsIT
 * @package Edo/wooCommerce/
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;
?>
<div class="image">
	<a class="product-img" href="<?php the_permalink() ?>">
        <?php
			/**
			 * woocommerce_template_loop_product_thumbnail hook
			 *
			 * @hooked edo_wc_loop_product_thumbnail - 10
			 */
			do_action( 'edo_wc_loop_product_thumbnail' );
		?>
    </a>
</div>
<div class="title">
	<a href="<?php the_permalink() ?>">
        <?php 
        	/**
        	 * woocommerce_shop_loop_item_title hook
        	 *
        	 * @hooked woocommerce_template_loop_product_title - 10
        	 */
        	do_action( 'woocommerce_shop_loop_item_title' );
        ?>
    </a>
</div>
<div class="button-action">
    <?php 
    echo sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button-radius %s product_type_%s">%s%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( $product->id ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
		esc_attr( $product->product_type ),
		'shop now',
		'<span class="icon"></span>'
	);
    ?>
</div>