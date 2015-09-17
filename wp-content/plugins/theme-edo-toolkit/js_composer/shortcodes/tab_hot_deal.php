<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

vc_map( array(
    "name" => __( "Hot Deal Tab", 'edo'),
    "base" => "hot_deal",
    "category" => __('by Edo', 'edo' ),
    "description" => __( "Show tab hot deal", 'edo'),
    "as_parent" => array('only' => 'tab_section'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type"        => "textfield",
            "heading"     => __( "Title", 'edo' ),
            "param_name"  => "title",
            "admin_label" => true,
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "Number Post", 'edo' ),
            "param_name"  => "per_page",
            'std'         => 5,
            "admin_label" => false,
            'description' => __( 'Number post in a slide', 'edo' )
        ),
        array(
            "type"        => "edo_taxonomy",
            "taxonomy"    => "product_cat",
            "class"       => "",
            "heading"     => __("Category", 'edo'),
            "param_name"  => "taxonomy",
            "value"       => '',
            'parent'      => 0,
            'multiple'    => true,
            'placeholder' => __('Choose categoy', 'edo'),
            "description" => __("Note: Selected categories will be hide if it empty. Only selected categories will be displayed.", 'edo')
        ),
        array(
    		'type' => 'attach_image',
    		'heading' => __( 'Icon', 'edo' ),
    		'param_name' => 'icon',
            "dependency" => array("element" => "tabs_type","value" => array('tab-1', 'tab-2', 'tab-3', 'tab-4', 'tab-5')),
    		'description' => __( 'Setup icon for the tab', 'edo' )
    	),
        array(
        	'type' => 'dropdown',
        	'heading' => __( 'CSS Animation', 'js_composer' ),
        	'param_name' => 'css_animation',
        	'admin_label' => false,
        	'value' => array(
        		__( 'No', 'js_composer' ) => '',
        		__( 'Top to bottom', 'js_composer' ) => 'top-to-bottom',
        		__( 'Bottom to top', 'js_composer' ) => 'bottom-to-top',
        		__( 'Left to right', 'js_composer' ) => 'left-to-right',
        		__( 'Right to left', 'js_composer' ) => 'right-to-left',
        		__( 'Appear from center', 'js_composer' ) => "appear"
        	),
        	'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'js_composer' )
        ),
        
        // Carousel
        array(
			'type' => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'heading' => __( 'AutoPlay', 'edo' ),
            'param_name' => 'autoplay',
            'group' => __( 'Carousel settings', 'edo' ),
            'admin_label' => false,
            "dependency" => array("element" => "tabs_type","value" => array('tab-1')),
		),
        array(
			'type' => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'heading' => __( 'Navigation', 'edo' ),
			'param_name' => 'navigation',
            'description' => __( "Don't display 'next' and 'prev' buttons.", 'edo' ),
            'group' => __( 'Carousel settings', 'edo' ),
            'admin_label' => false,
            "dependency" => array("element" => "tabs_type","value" => array('tab-1')),
		),
        array(
			'type' => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'std' => 'false',
            'heading' => __( 'Loop', 'edo' ),
			'param_name' => 'loop',
            'description' => __( "Inifnity loop. Duplicate last and first items to get loop illusion.", 'edo' ),
            'group' => __( 'Carousel settings', 'edo' ),
            'admin_label' => false,
            "dependency" => array("element" => "tabs_type","value" => array('tab-1')),
		),
        array(
			"type" => "kt_number",
			"heading" => __("Slide Speed", 'edo'),
			"param_name" => "slidespeed",
			"value" => "250",
            "suffix" => __("milliseconds", 'edo'),
			"description" => __('Slide speed in milliseconds', 'edo'),
            'group' => __( 'Carousel settings', 'edo' ),
            'admin_label' => false,
            "dependency" => array("element" => "tabs_type","value" => array('tab-1')),
	  	),
        array(
			"type" => "kt_number",
			"heading" => __("Margin", 'edo'),
			"param_name" => "margin",
			"value" => "0",
            "suffix" => __("px", 'edo'),
			"description" => __('Distance( or space) between 2 item', 'edo'),
            'group' => __( 'Carousel settings', 'edo' ),
            'admin_label' => false,
            "dependency" => array("element" => "tabs_type","value" => array('tab-1')),
	  	),
        array(
			'type' => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 1,
                __( 'No', 'js_composer' )  => 0
            ),
            'heading' => __( 'Use Carousel Responsive', 'edo' ),
			'param_name' => 'use_responsive',
            'description' => __( "Try changing your browser width to see what happens with Items and Navigations", 'edo' ),
            'group' => __( 'Carousel responsive', 'edo' ),
            'admin_label' => false,
            "dependency" => array(
                "element" => "tabs_type",
                "value" => array( 'tab-1')
            ),
		),
        array(
			"type" => "kt_number",
			"heading" => __("The items on destop (Screen resolution of device >= 992px )", 'edo'),
			"param_name" => "items_destop",
			"value" => "4",
            "suffix" => __("item", 'edo'),
			"description" => __('The number of items on destop', 'edo'),
            'group' => __( 'Carousel responsive', 'edo' ),
            'admin_label' => false,
            "dependency" => array("element" => "tabs_type","value" => array('tab-1')),
	  	),
        array(
			"type" => "kt_number",
			"heading" => __("The items on tablet (Screen resolution of device >=768px and < 992px )", 'edo'),
			"param_name" => "items_tablet",
			"value" => "2",
            "suffix" => __("item", 'edo'),
			"description" => __('The number of items on destop', 'edo'),
            'group' => __( 'Carousel responsive', 'edo' ),
            'admin_label' => false,
            "dependency" => array("element" => "tabs_type","value" => array('tab-1')),
	  	),
        array(
			"type" => "kt_number",
			"heading" => __("The items on mobile (Screen resolution of device < 768px)", 'edo'),
			"param_name" => "items_mobile",
			"value" => "1",
            "suffix" => __("item", 'edo'),
			"description" => __('The numbers of item on destop', 'edo'),
            'group' => __( 'Carousel responsive', 'edo' ),
            'admin_label' => false,
            "dependency" => array("element" => "tabs_type","value" => array('tab-1')),
	  	),
        array(
			'type' => 'css_editor',
			'heading' => __( 'Css', 'js_composer' ),
			'param_name' => 'css',
			'group' => __( 'Design options', 'js_composer' ),
            'admin_label' => false,
		),
        
    ),
    "js_view" => 'VcColumnView'
));
vc_map( array(
    "name" => __("Section Tab", 'edo'),
    "base" => "tab_section",
    "content_element" => true,
    "as_child" => array('only' => 'categories_tab'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
        // add params same as with any other content element
        array(
            "type" => "textfield",
            "heading" => __( "Header", 'edo' ),
            "param_name" => "header",
            "admin_label" => true,
        ),
        array(
            "type" => "dropdown",
        	"heading" => __("Section Type", 'edo'),
        	"param_name" => "section_type",
            "admin_label" => true,
            'std' => 'best-seller',
            'value' => array(
        		__( 'Best Sellers', 'edo' ) => 'best-seller',
                __( 'Most Reviews', 'edo' ) => 'most-review',
                __( 'New Arrivals', 'edo' ) => 'new-arrival',
                __( 'On Sales', 'edo' )     => 'on-sales',
                __( 'By Ids', 'edo' )       => 'by-ids',
                __( 'Category', 'edo' )     => 'category',
                __( 'Custom', 'edo' )       => 'custom'
        	),
        ),
        
        array(
            "type" => "kt_categories",
        	"heading" => __("Choose Category", 'edo'),
        	"param_name" => "section_cate",
            "admin_label" => false,
            "dependency" => array("element" => "section_type", "value" => array('category')),
        ),
        array(
            "type" => "dropdown",
        	"heading" => __("Order by", 'edo'),
        	"param_name" => "orderby",
        	"value" => array(
        		__('None', 'edo')     => 'none',
                __('ID', 'edo')       => 'ID',
                __('Author', 'edo')   => 'author',
                __('Name', 'edo')     => 'name',
                __('Date', 'edo')     => 'date',
                __('Modified', 'edo') => 'modified',
                __('Rand', 'edo')     => 'rand',
                __('Sale Price', 'edo') => '_sale_price'
        	),
            'std' => 'date',
        	"description" => __("Select how to sort retrieved posts.",'edo'),
            "dependency"  => array("element" => "section_type", "value" => array('custom', 'on-sales', 'category')),
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "Ids", 'edo' ),
            "param_name"  => "ids",
            "admin_label" => true,
            "description" => __("Get product by list ids.( Input IDs which separated by a comma ',' )",'edo'),
            "dependency"  => array("element" => "section_type", "value" => array( 'by-ids' ) ),
        ),
        array(
            "type" => "dropdown",
        	"heading" => __("Order", 'edo'),
        	"param_name" => "order",
        	"value" => array(
                __('ASC', 'edo') => 'ASC',
                __('DESC', 'edo') => 'DESC'
        	),
            'std' => 'DESC',
        	"description" => __("Designates the ascending or descending order.",'edo'),
            "dependency" => array("element" => "section_type", "value" => array('custom', 'on-sales', 'category')),
        ),
        array(
            "type" => "textfield",
            "heading" => __( "Extra class name", "js_composer" ),
            "param_name" => "el_class",
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
            'admin_label' => false,
        ),
    )
) );
class WPBakeryShortCode_Categories_Tab extends WPBakeryShortCodesContainer {
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'categories_tab', $atts ) : $atts;
        extract( shortcode_atts( array(
            'title'      => 'Tabs Name',
            'tabs_type'  => 'tab-1',
            'per_page'   => 10,
            'column'     => 4,
            'category'   => 0,
            'main_color' => '#ff3366',
            'icon'       => '',
            'bg_cate'    => '',
            'banner_top' => '',
            'banner_left'=> '',
            "featured"   => false,
            
            
            //Carousel            
            'autoplay' => 'false', 
            'navigation' => 'false',
            'margin'    => 0,
            'slidespeed' => 250,
            'css' => '',
            'css_animation' => '',
            'el_class' => '',
            'nav' => 'true',
            'loop'  => 'false',
            //Default
            'use_responsive' => 1,
            'items_destop' => 4,
            'items_tablet' => 2,
            'items_mobile' => 1,
        ), $atts ) );
        
         global $woocommerce_loop;
        
        $elementClass = array(
        	'base' => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' box-tab-category ', $this->settings['base'], $atts ),
        	'extra' => $this->getExtraClass( $el_class ),
        	'css_animation' => $this->getCSSAnimation( $css_animation ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        
        $tabs = edo_get_all_attributes( 'tab_section', $content );
        
        
        
    }
}