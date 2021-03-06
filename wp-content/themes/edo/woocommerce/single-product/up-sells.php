<?php
/**
 * Single Product Up-Sells
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

$upsells = $product->get_upsells();

if ( sizeof( $upsells ) == 0 ) {
	return;
}

$meta_query = WC()->query->get_meta_query();

$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => $posts_per_page,
	'orderby'             => $orderby,
	'post__in'            => $upsells,
	'post__not_in'        => array( $product->id ),
	'meta_query'          => $meta_query
);

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>
	<?php
		$kt_woo_single_sidebar_are = edo_option( 'kt_woo_single_sidebar_are' ,'full');
		$item_desktop = 5;
		$items_tablet = 3;
		if( $kt_woo_single_sidebar_are !="full"){
			$item_desktop = 4;
			$items_tablet = 2;
		}
		$data_carousel = array(
	        "navigation" => 'true',
	        "margin"    => 20,
	        "autoheight" => 'false',
	        'nav' => 'true',
	        'dots' => 'false',
	        'loop' => 'true',
	        'autoplayHoverPause' => 'true'
	    );
	    $arr = array(   
	        '0' => array(
	            "items" => 1
	        ), 
	        '768' => array(
	            "items" => $items_tablet
	        ), 
	        '992' => array(
	            "items" => $item_desktop
	        )
	    );
	    $data_responsive = json_encode($arr);
	    $data_carousel["responsive"] = $data_responsive;
		?>
	<!-- Up-sell -->
	<div class="block block-products-owl">
		<div class="block-head">
			<div class="block-title">
				<div class="block-title-text text-lg"><?php esc_html_e( 'UPSELL PRODUCTS', 'woocommerce' ) ?></div>
			</div>
		</div>
		<div class="block-inner">
			<ul class="products kt-owl-carousel" <?php echo _data_carousel($data_carousel); ?>>

				<?php while ( $products->have_posts() ) : $products->the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			</ul>
		</div>
	</div>
	<!-- .Up-sell -->

<?php endif;

wp_reset_postdata();

