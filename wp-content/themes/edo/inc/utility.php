<?php
/**
 * Get option in theme option
 * @param $option option key
 * @since edo 1.0
 * */
if ( ! function_exists( 'edo_option' ) ){
    function edo_option( $option = false, $default = false ){
        if($option === FALSE){
            return FALSE;
        }
        $option_name = apply_filters('theme_option_name', 'kt_options' );
        $edo_options  = wp_cache_get( $option_name );
        if(  ! $edo_options ){
            $edo_options = get_option( $option_name );
            if( empty($edo_options)  ){
                // get default theme option
                if( defined( 'ICL_LANGUAGE_CODE' ) ){
                    $edo_options = get_option( 'kt_options' );
                }
            }
            wp_cache_delete( $option_name );
            wp_cache_add( $option_name, $edo_options );
        }
        if(isset($edo_options[$option]) && $edo_options[$option] !== ''){
            return $edo_options[$option];
        }else{
            return $default;
        }
    }
}

/**
 * Get template header in theme option
 * @since edo 1.0
 * */
if( ! function_exists( 'edo_get_header' )){
	 function edo_get_header(){
        global $edo_used_header;
        $setting = edo_option('kt_used_header', '1');
        $edo_used_header = intval($setting);
        get_template_part( 'templates/headers/header',  $setting);
    }
}
/**
 * Get Banner Header in template header 1
 * @since edo 1.0
 * */
if( ! function_exists( 'edo_get_banner_header_option_1' ) ){
    function edo_get_banner_header_option_1(){
        $link_1  = edo_option( 'kt_link_header_1', '#');
        $link_2  = edo_option( 'kt_link_header_2', '#' );
        
        $banner_1 = edo_option( 'kt_banner_header_1' );
        $banner_2 = edo_option( 'kt_banner_header_2' );
        ?>
        <ul class="list-banner">
            <?php if( $banner_1 ): ?>
    			<li>
                    <div class="banner1">
                        <a href="<?php echo esc_attr( $link_1 ); ?>">
                            <img src="<?php echo esc_url( $banner_1 ) ?>" alt="<?php _e( 'Banner', 'edo' ); ?>" />
                        </a>
                    </div>
                </li>
            <?php endif; ?>
            
            <?php if( $banner_2 ): ?>
    			<li>
                    <div class="banner1">
                        <a href="<?php echo esc_attr( $link_1 ); ?>">
                            <img src="<?php echo esc_url( $banner_2 ) ?>" alt="<?php _e( 'Banner', 'edo' ); ?>" />
                        </a>
                    </div>
                </li>
            <?php endif; ?>
		</ul>
        <?php
    }
}
add_action( 'edo_get_banner_header_option_1', 'edo_get_banner_header_option_1' );

/**
 * Get Logo setting in theme option
 * @since edo 1.0
 * */
if( ! function_exists( "edo_get_logo" ) ){
    function edo_get_logo(){
        $default = edo_option("kt_logo" , THEME_URL . '/assets/images/logo.png');
        
        $html = '<a href="'.get_home_url().'"><img alt="'.get_bloginfo('name').'" src="'.esc_url($default).'" /></a>';
        return $html;
    }
}

/**
 * Get info address in theme option
 * @since edo 1.0
 * */
if( ! function_exists( 'edo_get_info_address' )){
    function edo_get_info_address(){
        return  edo_option('kt_address', false);
    }
}

/**
 * Get info hotline in theme option
 * @since edo 1.0
 * */
if( ! function_exists( 'edo_get_info_hotline' )){
    function edo_get_info_hotline(){
        return  edo_option('kt_phone', false);
    }
}
/**
 * Get info email in theme option
 * @since edo 1.0
 * */
if( ! function_exists( 'edo_get_info_email' )){
    function edo_get_info_email(){
        return edo_option('kt_email', false);
    }
}

/**
 * Get info copyright in theme option
 * @since edo 1.0
 * */
if( ! function_exists('edo_get_info_copyrights') ){
    function edo_get_info_copyrights(){
        return edo_option( 'kt_copyrights', false );
    }
}

/**
 * Get css in theme option
 * @since edo 1.0
 * */
if( ! function_exists( 'edo_get_inline_css' ) ){
    function edo_get_inline_css(){
        return edo_option( 'kt_add_css', '' );
    }
}

/**
 * Get js setting in theme option
 * @since edo 1.0
 * */
if( ! function_exists( 'edo_get_customize_js' ) ){
    function edo_get_customize_js(){
        return edo_option( 'kt_add_js', '' );
    }
}
if( ! function_exists( 'edo_get_socials' ) ){
    function edo_get_socials(){
        $facebook   = edo_option('kt_facebook_link_id');
        $twitter    = edo_option('kt_twitter_link_id');
        $pinterest  = edo_option('kt_pinterest_link_id');
        $dribbble   = edo_option('kt_dribbble_link_id');
        $vimeo      = edo_option('kt_vimeo_link_id');
        $tumblr     = edo_option('kt_tumblr_link_id');
        $skype      = edo_option('kt_skype_link_id');
        $linkedin   = edo_option('kt_linkedIn_link_id');
        $vk         = edo_option('kt_vk_link_id');
        $googleplus = edo_option('kt_google_plus_link_id');
        $youtube    = edo_option('kt_youtube_link_id');
        $instagram  = edo_option('kt_instagram_link_id');
        
        $social_icons = '';
        
        if ($facebook) {
            $social_icons .='<li>';
            $social_icons .= '<a href="'.esc_url($facebook).'" title ="Facebook" ><i class="fa fa-facebook"></i></a>';
            $social_icons .='</li>';
        }
        if ($twitter) {
            $social_icons .='<li>';
            $social_icons .= '<a href="http://www.twitter.com/'.esc_attr($twitter).'" title ="Twitter" ><i class="fa fa-twitter"></i></a>';
        }
        if ($dribbble) {
            $social_icons .='<li>';
            $social_icons .= '<a href="http://www.dribbble.com/'.esc_attr($dribbble).'" title ="Dribbble" ><i class="fa fa-dribbble"></i></a>';
            $social_icons .='</li>';
        }
        if ($vimeo) {
            $social_icons .='<li>';
            $social_icons .= '<a href="http://www.vimeo.com/'.esc_attr($vimeo).'" title ="Vimeo" ><i class="fa fa-vimeo-square"></i></a>';
            $social_icons .='</li>';
        }
        if ($tumblr) {
            $social_icons .='<li>';
            $social_icons .= '<a href="http://'.esc_attr($tumblr).'.tumblr.com/" title ="Tumblr" ><i class="fa fa-tumblr"></i></a>';
            $social_icons .='</li>';
        }
        if ($skype) {
            $social_icons .='<li>';
            $social_icons .= '<a href="skype:'.esc_attr($skype).'" title ="Skype" ><i class="fa fa-skype"></i></a>';
            $social_icons .='</li>';
        }
        if ($linkedin) {
            $social_icons .='<li>';
            $social_icons .= '<a href="'.esc_attr($linkedin).'" title ="Linkedin" ><i class="fa fa-linkedin"></i></a>';
            $social_icons .='</li>';
        }
        if ($googleplus) {
            $social_icons .='<li>';
            $social_icons .= '<a href="'.esc_url( $googleplus ).'" title ="Google Plus" ><i class="fa fa-google-plus"></i></a>';
            $social_icons .='</li>';
        }
        if ($youtube) {
            $social_icons .='<li>';
            $social_icons .= '<a href="http://www.youtube.com/user/'.esc_attr( $youtube ).'" title ="Youtube"><i class="fa fa-youtube"></i></a>';
            $social_icons .='</li>';
        }
        if ($pinterest) {
            $social_icons .='<li>';
            $social_icons .= '<a href="http://www.pinterest.com/'.esc_attr( $pinterest ).'/" title ="Pinterest" ><i class="fa fa-pinterest-p"></i></a>';
            $social_icons .='</li>';
        }
        if ($instagram) {
            $social_icons .='<li>';
            $social_icons .= '<a href="http://instagram.com/'.esc_attr( $instagram ).'" title ="Instagram" ><i class="fa fa-instagram"></i></a>';
            $social_icons .='</li>';
        }
        
        if ($vk) {
            $social_icons .='<li>';
            $social_icons .= '<a href="https://vk.com/'.esc_attr( $vk ).'" title ="Vk" ><i class="fa fa-vk"></i></a>';
            $social_icons .='</li>';
        }
        return $social_icons;
    }
}
if( ! function_exists('edo_menu_my_account')){
    function edo_menu_my_account(){
        ob_start();
        ?>
        <ul class="top-bar-link top-bar-link-right dot">
            <?php if( edo_is_wc() && is_user_logged_in() ): ?>
                <?php $url = get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>
                <li><a href="<?php echo $url; ?>"><?php _e( 'My Account', 'edo' ) ?></a></li>
            <?php endif; ?>
            <?php if( edo_is_wl() && is_user_logged_in() ):
                $wishlist_url = YITH_WCWL()->get_wishlist_url(); ?>
                <li><a href="<?php echo $wishlist_url; ?>"><?php _e( 'My Wishlist', 'edo' ) ?></a></li>
            <?php endif; ?>
            <?php if( edo_is_wc() ): ?>
                <?php $check_out_url = WC()->cart->get_cart_url(); ?>
                <li><a href="<?php echo $check_out_url; ?>"><?php _e( 'Checkout', 'edo' ); ?></a></li>
            <?php endif; ?>
            <?php if ( is_user_logged_in() ):  ?>
                <li><a href="<?php echo wp_logout_url(); ?>"><?php _e('Logout', 'edo') ?></a></li>
            <?php else: ?>
                <li><a href="<?php echo wp_login_url(); ?>"><?php _e('Login', 'edo') ?></a></li>
            <?php endif; ?>
            <?php if( edo_is_cp() ): 
                global $yith_woocompare; 
                $count = count($yith_woocompare->obj->products_list); ?>
                <li><a class="yith-woocompare-open" href="#"><?php _e( "Compare", 'edo') ?></a></li>
            <?php endif; ?>
		</ul>
        <?php
        $return = ob_get_contents();
        ob_clean();
        echo $return;
    }
}
add_action( 'edo_menu_header_top', 'edo_menu_my_account' );

/**
 * Display dropdown choose language
 * @since edo 1.0
 * */
if( ! function_exists( "edo_get_wpml" )){
    function edo_get_wpml(){
        //Check function icl_get_languages exist 
        if( edo_is_wpml() ){
            $languages = icl_get_languages( 'skip_missing=0&orderby=code' );
            
            if(!empty($languages)){
                //Find language actived
                foreach( $languages as $lang_k => $lang ){
                    if( $lang['active'] ){
                        $active_lang = $lang;
                    }
                }
            }
            ob_start();
            ?>
            <div class="dropdown language">
                <a data-toggle="dropdown" role="button">
                    <img src="<?php echo esc_url($active_lang['country_flag_url']); ?>" alt="<?php echo $active_lang["translated_name"]; ?>" />
                </a>
                <ul class="dropdown-menu">
                    <?php foreach($languages as $lang): ?>
                         <li>
                            <a href="<?php echo esc_attr( $lang['url'] ) ?>">
                                <img src="<?php echo esc_url($lang['country_flag_url']); ?>" alt="<?php echo esc_attr( $lang["language_code"] ) ?>" />
                                <?php echo esc_attr( $lang["translated_name"] ) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php
            echo ob_get_clean();
        }
    }
}

if( ! function_exists( 'edo_get_currency' ) ){
    function edo_get_currency(){
        ob_start();
        ?>
        <div class="dropdown currency">
            <a data-toggle="dropdown" role="button">USD</a>
            <ul class="dropdown-menu">
            	<li><a href="#">$ USD</a></li>
            	<li><a href="#">€ EUR</a></li>
            </ul>
        </div>
        <?php
        echo ob_get_clean();
    }
}
add_action( 'edo_header_language', 'edo_get_wpml' );
add_action( 'edo_header_language', 'edo_get_currency' );

if( ! function_exists('edo_search_form') ){
    function edo_search_form(){
        if( edo_is_wc() ){
            get_template_part('templates/search-form/product', 'search-form' );
        }else{
            get_template_part('templates/search-form/post', 'search-form' );
        }
    }
}

add_action( 'edo_search_form_template', 'edo_search_form' );
/**************************************************CHECK INSTALL PLUGIN**********************************************************/
/**
 * Function check install plugin wpnl
 * @since edo 1.0
 * */
function  edo_is_wpml(){
    return function_exists( 'icl_get_languages' );
}
/**
 * Function check install plugin wpnl
 * @since edo 1.0
 * */
if( ! function_exists( 'edo_is_wpml' ) ){
    function  edo_is_wpml(){
        return function_exists( 'icl_get_languages' );
    }
}

/**
 * Function check if WC Plugin installed
 * @since edo 1.0
 */
if( ! function_exists( 'edo_is_wc' ) ){
    function edo_is_wc(){
        return function_exists( 'is_woocommerce' );
    }
}
/**
* Function check exist Visual composer
* @since edo 1.0
**/
if( ! function_exists( 'edo_is_vc' ) ){
    function edo_is_vc(){
        return function_exists( "vc_map" );
    }
}
if( ! function_exists( 'edo_is_wl' ) ){
    function edo_is_wl(){
        return defined( 'YITH_WCWL' );
    }
}
if( ! function_exists( 'edo_is_cp' ) ){
    function edo_is_cp(){
        return defined( 'YITH_WOOCOMPARE' );
    }
}
if(!function_exists('edo_paging_nav')){
    function edo_paging_nav() {
        global $wp_query, $wp_rewrite;
        
        // Don't print empty markup if there's only one page.
        if ( $wp_query->max_num_pages < 2 ) {
            return;
        }
        
        echo get_the_posts_pagination( array(
            'prev_text'          => __( '<i class="fa fa-angle-double-left"></i> Previous', 'edo' ),
            'next_text'          => __( 'Next <i class="fa fa-angle-double-right"></i>', 'edo' ),
            'screen_reader_text' => '&nbsp;',
            'before_page_number' => '',
        ) );
        
    }
}

if(!function_exists('edo_get_post_meta')){
    function edo_get_post_meta($post_id,$key,$default=""){
        $meta = get_post_meta( $post_id,$key,true);
        if($meta){
            return $meta;
        }
        return $default;
    }
}
function kt_init_session_start(){
    if(!session_id()) {
        session_start();
    }
}
add_action('init', 'kt_init_session_start', 1);