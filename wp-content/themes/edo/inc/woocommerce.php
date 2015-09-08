<?php
/**
 * Remove noties of wootheme update
 * */
if(is_admin())
    remove_action( 'admin_notices', 'woothemes_updater_notice' );

/**
 * Mini cart
 * */
add_action( 'edo_mini_cart', 'woocommerce_mini_cart' );

/**
* Category Slider
**/
if( ! function_exists( 'edo_category_slider' ) ) {
    add_filter( 'kt_before_shop_product','edo_category_slider', 2 );
    function edo_category_slider(){
    	if(is_product_category()){
    		$cate = get_queried_object();
	        $cateID = $cate->term_id;
	        $category_slider = get_tax_meta($cateID,'kt_category_slider');
	        if($category_slider){
	            $list_image = explode('|', $category_slider['url']);
	            if(count($list_image)>1){
	                ?>
	                <div class="block block-categories-slider">
		                <div class="list kt-owl-carousel" data-animateout="fadeOut" data-animateIn="fadeIn" data-items="1" data-autoplay="true" data-margin="0" data-loop="true" data-nav="true">
							<?php
							foreach($list_image as $url){
								?>
								<img src="<?php echo esc_url( $url );?>" alt="<?php echo esc_attr( $cate->name );?>">
								<?php
							}
							?>
						</div>
					</div>
	                <?php
	            }elseif (count($list_image)>0) {
	                ?>
	                <div class="block block-categories-slider">
		                <div class="list">
							<?php
							foreach($list_image as $url){
								?>
								<img src="<?php echo esc_url( $url );?>" alt="<?php echo esc_attr( $cate->name );?>">
								<?php
							}
							?>
						</div>
					</div>
	                <?php
	            }
    		}
    	}
	}
}
/**
* Custom Shop title
**/
if(!function_exists('edo_shop_page_title')){
	add_filter( 'woocommerce_page_title', 'edo_shop_page_title');
	function edo_shop_page_title( $page_title ) {
		if(defined( 'YITH_WOOCOMPARE' )){
	        global $yith_woocompare;
	        $count = count($yith_woocompare->obj->products_list);
	        $page_title.='<a href="#" class="button-radius compare-link yith-woocompare yith-woocompare-open">'.__('Compare', 'edo').' ('.$count.')<span class="icon"></span></a>';
	    }
	    return $page_title;
	}
}
/**
* Custom loop colums
**/
if(!function_exists('edo_loop_columns')){
	add_filter('loop_shop_columns', 'edo_loop_columns');
	if (!function_exists('edo_loop_columns')) {
		function edo_loop_columns() {
			$kt_woo_grid_column = edo_option('kt_woo_grid_column',3);
			return $kt_woo_grid_column; // 4 products per row
		}
	}
}

// Add div before list product
add_filter( 'kt_before_shop_product', 'edo_add_div_before_shop_page', 2 );
function edo_add_div_before_shop_page(){
	if(is_product_category() || is_shop()){
		$kt_woo_grid_column = edo_option('kt_woo_grid_column',3);

		?>
		<div class="category-products <?php echo esc_attr('list-'.$kt_woo_grid_column.'-columns');?>">
		<?php
	}
}
add_filter( 'kt_after_shop_product', 'edo_add_div_after_shop_page', 2 );
function edo_add_div_after_shop_page(){
	if(is_product_category() || is_shop()){
		?>
		</div>
		<?php
	}
}

/**
 * Custom  products per page
**/
add_filter( 'loop_shop_per_page','edo_custom_products_per_page', 20 );

if( ! function_exists( 'edo_custom_products_per_page' )){
    function edo_custom_products_per_page(){
        $loop_shop_per_page = edo_option('kt_woo_products_perpage',18);
        // Display 24 products per page. Goes in functions.php
        return $loop_shop_per_page;
    }
}

// Custom postion price and rating
remove_filter('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating' ,5);
remove_filter('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price' ,10);

add_filter('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating' ,6);
add_filter('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price' ,5);

// Custom text button add cart
add_filter( 'woocommerce_product_add_to_cart_text', 'edo_custom_cart_button_text' );    // 2.1 +
 
function edo_custom_cart_button_text() {
        return __( 'Buy', 'woocommerce' );
}


// Custom rating
add_filter("woocommerce_product_get_rating_html", "edo_get_rating_html", 10, 2);
function edo_get_rating_html($rating_html, $rating){
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

/* Remove pagination on the bottom of shop page */
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );

/* Show pagination on the top of shop page */
add_action( 'woocommerce_after_shop_loop', 'edo_paging_nav', 10 );
add_action( 'woocommerce_before_shop_loop', 'edo_paging_nav', 10 );
//remove woocommerce resultcount
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

add_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 30 );

// add products display

if( ! function_exists( 'edo_custom_display_view' ) ){
    add_filter( 'woocommerce_before_shop_loop' , 'edo_custom_display_view' );
    add_filter( 'woocommerce_after_shop_loop' , 'edo_custom_display_view' );
    function edo_custom_display_view(){
       ?>
       <ul class="display-product-option">
            <li class="view-as-grid selected">
                <span>grid</span>
            </li>
            <li class="view-as-list">
                <span>list</span>
            </li>
        </ul>
       <?php
    }
}