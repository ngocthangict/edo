<?php
// Exit if accessed directly
if ( ! defined('ABSPATH')) exit;

if( function_exists( 'vc_map' ) ):    
    vc_map( array(
        "name" => __( "Categories", 'edo'),
        "base" => "categories",
        "category" => __('by Edo', 'edo' ),
        "description" => __( "Display box categories and gurante", 'edo'),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __( "Title", 'edo' ),
                "param_name" => "title",
                "admin_label" => true,
                'description' => __( 'Display title box categories', 'edo' )
            ),
            array(
                "type" => "edo_number",
                "heading" => __( "Number", 'edo' ),
                "param_name" => "number",
                "value" => "3",
                "admin_label" => true,
                'description' => __( 'The number of category shows.', 'edo' )
            ),
            array(
    			'type' => 'dropdown',
    			'heading' => __( 'Order by', 'js_composer' ),
    			'param_name' => 'orderby',
    			'value' => array(
                    __( 'Random', 'edo' )  => 'rand',
    				__( 'Date', 'edo' )    => 'date',
    				__( 'ID', 'edo' )      => 'id',
                    __( 'Author', 'edo' )  => 'author',
                    __( 'Title', 'edo' )   => 'title',
    			)
    		),
            array(
    			'type' => 'dropdown',
    			'heading' => __( 'Order Way', 'js_composer' ),
    			'param_name' => 'order',
    			'value' => array(
    				__( 'Descending', 'js_composer' ) => 'desc',
    				__( 'Ascending', 'js_composer' ) => 'asc'
    			)
    		),
            array(
    			'type' => 'dropdown',
    			'heading' => __( 'Hide Empty', 'js_composer' ),
    			'param_name' => 'hide',
    			'value' => array(
    				__( 'Yes', 'js_composer' ) => '0',
    				__( 'No', 'js_composer' ) => '1'
    			)
    		),
            array(
    			'type' => 'dropdown',
    			'heading' => __( 'Show Count', 'js_composer' ),
    			'param_name' => 'show_count',
    			'value' => array(
    				__( 'Yes', 'js_composer' ) => '0',
    				__( 'No', 'js_composer' ) => '1'
    			)
    		),
            array(
                "type" => "textfield",
                "heading" => __( "Extra class name", 'edo' ),
                "param_name" => "el_class",
                "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
            ),
            array(
    			'type' => 'css_editor',
    			'heading' => __( 'Css', 'js_composer' ),
    			'param_name' => 'css',
    			// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
    			'group' => __( 'Design options', 'js_composer' )
    		),
        )
    ));

endif;

if( class_exists( 'WPBakeryShortCode' ) ):
    class WPBakeryShortCode_Categories extends WPBakeryShortCode {
        protected function content($atts, $content = null) {
            $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'categories', $atts ) : $atts;
                            
            $atts = shortcode_atts( array(
                'title'      => __('Categories', 'edo'),
                'number'     => 9,
                'orderby'    => 'date',
                'order'      => 'desc',
                'hide'       => true,
                'show_count' => true,
                'depth'      => 1,
                
                'css_animation' => '',
                'el_class'      => '',
                'css'           => '',
                
            ), $atts );
            extract($atts);
            
            $elementClass = array(
            	'base' => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'categories row', $this->settings['base'], $atts ),
            	'extra' => $this->getExtraClass( $el_class ),
            	'css_animation' => $this->getCSSAnimation( $css_animation ),
                'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
            );
            $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
            
            ob_start();
            
            $args = array(
    			'orderby'    => $orderby,
    			'order'      => $order,
    			'hide_empty' => $hide,
    			'show_count' => $show_count,
                'number'     => $number,
                'depth'      => $depth
    		);
            $categories = wp_list_categories( $atts );
            
            
            return ob_get_clean();
        }
    }    
endif;