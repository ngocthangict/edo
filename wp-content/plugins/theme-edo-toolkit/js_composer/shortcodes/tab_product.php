<?php
/**
 * @author  AngelsIT
 * @package KUTE TOOLKIT
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


class WPBakeryShortCode_Tab_Producs extends WPBakeryShortCode {

    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'tab_producs', $atts ) : $atts;
        $atts = shortcode_atts( array(
            'taxonomy'       => '',
            'style'          =>'1',
            'per_page'       => 12,
            'columns'        => 4,
            'border_heading' => '',
            'css_animation'  => '',
            'el_class'       => '',
            'css'            => '',   
            
            //Carousel            
            'autoplay'       => 'false', 
            'navigation'     => 'false',
            'margin'         => 30,
            'slidespeed'     => 200,
            'css'            => '',
            'el_class'       => '',
            'nav'            => 'true',
            'loop'           => 'false',
            //Default
            'use_responsive' => 1,
            'items_destop'   => 3,
            'items_tablet'   => 2,
            'items_mobile'   => 1,
            
        ), $atts );
        extract($atts);

        global $woocommerce_loop;
        $is_phone = false;
        
        if( function_exists( 'kt_is_phone' ) && kt_is_phone() ){
            $is_phone = true;
        }
        if( $style == 3 ):
            $base_class = 'tab-product-13 option-13 style1 ';
        else:
            $base_class = 'popular-tabs ';
        endif;
        $elementClass = array(
            'base'             => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $base_class, $this->settings['base'], $atts ),
            'extra'            => $this->getExtraClass( $el_class ),
            'css_animation'    => $this->getCSSAnimation( $css_animation ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        
        $elementClass = apply_filters( 'kt_product_tab_class_container', $elementClass );
        
        $tabs = array(
            'best-sellers' => __( 'Best Sellers', 'edo' ),
            'on-sales'     => __( 'On Sales', 'edo' ),
            'new-arrivals' => __( 'New Products', 'edo' )
        );
        
        $meta_query = WC()->query->get_meta_query();
        $args = array(
			'post_type'				=> 'product',
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page' 		=> $per_page,
			'meta_query' 			=> $meta_query,
            'suppress_filter'       => true,
		);
        
        if( $taxonomy ){
            $args['tax_query'] = 
                array(
            		array(
            			'taxonomy' => 'product_cat',
            			'field' => 'id',
            			'terms' => explode( ",", $taxonomy )
            	)
            );
        }
        $uniqeID = uniqid();
        ob_start();
        ?>
        <div class="<?php echo esc_attr( $elementClass ); ?> top-nav container-tab style<?php echo esc_attr( $style );?>">
            <ul class="nav-tab">
                <?php $i = 0; ?>
                <?php foreach( $tabs as $k => $v ): ?>
                    <li <?php echo ( $i == 0 ) ? 'class="active"': '' ?> >
                        <a data-toggle="tab" href="#tab-<?php echo esc_attr( $k ) . $uniqeID  ?>"><?php echo esc_html( $v ); ?></a>
                    </li>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </ul>
            <div class="tab-container">
                <?php 
                $data_carousel = array(
                    "autoplay"           => $autoplay,
                    "navigation"         => $navigation,
                    "margin"             => $margin,
                    "slidespeed"         => $slidespeed,
                    "theme"              => 'style-navigation-bottom',
                    "autoheight"         => 'false',
                    'nav'                => $navigation,
                    'dots'               => 'false',
                    'loop'               => $loop,
                    'autoplayTimeout'    => 1000,
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
                     if( $style == 3 ):
                        $data_carousel['items'] =  4;
                    else:
                        $data_carousel['items'] =  3;
                    endif;
                }
                $carousel = _data_carousel( $data_carousel );
                $i = 0; 
                ?>
                <?php foreach( $tabs as $k => $v ): ?>
                    <?php 
                    $newargs = $args;
                    
                    if( $k == 'best-sellers' ){
                        $newargs['meta_key'] = 'total_sales';
                        $newargs['orderby']  = 'meta_value_num';
                    }elseif( $k == 'on-sales' ){
                        $product_ids_on_sale = wc_get_product_ids_on_sale();
                        
                        $newargs['post__in'] = array_merge( array( 0 ), $product_ids_on_sale );
                        
                        $newargs['orderby']  = 'date';
                        $newargs['order'] 	 = 'DESC';
                    }else{
                        $newargs['orderby']  = 'date';
                        $newargs['order'] 	 = 'DESC';
                    }
                    
                    $products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $newargs, $atts ) );
                    
                    if ( $products->have_posts() ) : ?>
                    <!-- Style 1 -->
                    <?php if( $style == 1 ):?>
                    <div id="tab-<?php echo esc_attr( $k ) . $uniqeID  ?>" class="tab-panel <?php echo ( $i == 0 ) ? 'active': '' ?>">
                        <ul class="products kt-owl-carousel" <?php echo apply_filters( 'kt_shortcode_tab_product_carousel', $carousel ); ?>>
                            <?php while( $products->have_posts() ): $products->the_post(); ?>
                                <li class="product style6 no-hiden">
                                <?php wc_get_template_part( 'content', 'product-tab' ); ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                    <!-- ./Style 1 -->
                    <?php endif;?>
                    <?php endif; ?>
                    <?php 
                        wp_reset_query();
                        wp_reset_postdata();
                        $i++; 
                    ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}



vc_map( array(
    "name"        => __( "Tab Products", 'edo'),
    "base"        => "tab_producs",
    "category"    => __('by Edo', 'edo' ),
    "description" => __( 'Show product in tab best sellers, on sales, new products on option 1', 'js_composer' ),
    "params"      => array(
        array(
            "type"        => "edo_taxonomy",
            "taxonomy"    => "product_cat",
            "class"       => "",
            "heading"     => __("Category", 'edo'),
            "param_name"  => "taxonomy",
            "value"       => '',
            'parent'      => '',
            'multiple'    => true,
            'hide_empty'  => false,
            'placeholder' => __('Choose categoy', 'edo'),
            "description" => __("Note: If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'edo')
        ),
        array(
           'type'        => 'dropdown',
            'heading'     => __( 'Style display', 'edo' ),
            'param_name'  => 'style',
            'admin_label' => false,
            'value'       => array(
                __( 'Style 1', 'edo' )      => '1',
                __( 'Style 2', 'edo' )      => '2',
                __( 'Style 3', 'edo' )      => '3',
            ),
        ),
        array(
            'type'        => 'textfield',
            'heading'     => __( 'Per page', 'js_composer' ),
            'value'       => 12,
            'param_name'  => 'per_page',
            'description' => __( 'The "per_page" shortcode determines how many products to show on the page', 'js_composer' ),
            'admin_label' => false,
		),
        array(
            'type'        => 'dropdown',
            'heading'     => __( 'Columns', 'js_composer' ),
            'value'       => array(
                __( '3 Colmns', 'edo' )      => '3',
                __( '4 Colmns', 'edo' )      => '4',
                __( '5 Colmns', 'edo' )      => '5',
                __( '6 Colmns', 'edo' )      => '6',
            ),
            'default'     =>'4',
            'param_name'  => 'columns',
            'description' => __( 'The columns attribute controls how many columns wide the products should be before wrapping.', 'js_composer' ),
            'admin_label' => false,
		),
        array(
            'type'        => 'dropdown',
            'heading'     => __( 'CSS Animation', 'js_composer' ),
            'param_name'  => 'css_animation',
            'admin_label' => false,
            'value'       => array(
                __( 'No', 'js_composer' )                 => '',
                __( 'Top to bottom', 'js_composer' )      => 'top-to-bottom',
                __( 'Bottom to top', 'js_composer' )      => 'bottom-to-top',
                __( 'Left to right', 'js_composer' )      => 'left-to-right',
                __( 'Right to left', 'js_composer' )      => 'right-to-left',
                __( 'Appear from center', 'js_composer' ) => "appear"
        	),
        	'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'js_composer' )
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "Extra class name", "js_composer" ),
            "param_name"  => "el_class",
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
            'admin_label' => false,
        ),
        
        // Carousel
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'std'         => 'false',
            'heading'     => __( 'AutoPlay', 'edo' ),
            'param_name'  => 'autoplay',
            'group'       => __( 'Carousel settings', 'edo' ),
            'admin_label' => false
		),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'std'         => 'false',
            'heading'     => __( 'Navigation', 'edo' ),
            'param_name'  => 'navigation',
            'description' => __( "Show buton 'next' and 'prev' buttons.", 'edo' ),
            'group'       => __( 'Carousel settings', 'edo' ),
            'admin_label' => false,
		),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'std'         => 'false',
            'heading'     => __( 'Loop', 'edo' ),
            'param_name'  => 'loop',
            'description' => __( "Inifnity loop. Duplicate last and first items to get loop illusion.", 'edo' ),
            'group'       => __( 'Carousel settings', 'edo' ),
            'admin_label' => false,
		),
        array(
            "type"        => "textfield",
            "heading"     => __("Slide Speed", 'edo'),
            "param_name"  => "slidespeed",
            "value"       => "200",
            "suffix"      => __("milliseconds", 'edo'),
            "description" => __('Slide speed in milliseconds', 'edo'),
            'group'       => __( 'Carousel settings', 'edo' ),
            'admin_label' => false,
	  	),
        array(
            "type"        => "textfield",
            "heading"     => __("Margin", 'edo'),
            "param_name"  => "margin",
            "value"       => "30",
            "suffix"      => __("px", 'edo'),
            "description" => __('Distance( or space) between 2 item', 'edo'),
            'group'       => __( 'Carousel settings', 'edo' ),
            'admin_label' => false,
	  	),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 1,
                __( 'No', 'js_composer' )  => 0
            ),
            'std'         => 1,
            'heading'     => __( 'Use Carousel Responsive', 'edo' ),
            'param_name'  => 'use_responsive',
            'description' => __( "Try changing your browser width to see what happens with Items and Navigations", 'edo' ),
            'group'       => __( 'Carousel responsive', 'edo' ),
            'admin_label' => false,
		),
        array(
            "type"        => "textfield",
            "heading"     => __("The items on destop (Screen resolution of device >= 992px )", 'edo'),
            "param_name"  => "items_destop",
            "value"       => "3",
            "suffix"      => __("item", 'edo'),
            "description" => __('The number of items on destop', 'edo'),
            'group'       => __( 'Carousel responsive', 'edo' ),
            'admin_label' => false,
	  	),
        array(
            "type"        => "textfield",
            "heading"     => __("The items on tablet (Screen resolution of device >=768px and < 992px )", 'edo'),
            "param_name"  => "items_tablet",
            "value"       => "2",
            "suffix"      => __("item", 'edo'),
            "description" => __('The number of items on destop', 'edo'),
            'group'       => __( 'Carousel responsive', 'edo' ),
            'admin_label' => false,
	  	),
        array(
            "type"        => "textfield",
            "heading"     => __("The items on mobile (Screen resolution of device < 768px)", 'edo'),
            "param_name"  => "items_mobile",
            "value"       => "1",
            "suffix"      => __("item", 'edo'),
            "description" => __('The numbers of item on destop', 'edo'),
            'group'       => __( 'Carousel responsive', 'edo' ),
            'admin_label' => false,
	  	),
        array(
            'type'           => 'css_editor',
            'heading'        => __( 'Css', 'js_composer' ),
            'param_name'     => 'css',
            // 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
            'group'          => __( 'Design options', 'js_composer' ),
            'admin_label'    => false,
		),
    ),
));