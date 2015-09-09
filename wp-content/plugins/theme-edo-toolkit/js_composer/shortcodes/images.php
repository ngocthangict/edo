<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

// Setting shortcode service
vc_map( array(
    "name" => __( "List Images", 'edo'),
    "base" => "list_image",
    "category" => __('by Edo', 'edo' ),
    "description" => __( "Show all image you add shortcode section in this shortcode", 'edo'),
    "as_parent" => array('only' => 'section_image'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        // Carousel
        array(
            "type" => "textfield",
            "heading" => __( "Title", 'edo' ),
            "param_name" => "title",
            "admin_label" => true,
            'description' => __( 'It shows the title', 'edo' )
        ),
        array(
            "type" => "attach_image",
            "heading" => __("Icon", 'edo'),
            "param_name" => "icon",
            "admin_label" => false,
            'description' => __( 'Image', 'edo' )
        ),
    ),
    "js_view" => 'VcColumnView'
));
vc_map( array(
    "name" => __("Image", 'edo'),
    "base" => "section_image",
    "content_element" => true,
    "as_child" => array('only' => 'list_image'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
        // add params same as with any other content element
        array(
            "type" => "textfield",
            "heading" => __( "Title", 'edo' ),
            "param_name" => "title",
            "admin_label" => true,
            'description' => __( 'It shows in attribute alt and title of image', 'edo' )
        ),
        array(
            "type" => "attach_image",
            "heading" => __("Image", 'edo'),
            "param_name" => "image",
            "admin_label" => false,
            'description' => __( 'It shows image source', 'edo' )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Link", 'edo'),
            "param_name" => "link",
            "admin_label" => false,
            'description' => __( 'It shows link.', 'edo' )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Link target", 'edo'),
            "param_name" => "link_target",
            "admin_label" => false,
            'description' => __( 'It shows link target', 'edo' ),
            'value' => array(
                'Open new window' => '_blank',
                'Stay in window'  => '_self'
            )
        )
    )
) );
class WPBakeryShortCode_List_Image extends WPBakeryShortCodesContainer {
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'list_image', $atts ) : $atts;
        
        $atts = shortcode_atts( array(
            'title'       => __( 'shop features', 'edo' ),
            'icon'        => '',
            'width_class' => ''
        ), $atts );
        
        extract($atts);
        $new_title = $title;
        
        $new_title = explode( ',', $new_title );
        
        if( count($new_title) > 1 ){
            $title_sm = $new_title[0];
            unset( $new_title[0] );
            $title_lg = implode( ' ', $new_title );
        }else{
            $title_sm = __( 'shop', 'edo' );
            $title_lg = __( 'features', 'edo' );
        }
        
        $default_icon = KUTETHEME_PLUGIN_URL . 'js_composer/imgs/shop-features-icon.png';
            
        if( isset( $icon ) && $icon ){
            $att_icon = wp_get_attachment_image_src( $icon, array( 42, 37 ) );  
            $att_icon_url =  is_array($att_icon) ? esc_url($att_icon[0]) : $default_icon; 
        }else{
            $att_icon_url = $default_icon;
        }
        
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width_class, $this->settings['base'], $atts );
        
        ob_start();
        ?>
        <!-- block-shop-features -->
		<div class="block block-shop-features <?php echo $css_class; ?>">
			<div class="block-head">
				<div class="block-title">
					<div class="block-icon">
						<img alt="<?php  echo $title;  ?>" title="<?php echo $title; ?>" src="<?php echo $att_icon_url; ?>" />
					</div>
					<div class="block-title-text text-sm"><?php echo $title_sm; ?></div>
					<div class="block-title-text text-lg"><?php echo $title_lg; ?></div>
				</div>
			</div>
			<div class="block-inner">
				<ul class="list-banner">
					<?php echo do_shortcode( shortcode_unautop( $content ) ); ?>
				</ul>
			</div>
		</div>
		<!-- ./block-shop-features-->
        <?php
        $result = ob_get_clean();
        return $result;
    }
}

class WPBakeryShortCode_Section_Image extends WPBakeryShortCode{
    protected function content($atts, $content = null) {
        
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'section_image', $atts ) : $atts;
        
        $atts = shortcode_atts( array(
            'title' => '',
            'image' => '',
            'link'  => '#',
            'link_target' => '_blank'
        ), $atts );
        extract($atts);
        ob_start();
        
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $this->settings['base'], $atts );
        
        if( isset( $image ) && $image ){
            $att_icon = wp_get_attachment_image_src( $image , 'full' );  
            $att_icon_url =  is_array($att_icon) ? esc_url($att_icon[0]) : ''; 
            if( $att_icon_url ){
                ?>
            		<li class="banner-hover <?php echo $css_class; ?>">
                        <a target="<?php echo $link_target ?>" href="<?php echo $link; ?>">
                            <img src="<?php echo $att_icon_url ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>" />
                        </a>
                    </li>
                <?php
            }
        }
        $result = ob_get_clean();
        return $result;
        
    }
}