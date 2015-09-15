<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

vc_map( array(
    "name" => __( "Popular Category", 'edo'),
    "base" => "popular_category",
    "category" => __('by Edo', 'edo' ),
    "description" => __( "Display box categories same hot categories in option 1", 'edo'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __( "Title", 'edo' ),
            "param_name" => "title",
            "admin_label" => true,
            'description' => __( 'Display title box categories', 'edo' )
        ),array(
            "type" => "edo_taxonomy",
            "taxonomy" => "product_cat",
            "class" => "",
            "heading" => __("Category", 'edo'),
            "param_name" => "taxonomy",
            "value" => '',
            'parent' => 0,
            'multiple' => true,
            'placeholder' => __('Choose categoy', 'edo'),
            "description" => __("Note: If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'edo')
        ),
        array(
            "type" => "edo_number",
            "heading" => __( "Number", 'edo' ),
            "param_name" => "number",
            "value" => "5",
            "admin_label" => true,
            'description' => __( 'The `number` field is used to display the number of subcategory.', 'edo' )
        ),array(
			'type' => 'dropdown',
			'heading' => __( 'Order by', 'js_composer' ),
			'param_name' => 'orderby',
			'value' => array(
                __( 'Id', 'edo' )    => 'id',
                __( 'Count', 'edo' ) => 'count',
				__( 'Name', 'edo' )  => 'name',
				__( 'Slug', 'edo' )  => 'slug',
                __( 'Term Group ', 'edo' )  => 'term_group',
                __( 'None', 'edo' )  => 'none',
			)
		),
        array(
			'type' => 'dropdown',
			'heading' => __( 'Order Way', 'js_composer' ),
			'param_name' => 'order',
			'value' => array(
				__( 'Descending', 'js_composer' ) => 'desc',
				__( 'Ascending', 'js_composer' ) => 'asc'
			)
		),
        
        array(
			'type' => 'dropdown',
			'heading' => __( 'Hide Empty', 'js_composer' ),
			'param_name' => 'hide',
			'value' => array(
				__( 'Yes', 'js_composer' ) => '1',
				__( 'No', 'js_composer' ) => '0'
			)
		),//Carousel
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
			"type" => "edo_number",
			"heading" => __("Slide Speed", 'edo'),
			"param_name" => "slidespeed",
			"value" => "250",
            "suffix" => __("milliseconds", 'edo'),
			"description" => __('Slide speed in milliseconds', 'edo'),
            'group' => __( 'Carousel settings', 'edo' ),
            'admin_label' => false,
	  	),
        array(
			"type" => "edo_number",
			"heading" => __("Margin", 'edo'),
			"param_name" => "margin",
			"value" => "0",
            "suffix" => __("px", 'edo'),
			"description" => __('Distance( or space) between 2 item', 'edo'),
            'group' => __( 'Carousel settings', 'edo' ),
            'admin_label' => false,
	  	),
        array(
			"type" => "edo_number",
			"heading" => __("The items on destop (Screen resolution of device >= 992px )", 'edo'),
			"param_name" => "items_destop",
			"value" => "3",
            "suffix" => __("item", 'edo'),
			"description" => __('The number of items on destop', 'edo'),
            'group' => __( 'Carousel responsive', 'edo' ),
            'admin_label' => false,
	  	),
        array(
			"type" => "edo_number",
			"heading" => __("The items on tablet (Screen resolution of device >=768px and < 992px )", 'edo'),
			"param_name" => "items_tablet",
			"value" => "2",
            "suffix" => __("item", 'edo'),
			"description" => __('The number of items on destop', 'edo'),
            'group' => __( 'Carousel responsive', 'edo' ),
            'admin_label' => false,
	  	),
        array(
			"type" => "edo_number",
			"heading" => __("The items on mobile (Screen resolution of device < 768px)", 'edo'),
			"param_name" => "items_mobile",
			"value" => "1",
            "suffix" => __("item", 'edo'),
			"description" => __('The numbers of item on destop', 'edo'),
            'group' => __( 'Carousel responsive', 'edo' ),
            'admin_label' => false,
	  	),
        array(
            "type" => "textfield",
            "heading" => __( "Extra class name", 'edo' ),
            "param_name" => "el_class",
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
        ),array(
			'type' => 'css_editor',
			'heading' => __( 'Css', 'js_composer' ),
			'param_name' => 'css',
			// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
			'group' => __( 'Design options', 'js_composer' )
		),
    )
));
class WPBakeryShortCode_Popular_Category extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'popular_category', $atts ) : $atts;
                        
        $atts = shortcode_atts( array(
            'title'     => __('Popular categories', 'edo'),
            'taxonomy'  => '',
            'number'    => 5,
            'orderby'   => 'id',
            'order'     => 'desc',
            'hide'      => 1,
            
            'autoplay'     => 'false', 
            'loop'         => 'false',
            'margin'       => 0,
            'slidespeed'   => 250,
            
            'items_destop' => 3,
            'items_tablet' => 2,
            'items_mobile' => 1,
            
            'css_animation' => '',
            'el_class'      => '',
            'css'           => '',
            
        ), $atts );
        extract($atts);
        
        $elementClass = array(
        	'base' => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'block-popular-cat ', $this->settings['base'], $atts ),
        	'extra' => $this->getExtraClass( $el_class ),
        	'css_animation' => $this->getCSSAnimation( $css_animation ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        
        ob_start();
        
        if($taxonomy){
            $ids = explode( ',',$taxonomy );
        }else{
            $ids = array();
        }
        // get terms and workaround WP bug with parents/pad counts
		$args = array(
			'orderby'    => 'id',
			'order'      => 'desc',
			'hide_empty' => 0,
            'include'    => $ids,
			'pad_counts' => true,
		);
        $product_categories = get_terms( 'product_cat', $args );
        
        $arg_child = array(
			'orderby'    => $orderby,
			'order'      => $order,
			'hide_empty' => $hide,
			'pad_counts' => true,
            'number'     => $number
		);
        
        $data_carousel = array(
            "autoplay"   => $autoplay,
            "navigation" => 'false',
            "margin"     => $margin,
            "slidespeed" => $slidespeed,
            "theme"      => 'style-navigation-center',
            "autoheight" => 'false',
            'nav'        => 'true',
            'dots'       => 'false',
            'loop'       => $loop,
            'autoplayTimeout'    => 1000,
            'autoplayHoverPause' => 'true'
        );
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
        ?>
        <!-- block-popular-cat-->
		<div class="<?php echo $elementClass; ?>">
			<h3 class="title">
				<span class="text"><?php echo $title; ?></span>
			</h3>
			<div class="popular-inner">
				<div class="list-popular-cat kt-owl-carousel" <?php echo _data_carousel($data_carousel); ?>>
					<?php 
                    if( $product_categories ):
                        foreach($product_categories as $term): 
                        
                        $arg_child['parent'] = $term->term_id;
                        
                        $term_link = esc_attr(get_term_link( $term ) );
                        
                        $thumbnail_id = absint( get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true ) );
                        
                        if ( $thumbnail_id ) {
                        	$image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
                            if( is_array($image) && isset($image[0]) && $image[0] ){
                                $image = $image[0];
                            }else{
                                $image = wc_placeholder_img_src();
                            }
                        } else {
                        	$image = wc_placeholder_img_src();
                        }
                        $children = get_terms( 'product_cat', $arg_child );
                    ?>
                    <div class="item">
						<div class="image">
							<img src="<?php echo esc_attr($image) ?>" alt="<?php echo esc_attr($term->name) ?>" />
						</div>
						<div class="inner">
							<h5 class="parent-categories"><?php echo esc_attr($term->name) ?></h5>
                            <?php if( count( $children ) >0 ): ?>
    							<ul class="sub-categories">
    								<?php foreach($children as $child): ?>
                                        <?php $chil_link = esc_attr(get_term_link( $child ) ); ?>
                                        <li>
                                            <a href="<?php echo esc_attr($chil_link) ?>"><?php echo $child->name ?></a>
                                        </li>
                                    <?php endforeach; ?>
    							</ul>
                            <?php endif; ?>
						</div>
					</div>
                    <?php endforeach; ?>
                    <?php endif; ?>               
				</div>
			</div>
		</div>
		<!-- ./block-popular-cat-->
        <?php
        $result = ob_get_clean();
        return $result;
    }
}