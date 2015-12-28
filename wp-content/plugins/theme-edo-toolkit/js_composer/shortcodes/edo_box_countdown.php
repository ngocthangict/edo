<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
vc_map( array(
    "name" => __( "Edo box countdown", 'edo'),
    "base" => "edo_box_countdown",
    "category" => __('by Edo', 'edo' ),
    "description" => __( 'Show a box countdown', 'edo' ),
    "params" => array(
		// array(
  //           'type'        => 'textfield',
  //           'heading'     => __( 'Title', 'edo' ),
  //           'value'       => '',
  //           'param_name'  => 'title',
  //           'admin_label' => true,
		// ),
  //       array(
  //           'type'  => 'dropdown',
  //           'value' => array(
  //               __( 'Show title', 'js_composer' ) => 'show_title',
  //               __( 'Show price', 'js_composer' )  => 'show_price',
  //           ),
  //           'heading'     => __( 'Display text', 'kutetheme' ),
  //           'param_name'  => 'show_option',
  //           'admin_label' => false,
  //       ),
        array(
            "type"        => "textfield",
            "heading"     => __("Regular Price ", 'edo'),
            "param_name"  => "price_regular",
            "admin_label" => false,
        ),
        array(
            "type"        => "textfield",
            "heading"     => __("Sale Price", 'edo'),
            "param_name"  => "price_sale",
            "admin_label" => false,
        ),
        array(
            "type"        => "textfield",
            "heading"     => __("Countdown text", 'edo'),
            "param_name"  => "countdown_text",
            "admin_label" => false,
        ),

        array(
            'type'  => 'kt_datetimepicker',
            'heading'     => __( 'Time', 'edo' ),
            'param_name'  => 'time',
            'admin_label' => false,
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

class WPBakeryShortCode_Edo_box_countdown extends WPBakeryShortCode {
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'edo_box_countdown', $atts ) : $atts;
        $atts = shortcode_atts( array(
            'text_content'  => '',
            'time'          =>'',
            'price_regular' =>'',
            'price_sale'    =>'',
            'el_class'      => '',
            'css'           => ''
            
        ), $atts );
        extract($atts);
        $elementClass = array(
        	'base' => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '  ', $this->settings['base'], $atts ),
        	'extra' => $this->getExtraClass( $el_class ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        $time = strtotime( $time );
        $y = date( 'Y', $time );
        $m = date( 'm', $time );
        $d = date( 'd', $time );
        $h = date( 'h', $time );
        $mi = date( 'i', $time );
        $s = date( 's', $time );

        ob_start();
        
        ?>
        <div class="edo-box-countdown <?php echo esc_attr($elementClass);?>">
            <div class="box-price">
                <?php
                if( $price_regular) echo '<ins>'.$price_regular.'</ins>';
                if( $price_sale) echo '<del>'.$price_sale.'</del>';
                ?>
            </div>
            <div class="countdown-lastest" data-y="<?php echo esc_attr($y);?>" data-m="<?php echo esc_attr($m);?>" data-d="<?php echo esc_attr($d);?>" data-h="<?php echo esc_attr($h);?>" data-i="<?php echo esc_attr($mi);?>" data-s="<?php echo esc_attr($s);?>"></div>
        </div>

        <?php 
        return ob_get_clean();
    }
    

}