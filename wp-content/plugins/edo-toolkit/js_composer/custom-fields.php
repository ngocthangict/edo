<?php
add_action('after_setup_theme', 'kt_init_vc_global', 1);

function kt_init_vc_global(){
    if( ! defined( 'WPB_VC_VERSION' )){
        return ;
    }
    if( version_compare( WPB_VC_VERSION , '4.2', '<') ){
        add_action( 'init', 'kt_add_vc_global_params', 100 );
    }else{
        add_action( 'vc_after_mapping', 'kt_add_vc_global_params' );
    }
}

function kt_add_vc_global_params(){
    vc_set_shortcodes_templates_dir( THEME_DIR . '/js_composer/templates/' );
    
    global $vc_setting_row, $vc_setting_col, $vc_setting_column_inner, $vc_setting_icon_shortcode;
    
    vc_add_params( 'vc_icon', $vc_setting_icon_shortcode );
    vc_add_params( 'vc_column', $vc_setting_col );
    vc_add_params( 'vc_column_inner', $vc_setting_column_inner );
    
    
    add_shortcode_param( 'kt_select_image', 'vc_kt_select_image_settings_field' );
    add_shortcode_param( 'kt_categories', 'vc_kt_categories_settings_field' );
    add_shortcode_param('kt_number' , 'vc_ktnumber_settings_field');
    add_shortcode_param('kt_taxonomy', 'vc_kt_taxonomy_settings_field', KUTETHEME_PLUGIN_URL.'/js_composer/js/chosen/chosen.jquery.min.js');
}
/**
 * Tabs type dropdown
 *
 */
function vc_kt_select_image_settings_field($settings, $value) {
    ob_start();
    ?>
    <div class="container-kt-select-image">
        <?php foreach( $settings['value'] as $k => $v ): ?>
        <label class="kt-image-select kt-image-select " for="kt-select-image-<?php echo $v ?>">
            <input name="kt-select-image-<?php echo $settings['param_name']; ?>" value="<?php echo $v ?>" <?php checked($v, $value, 1) ?> id="kt-select-image-<?php echo $v ?>"  style="display: none;" type="radio" class="wpb_vc_param_value" />
            <img src="<?php echo $k ?>" alt="<?php echo $v ?>" />
        </label>
        <?php endforeach; ?>
        <img />
    </div>
    <style type="text/css">
        .kt-image-select{
            padding: 3px;
        }
        .kt-image-select:first-child{
            padding-left: 0px;
        }
        .kt-image-select input[type='radio']:checked + img{
            outline: 3px solid #0073aa;
        }
        .kt-image-select img{
            width: 150px;
        }
    </style>
    <?php
    $result = ob_get_contents();
    ob_clean();
    return $result;
    
}
/**
 * Number field.
 *
 */
function vc_ktnumber_settings_field($settings, $value){
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
 * category dropdown
 *
 */
function vc_kt_categories_settings_field($settings, $value) {
    $args = array(
      'id'          => $settings['param_name'],
      'name'        => $settings['param_name'],
      'class'       => 'select-category wpb_vc_param_value',
      'hide_empty'  => 1,
      'orderby'     => 'name',
      'order'       => "desc",
      'tab_index'   => true,
      'hierarchical'=> true,
      'echo'        => 0,
      'selected'    => $value
    );
    if( kt_is_wc()){
        $args['taxonomy'] = 'product_cat';
    }
    return wp_dropdown_categories( $args );
}

/**
 * Taxonomy checkbox list field.
 *
 */
function vc_kt_taxonomy_settings_field($settings, $value) {
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
        
        $terms = get_terms( $settings['taxonomy'] , array('hide_empty' => false, 'parent' => $settings['parent']));
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
