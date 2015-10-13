<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
vc_map( array(
    "name"        => __( "Edo Vertical menu", 'edo'),
    "base"        => "edo_vertical_menu",
    "category"    => __('by Edo', 'edo' ),
    "description" => __( 'Show a vertical menu', 'edo' ),
    "params"      => array(
        array(
            'type'        => 'textfield',
            'heading'     => __( 'Title', 'edo' ),
            'value'       => __( 'Button text', 'edo' ),
            'param_name'  => 'title',
            'description' => __( 'Display title in vertical menu', 'edo' ),
            'admin_label' => false,
		),
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Theme', 'edo' ),
            'param_name' => 'theme',
            'value'      => array(
                __( 'Default', 'edo' ) => '',
                __( 'Style 1', 'edo' ) => 'option3',
                __( 'Style 2', 'edo' ) => 'option4',
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

class WPBakeryShortCode_Edo_Vertical_Menu extends WPBakeryShortCode {
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'edo_vertical_menu', $atts ) : $atts;
        $atts = shortcode_atts( array(
            'title'    => 'Categories',
            'theme'    =>'',
            'el_class' => '',
            'css'      => ''
            
        ), $atts );
        extract($atts);
        $elementClass = array(
        	'base' => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' ', $this->settings['base'], $atts ),
        	'extra' => $this->getExtraClass( $el_class ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        ob_start();
        ?>
         <!-- Block vertical-menu -->
        <div class="<?php echo esc_attr( $theme );?>">
            <div class="block block-vertical-menu <?php echo esc_attr( $elementClass );?> ">
                <div class="vertical-head">
                    <h5 class="vertical-title"><?php echo $title;?></h5>
                </div>
                <div class="vertical-menu-content">
                    <?php
                    wp_nav_menu( array(
                        'menu'              => 'vertical-menu',
                        'theme_location'    => 'vertical-menu',
                        'depth'             => 2,
                        'container'         => '',
                        'container_class'   => '',
                        'container_id'      => 'vertial-menu',
                        'menu_class'        => 'vertical-menu-list',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                    );
                    ?>
                </div>
            </div>
        </div>
        <!-- ./Block vertical-menu -->
        <?php 
        return ob_get_clean();
    }
}