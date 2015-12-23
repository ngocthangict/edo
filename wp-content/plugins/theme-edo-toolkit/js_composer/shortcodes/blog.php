<?php
/**
 * @author  AngelsIT
 * @package KUTE TOOLKIT
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

vc_map( array(
     "name"        => __( "Edo Blogs", 'kutetheme'),
     "base"        => "blog_carousel",
     "category"    => __('by Edo', 'kutetheme' ),
     "description" => __( "Display blog by carousel", 'kutetheme'),
     "params"      => array(
        array(
            "type"        => "textfield",
            "heading"     => __( "Title", 'kutetheme' ),
            "param_name"  => "title",
            "admin_label" => true,
        ),
        array(
            "type"       => "dropdown",
            "heading"    => __("Display Style", 'kutetheme'),
            "param_name" => "style",
            "value"      => array(
                __('Style 1', 'kutetheme') => '1',
                __('Style 2', 'kutetheme') => '2'
        	),
            'std'         => '1',
            "description" => __("Show blog carousel by difference style.",'kutetheme')
        ),
        array(
            'type'  => 'textfield',
            'heading'     => __( 'Subtitle', 'kutetheme' ),
            'param_name'  => 'subtitle',
            'admin_label' => false,
            "dependency"  => array("element" => "style","value" => array('style-4','style-5')),
		),
        array(
            "type"        => "textfield",
            "heading"     => __( "Number Post", 'kutetheme' ),
            "param_name"  => "per_page",
            'std'         => 10,
            "admin_label" => false,
            'description' => __( 'Number post in a slide', 'kutetheme' )
        ),
        array(
            "type"       => "dropdown",
            "heading"    => __("Order by", 'kutetheme'),
            "param_name" => "orderby",
            "value"      => array(
        		__('None', 'kutetheme')     => 'none',
                __('ID', 'kutetheme')       => 'ID',
                __('Author', 'kutetheme')   => 'author',
                __('Name', 'kutetheme')     => 'name',
                __('Date', 'kutetheme')     => 'date',
                __('Modified', 'kutetheme') => 'modified',
                __('Rand', 'kutetheme')     => 'rand',
        	),
            'std'         => 'date',
            "description" => __("Select how to sort retrieved posts.",'kutetheme'),
        ),
        array(
            "type"       => "dropdown",
            "heading"    => __("Order", 'kutetheme'),
            "param_name" => "order",
            "value"      => array(
                __('ASC', 'kutetheme') => 'ASC',
                __('DESC', 'kutetheme') => 'DESC'
        	),
            'std'         => 'DESC',
            "description" => __("Designates the ascending or descending order.",'kutetheme')
        ),
        array(
            "type"        => "colorpicker",
            "heading"     => __("Color 1", 'edo'),
            "param_name"  => "color1",
            "admin_label" => false,
            'value'     =>'#f2d03b',
            "dependency"  => array( 
                "element" => "style", 
                "value" => array( 
                    '2' 
                ) 
            ),
        ),
        array(
            "type"        => "colorpicker",
            "heading"     => __("Color 2", 'edo'),
            "param_name"  => "color2",
            "admin_label" => false,
            'value'     =>'#666666',
            "dependency"  => array( 
                "element" => "style", 
                "value" => array( 
                    '2' 
                ) 
            ),
        ),
        array(
            "type"        => "colorpicker",
            "heading"     => __("Color 3", 'edo'),
            "param_name"  => "color3",
            "admin_label" => false,
            'value'     =>'#f25f43',
            "dependency"  => array( 
                "element" => "style", 
                "value" => array( 
                    '2' 
                ) 
            ),
        ),
        // Carousel
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'std'         => 'false',
            'heading'     => __( 'AutoPlay', 'kutetheme' ),
            'param_name'  => 'autoplay',
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false
		),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'std'         => 'false',
            'heading'     => __( 'Navigation', 'kutetheme' ),
            'param_name'  => 'navigation',
            'description' => __( "Show buton 'next' and 'prev' buttons.", 'kutetheme' ),
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false,
		),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'std'         => 'false',
            'heading'     => __( 'Loop', 'kutetheme' ),
            'param_name'  => 'loop',
            'description' => __( "Inifnity loop. Duplicate last and first items to get loop illusion.", 'kutetheme' ),
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false,
		),
        array(
            "type"        => "textfield",
            "heading"     => __("Slide Speed", 'kutetheme'),
            "param_name"  => "slidespeed",
            "value"       => "250",
            "suffix"      => __("milliseconds", 'kutetheme'),
            "description" => __('Slide speed in milliseconds', 'kutetheme'),
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false,
	  	),
        array(
            "type"        => "textfield",
            "heading"     => __("Margin", 'kutetheme'),
            "param_name"  => "margin",
            "value"       => "0",
            "suffix"      => __("px", 'kutetheme'),
            "description" => __('Distance( or space) between 2 item', 'kutetheme'),
            'group'       => __( 'Carousel settings', 'kutetheme' ),
            'admin_label' => false,
	  	),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 1,
                __( 'No', 'js_composer' )  => 0
            ),
            'std'         => 1,
            'heading'     => __( 'Use Carousel Responsive', 'kutetheme' ),
            'param_name'  => 'use_responsive',
            'description' => __( "Try changing your browser width to see what happens with Items and Navigations", 'kutetheme' ),
            'group'       => __( 'Carousel responsive', 'kutetheme' ),
            'admin_label' => false,
		),
        array(
            "type"        => "textfield",
            "heading"     => __("The items on destop (Screen resolution of device >= 992px )", 'kutetheme'),
            "param_name"  => "items_destop",
            "value"       => "4",
            "suffix"      => __("item", 'kutetheme'),
            "description" => __('The number of items on destop', 'kutetheme'),
            'group'       => __( 'Carousel responsive', 'kutetheme' ),
            'admin_label' => false,
	  	),
        array(
            "type"        => "textfield",
            "heading"     => __("The items on tablet (Screen resolution of device >=768px and < 992px )", 'kutetheme'),
            "param_name"  => "items_tablet",
            "value"       => "2",
            "suffix"      => __("item", 'kutetheme'),
            "description" => __('The number of items on destop', 'kutetheme'),
            'group'       => __( 'Carousel responsive', 'kutetheme' ),
            'admin_label' => false,
	  	),
        array(
            "type"        => "textfield",
            "heading"     => __("The items on mobile (Screen resolution of device < 768px)", 'kutetheme'),
            "param_name"  => "items_mobile",
            "value"       => "1",
            "suffix"      => __("item", 'kutetheme'),
            "description" => __('The numbers of item on destop', 'kutetheme'),
            'group'       => __( 'Carousel responsive', 'kutetheme' ),
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
        
    )
));

class WPBakeryShortCode_Blog_Carousel extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'blog_carousel', $atts ) : $atts;
        extract( shortcode_atts( array(
            'title'          => __( 'From the blog', 'kutetheme' ),
            'subtitle'       => '',
            'per_page'       => 10,
            'orderby'        => 'date',
            'order'          => 'desc',
            'color3'         => '#f25f43',
            'color2'         => '#666666',
            'color1'         => '#f25f43',
            
            'style'          => '1',
            //Carousel            
            'autoplay'       => 'false', 
            'navigation'     => 'false',
            'margin'         => 30,
            'slidespeed'     => 250,
            'css'            => '',
            'css_animation'  => '',
            'el_class'       => '',
            'loop'           => 'true',
            //Default
            'use_responsive' => 1,
            'items_destop'   => 4,
            'items_tablet'   => 2,
            'items_mobile'   => 1,
        ), $atts ) );
        
         global $woocommerce_loop;
        
        $elementClass = array(
            'base'             => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' style'.$style.' ', $this->settings['base'], $atts ),
            'extra'            => $this->getExtraClass( $el_class ),
            'css_animation'    => $this->getCSSAnimation( $css_animation ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        
        $data_carousel = array(
            "autoplay"           => $autoplay,
            "nav"                => $navigation,
            "margin"             => $margin,
            "slidespeed"         => $slidespeed,
            "theme"              => 'style-navigation-bottom',
            "autoheight"         => 'false',
            'dots'               => 'false',
            'loop'               => $loop,
            'autoplayTimeout'    => 1000,
            'autoplayHoverPause' => 'true'
        );
        
        if( $use_responsive ){
            $arr = array( 
                '0'   => array( 
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
            $data_carousel['items'] = 4;
        }
        $args = array(
			'post_type'				=> 'post',
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page' 		=> $per_page,
            'suppress_filter'       => true,
            'orderby'               => $orderby,
            'order'                 => $order
		);
        $posts = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );
        
        ob_start();
        if( $posts->have_posts() ):
        $i = 0;
        ?>
        <?php if( $style == 1 || $style == 2):?>
        <div class="lasttest-blogs <?php echo esc_attr( $elementClass );?>">
            <?php if( $title ):?>
            <div class="head"><?php echo esc_html( $title );?></div>
            <?php endif;?>
            <div class="box-content">
                <ul class="list  kt-owl-carousel nav-style2" <?php echo _data_carousel($data_carousel);?>>
                    <?php while( $posts->have_posts() ): $posts->the_post(); 
                    $i++;
                    $item_color ="#666";

                    if( $i == 1 ) $item_color = $color1; 
                    if( $i == 2 ) $item_color = $color2;
                    if( $i == 3 ){
                        $item_color = $color3;
                        $i = 0;
                    }
                    ?>
                    <li style="background-color: <?php echo esc_attr($item_color); ?>;" <?php post_class('item-blog'); ?>>
                        <?php if( has_post_thumbnail( )):?>
                        <div class="thumb">
                            <a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'edo_blog_lasttest' );?></a>
                        </div>
                        <?php endif;?>
                        <div class="info" style="background-color: <?php echo esc_attr($item_color); ?>;">
                            <h3 class="title"><a href="<?php the_permalink();?>"><?php the_title( );?></a></h3>
                            <div class="meta">
                                <span class="author"><i class="fa fa-user"></i> <?php the_author();?></span>
                                <span class="comment">
                                <i class="fa fa-comment"></i> 
                                <?php comments_number(
                                    __('0 Comment', 'kutetheme'),
                                    __('1 Comment', 'kutetheme'),
                                    __('% Comments', 'kutetheme')
                                ); ?>
                                </span>
                            </div>
                            <div class="desc">
                                <?php the_excerpt();?>
                            </div>
                            <a href="<?php the_permalink();?>" class="readmore"><?php _e('Readmore','edo');?></a>
                        </div>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
        <?php endif;?>
        <?php
        endif;
        wp_reset_query();
        wp_reset_postdata();
        $result = ob_get_clean();
        return $result;
    }
}