<?php
// Exit if accessed directly
if ( ! defined('ABSPATH')) exit;

vc_map( array(
    "name" => __( "Box Products", 'edo'),
    "base" => "box_products",
    "category" => __('by Edo', 'edo' ),
    "description" => __( "Show list product in box hot deal, best selling,...", 'edo'),
    "params" => array(
        array(
            "type"        => "textfield",
            "heading"     => __( "Title", 'edo' ),
            "param_name"  => "title",
            "admin_label" => true,
        ),
        array(
            "type"        => "dropdown",
        	"heading"     => __("Box Type", 'edo'),
        	"param_name"  => "box_type",
            "admin_label" => true,
            'std'         => 'box-1',
            'value'       => array(
        		__( 'Box 1', 'edo' ) => 'box-1',
                __( 'Box 2', 'edo' ) => 'box-2'
        	),
        ),
        array(
            "type"        => "dropdown",
        	"heading"     => __("Type", 'edo'),
        	"param_name"  => "type",
            "admin_label" => true,
            'std'         => 'hot-deals',
            'value'       => array(
        		__( 'Hot Deals', 'edo' ) => 'hot-deals',
                __( 'Best selling', 'edo' ) => 'best-selling',
                __( 'New Arrivals', 'edo' ) => 'recent-product'
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
            "type" => "dropdown",
        	"heading" => __("Order by", 'edo'),
        	"param_name" => "orderby",
        	"value" => array(
        		__('None', 'edo')     => 'none',
                __('ID', 'edo')       => 'ID',
                __('Author', 'edo')   => 'author',
                __('Name', 'edo')     => 'name',
                __('Date', 'edo')     => 'date',
                __('Modified', 'edo') => 'modified',
                __('Rand', 'edo')     => 'rand',
        	),
            'std' => 'date',
        	"description" => __("Select how to sort retrieved posts.",'edo'),
            "dependency"  => array( "element" => "type", "value" => array( 'hot-deals' ) ),
        ),
        array(
            "type" => "dropdown",
        	"heading" => __("Order way", 'edo'),
        	"param_name" => "order",
        	"value" => array(
                __('ASC', 'edo') => 'ASC',
                __('DESC', 'edo') => 'DESC'
        	),
            'std' => 'DESC',
        	"description" => __("Designates the ascending or descending order.",'edo'),
            "dependency"  => array( "element" => "type", "value" => array( 'hot-deals' ) ),
        ),
        array(
    		'type'        => 'attach_images',
    		'heading'     => __( 'Icon', 'edo' ),
    		'param_name'  => 'icon',
            'description' => __( 'Setup icon for the box', 'edo' )
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
			'type'        => 'dropdown',
            'heading'     => __( 'Navigation', 'edo' ),
			'param_name'  => 'navigation',
			'value' => array(
				__( 'Yes', 'js_composer' ) => 'true',
				__( 'No', 'js_composer' )  => 'false'
			),
            'description' => __( "Don't display 'next' and 'prev' buttons.", 'edo' ),
            'group'       => __( 'Carousel settings', 'edo' ),
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
			'type'        => 'dropdown',
            'heading'     => __( 'Use Carousel Responsive', 'edo' ),
			'param_name'  => 'use_responsive',
			'value' => array(
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
			// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
			'group'       => __( 'Design options', 'js_composer' ),
            'admin_label' => false,
		),
        
    )
));

class WPBakeryShortCode_Box_Products extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'box_products', $atts ) : $atts;
        extract( shortcode_atts( array(
            'title'      => __( 'hot deals', 'edo' ),
            'icon'       => '',
            'per_page'   => 5,
            'box_type'   => 'box-1',
            'type'       => 'hot-deals',
            'taxonomy'   => 0,
            'orderby'      => 'date',
            'order'        => 'DESC',
            
            //Carousel            
            'autoplay'   => 'false', 
            'navigation' => 'false',
            'margin'     => 20,
            'slidespeed' => 250,
            'nav'        => 'true',
            'loop'       => 'true',
            //Default
            'use_responsive' => 1,
            'items_destop'   => 5,
            'items_tablet'   => 3,
            'items_mobile'   => 1,
            
            'css' => '',
            'css_animation' => '',
            'el_class' => '',
        ), $atts ) );
        
         global $woocommerce_loop;
        
        $elementClass = array(
        	'base' => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' box-tab-category ', $this->settings['base'], $atts ),
        	'extra' => $this->getExtraClass( $el_class ),
        	'css_animation' => $this->getCSSAnimation( $css_animation ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        
        ob_start();
        
        $meta_query = WC()->query->get_meta_query();
        
        $args = array(
			'post_type'			  => 'product',
			'post_status'		  => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page' 	  => $per_page,
            'suppress_filter'     => true,
			'meta_query'          => $meta_query
		);
        
        
        if( $type == 'hot-deals' ){
            $product_ids_on_sale = wc_get_product_ids_on_sale();
            
            $args['post__in'] = array_merge( array( 0 ), $product_ids_on_sale );
            $args['orderby']  = $orderby;
            $args['order'] 	  = $order;
        }elseif( $type == 'best-selling' ){
            $newargs['meta_key'] = 'total_sales';
            $newargs['orderby']  = 'meta_value_num';
        }elseif( $type == 'recent-product' ){
            $args['orderby'] = $orderby;
            $args['order'] 	 = $order;
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
        
        if( $products->have_posts() ): 
            $new_title = $title;
            $new_title = explode( ',', $new_title );
            
            if( count($new_title) > 1 ){
                $title_sm = $new_title[0];
                unset( $new_title[0] );
                $title_lg = implode( ' ', $new_title );
            }else{
                $title_sm = __('box', 'edo');
                $title_lg = __('title', 'edo');
            }
            
            $default_icon = KUTETHEME_PLUGIN_URL . 'js_composer/imgs/offers-icon.png';
            
            if( isset( $icon ) && $icon ){
                $att_icon = wp_get_attachment_image_src( $icon, array( 37, 43 ) );  
                $att_icon_url =  is_array($att_icon) ? esc_url($att_icon[0]) : $default_icon; 
            }else{
                $att_icon_url = $default_icon;
            }
            
            $data_carousel = array(
                "autoplay"    => $autoplay,
                "navigation"  => $navigation,
                "margin"      => $margin,
                "slidespeed"  => $slidespeed,
                "theme"       => 'style-navigation-top',
                "autoheight"  => 'false',
                'nav'         => 'true',
                'dots'        => 'false',
                'loop'        => $loop,
                'autoplayTimeout' => 1000,
                'autoplayHoverPause' => 'true'
            );
            
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
                $data_carousel['items'] =  5;
            }
            $unique_id = uniqid();
            if( $box_type == 'box-1' ){
                ?>
                <!-- block  host deals -->
                <div class="block block-hot-deals">
                	<div class="block-head">
                		<div class="block-title">
                			<div class="block-icon">
                				<img alt="<?php  echo $title;  ?>" title="<?php echo $title; ?>" src="<?php echo $att_icon_url; ?>" />
                			</div>
                			<div class="block-title-text text-sm"><?php echo $title_sm; ?></div>
                			<div class="block-title-text text-lg"><?php echo $title_lg; ?></div>
                		</div>
                		<div class="block-countdownt">
                			<span class="countdown-lastest" data-y="2016" data-m="10" data-d="1" data-h="00" data-i="00" data-s="00"></span>
                		</div>
                	</div>
                	<div class="block-inner box-type-1">
                        <?php do_action( "woocommerce_shortcode_before_box_product_loop" ); ?>
                    		<ul class="products kt-owl-carousel" <?php echo _data_carousel($data_carousel); ?>>
                                <?php while( $products->have_posts() ): $products->the_post(); ?>
                                    <?php edo_woocommerce_product_loop_item_before(); ?>
                    					<?php 
                                            wc_get_template_part( 'content', 'list-product' );
                                        ?>
                                    <?php edo_woocommerce_product_loop_item_after(); ?>
                    			<?php endwhile; ?>
                    		</ul>
                            <?php 
                                wp_reset_query();
                                wp_reset_postdata(); 
                            ?>
                        <?php do_action( "woocommerce_shortcode_after_box_product_loop" ); ?>
                	</div>
                </div>
                <!-- ./block hot deals -->
                <?php
            }elseif ( $box_type == 'box-2' ){
                $cate_obj = array();
                $carousel = _data_carousel($data_carousel);
                ?>
                <!-- block tabs -->
				<div class="block block-tabs">
					<div class="block-head">
						<div class="block-title">
							<div class="block-title-text text-lg"><?php echo $title; ?></div>
						</div>
						<ul class="nav-tab">                                   
	                        <li class="active"><a data-toggle="tab" href="#tab-all-<?php echo $unique_id ?>"><?php _e( 'All', 'edo' ) ?></a></li>
	                        <?php if( count( $cate_ids ) ): ?>
                                <?php foreach( $cate_ids as $id ):  ?>
                                    <?php $term = get_term( $id, 'product_cat' ); $cate_obj[] = $term;  ?>
                                    <li><a data-toggle="tab" href="#tab-<?php echo $term->term_id . '-' . $unique_id ?>"><?php echo $term->name  ?></a></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                      	</ul>
					</div>
					<div class="block-inner">
						<div class="tab-container">
							<div id="tab-all-<?php echo $unique_id ?>" class="tab-panel active">
								<?php do_action( "woocommerce_shortcode_before_box_product_loop" ); ?>
                                    <ul class="products kt-owl-carousel" <?php echo $carousel; ?>>
    									<?php while( $products->have_posts() ): $products->the_post(); ?>
                                            <?php edo_woocommerce_product_loop_item_before(); ?>
                            					<?php wc_get_template_part( 'content', 'list-product' ); ?>
                                            <?php edo_woocommerce_product_loop_item_after(); ?>
                            			<?php endwhile; ?>
                                        <?php 
                                            wp_reset_query();
                                            wp_reset_postdata(); 
                                        ?>
    								</ul>
                                <?php do_action( "woocommerce_shortcode_after_box_product_loop" ); ?>
							</div>
                            <?php if( count( $cate_obj ) > 0 ): ?>
                                <?php foreach( $cate_obj as  $term ): 
                                    $args['tax_query'] = array(
                                        array(
                                			'taxonomy' => 'product_cat',
                                			'field' => 'id',
                                			'terms' => $term->term_id
                                		)
                                    );
                                    $term_products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );
                                    if( $term_products->have_posts() ):
                                    ?>
        							<div id="tab-<?php echo $term->term_id . '-' . $unique_id ?>" class="tab-panel">
        								<?php do_action( "woocommerce_shortcode_before_box_product_loop" ); ?>
                                            <ul class="products kt-owl-carousel" <?php echo $carousel; ?>>
            									<?php while( $term_products->have_posts() ): $term_products->the_post(); ?>
                                                    <?php edo_woocommerce_product_loop_item_before(); ?>
                                    					<?php wc_get_template_part( 'content', 'list-product' );?>
                                                    <?php edo_woocommerce_product_loop_item_after(); ?>
                                    			<?php endwhile; ?>
            								</ul>
                                        <?php do_action( "woocommerce_shortcode_after_box_product_loop" ); ?>
        							</div>
                                    <?php endif; ?>
                                    <?php 
                                        wp_reset_query();
                                        wp_reset_postdata();
                                     ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
						</div>
					</div>
				</div>
				<!-- ./block tabs -->
                <?php
            }
        endif;
        return ob_get_clean();
    }
    /**
     * order_by_rating_post_clauses function.
     *
     * @access public
     * @param array $args
     * @return array
     */
    public function order_by_rating_post_clauses( $args ) {
    	global $wpdb;
    
    	$args['fields'] .= ", AVG( $wpdb->commentmeta.meta_value ) as average_rating ";
    
    	$args['where'] .= " AND ( $wpdb->commentmeta.meta_key = 'rating' OR $wpdb->commentmeta.meta_key IS null ) ";
    
    	$args['join'] .= "
    		LEFT OUTER JOIN $wpdb->comments ON($wpdb->posts.ID = $wpdb->comments.comment_post_ID)
    		LEFT JOIN $wpdb->commentmeta ON($wpdb->comments.comment_ID = $wpdb->commentmeta.comment_id)
    	";
    
    	$args['orderby'] = "average_rating DESC, $wpdb->posts.post_date DESC";
    
    	$args['groupby'] = "$wpdb->posts.ID";
    
    	return $args;
    }
}