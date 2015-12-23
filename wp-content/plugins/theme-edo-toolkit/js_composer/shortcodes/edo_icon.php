<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
vc_map( array(
    "name" => __( "Edo Icon", 'edo'),
    "base" => "edo_icon",
    "category" => __('by Edo', 'edo' ),
    "description" => __( 'Show a icon ', 'edo' ),
    "params" => array(
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Style', 'edo' ),
            'param_name' => 'style',
            'default'=>'1',
            'value'      => array(
                __( 'Style 1', 'edo' )   => '1',
                __( 'Style 2', 'edo' ) => '2',
            )
        ),

        array(
            'type'        => 'textarea',
            'heading'     => __( 'Title', 'edo' ),
            'value'       => '',
            'param_name'  => 'title',
            'admin_label' => false,
		),
        array(
            'type'        => 'textarea',
            'heading'     => __( 'Sub title', 'edo' ),
            'value'       => '',
            'param_name'  => 'subtitle',
            'admin_label' => false,
            "dependency"  => array( 
                "element" => "style", 
                "value"   => array( 
                    '2' 
                ) 
            )
        ),

        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Align', 'edo' ),
            'param_name' => 'align',
            'default'=>'1',
            'value'      => array(
                __( 'Left', 'edo' )   => 'left',
                __( 'Right', 'edo' ) => 'right',
            ),
            "dependency"  => array( 
                "element" => "style", 
                "value"   => array( 
                    '2' 
                ) 
            )
        ),
        

		array(
            'type'        => 'textfield',
            'heading'     => __( 'Icon Class', 'edo' ),
            'value'       => __( 'fa-truck', 'edo' ),
            'param_name'  => 'icon_class',
            'description' => __( 'Display a font icon. Subpport Fortawesome', 'edo' ),
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

class WPBakeryShortCode_Edo_icon extends WPBakeryShortCode {
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'edo_icon', $atts ) : $atts;
        $atts = shortcode_atts( array(
            'title'      => '',
            'icon_class' => 'fa-truck',
            'style'      =>'',
            'subtitle'   =>'',
            'align'      =>'left',
            'el_class'   => '',
            'css'        => ''
            
        ), $atts );
        extract($atts);
        $style_class ='style'.$style;
        $elementClass = array(
        	'base' => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $style_class , $this->settings['base'], $atts ),
        	'extra' => $this->getExtraClass( $el_class ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        
        ob_start();
        
        ?>
        <?php if( $style == 1):?>
         <div class="edo_icon <?php echo esc_attr( $elementClass );?>">
             <span class="icon"><i class="fa <?php echo esc_attr( $icon_class );?>"></i></span>
             <div class="icon-info">
                 <h4 class="title"><?php echo edo_get_html( $title);?></h4>
             </div>
         </div>
        <?php endif;?>
        <?php if( $style == 2):?>
         <div class="edo_icon  <?php echo esc_attr($align);?> <?php echo esc_attr( $elementClass );?>">
             <span class="icon"><i class="fa <?php echo esc_attr( $icon_class );?>"></i></span>
             <div class="icon-info">
                 <h4 class="title"><?php echo edo_get_html( $title);?></h4>
                 <div class="subtitle">
                     <?php echo edo_get_html($subtitle);?>
                 </div>
             </div>
         </div>
        <?php endif;?>
        <?php 
        return ob_get_clean();
    }
    

}