<?php
/**
 * Remove noties of wootheme update
 * */
if(is_admin())
    remove_action( 'admin_notices', 'woothemes_updater_notice' );

//LOOP THUMBNAIL
add_action( 'edo_wc_loop_product_thumbnail', 'woocommerce_template_loop_product_thumbnail' );

//LABLE FLASH NEW
add_action( 'edo_wc_loop_product_label', 'edo_show_product_loop_new_flash', 5 );

//FLASH SALE
add_action( 'edo_wc_loop_product_label', 'woocommerce_show_product_loop_sale_flash', 10 );

//PRICE
add_action( 'edo_wc_loop_product_price', 'woocommerce_template_loop_price', 10 );

//RATING
add_action( 'edo_wc_loop_product_rating', 'woocommerce_template_loop_rating', 10 );

add_filter( "woocommerce_product_get_rating_html", "edo_wc_loop_product_rating", 10, 2);

//WISHLISH
add_action( 'edo_wc_loop_product_wishlish', 'edo_get_tool_wishlish' );

//COMPARE
add_action( 'edo_wc_loop_product_compare', 'edo_get_tool_compare' );

//QUICKVIEW
add_action( 'edo_wc_loop_function_quickview', 'edo_get_tool_quickview' );

//MINICART
add_action( 'edo_mini_cart', 'woocommerce_mini_cart' );

/**
 * Mini cart template
 * @subpackage Loop
 * @since edo 1.0
 * */
 
if( ! function_exists( 'edo_get_tool_quickview' ) ){
    function edo_get_tool_quickview(){
        echo sprintf('<a title="%1$s" data-id="%2$s" class="btn-quick-view" href="#"></a>', __('Quick view', 'edo'), get_the_ID() );
    }
}

/**
 * Template button compare
 * @subpackage Loop
 * @since edo 1.0
 * */

if( ! function_exists('edo_get_tool_compare')){
    function edo_get_tool_compare(){
        if(defined( 'YITH_WOOCOMPARE' )){
            echo do_shortcode('[yith_compare_button]');
        }
    }
}

/**
 * Template button wishlish
 * @subpackage Loop
 * @since edo 1.0
 * */
 
if( ! function_exists('edo_get_tool_wishlish') ){
    function edo_get_tool_wishlish(){
        if(class_exists('YITH_WCWL_UI')){
            echo do_shortcode('[yith_wcwl_add_to_wishlist]');    
        }
    }
}

/**
 * Template button new-flash
 * @subpackage Loop
 * @since edo 1.0
 * */

if ( ! function_exists( 'edo_show_product_loop_new_flash' ) ) {
	function edo_show_product_loop_new_flash() {
		wc_get_template( 'loop/new-flash.php' );
	}
}

/**
 * Template rating
 * @subpackage Loop
 * @since edo 1.0
 * */
if( ! function_exists( 'edo_wc_loop_product_rating' )){
    function edo_wc_loop_product_rating($rating_html, $rating){
        $rating_html = '';
        global $product;
        if ( ! is_numeric( $rating ) ) {
            $rating = $product->get_average_rating();
        }
        $rating_html  = '<div class="product-star" title="' . sprintf( __( 'Rated %s out of 5', 'kutetheme' ), $rating > 0 ? $rating : 0  ) . '">';
        for($i = 1;$i <= 5 ;$i++){
            if($rating >= $i){
                if( ( $rating - $i ) > 0 && ( $rating - $i ) < 1 ){
                    $rating_html .= '<i class="fa fa-star-half-o"></i>';    
                }else{
                    $rating_html .= '<i class="fa fa-star"></i>';
                }
            }else{
                $rating_html .= '<i class="fa fa-star-o"></i>';
            }
        }
        $rating_html .= '</div>';
        return $rating_html;
    }
}

/**
 * Output the before in product loop. By default this is a li.product
 * @subpackage Loop
 * @param bool $echo
 * @return string
 */
if ( ! function_exists( 'edo_woocommerce_product_loop_item_before' ) ) {
	function edo_woocommerce_product_loop_item_before( $echo = true ) {
		ob_start();
		wc_get_template( 'loop/loop-item-before.php' );
		if ( $echo )
			echo ob_get_clean();
		else
			return ob_get_clean();
	}
}

/**
 * Output the after in product loop. By default this is a li.product
 * @subpackage Loop
 * @param bool $echo
 * @return string
 */
if ( ! function_exists( 'edo_woocommerce_product_loop_item_after' ) ) {
	function edo_woocommerce_product_loop_item_after( $echo = true ) {
		ob_start();
		wc_get_template( 'loop/loop-item-after.php' );
		if ( $echo )
			echo ob_get_clean();
		else
			return ob_get_clean();
	}
}
