<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
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
// Bootstrap Column
$bootstrapColumn = round( 12 / $woocommerce_loop['columns'] );
//$classes[] = 'col-xs-12 col-sm-'. $bootstrapColumn .' col-md-' . $bootstrapColumn;
?>
<li <?php post_class( $classes ); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
	<div class="product-container">
		<div class="inner">
			<div class="product-left">
				<div class="product-thumb">
					<a class="product-img" href="<?php the_permalink();?>">
					<?php 
						/**
						* woocommerce_before_shop_loop_item_title hook
						*
						* @hooked woocommerce_show_product_loop_sale_flash - 10
						* @hooked woocommerce_template_loop_product_thumbnail - 10
						*/
						do_action( 'woocommerce_before_shop_loop_item_title' );
					?>
					</a>
					<?php 
		                /**
		                 * edo_get_tool_quickview hook
		                 * 
		                 * @hook edo_wc_loop_function_quickview
		                 * */
		                do_action( 'edo_wc_loop_function_quickview' ); 
		            ?>
				</div>
				<div class="product-status">
					<div class="product-status">
		                <?php 
		                /**
		        			 * edo_wc_loop_product_label hook
		                     * 
		        			 * @hooked edo_show_product_loop_new_flash - 5
		        			 * @hooked woocommerce_show_product_loop_sale_flash - 10
		        			 */
		        			do_action( 'edo_wc_loop_product_label' );
		                 ?>
		    		</div>
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
				 * woocommerce_after_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_template_loop_rating - 5
				 * @hooked woocommerce_template_loop_price - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );
				?>
				<div class="desc">
					<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
				</div>
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
	</div>
	

</li>
