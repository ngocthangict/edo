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
?>
<div class="product-container">
    <div class="product-left">
        <div class="product-thumb">
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
			<?php 
                /**
                 * edo_get_tool_quickview hook
                 * 
                 * @hook edo_wc_loop_function_quickview
                 * */
                do_action( 'edo_wc_loop_function_quickview' ) 
            ?>
        </div>
    </div>
    <div class="product-right">
        <div class="product-name">
        	<?php 
    			/**
    			 * woocommerce_shop_loop_item_title hook
    			 *
    			 * @hooked woocommerce_template_loop_product_title - 10
    			 */
    			do_action( 'woocommerce_shop_loop_item_title' );
            ?>
        </div>
        <?php 
            /**
             * edo_wc_loop_product_price hook
             * 
             * @hook woocommerce_template_loop_price - 10
             * */
            do_action( 'edo_wc_loop_product_price' )
         ?>
        <div class="product-button">
        	<?php
        		/**
        		 * edo_wc_loop_product_compare hook
        		 *
        		 * @hooked edo_get_tool_wishlish - 10
        		 */
        		do_action( 'edo_wc_loop_product_wishlish' );
        
        	?>
            
            <?php
        		/**
        		 * edo_wc_loop_product_compare hook
        		 *
        		 * @hooked edo_get_tool_compare - 10
        		 */
        		do_action( 'edo_wc_loop_product_compare' );
        
        	?>
            
            <?php
        		/**
        		 * woocommerce_after_shop_loop_item hook
        		 *
        		 * @hooked woocommerce_template_loop_add_to_cart - 10
        		 */
        		do_action( 'woocommerce_after_shop_loop_item' );
        	?>
        </div>
    </div>
</div>