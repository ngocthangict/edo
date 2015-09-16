<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

// Setting shortcode service
vc_map( array(
    "name" => __( "Banner Carousel", 'edo'),
    "base" => "banner_carousel",
    "category" => __('by Edo', 'edo' ),
    "description" => __( "Container banners add to this shortcode", 'edo'),
    "as_parent" => array('only' => 'banner'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        // Carousel
        array(
			'type' => 'dropdown',
			'heading' => __( 'AutoPlay', 'edo' ),
			'param_name' => 'autoplay',
			'value' => array(
				__( 'Yes', 'js_composer' ) => 'true',
				__( 'No', 'js_composer' )  => 'false'
			),
            'group' => __( 'Carousel settings', 'edo' ),
            'admin_label' => false,
		),
        array(
			'type'        => 'dropdown',
            'heading'     => __( 'Navigation', 'edo' ),
			'param_name'  => 'navigation',
			'value' => array(
				__( 'Yes', 'js_composer' ) => 'true',
				__( 'No', 'js_composer' )  => 'false'
			),
            'description' => __( "Don't display 'next' and 'prev' buttons.", 'edo' ),
            'group'       => __( 'Carousel settings', 'edo' ),
            'admin_label' => false,
		),
        array(
			'type' => 'dropdown',
            'heading' => __( 'Loop', 'edo' ),
			'param_name' => 'loop',
			'value' => array(
				__( 'Yes', 'js_composer' ) => 'true',
				__( 'No', 'js_composer' )  => 'false'
			),
            'description' => __( "Inifnity loop. Duplicate last and first items to get loop illusion.", 'edo' ),
            'group' => __( 'Carousel settings', 'edo' ),
            'admin_label' => false,
		),
        array(
			"type"        => "edo_number",
			"heading"     => __("Slide Speed", 'edo'),
			"param_name"  => "slidespeed",
			"value"       => "250",
            "suffix"      => __("milliseconds", 'edo'),
			"description" => __('Slide speed in milliseconds', 'edo'),
            'group'       => __( 'Carousel settings', 'edo' ),
            'admin_label' => false,
	  	),
        array(
			"type"        => "edo_number",
			"heading"     => __("Margin", 'edo'),
			"param_name"  => "margin",
			"value"       => "30",
            "suffix"      => __("px", 'edo'),
			"description" => __('Distance( or space) between 2 item', 'edo'),
            'group'       => __( 'Carousel settings', 'edo' ),
            'admin_label' => false,
	  	),
        array(
			'type'        => 'dropdown',
            'heading'     => __( 'Use Carousel Responsive', 'edo' ),
			'param_name'  => 'use_responsive',
			'value' => array(
				__( 'Yes', 'js_composer' ) => 1,
				__( 'No', 'js_composer' )  => 0
			),
            'description' => __( "Try changing your browser width to see what happens with Items and Navigations", 'edo' ),
            'group'       => __( 'Carousel responsive', 'edo' ),
            'admin_label' => false,
		),
        array(
			"type"        => "edo_number",
			"heading"     => __("The items on destop (Screen resolution of device >= 992px )", 'edo'),
			"param_name"  => "items_destop",
			"value"       => "3",
            "suffix"      => __("item", 'edo'),
			"description" => __('The number of items on destop', 'edo'),
            'group'       => __( 'Carousel responsive', 'edo' ),
            'admin_label' => false,
	  	),
        array(
			"type"        => "edo_number",
			"heading"     => __("The items on tablet (Screen resolution of device >=768px and < 992px )", 'edo'),
			"param_name"  => "items_tablet",
			"value"       => "2",
            "suffix"      => __("item", 'edo'),
			"description" => __('The number of items on destop', 'edo'),
            'group'       => __( 'Carousel responsive', 'edo' ),
            'admin_label' => false,
	  	),
        array(
			"type"        => "edo_number",
			"heading"     => __("The items on mobile (Screen resolution of device < 768px)", 'edo'),
			"param_name"  => "items_mobile",
			"value"       => "1",
            "suffix"      => __("item", 'edo'),
			"description" => __('The numbers of item on destop', 'edo'),
            'group'       => __( 'Carousel responsive', 'edo' ),
            'admin_label' => false,
	  	),
        array(
        	'type'        => 'dropdown',
        	'heading'     => __( 'CSS Animation', 'js_composer' ),
        	'param_name'  => 'css_animation',
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
        array(
			'type'        => 'css_editor',
			'heading'     => __( 'Css', 'js_composer' ),
			'param_name'  => 'css',
			// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
			'group'       => __( 'Design options', 'js_composer' ),
            'admin_label' => false,
		),
    ),
    "js_view" => 'VcColumnView'
));
vc_map( array(
    "name" => __("Banner", 'edo'),
    "base" => "banner",
    "content_element" => true,
    "as_child" => array('only' => 'banner_carousel'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
        // add params same as with any other content element
        array(
            "type"        => "textfield",
            "heading"     => __( "Title", 'edo' ),
            "param_name"  => "title",
            "admin_label" => true
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "SubTitle", 'edo' ),
            "param_name"  => "sub_title",
            "admin_label" => false
        ),
        array(
            "type"        => "textarea",
            "heading"     => __( "Desc", 'edo' ),
            "param_name"  => "desc",
            "admin_label" => false
        ),
        array(
            "type"        => "colorpicker",
            "heading"     => __("Background Color", 'edo'),
            "param_name"  => "bg_color",
            "admin_label" => false,
            'description' => __( 'It shows background color of banner', 'edo' )
        ),
        array(
            "type"        => "attach_image",
            "heading"     => __("Background Image", 'edo'),
            "param_name"  => "bg_image",
            "admin_label" => false,
            'description' => __( 'It shows background image of banner', 'edo' )
        ),
        array(
            "type"        => "textfield",
            "heading"     => __("Link", 'edo'),
            "param_name"  => "link",
            "admin_label" => false,
            'description' => __( 'It shows link.', 'edo' )
        ),
        array(
            "type"        => "dropdown",
            "heading"     => __("Link target", 'edo'),
            "param_name"  => "link_target",
            "admin_label" => false,
            'description' => __( 'It shows link target', 'edo' ),
            'value' => array(
                'Open new window' => '_blank',
                'Stay in window'  => '_self'
            )
        )
    )
) );
class WPBakeryShortCode_Banner_Carousel extends WPBakeryShortCodesContainer {
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'banner_carousel', $atts ) : $atts;
        
        $atts = shortcode_atts( array(
            //Carousel            
            'autoplay'   => 'false', 
            'navigation' => 'false',
            'margin'     => 30,
            'slidespeed' => 250,
            'nav'        => 'true',
            'loop'       => 'true',
            //Default
            'use_responsive' => 0,
            'items_destop'   => 3,
            'items_tablet'   => 2,
            'items_mobile'   => 1,
            
            'css' => '',
            'css_animation' => '',
            'width_class'   => ''
        ), $atts );
        
        extract($atts);
        
        $elementClass = array(
        	'base' => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'block block-banner-owl ', $this->settings['base'], $atts ),
        	'extra' => $this->getExtraClass( $width_class ),
        	'css_animation' => $this->getCSSAnimation( $css_animation ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        
        $data_carousel = array(
            "autoplay"    => $autoplay,
            "navigation"  => $navigation,
            "margin"      => $margin,
            "slidespeed"  => $slidespeed,
            "theme"       => 'style-navigation-top',
            "autoheight"  => 'false',
            'nav'         => 'true',
            'dots'        => 'false',
            'loop'        => $loop,
            'autoplayTimeout' => 1000,
            'autoplayHoverPause' => 'true'
        );
        
        if( $use_responsive){
            
            $arr = array(   
                '0' => array(
                    "items" => $items_mobile
                ), 
                '768' => array(
                    "items" => $items_tablet
                ), 
                '992' => array(
                    "items" => $items_destop
                )
            );
            
            $data_responsive = json_encode($arr);
            $data_carousel["responsive"] = $data_responsive;
        }else{
            $data_carousel['items'] =  3;
        }
        ob_start();
        ?>
        <!-- block banner owl-->
        <div class="<?php echo $elementClass; ?>" >
    		<div class="block-inner kt-owl-carousel" <?php echo _data_carousel($data_carousel); ?>>
    			<?php echo do_shortcode( shortcode_unautop( $content ) ); ?>
    		</div>
    	</div>
        <!-- ./block banner owl-->
        <?php
        $result = ob_get_clean();
        return $result;
    }
}

class WPBakeryShortCode_Banner extends WPBakeryShortCode{
    protected function content($atts, $content = null) {
        
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'banner', $atts ) : $atts;
        
        $atts = shortcode_atts( array(
            'title'    => '',
            'sub_title'=> '',
            'desc'     => '',
            'bg_color' => '',
            'bg_image' => '',
            'link'     => '#',
            'link_target' => '_blank'
        ), $atts );
        extract($atts);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $this->settings['base'], $atts );
        $style = "";
        
        if( $bg_color ){
            $style .= "background-color: " . $bg_color . ";";
        }
        if( $bg_image ){
            $att_icon = wp_get_attachment_image_src( $bg_image , 'full' );  
            $att_icon_url =  is_array($att_icon) ? esc_url($att_icon[0]) : ''; 
            if( $att_icon_url ){
                $style .= "background-image: url('" . $att_icon_url . "');";
                $style .= "background-repeat: no-repeat";
            }
        }
        ob_start();
        ?>
        <div class="banner-text" <?php if( $style ): ?> style="<?php echo $style; ?>" <?php endif; ?> >
             <h4><?php echo $title; ?></h4>
             <h2><b><?php echo $sub_title; ?></b></h2>
             <p><?php echo $desc; ?></p>
             <a class="button-radius white" target="<?php echo $link_target ?>" href="<?php echo $link; ?>"><?php _e( 'Shop now', 'edo' ) ?><span class="icon"></span></a>
         </div>
        <?php
        $result = ob_get_clean();
        return $result;
        
    }
}