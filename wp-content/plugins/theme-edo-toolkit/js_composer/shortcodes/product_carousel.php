<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
vc_map( array(
    "name" => __( "Edo Product carousel", 'edo'),
    "base" => "product_carousel",
    "category" => __('by Edo', 'edo' ),
    "description" => __( 'Show a list product carousel ', 'edo' ),
    "params" => array(
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Style', 'edo' ),
            'param_name' => 'style',
            'default'=>'1',
            'value'      => array(
                __( 'Style 1', 'edo' ) => '1',
                __( 'Style 2', 'edo' ) => '2',
            )
        ),

        array(
            'type'        => 'textfield',
            'heading'     => __( 'Title', 'edo' ),
            'value'       => '',
            'param_name'  => 'title',
            'admin_label' => true,
		),

		array(
            "type"        => "dropdown",
            "heading"     => __("Type", 'edo'),
            "param_name"  => "type",
            "admin_label" => true,
            'std'         => 'hot-deals',
            'value'       => array(
                __( 'Hot Deals', 'edo' )    => 'hot-deals',
                __( 'Best selling', 'edo' ) => 'best-selling',
                __( 'New Arrivals', 'edo' ) => 'recent-product',
                __( 'Most Review', 'edo' )  => 'most-review'
            ),
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
            "type"        => "textfield",
            "heading"     => __( "Number Post", 'edo' ),
            "param_name"  => "per_page",
            'std'         => 5,
            "admin_label" => false,
            'description' => __( 'Number post in a slide', 'edo' )
        ),
        // Carousel
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'AutoPlay', 'edo' ),
            'param_name' => 'autoplay',
            'value'      => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'group'       => __( 'Carousel settings', 'edo' ),
            'admin_label' => false,
        ),
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Navigation', 'edo' ),
            'param_name' => 'navigation',
            'value'      => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'description' => __( "Don't display 'next' and 'prev' buttons.", 'edo' ),
            'group'       => __( 'Carousel settings', 'edo' ),
            'admin_label' => false,
        ),
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Loop', 'edo' ),
            'param_name' => 'loop',
            'value'      => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'description' => __( "Inifnity loop. Duplicate last and first items to get loop illusion.", 'edo' ),
            'group'       => __( 'Carousel settings', 'edo' ),
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
            "value"       => "20",
            "suffix"      => __("px", 'edo'),
            "description" => __('Distance( or space) between 2 item', 'edo'),
            'group'       => __( 'Carousel settings', 'edo' ),
            'admin_label' => false,
        ),
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Use Carousel Responsive', 'edo' ),
            'param_name' => 'use_responsive',
            'value'      => array(
                __( 'Yes', 'js_composer' ) => 1,
                __( 'No', 'js_composer' )  => 0
            ),
            'std'         => 1,
            'description' => __( "Try changing your browser width to see what happens with Items and Navigations", 'edo' ),
            'group'       => __( 'Carousel responsive', 'edo' ),
            'admin_label' => false,
        ),
        array(
            "type"        => "edo_number",
            "heading"     => __("The items on destop (Screen resolution of device >= 992px )", 'edo'),
            "param_name"  => "items_destop",
            "value"       => "5",
            "suffix"      => __("item", 'edo'),
            "description" => __('The number of items on destop', 'edo'),
            'group'       => __( 'Carousel responsive', 'edo' ),
            'admin_label' => false,
        ),
        array(
            "type"        => "edo_number",
            "heading"     => __("The items on tablet (Screen resolution of device >=768px and < 992px )", 'edo'),
            "param_name"  => "items_tablet",
            "value"       => "3",
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

class WPBakeryShortCode_Product_carousel extends WPBakeryShortCode {
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'product_carousel', $atts ) : $atts;
        extract( shortcode_atts( array(
            'title'    => '',
            'per_page' => 5,
            'style'    => '1',
            'type'     => 'hot-deals',
            'taxonomy' => 0,
            'orderby'     => 'date',
            'order'       => 'DESC',
            
            //Carousel            
            'autoplay'       => 'false', 
            'navigation'     => 'false',
            'margin'         => 20,
            'slidespeed'     => 250,
            'nav'            => 'true',
            'loop'           => 'true',
            //Default
            'use_responsive' => 1,
            'items_destop'   => 5,
            'items_tablet'   => 3,
            'items_mobile'   => 1,

            
            'css'           => '',
            'css_animation' => '',
            'el_class'      => '',
        ), $atts ) );
        extract($atts);
        $style_class ='style'.$style;
        $elementClass = array(
        	'base' => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $style_class , $this->settings['base'], $atts ),
        	'extra' => $this->getExtraClass( $el_class ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        $meta_query = WC()->query->get_meta_query();
        

        $args = array(
            'post_type'           => 'product',
            'post_status'         => 'publish',
            'ignore_sticky_posts' => 1,
            'posts_per_page'      => $per_page,
            'suppress_filter'     => true,
            'meta_query'          => $meta_query
        );
        
        
        if( $type == 'hot-deals' ){
            $product_ids_on_sale = wc_get_product_ids_on_sale();
            
            $args['post__in'] = array_merge( array( 0 ), $product_ids_on_sale );
            if( $orderby == 'discount' ){
                $newargs['meta_key'] = '_reduction_percent';
                $newargs['orderby']  = 'meta_value_num';
            }else{
                $args['orderby']  = $orderby;
            }
            $args['order']   = $order;
        }elseif( $type == 'best-selling' ){
            $newargs['meta_key'] = 'total_sales';
            $newargs['orderby']  = 'meta_value_num';
        }elseif( $type == 'recent-product' ){
            $args['orderby'] = $orderby;
            $args['order']   = $order;
        }elseif( $type == 'most-review' ){
            add_filter( 'posts_clauses', array( $this, 'order_by_rating_post_clauses' ) );
        }
        
        $cate_ids = array();
        
        if( $taxonomy ){
            $cate_ids = explode( ",", $taxonomy );
            
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'id',
                    'terms'    => $cate_ids
                )
            );
        }
        
        $products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );
        ob_start();
        
        ?>
        <div class="edo-product-carousel <?php echo esc_attr( $elementClass );?>">
            <?php if( $products->have_posts()):?>
            <?php
            $data_carousel = array(
                "autoplay"    => $autoplay,
                "navigation"  => $navigation,
                "margin"      => $margin,
                "slidespeed"  => $slidespeed,
                "theme"       => 'style-navigation-top',
                "autoheight"  => 'false',
                'nav'         => $navigation,
                'dots'        => 'false',
                'loop'        => $loop,
                'autoplayTimeout' => 1000,
                'autoplayHoverPause' => 'true'
            );
            if( $products->post_count <=1){
                $data_carousel["loop"]='false';
            }
            
            if( $use_responsive ){
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
                $data_carousel['items'] =  $items_destop;
            }
            $unique_id = uniqid();
            $carousel = _data_carousel($data_carousel);
            ?>
            <ul class="products kt-owl-carousel" <?php echo $carousel; ?>>
                <?php
                while( $products->have_posts()){
                    $products->the_post();
                    ?>
                    <li class="product style6">
                    <?php
                    wc_get_template_part( 'content','product-carousel' );
                    ?>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <?php else:?>
                <p><?php _e('No Product.','edo')?></p>
            <?php endif;?>
        </div>
        <?php 
        return ob_get_clean();
    }
    

}