<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget
 *
 * @author 		KuteTheme
 * @package 	THEME/WooCommerce
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<?php do_action( 'woocommerce_before_mini_cart' ); ?>

<?php
    $check_out_url = WC()->cart->get_cart_url();
    $total         = WC()->cart->get_cart_total();
    $count         = WC()->cart->cart_contents_count; 
    $edo_used_header = edo_option('edo_used_header', '1');
?>
<div class="iner-block-cart box-radius">
	<a href="<?php echo $check_out_url; ?>">
		<span class="total"><?php echo $total; ?></span>
	</a>
</div>
<?php if ( ! WC()->cart->is_empty() ) : ?>
<div class="block-mini-cart">
	<div class="mini-cart-content">
        <h5 class="mini-cart-head">
            <?php _e( sprintf ( _n( '%d item in my cart', '%d items in my cart', $count, 'edo' ), $count ), 'edo' ); ?>
        </h5>
        <div class="mini-cart-list">
            <ul>
                <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ):
                    $bag_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                
                    if ( $bag_product &&  $bag_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ): 
                    
                        $product_name  = apply_filters( 'woocommerce_cart_item_name', $bag_product->get_title(), $cart_item, $cart_item_key );
        				$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $bag_product->get_image('100x122'), $cart_item, $cart_item_key );
        				$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $bag_product ), $cart_item, $cart_item_key );
                    ?>
                    <li class="product-info <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item product-info', $cart_item, $cart_item_key ) ); ?>">
                        <div class="p-left">
                            <?php
        						echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
        							'<a href="%s" class="remove remove_link" title="%s" data-product_id="%s" data-product_sku="%s"></a>',
        							esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
        							__( 'Remove this item', 'edo' ),
        							esc_attr( $product_id ),
        							esc_attr( $bag_product->get_sku() )
        						), $cart_item_key );
        					?>
                            <a href="<?php echo get_permalink($cart_item['product_id']) ?>">
                                <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                            </a>
                        </div>
                        <div class="p-right">
                            <p class="p-name"><?php echo $product_name; ?></p>
                            <p class="product-price"><?php echo $product_price ?></p>
                            <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<p class="quantity">' . sprintf( __('Qty: ', 'edo').__('%s', 'edo'), $cart_item['quantity'] ) . '</p>', $cart_item, $cart_item_key ); ?>
                        </div>
                    </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="toal-cart">
            <span><?php _e( 'Total', 'edo' ); ?></span>
            <span class="toal-price pull-right"><?php echo $total; ?></span>
        </div>
        <div class="cart-buttons">
            <a href="<?php echo esc_url( $check_out_url ); ?>" class="button-radius btn-check-out"><?php echo _e( 'Checkout', 'kutetheme' ); ?><span class="icon"></span></a>
        </div>
    </div>
</div>
<?php endif; ?>
<?php do_action( 'woocommerce_after_mini_cart' ); ?>