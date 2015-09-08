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
    add_filter( 'kt_before_shop_product','edo_category_slider', 1 );
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