<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
vc_map( array(
    "name" => __( "Edo button", 'edo'),
    "base" => "edo_button",
    "category" => __('by Edo', 'edo' ),
    "description" => __( 'Show a button', 'edo' ),
    "params" => array(
        array(
			'type' => 'textfield',
			'heading' => __( 'Title', 'edo' ),
			'value' => __( 'Button text', 'edo' ),
			'param_name' => 'title',
			'description' => __( 'The "per_page" shortcode determines how many products to show on the page', 'edo' ),
            'admin_label' => false,
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Link', 'edo' ),
			'value' => __( '#', 'edo' ),
			'param_name' => 'link',
			'description' => __( 'Display a custom button', 'edo' ),
            'admin_label' => false,
		),
        array(
            "type" => "textfield",
            "heading" => __( "Extra class name", "js_composer" ),
            "param_name" => "el_class",
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
            'admin_label' => false,
        ),
        array(
			'type' => 'css_editor',
			'heading' => __( 'Css', 'edo' ),
			'param_name' => 'css',
			// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'edo' ),
			'group' => __( 'Design options', 'edo' ),
            'admin_label' => false,
		),
    ),
));

class WPBakeryShortCode_Edo_button extends WPBakeryShortCode {
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'edo_button', $atts ) : $atts;
        $atts = shortcode_atts( array(
            'title'  => 'Button text',
            'link'    => '#',
            'el_class' => '',
            'css' => ''
            
        ), $atts );
        extract($atts);
        $elementClass = array(
        	'base' => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' button-radius  ', $this->settings['base'], $atts ),
        	'extra' => $this->getExtraClass( $el_class ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        
        ob_start();
        
        ?>
         <a href="<?php echo esc_url( $link );?>" class="<?php echo esc_attr( $elementClass );?>"><?php echo $title;?><span class="icon"></span></a>
        <?php 
        return ob_get_clean();
    }
    

}