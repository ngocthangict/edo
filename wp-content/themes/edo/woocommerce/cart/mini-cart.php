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
    $edo_used_header = edo_option( 'kt_used_header', '1' );
?>
<div class="widget_shopping_cart_content">
    <?php if( $edo_used_header == 2 ): ?>
    <a class="link-cart" href="<?php echo esc_url( $check_out_url ); ?>">
		<span class="icon cart"></span>
		<span class="line1"><?php esc_html_e( 'Shopping Cart', 'edo' ) ?><br /><strong><?php echo WC()->cart->get_cart_total() ; ?></strong></span>
	</a>
    <?php elseif( $edo_used_header == 3):?>
        <div class="iner-block-cart">
            <a href="<?php echo esc_url( $check_out_url ); ?>">
                <span class="total"><?php echo WC()->cart->get_cart_total(); ?></span>
            </a>
        </div>
    <?php elseif( $edo_used_header == 4 ):?>
        <div class="iner-block-cart">
            <a href="<?php echo esc_url( $check_out_url ); ?>">
                <span class="total">
                    <?php 
                    if( $count > 1){
                        echo intval( $count )." ".__( 'Items', 'edo');
                    }else{
                        echo intval( $count )." ".__( 'Item', 'edo');
                    }
                    ?>
                </span>
            </a>
        </div>
    <?php else: //Option 1 ?>
    <div class="iner-block-cart box-radius">
    	<a href="<?php echo esc_url( $check_out_url ) ; ?>">
    		<span class="total"><?php echo WC()->cart->get_cart_total() ?></span>
    	</a>
    </div>
    <?php endif; ?>

    <?php if ( ! WC()->cart->is_empty() ) : ?>
    <div class="block-mini-cart">
    	<div class="mini-cart-content">
            <h5 class="mini-cart-head">
                <?php echo sprintf( _n( '%s item in my cart', '%s items in my cart', $count, 'edo' ), $count ); ?>
            </h5>
            <div class="mini-cart-list">
                <ul>
                    <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ):
                        $bag_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                        $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                    
                    if ( $bag_product &&  $bag_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ): 
                        $product_name  = apply_filters( 'woocommerce_cart_item_name', $bag_product->get_title(), $cart_item, $cart_item_key );
        				$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $bag_product->get_image( ), $cart_item, $cart_item_key );
        				$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $bag_product ), $cart_item, $cart_item_key );
                    ?>
                    <li class="product-info <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item product-info', $cart_item, $cart_item_key ) ); ?>">
                        <div class="p-left">
                            <?php
        						echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
        							'<a href="%s" class="remove_link" title="%s" data-product_id="%s" data-product_sku="%s"></a>',
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
                            <p class="p-name"><?php echo esc_html( $product_name ) ; ?></p>
                            <p class="product-price"><?php echo sprintf( '%s',$product_price ) ?></p>
                            <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<p class="quantity">' . sprintf( esc_attr__('Qty: ', 'edo').__('%s', 'edo'), $cart_item['quantity'] ) . '</p>', $cart_item, $cart_item_key ); ?>
                        </div>
                    </li>
                    <?php endif; ?>
                <?php endforeach; ?>
                </ul>
            </div>
            <div class="toal-cart">
                <span><?php esc_html_e( 'Total', 'edo' ); ?></span>
                <span class="toal-price pull-right"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
            </div>
            <div class="cart-buttons">
                <a href="<?php echo esc_url( $check_out_url ); ?>" class="button-radius btn-check-out"><?php echo esc_html_e( 'Checkout', 'edo' ); ?><span class="icon"></span></a>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php do_action( 'woocommerce_after_mini_cart' ); ?>