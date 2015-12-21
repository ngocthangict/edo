<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
vc_map( array(
    "name" => __( "Edo Subscribe form", 'edo'),
    "base" => "edo_subscribe_form",
    "category" => __('by Edo', 'edo' ),
    "description" => __( 'Show a Subscribe form', 'edo' ),
    "params" => array(
        array(
			'type' => 'textfield',
			'heading' => __( 'Small title', 'edo' ),
			'value' => '',
			'param_name' => 'small_title',
            'admin_label' => true,
		),
        array(
            'type' => 'textfield',
            'heading' => __( 'Big title', 'edo' ),
            'value' => '',
            'param_name' => 'big_title',
            'admin_label' => true,
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Description', 'edo' ),
            'value' => '',
            'param_name' => 'desc',
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

class WPBakeryShortCode_Edo_subscribe_form extends WPBakeryShortCode {
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'edo_subscribe_form', $atts ) : $atts;
        $atts = shortcode_atts( array(
            'small_title' => '',
            'big_title'   => '',
            'desc'        => '',
            'el_class'    => '',
            'css'         => ''
            
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
         <div class="block footer-block-box <?php echo esc_attr( $elementClass );?>">
            <div class="block-head">
                <div class="block-title">
                    <div class="block-icon">
                        <img src="<?php echo esc_url( THEME_URL . 'assets/images/email-icon.png' ); ?>" alt="<?php esc_attr_e( 'emai icon', 'edo' ) ?>" />
                    </div>
                    <div class="block-title-text text-sm"><?php echo esc_html( $small_title );?></div>
                    <div class="block-title-text text-lg"><?php echo esc_html( $big_title );?></div>
                </div>
            </div>
            <div class="block-inner">
                <div class="block-info clearfix">
                    <?php esc_html( $desc );?>
                </div>
                <div class="block-input-box box-radius clearfix">
                    <?php echo do_shortcode( '[mailchimp opt_in="yes" title="" text_before=""]'. esc_attr( '' ) .'[/mailchimp]' );?>
                </div>
            </div>
        </div>

        <?php 
        return ob_get_clean();
    }
    

}