<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
vc_map( array(
    "name" => __( "Edo box text", 'edo'),
    "base" => "edo_box_text",
    "category" => __('by Edo', 'edo' ),
    "description" => __( 'Show a box text', 'edo' ),
    "params" => array(
        array(
            'type'        => 'textfield',
            'heading'     => __( 'Title', 'edo' ),
            'value'       => __( 'Button text', 'edo' ),
            'param_name'  => 'title',
            'admin_label' => true,
		),
		array(
            'type'        => 'textarea',
            'heading'     => __( 'Text content', 'edo' ),
            'value'       => '',
            'param_name'  => 'text_content',
            'admin_label' => false,
		),
        array(
            "type"        => "colorpicker",
            "heading"     => __("Background Color", 'edo'),
            "param_name"  => "box_bg_color",
            "admin_label" => true,
            'value'       => '#f25f43'
        ),
        array(
            "type"        => "colorpicker",
            "heading"     => __("Text Color", 'edo'),
            "param_name"  => "text_color",
            "admin_label" => false,
            'value'       => '#fff'
        ),
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Arow postion', 'js_composer' ),
            'param_name' => 'arow_postion',
            'default'=>'true',
            'value'      => array(
                __( 'Top', 'edo' )    => 'top',
                __( 'Left', 'edo' )   => 'left',
                __( 'Right', 'edo' )  => 'right',
                __( 'Bottom', 'edo' ) => 'bottom',
            )
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "Extra class name", "js_composer" ),
            "param_name"  => "el_class",
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
            'admin_label' => false,
        ),

        array(
            'type'           => 'css_editor',
            'heading'        => __( 'Css', 'edo' ),
            'param_name'     => 'css',
            // 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'edo' ),
            'group'          => __( 'Design options', 'edo' ),
            'admin_label'    => false,
		),
    ),
));

class WPBakeryShortCode_Edo_box_text extends WPBakeryShortCode {
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'edo_box_text', $atts ) : $atts;
        $atts = shortcode_atts( array(
            'title'        => '',
            'text_content' => '',
            'box_bg_color' => '#f25f43',
            'text_color'   => '#fff',
            'arow_postion' => 'left',
            'el_class'     => '',
            'css'          => ''
            
        ), $atts );
        extract($atts);
        $elementClass = array(
        	'base' => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '  ', $this->settings['base'], $atts ),
        	'extra' => $this->getExtraClass( $el_class ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        $box_css = array();
        $box_css[] = 'background:'.$box_bg_color.';';
        $box_css[] = 'color:'.$text_color.';';


        $text_color_rgb = edo_hex2rgb($text_color);
        $box_content_css = array();
        $box_content_css[] = 'border-color:rgba('.$text_color_rgb['red'].','.$text_color_rgb['green'].','.$text_color_rgb['blue'].',0.3);';



        $arow_css = array();
        if( $arow_postion == 'left'){
            $arow_css[]='border-right-color:'.$box_bg_color.';';
        }
        if( $arow_postion == 'right'){
            $arow_css[]='border-left-color:'.$box_bg_color.';';
        }
        if( $arow_postion == 'bottom'){
            $arow_css[]='border-top-color:'.$box_bg_color.';';
        }
        if( $arow_postion == 'top'){
            $arow_css[]='border-bottom-color:'.$box_bg_color.';';
        }
        

        ob_start();
        
        ?>
        <div class="edo-box-text <?php echo esc_attr($arow_postion);?> <?php echo esc_attr($elementClass)?>" style="<?php echo implode(' ',$box_css)?>">
            <div class="box-content text-center" style="<?php echo implode(' ',$box_content_css)?>">
                <h2 class="title"><?php echo esc_html($title);?></h2>
                <div class="content"><?php echo edo_get_html($text_content);?></div>
                <span class="icon fa fa-arrow-circle-right"></span>
            </div>
            <span style="<?php echo implode(' ',$arow_css)?>" class="arow"></span>
        </div>

        <?php 
        return ob_get_clean();
    }
    

}