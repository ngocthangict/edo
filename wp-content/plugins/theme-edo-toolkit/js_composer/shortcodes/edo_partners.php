<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
vc_map( array(
    "name" => __( "Edo Partners", 'edo'),
    "base" => "edo_partners",
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

class WPBakeryShortCode_Edo_partners extends WPBakeryShortCode {
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'edo_partners', $atts ) : $atts;
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

         $args = array(
              'post_type'      => 'partner',
              'orderby'        => 'date',
              'order'          => 'desc',
              'post_status'    => 'publish'
        );
        $partners = new WP_Query( $args );
        ob_start();
        ?>
         <div class="block footer-block-box <?php echo esc_attr( $elementClass );?>">
            <div class="block-head">
                <div class="block-title">
                    <div class="block-icon">
                        <img src="<?php echo THEME_URL . 'assets/' ?>images/partners-icon.png" alt="<?php esc_attr_e( 'partner icon', 'edo' ) ?>" />
                    </div>
                    <div class="block-title-text text-sm"><?php echo esc_html( $small_title );?></div>
                    <div class="block-title-text text-lg"><?php echo esc_html( $big_title );?></div>
                </div>
            </div>
            <div class="block-inner">
                <div class="block-owl">
                    <?php if( $partners->have_posts()):?>
                    <ul class="kt-owl-carousel list-partners" data-nav="true" data-autoplay="true" data-loop="false" data-items="1">
                        <?php while ( $partners->have_posts() ): $partners->the_post(); ?>
                        <?php
                        $partner_url = get_post_meta(get_the_ID(),'partner_url');
                        $link = '#';
                        if( $partner_url){
                            $link = $partner_url;
                        }
                        ?>
                            <?php if( has_post_thumbnail() ):?>
                                <li class="partner">
                                    <a href="<?php echo esc_url( $link );?>">
                                        <?php the_post_thumbnail('full'); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </ul>
                    <?php else:?>
                        <p><?php echo _e('No Partner.');?></p>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <?php 
        wp_reset_postdata();
        wp_reset_query();
        return ob_get_clean();
    }
    

}