<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

vc_map( array(
    "name" => __( "Top seller", 'edo'),
    "base" => "top_seller",
     "category" => __('by Edo', 'edo' ),
    "description" => __( "Display list product by id input in setting shortcode", 'edo'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __( "Title", 'edo' ),
            "param_name" => "title",
            "admin_label" => true,
            'description' => __( 'Display title list product', 'edo' )
        ),
        array(
    		'type' => 'attach_image',
    		'heading' => __( 'Icon', 'edo' ),
    		'param_name' => 'icon',
            'description' => __( 'Setup icon for the tab', 'edo' )
    	),
        array(
            "type" => "edo_taxonomy",
            "taxonomy" => "product_cat",
            "class" => "",
            "heading" => __("Category", 'edo'),
            "param_name" => "taxonomy",
            "value" => '',
            'parent' => 0,
            'multiple' => false,
            'placeholder' => __('Choose categoy', 'edo'),
            "description" => __("Note: If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'edo')
        ),
        array(
			"type" => "edo_number",
			"heading" => __("Per page", 'edo'),
			"param_name" => "per_page",
			"value" => "4",
            "suffix" => __("item", 'edo'),
			"description" => __('The total number of pages.', 'edo'),
            'admin_label' => false,
	  	),
        // Carousel
        array(
			'type' => 'checkbox',
			'heading' => __( 'AutoPlay', 'edo' ),
			'param_name' => 'autoplay',
			'value' => array( __( 'Yes, please', 'edo' ) => 'true' ),
            'group' => __( 'Carousel settings', 'edo' ),
            'admin_label' => false,
		),
        array(
			'type' => 'checkbox',
            'heading' => __( 'Navigation', 'edo' ),
			'param_name' => 'navigation',
			'value' => array( __( "Don't use Navigation", 'edo' ) => 'false' ),
            'description' => __( "Don't display 'next' and 'prev' buttons.", 'edo' ),
            'group' => __( 'Carousel settings', 'edo' ),
            'admin_label' => false,
		),
        array(
			'type' => 'checkbox',
            'heading' => __( 'Loop', 'edo' ),
			'param_name' => 'loop',
			'value' => array( __( "Loop", 'edo' ) => 'true' ),
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
class WPBakeryShortCode_Top_Seller extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'top_seller', $atts ) : $atts;
                        
        $atts = shortcode_atts( array(
            'title'     => __('Top Sellers', 'edo'),
            'icon'      => '',
            'per_page'  => 4,
            'taxonomy'  => '',
            
            //Carousel            
            'autoplay'   => 'false', 
            'navigation' => 'false',
            'margin'     => 30,
            'slidespeed' => 250,
            'nav'        => 'true',
            'loop'       => 'true',
            
            'css_animation' => '',
            'el_class'      => '',
            'css'           => '',
            
        ), $atts );
        extract($atts);
        
        ob_start();
        $elementClass = array(
        	'base' => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'block block-top-sellers ', $this->settings['base'], $atts ),
        	'extra' => $this->getExtraClass( $el_class ),
        	'css_animation' => $this->getCSSAnimation( $css_animation ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        
        $meta_query = WC()->query->get_meta_query();
        
        $args = array(
			'post_type'				=> 'product',
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page' 		=> $per_page,
			'meta_query' 			=> $meta_query,
            'suppress_filter'       => true,
            'meta_key' => 'total_sales',
            'orderby'  => 'meta_value_num'
		);
        if( $taxonomy ){
            $args['tax_query'] = array(
                array(
        			'taxonomy' => 'product_cat',
        			'field' => 'id',
        			'terms' => explode( ",", $taxonomy )
        		)
            );
        }
        $products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );
        
        if( $products->have_posts() ): 
        
        $new_title = $title;
        $new_title = explode( ',', $new_title );
        
        if( count($new_title) > 1 ){
            $title_sm = $new_title[0];
            unset( $new_title[0] );
            $title_lg = implode( ' ', $new_title );
        }else{
            $title_sm = __( 'Top', 'edo' );
            $title_lg = __( 'sellers', 'edo' );
        }
        
        $default_icon = KUTETHEME_PLUGIN_URL . 'js_composer/imgs/top-seller-icon.png';
        
        if( isset( $icon ) && $icon ){
            $att_icon = wp_get_attachment_image_src( $icon, array( 43, 42 ) );  
            $att_icon_url =  is_array($att_icon) ? esc_url($att_icon[0]) : $default_icon; 
        }else{
            $att_icon_url = $default_icon;
        }
        
        $data_carousel = array(
            "autoplay" => $autoplay,
            "navigation" => $navigation,
            "margin"    => $margin,
            "slidespeed" => $slidespeed,
            "theme" => 'style-navigation-top',
            "autoheight" => 'false',
            'nav' => 'true',
            'dots' => 'false',
            'loop' => $loop,
            'autoplayTimeout' => 1000,
            'autoplayHoverPause' => 'true',
            'items' => '1'
        );
        ?>
        <!-- block  top sellers -->
		<div class="<?php echo $elementClass ?>">
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
				<?php do_action( "woocommerce_shortcode_before_top_seller_loop" ); ?>
					<ul class="products kt-owl-carousel" <?php echo _data_carousel( $data_carousel ); ?>>
                        <?php while( $products->have_posts() ): 
                            $products->the_post(); $id = get_the_ID(); $link = get_permalink( $id ); ?>
                            <?php edo_woocommerce_product_loop_item_before(); ?>
    							<?php wc_get_template_part( 'content', 'list-product' ); ?>
                            <?php edo_woocommerce_product_loop_item_after(); ?>
						<?php endwhile; ?>
					</ul>
                <?php do_action( "woocommerce_shortcode_after_top_seller_loop" ); ?>
			</div>
		</div>
		<!-- block  top sellers -->
        <?php
        endif;
        $result = ob_get_clean();
        return $result;
    }
}