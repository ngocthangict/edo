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

add_action( 'edo_mini_cart', 'woocommerce_mini_cart' );

/**
* Category Slider
**/
if( ! function_exists( 'edo_category_slider' ) ) {
    
    add_filter( 'kt_before_shop_product', 'edo_category_slider', 2 );
    function edo_category_slider(){
    	if(is_product_category()){
    		$cate = get_queried_object();
	        $cateID = $cate->term_id;
	        $category_slider = get_tax_meta($cateID, 'kt_category_slider');
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

/**
 * 
 * */
if( ! function_exists( 'edo_add_div_before_shop_page' ) ){
    function edo_add_div_before_shop_page(){
    	if(is_product_category() || is_shop()){
    		$kt_woo_grid_column = edo_option('kt_woo_grid_column',3);
    
    		$list_style='';
    		if(isset($_SESSION['shop_products_list_style'])){
    	        $shop_products_list_style = $_SESSION['shop_products_list_style'];
    	        if($shop_products_list_style=='list'){
    	        	$list_style = 'products-list-view';
    	        }
    	    }
    		?>
    		<div class="category-products <?php echo esc_attr( $list_style );?> <?php echo esc_attr('list-'.$kt_woo_grid_column.'-columns');?>">
    		<?php
    	}
    }
}

add_filter( 'kt_after_shop_product', 'edo_add_div_after_shop_page', 2 );

/**
 * 
 * */
if( ! function_exists( 'edo_add_div_after_shop_page' ) ){
    function edo_add_div_after_shop_page(){
    	if(is_product_category() || is_shop()){
    		?>
    		</div>
    		<?php
    	}
    }
}
/**
 * Custom  products per page
 *
 */
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

if( ! function_exists( 'edo_custom_cart_button_text' ) ){
    function edo_custom_cart_button_text() {
        return __( 'Buy', 'woocommerce' );
    }
} 
//Remove pagination on the bottom of shop page 
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );

//Show pagination on the top of shop page
add_action( 'woocommerce_after_shop_loop', 'edo_paging_nav', 10 );
add_action( 'woocommerce_before_shop_loop', 'edo_paging_nav', 10 );

//remove woocommerce resultcount
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

add_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 30 );

/**
 * add products display
 * 
 */
if( ! function_exists( 'edo_custom_display_view' ) ){
    add_filter( 'woocommerce_before_shop_loop' , 'edo_custom_display_view' );
    add_filter( 'woocommerce_after_shop_loop' , 'edo_custom_display_view' );
    function edo_custom_display_view(){
    	$shop_products_list_style ='grid';
    	if(isset($_SESSION['shop_products_list_style'])){
	        $shop_products_list_style = $_SESSION['shop_products_list_style'];
	    }
       ?>
       <ul class="display-product-option">
            <li data-type="grid" class="view-as-grid <?php if($shop_products_list_style=='grid'): echo esc_attr( 'selected' ); endif;?>">
                <span><?php _e( 'grid', 'edo' ) ?></span>
            </li>
            <li data-type="list" class="view-as-list <?php if($shop_products_list_style=='list'): echo esc_attr( 'selected' ); endif;?>">
                <span><?php _e( 'list', 'edo' ) ?></span>
            </li>
        </ul>
       <?php
    }
}

/** 
 * Ajax set product list style
 * 
 */
if( ! function_exists( 'wp_ajax_fronted_set_products_view_style_callback' ) ){
    function  wp_ajax_fronted_set_products_view_style_callback(){
        check_ajax_referer( 'ajax_frontend', 'security' );
        $type = $_POST['type'];
        
        $_SESSION['shop_products_list_style'] = $type;
        die;
    }
}

add_action( 'wp_ajax_fronted_set_products_view_style', 'wp_ajax_fronted_set_products_view_style_callback' );
add_action( 'wp_ajax_nopriv_fronted_set_products_view_style', 'wp_ajax_fronted_set_products_view_style_callback' );

/**
 * Product Quick View callback AJAX request 
 *
 * @since 1.0
 * @return html
 */
if( ! function_exists( 'wp_ajax_frontend_product_quick_view_callback' ) ){
    function wp_ajax_frontend_product_quick_view_callback() {
        check_ajax_referer( 'ajax_frontend', 'security' );
        global $product, $woocommerce, $post;
    
    	$product_id = $_POST["product_id"];
    	
    	$post = get_post( $product_id );
    
    	$product = wc_get_product( $product_id );
        
        // Call our template to display the product infos
        wc_get_template( 'content-single-product-quick-view.php');
        die();
        
    }
}

add_action( 'wp_ajax_frontend_product_quick_view', 'wp_ajax_frontend_product_quick_view_callback' );
add_action( 'wp_ajax_nopriv_frontend_product_quick_view', 'wp_ajax_frontend_product_quick_view_callback' );

/**
 * Rating
 * 
 */
remove_action( 'woocommerce_single_product_summary' ,'woocommerce_template_single_rating',10);
add_filter("woocommerce_single_product_summary", "woocommerce_template_single_rating", 11);

/**
* Custom add to cart single product
* */
function edo_single_add_to_cart_text( $wcpgsk_single_cart_button_text, $number ) 
{
    // make filter magic happen here...
    $wcpgsk_single_cart_button_text = __('Buy','edo');
    return $wcpgsk_single_cart_button_text;
};
        
/**
 *  add the filter
 * 
 */
add_filter( 'single_add_to_cart_text', 'edo_single_add_to_cart_text', 10, 3 );

/**
 * remove hock woocommerce_template_single_meta
 * 
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta' , 40 );

/**
 * 
 * Custom compare wishilist share print
*/
if(!function_exists('edo_group_button_single_product')){
	add_filter( 'woocommerce_single_product_summary','edo_group_button_single_product' ,60);
	function edo_group_button_single_product(){
		?>
		<div class="box-control-button">
			<?php
			if(class_exists('YITH_WCWL_UI')){
	            echo do_shortcode('[yith_wcwl_add_to_wishlist]');    
	        }
	        if(defined( 'YITH_WOOCOMPARE' )){
	            echo do_shortcode('[yith_compare_button]');
	        }
	        ?>
	        <a class="link-sendmail" href="#"><?php _e( 'Email to a Friend', 'edo' ) ?></a>
	        <a class="link-print" href="#"><?php _e( 'Print', 'edo' ) ?></a>
		</div>
		<?php
	}
}

/**
 *  Add top sell in single product
 * 
 * */
if( ! function_exists( 'edo_box_topsell_single_product' ) ){
	add_filter( 'edo_single_product_box_right','edo_box_topsell_single_product' ,1);
	function edo_box_topsell_single_product(){
		wc_get_template_part('content','box-topsell');
	}
}
/**
 * 
 * Add sub category in single product
 * 
 * */
if( ! function_exists( 'edo_box_sub_category_single_product' ) ) {
	add_filter( 'edo_single_product_box_bottom','edo_box_sub_category_single_product' ,1);
	function edo_box_sub_category_single_product(){
		wc_get_template_part('content','box-sub-cat-single-product');
	}
}



/*
* Custom Quick view
*/
add_filter( 'woocommerce_before_quickview_product', 'woocommerce_show_product_sale_flash', 10 );
add_filter( 'woocommerce_before_quickview_product', 'woocommerce_show_product_images', 20 );
add_filter( 'woocommerce_quickview_product_summary', 'woocommerce_template_single_title', 5 );
add_filter( 'woocommerce_quickview_product_summary', 'woocommerce_template_single_price', 6 );
add_filter( 'woocommerce_quickview_product_summary', 'woocommerce_template_single_rating', 10 );
add_filter( 'woocommerce_quickview_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_filter( 'woocommerce_quickview_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

