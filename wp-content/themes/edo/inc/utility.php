<?php
// get option
if ( ! function_exists( 'kt_option' ) ){
    function kt_option( $option = false, $default = false ){
        if($option === FALSE){
            return FALSE;
        }
        $option_name = apply_filters('theme_option_name', 'kt_options' );
        $kt_options  = wp_cache_get( $option_name );
        if(  ! $kt_options ){
            $kt_options = get_option( $option_name );
            if( empty($kt_options)  ){
                // get default theme option
                if( defined( 'ICL_LANGUAGE_CODE' ) ){
                    $kt_options = get_option( 'kt_options' );
                }
            }
            wp_cache_delete( $option_name );
            wp_cache_add( $option_name, $kt_options );
        }
        if(isset($kt_options[$option]) && $kt_options[$option] !== ''){
            return $kt_options[$option];
        }else{
            return $default;
        }
    }
}
// get header
if(!function_exists('kt_get_header')){
	 function kt_get_header(){
        global $kt_used_header;
        $setting = kt_option('kt_used_header', '1');
        $kt_used_header = intval($setting);
        get_template_part( 'templates/headers/header',  $setting);
    }
}
// get logo
if( ! function_exists( "kt_get_logo" ) ){
    function kt_get_logo(){
        $default = kt_option("kt_logo" , THEME_URL . '/assets/images/logo.png');
        
        $html = '<a href="'.get_home_url().'"><img alt="'.get_bloginfo('name').'" src="'.esc_url($default).'" /></a>';
        return $html;
    }
}