<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
vc_map( array(
    "name" => __( "Edo banner text", 'edo'),
    "base" => "edo_banner_text",
    "category" => __('by Edo', 'edo' ),
    "description" => __( 'Show a banner and text', 'edo' ),
    "params" => array(
        array(
			'type' => 'textfield',
			'heading' => __( 'Title', 'edo' ),
			'value' => '',
			'param_name' => 'title',
            'admin_label' => true,
		),
        array(
            'type' => 'textfield',
            'heading' => __( 'Sub title', 'edo' ),
            'value' => '',
            'param_name' => 'sub_title',
            'admin_label' => true,
        ),
        array(
            'type'       => 'attach_image',
            'heading'    => __( 'Background', 'edo' ),
            'param_name' => 'background',
        ),
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Content align', 'js_composer' ),
            'param_name' => 'content_align',
            'value'      => array(
                __( 'Left', 'edo' )   => 'left',
                __( 'Right', 'edo' ) => 'right',
            )
        ),
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Button', 'js_composer' ),
            'param_name' => 'enable_button',
            'default'=>'true',
            'value'      => array(
                __( 'Enable', 'edo' )   => 'true',
                __( 'Disnable', 'edo' ) => 'false',
            )
        ),
        array(
            'type'        => 'textfield',
            'heading'     => __( 'Buttom text', 'edo' ),
            'value'       => '',
            'param_name'  => 'button_text',
            'admin_label' => false,
            "dependency"  => array( 
                "element" => "enable_button", 
                "value"   => array( 
                    'true' 
                ) 
            )
        ),
		array(
			'type' => 'textfield',
			'heading' => __( 'Buttom Link', 'edo' ),
			'value' => __( '#', 'edo' ),
			'param_name' => 'link',
            'admin_label' => false,
            "dependency"  => array( 
                "element" => "enable_button", 
                "value"   => array( 
                    'true' 
                ) 
            )
		),
        array(
            "type"        => "colorpicker",
            "heading"     => __("Main Color", 'edo'),
            "param_name"  => "main_color",
            "admin_label" => false,
        ),
        array(
            "type"        => "colorpicker",
            "heading"     => __("Text Color", 'edo'),
            "param_name"  => "text_color",
            "admin_label" => false,
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

class WPBakeryShortCode_Edo_banner_text extends WPBakeryShortCode {
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'edo_banner_text', $atts ) : $atts;
        $atts = shortcode_atts( array(
            'title'         => '',
            'sub_title'     =>'',
            'background'    =>'',
            'main_color'    =>'#d8b748',
            'text_color'    =>'#fff',
            'enable_button' =>'true',
            'content_align' =>'left',
            'button_text'   =>'',
            'link'          => '#',
            'el_class'      => '',
            'css'           => ''
        ), $atts );
        extract($atts);
        $elementClass = array(
            'base'             => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' ', $this->settings['base'], $atts ),
            'extra'            => $this->getExtraClass( $el_class ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        $background = wp_get_attachment_image_src($background,'full');
        if( $background ){
            $url_bg = $background[0];
        }else{
            $url_bg ='';
        }
        $box_css = array();
        $box_css[] = 'background:'.$main_color.';';
        $box_css[] = 'color:'.$text_color.';';

        $button_css = array();
        $button_css[] = 'background:'.$text_color.';';
        $button_css[] = 'color:'.$main_color.';';
        ob_start();
        ?>
        <div class="edo-banner-text <?php echo esc_attr( $content_align );?> <?php echo esc_attr( $elementClass );?>">
            <?php if($url_bg):?>
            <div class="banner-img">
                <img src="<?php echo esc_url( $url_bg );?>" alt="">
            </div>
            <?php endif;?>
            <div class="box-content <?php echo esc_attr( $content_align );?>" style="<?php echo implode(' ',$box_css)?>">
                <div class="content-text">
                    <?php if( $title):?>
                    <h3 class="title"><?php echo esc_html( $title );?></h3>
                    <?php endif;?>
                    <?php if( $sub_title):?>
                    <div class="subtitle"><?php echo esc_html( $sub_title );?></div>
                    <?php endif;?>
                    <?php if( $enable_button =="true"):?>
                    <a href="<?php echo esc_url( $link );?>" class="button" style="<?php echo implode(' ',$button_css)?>"><i class="fa fa-angle-right"></i> <?php echo esc_html( $button_text );?></a>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <?php 
        return ob_get_clean();
    }
    

}