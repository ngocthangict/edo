<div class="product-info">
	<?php 
        /**
         * edo_wc_loop_product_price hook
         * 
         * @hook woocommerce_template_loop_price - 10
         * */
        do_action( 'edo_wc_loop_product_price' )
     ?>
	<?php 
        /**
         * edo_wc_loop_product_rating hook
         * 
         * @hook woocommerce_template_loop_rating - 10
         * */
        do_action( 'edo_wc_loop_product_rating' )
     ?>
    <div class="product-img">
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
</div>