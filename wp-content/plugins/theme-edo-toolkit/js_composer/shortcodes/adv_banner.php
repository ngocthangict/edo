<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

// Setting shortcode service
vc_map( array(
    "name"        => __( "Banner Advertisement", 'edo'),
    "base"        => "banner_adv",
    "category"    => __('by Edo', 'edo' ),
    "description" => __( "Container banners add to this shortcode", 'edo'),
    "as_parent"   => array('only' => 'section_banner'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element"         => true,
    "show_settings_on_create" => true,
    "params" => array(
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
            "type"        => "attach_image",
            "heading"     => __("Image", 'edo'),
            "param_name"  => "img",
            "admin_label" => false,
            'description' => __( 'It shows image of banner', 'edo' )
        ),
        // array(
        //     "type"        => "colorpicker",
        //     "heading"     => __("Background Color", 'edo'),
        //     "param_name"  => "bg_color",
        //     "admin_label" => false,
        //     'description' => __( 'It shows background color of banner', 'edo' )
        // ),
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
            'group'       => __( 'Design options', 'js_composer' ),
            'admin_label' => false,
		),
    ),
    "js_view" => 'VcColumnView'
));
vc_map( array(
    "name"  => __("Banner", 'edo'),
    "base"  => "section_banner",
    "content_element" => true,
    "as_child"      => array('only' => 'banner_adv'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params"        => array(
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
class WPBakeryShortCode_Banner_Adv extends WPBakeryShortCodesContainer {
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'banner_adv', $atts ) : $atts;
        
        $atts = shortcode_atts( array(
            'title'    => '',
            'sub_title'=> '',
            'desc'     => '',
            'img'      => '',
            'bg_color' => '',
            'bg_image' => '',
            'link'     => '#',
            'link_target' => '_blank',
            
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
        if( $img ){
            $img_src = wp_get_attachment_image_src( $img , 'full' );  
            $img_url =  is_array($img_src) ? esc_url($img_src[0]) : ''; 
        }
        
        $style = "";
    
        if( $bg_color ){
            $style .= "background-color: " . esc_attr( $bg_color ) . ";";
        }
        if( $bg_image ){
            $att_icon = wp_get_attachment_image_src( $bg_image , 'full' );  
            $att_icon_url =  is_array($att_icon) ? esc_url($att_icon[0]) : ''; 
            if( $att_icon_url ){
                $style .= "background-image: url('" . esc_url( $att_icon_url ) . "');";
                $style .= "background-repeat: no-repeat;";
                $style .= "background-position: right center;";
            }
        }
        
        ob_start();
        ?>
        <!-- block banner -->
        <div class="adv_banner">
            <div class="block block-banner2">
                <div class="row">
                    <div class="box-left col-sm-12 col-md-8" style="<?php echo esc_attr( $style ); ?>">
                        <div class="col-sm-6">
                            <div class="inner">
                                <?php if( $title ): ?>
                                    <h4 class="title"><i><?php echo esc_html( $title ); ?></i></h4>
                                <?php endif; ?>
                                <?php if( $sub_title ): ?>
                                    <h3 class="subtitle"><b><?php echo esc_html( $sub_title ); ?></b></h3>
                                <?php endif; ?>
                                <?php if( $desc ): ?>
                                <div class="content-text desc">
                                    <p><?php echo esc_textarea( $desc ); ?></p>
                                </div>
                                <?php endif; ?>
                                <a class="button-radius" target="<?php echo esc_attr( $link_target )  ?>" href="<?php echo esc_url( $link ) ; ?>"><?php _e( 'Shop now', 'edo' ) ?><span class="icon"></span></a>
                            </div>
                        </div>
                        <?php if( isset( $img_url ) && $img_url ): ?>
                        <div class="col-sm-6">
                            <a target="<?php echo esc_attr( $link_target ); ?>" href="<?php echo esc_url( $link ) ; ?>">
                                <img src="<?php echo esc_url( $img_url ) ; ?>" alt="<?php echo esc_attr( $title ) ; ?>" />
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="box-right col-sm-12 col-md-4">
                        <?php echo do_shortcode( shortcode_unautop( $content ) ); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./block banner -->
        <?php
        $result = ob_get_clean();
        return $result;
    }
}

class WPBakeryShortCode_Section_Banner extends WPBakeryShortCode{
    protected function content($atts, $content = null) {
        
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'section_banner', $atts ) : $atts;
        
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
            $style .= "background-color: " . esc_attr( $bg_color ) . ";";
        }
        if( $bg_image ){
            $att_icon = wp_get_attachment_image_src( $bg_image , 'full' );  
            
            $att_icon_url =  is_array($att_icon) ? esc_url($att_icon[0]) : ''; 
            
            if( $att_icon_url ){
                $style .= "background-image: url('" . esc_url( $att_icon_url ) . "');";
                $style .= "background-repeat: no-repeat;";
                $style .= "background-position: right center;";
            }
        }
        ob_start();
        ?>
        <div class="item i2" style="<?php echo esc_attr( $style ) ; ?>">
            <div class="row">
                <div class="col-sm-8">
                    <?php if( $title ): ?>
                        <h5 class="title"><i><?php echo esc_html( $title ) ; ?></i></h5>
                    <?php endif; ?>
                    <?php if( $sub_title ): ?>
                        <h5 class="subtitle"><b><?php echo esc_html( $sub_title ) ; ?></b></h5>
                    <?php endif; ?>
                    <?php if( $desc ): ?>
                        <div class="content-text desc">
                            <p><?php echo esc_textarea( $desc ); ?></p>
                        </div>
                    <?php endif; ?>
                    <a class="button-radius" target="<?php echo esc_attr( $link_target )  ?>" href="<?php echo esc_url( $link ) ; ?>"><?php _e( 'Shop now', 'edo' ) ?><span class="icon"></span></a>
                </div>
            </div>
        </div>
        <?php
        $result = ob_get_clean();
        return $result;
        
    }
}