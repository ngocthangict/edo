<?php
add_action( 'after_setup_theme', 'edo_init_vc_global', 1 );

function edo_init_vc_global(){
    if( ! defined( 'WPB_VC_VERSION' )){
        return ;
    }
    if( version_compare( WPB_VC_VERSION , '4.2', '<' ) ){
        add_action( 'init', 'edo_add_vc_global_params', 100 );
    }else{
        add_action( 'vc_after_mapping', 'edo_add_vc_global_params' );
    }
}

function edo_add_vc_global_params(){
    vc_set_shortcodes_templates_dir( THEME_DIR . '/js_composer/templates/' );
    
    global $vc_setting_row, $vc_setting_col, $vc_setting_column_inner, $vc_setting_icon_shortcode;
    
    vc_add_params( 'vc_icon', $vc_setting_icon_shortcode );
    vc_add_params( 'vc_column', $vc_setting_col );
    vc_add_params( 'vc_column_inner', $vc_setting_column_inner );
    
    vc_add_shortcode_param ('edo_number' , 'edo_number_settings_field');
    vc_add_shortcode_param ('edo_taxonomy', 'edo_taxonomy_settings_field', KUTETHEME_PLUGIN_URL.'/js_composer/js/chosen/chosen.jquery.min.js');
}
/**
 * Number field.
 *
 */
function edo_number_settings_field($settings, $value){
	$dependency = '';
	$param_name = isset( $settings[ 'param_name' ] ) ? $settings[ 'param_name' ] : '';
	$type = isset($settings[ 'type ']) ? $settings[ 'type' ] : '';
	$min = isset($settings[ 'min' ]) ? $settings[ 'min' ] : '';
	$max = isset($settings[ 'max' ]) ? $settings[ 'max'] : '';
	$suffix = isset($settings[ 'suffix' ]) ? $settings[ 'suffix' ] : '';
	$class = isset($settings[ 'class' ]) ? $settings[ 'class' ] : '';
	$output = '<input type="number" min="'.esc_attr( $min ).'" max="'.esc_attr( $max ).'" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="'.esc_attr($value).'" '.$dependency.' style="max-width:100px; margin-right: 10px;" />'.$suffix;
	return $output;
}

/**
 * Taxonomy checkbox list field.
 *
 */
function edo_taxonomy_settings_field($settings, $value) {
	$dependency = '';

	$value_arr = $value;
	if ( ! is_array($value_arr) ) {
		$value_arr = array_map( 'trim', explode(',', $value_arr) );
	}
    $output = '';
	if ( ! empty($settings['taxonomy']) ) {
		
        $terms_fields = array();
        if(isset($settings['placeholder']) && $settings['placeholder']){
            $terms_fields[] = "<option value=''>".$settings['placeholder']."</option>";
        }
        if( empty( $settings['hide_empty'] ) ){
            $settings['hide_empty'] = false;
        }
        $terms = get_terms( $settings['taxonomy'] , array('hide_empty' => $settings['hide_empty'], 'parent' => $settings['parent']));
		if ( $terms && !is_wp_error($terms) ) {
			foreach( $terms as $term ) {
                $selected = (in_array( $term->term_id, $value_arr )) ? ' selected="selected"' : '';
                $terms_fields[] = "<option value='{$term->term_id}' {$selected}>{$term->name}</option>";
			}
		}

        $size = (!empty($settings['size'])) ? 'size="'.$settings['size'].'"' : '';
        $multiple = (!empty($settings['multiple'])) ? 'multiple="multiple"' : '';
        
        $uniqeID    = uniqid();
        
        $output = '<select id="kt_taxonomy-'.$uniqeID.'" '.$multiple.' '.$size.' name="'.$settings['param_name'].'" class="wpb_vc_param_value wpb-input wpb-select '.$settings['param_name'].' '.$settings['type'].'_field" '.$dependency.'>'
                    .implode( $terms_fields )
                .'</select>';
                
        $output .= '<script type="text/javascript">jQuery("#kt_taxonomy-' . $uniqeID . '").chosen();</script>';

	}
    
    return $output;
}
if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/categories.php' ) ){
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/categories.php' ;
}
if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/list_product.php' ) ){
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/list_product.php' ;
}
if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/images.php' ) ){
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/images.php' ;
}
if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/banner_carousel.php' ) ){
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/banner_carousel.php' ;
}

if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/adv_banner.php' ) ){
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/adv_banner.php' ;
}

if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/brand.php' ) ){
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/brand.php' ;
}

if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/edo_banner_text.php' ) ){
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/edo_banner_text.php' ;
}
if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/blog.php' ) ){
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/blog.php' ;
}

if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/edo_find_store.php' ) ){
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/edo_find_store.php' ;
}

if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/edo_subscribe.php' ) ){
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/edo_subscribe.php' ;
}

if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/edo_partners.php' ) ){
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/edo_partners.php' ;
}

if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/edo_icon.php' ) ){
    require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/edo_icon.php' ;
}


if ( edo_check_active_plugin( 'woocommerce/woocommerce.php' ) ){
    if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/top_seller.php' ) ){
        require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/top_seller.php' ;
    }
    
    if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/box_product.php' ) ){
        require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/box_product.php' ;
    }
    
    if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/popular_category.php' ) ){
        require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/popular_category.php' ;
    }
    
    if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/tab_hot_deal.php' ) ){
        require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/tab_hot_deal.php' ;
    }
    
    if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/product_sidebar.php' ) ){
        require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/product_sidebar.php' ;
    }
    if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/list_product_mega_menu.php' ) ){
        require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/list_product_mega_menu.php' ;
    }
    if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/edo_button.php' ) ){
        require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/edo_button.php' ;
    }
    if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/mega_category.php' ) ){
        require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/mega_category.php' ;
    }
    if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/vertical-menu.php' ) ){
        require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/vertical-menu.php' ;
    }
    if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/product_tags.php' ) ){
        require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/product_tags.php' ;
    }
    if( file_exists( KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/product_carousel.php' ) ){
        require_once KUTETHEME_PLUGIN_PATH . '/js_composer/shortcodes/product_carousel.php' ;
    }
}
