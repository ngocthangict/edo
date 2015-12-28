<?php
/**
 * Remove noties of wootheme update
 * */
if(is_admin())
    remove_action( 'admin_notices', 'woothemes_updater_notice' );

add_action( 'woocommerce_save_product_variation', 'edo_wc_save_product_variation', 10, 2 );

add_action( 'woocommerce_variable_product_sync', 'edo_wc_variable_product_sync', 10, 2 );

add_action( 'woocommerce_process_product_meta_simple', 'edo_wc_process_product_meta', 10, 1 );

add_action( 'woocommerce_process_product_meta_external', 'edo_wc_process_product_meta', 10, 1 );

add_action( 'woocommerce_process_product_meta_grouped', 'edo_wc_process_product_meta_grouped', 10, 1 );

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

//MINICART
add_action( 'edo_mini_cart', 'woocommerce_mini_cart' );

/**
 * Save product variation
 * @subpackage Meta box data
 * @since edo 1.0
 * @hook woocommerce_save_product_variation hook
 * */
if( ! function_exists( 'edo_wc_save_product_variation' ) ){
    function edo_wc_save_product_variation( $variation_id, $i ){
        // Price handling
        $variable_regular_price = $_POST['variable_regular_price'];
        $variable_sale_price    = $_POST['variable_sale_price'];
        
    	$regular_price = wc_format_decimal( $variable_regular_price[ $i ] );
    	$sale_price    = $variable_sale_price[ $i ] === '' ? '' : wc_format_decimal( $variable_sale_price[ $i ] );
        
        if( $sale_price ) {
            $reduction_percent = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
            update_post_meta( $variation_id, '_reduction_percent', $reduction_percent );
        }else{
            update_post_meta( $variation_id, '_reduction_percent', 0 );
        }
    }
}

/**
 * Sync product variation
 * @subpackage Meta box data
 * @since edo 1.0
 * @hook woocommerce_variable_product_sync hook
 * */
if ( ! function_exists( 'edo_wc_variable_product_sync' ) ){
    function edo_wc_variable_product_sync( $product_id, $children ){
        $min_reduction_percent = null ;
        $min_reduction_percent_id = null;
        
        $max_reduction_percent = null ;
        $max_reduction_percent_id = null;
        
        foreach ( $children as $child_id ) {
			$reduction_price = get_post_meta( $child_id, '_reduction_percent', true );
            
			// Find min reduction
			if ( is_null( $min_reduction_percent ) || $reduction_price < $min_reduction_percent ) {
				$min_reduction_percent    = $reduction_price;
				$min_reduction_percent_id = $child_id;
			}

			// Find max reduction
			if ( $reduction_price > $max_reduction_percent ) {
				$max_reduction_percent    = $reduction_price;
				$max_reduction_percent_id = $child_id;
			}
		}

		// Store reduction
		update_post_meta( $product_id, '_min_variation_reduction_percent', $min_reduction_percent );
		update_post_meta( $product_id, '_max_variation_reduction_percent', $min_reduction_percent_id );

		// Store ids
		update_post_meta( $product_id, '_min_reduction_percent_variation_id', $max_reduction_percent );
        update_post_meta( $product_id, '_max_reduction_percent_variation_id', $max_reduction_percent_id );
        
        update_post_meta( $product_id, '_reduction_percent', $min_reduction_percent );
    }
}

/**
 * Save product simple, external
 * @subpackage Meta box data
 * @since edo 1.0
 * @hook woocommerce_process_product_meta_simple hook
 * @hook woocommerce_process_product_meta_external hook
 * */
if ( ! function_exists( 'edo_wc_process_product_meta' ) ){
    function edo_wc_process_product_meta( $product ){
        $regular_price = ( $_POST['_regular_price'] === '' ) ? '' : wc_format_decimal( $_POST['_regular_price'] );
		$sale_price    = ( $_POST['_sale_price'] === '' ? '' : wc_format_decimal( $_POST['_sale_price'] ) );
        
		if( $sale_price ) {
            $reduction_percent = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
            update_post_meta( $product, '_reduction_percent', $reduction_percent );
        }else{
            update_post_meta( $product, '_reduction_percent', 0 );
        }
    }
}

/**
 * Save product grouped
 * @subpackage Meta box data
 * @since edo 1.0
 * @hook woocommerce_process_product_meta_grouped hook
 * */
if( ! function_exists( 'edo_wc_process_product_meta_grouped' ) ){
    function edo_wc_process_product_meta_grouped( $product ){
        update_post_meta( $product, '_reduction_percent', 0 );
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
        $rating_html  = '<div class="product-star" title="' . sprintf( esc_attr__( 'Rated %s out of 5', 'edo' ), $rating > 0 ? $rating : 0  ) . '">';
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
if(!function_exists('edo_display_rating')){
    function edo_display_rating( $rating ){
        $rating_html = '';
        global $product;
        if ( ! is_numeric( $rating ) ) {
            $rating = $product->get_average_rating();
        }
        $rating_html  = '<div class="product-star edo-star" title="' . sprintf( esc_attr__( 'Rated %s out of 5', 'edo' ), $rating > 0 ? $rating : 0  ) . '">';
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
add_filter('loop_shop_columns', 'edo_loop_columns');
if(!function_exists('edo_loop_columns')){
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
        return esc_attr__( 'Buy', 'woocommerce' );
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
                <span><?php esc_html_e( 'grid', 'edo' ) ?></span>
            </li>
            <li data-type="list" class="view-as-list <?php if($shop_products_list_style=='list'): echo esc_attr( 'selected' ); endif;?>">
                <span><?php esc_html_e( 'list', 'edo' ) ?></span>
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
    $wcpgsk_single_cart_button_text = esc_attr__( 'Buy', 'edo' );
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
	        <a class="link-sendmail" href="#"><?php esc_html_e( 'Email to a Friend', 'edo' ) ?></a>
	        <a class="link-print" href="#"><?php esc_html_e( 'Print', 'edo' ) ?></a>
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
        echo do_shortcode( '[top_seller taxonomy="" icon="" title="' . __( 'Top sellers', 'edo' ) . '" ]' );
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
        wp_nav_menu( array(
            'menu'              => 'single-product-custom-menu',
            'theme_location'    => 'single-product-custom-menu',
            'depth'             => 1,
            'container'         => '',
            'container_class'   => '',
            'container_id'      => '',
            'menu_class'        => 'block block-category-list',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker())
        );
	}
}

/*
* Custom Quick view
*/
add_filter( 'edo_wc_loop_function_quickview', 'edo_custom_yith_add_quick_view_button', 1 );
function edo_custom_yith_add_quick_view_button(){
    global $product;
    $label = esc_html( get_option( 'yith-wcqv-button-label' ) );
    $yith_wcqv_enable = get_option( 'yith-wcqv-enable' );
    if( $yith_wcqv_enable == 'yes' ){
        echo '<a href="#" class="btn-quick-view yith-wcqv-button" data-product_id="' . $product->id . '">' . $label . '</a>';
    }
}

//add_filter( 'yith_wcqv_product_image','woocommerce_show_product_thumbnails', 20 );


/**
 * custom_woocommerce_template_loop_add_to_cart
*/
add_filter( 'woocommerce_product_add_to_cart_text' , 'edo_custom_woocommerce_product_add_to_cart_text' );
function edo_custom_woocommerce_product_add_to_cart_text() {
    global $product;
    $product_type = $product->product_type;
    switch ( $product_type ) {
        case 'external':
            return esc_attr__( 'Buy', 'woocommerce' );
        break;
        case 'grouped':
            return esc_attr__( 'View', 'woocommerce' );
        break;
        case 'simple':
            return esc_attr__( 'Buy', 'woocommerce' );
        break;
        case 'variable':
            return esc_attr__( 'View', 'woocommerce' );
        break;
        default:
            return esc_attr__( 'Read more', 'woocommerce' );
    }
    
}
/*
* Custom Single product cart button
*/
add_filter( 'woocommerce_product_single_add_to_cart_text', 'edo_custom_cart_button_text' );    // 2.1 +
function edo_custom_cart_button_text() {
 
        return esc_attr__( 'Buy', 'woocommerce' );
 
}
/**
 * Define image sizes
 */
if ( ! function_exists( 'kt_woocommerce_image_dimensions' ) ) {
    function kt_woocommerce_image_dimensions() {
        $catalog = array(
            'width'     => '260',   // px
            'height'    => '260',   // px
            'crop'      => 1        // true
        );
    
        $single = array(
            'width'     => '450',   // px
            'height'    => '450',   // px
            'crop'      => 1        // true
        );
    
        $thumbnail = array(
            'width'     => '100',   // px
            'height'    => '100',   // px
            'crop'      => 1        // false
        );
    
        // Image sizes
        update_option( 'shop_catalog_image_size', $catalog );       // Product category thumbs
        update_option( 'shop_single_image_size', $single );         // Single product image
        update_option( 'shop_thumbnail_image_size', $thumbnail );   // Image gallery thumbs
    }
    
    /*
     * Hook in on activation
     *
     */
    add_action( 'init', 'kt_woocommerce_image_dimensions', 1 );

}

/**
 * Mutil color vertical menu
 */
function edo_mutil_color_vertical_menu(){
    global $wpdb;
    $all_meta_menu_color = $wpdb->get_results("SELECT meta_value,post_id FROM $wpdb->postmeta WHERE meta_key = '_menu_item_megamenu_color'" );
    $style = "";
    if($all_meta_menu_color){
        foreach($all_meta_menu_color as $item){
            if($item->meta_value!=""){
                $style.='.block-vertical-menu .custom_css_'.$item->post_id.' a:hover{color:'.$item->meta_value.'}';
                $style.='.block-vertical-menu .custom_css_'.$item->post_id.' .dropdown-menu .widget .widgettitle{background:'.$item->meta_value.'}';
                $style.='.block-vertical-menu .custom_css_'.$item->post_id.' .block-content-vertical-menu .head{background:'.$item->meta_value.'}';
                $style.='.block-vertical-menu .custom_css_'.$item->post_id.' .vertical-menu-link>li>a:hover .text, .block-vertical-menu .custom_css_'.$item->post_id.' .vertical-menu-link>li>a:hover:before{background:'.$item->meta_value.'}';
                $style.='.block-vertical-menu .custom_css_'.$item->post_id.' .vertical-menu-link>li>a .text:after{border-left: 16px solid '.$item->meta_value.';}';
                $style.='.block-vertical-menu .custom_css_'.$item->post_id.' .vertical-menu-link>li>a .text:before{background:'.$item->meta_value.';}';
                $style.='.block-vertical-menu .custom_css_'.$item->post_id.' .vertical-menu-link>li>a:before{color:'.$item->meta_value.';}';
                $style.='.block-vertical-menu .custom_css_'.$item->post_id.' .button-radius .icon:before{background-color:'.$item->meta_value.';}';
                $style.='.option4 .block-vertical-menu .vertical-menu-list>li.custom_css_'.$item->post_id.'{border-color:'.$item->meta_value.';}';
                $style.='.option3 .block-vertical-menu .vertical-menu-list>li.custom_css_'.$item->post_id.'{border-color:'.$item->meta_value.';}';
            }
        }
    }

    ?>
    <style type="text/css">
        <?php echo apply_filters( 'edo_mutil_color_vertical_menu', $style ); ?>
    </style>
    <?php
}

add_action( 'wp_enqueue_scripts', 'edo_mutil_color_vertical_menu' );

/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */ 
add_filter( 'woocommerce_output_related_products_args', 'edo_related_products_args' );
  function edo_related_products_args( $args ) {
    $args['posts_per_page'] = 10; // Unlimit related products
    return $args;
}


/**
 * Edo Extra Feature
 * --------------------------
 *
 * Get max date sale 
 *
 */ 
if( ! function_exists( 'edo_get_max_date_sale') ) {
    function edo_get_max_date_sale( $product_id ) {
        $time = 0;
        // Get variations
        $args = array(
            'post_type'     => 'product_variation',
            'post_status'   => array( 'private', 'publish' ),
            'numberposts'   => -1,
            'orderby'       => 'menu_order',
            'order'         => 'asc',
            'post_parent'   => $product_id
        );
        $variations = get_posts( $args );
        $variation_ids = array();
        if( $variations ){
            foreach ( $variations as $variation ) {
                $variation_ids[]  = $variation->ID;
            }
        }
        $sale_price_dates_to = false;
    
        if( !empty(  $variation_ids )   ){
            global $wpdb;
            $sale_price_dates_to = $wpdb->get_var( "
                SELECT
                meta_value
                FROM $wpdb->postmeta
                WHERE meta_key = '_sale_price_dates_to' and post_id IN(" . join( ',', $variation_ids ) . ")
                ORDER BY meta_value DESC
                LIMIT 1
            " );
    
            if( $sale_price_dates_to != '' ){
                return $sale_price_dates_to;
            }
        }
    
        if( ! $sale_price_dates_to ){
            $sale_price_dates_to = get_post_meta( $product_id, '_sale_price_dates_to', true );

            if($sale_price_dates_to == ''){
                $sale_price_dates_to = '0';
            }
            return $sale_price_dates_to;
        }
    }
}