<?php
// Exit if accessed directly
if ( ! defined('ABSPATH')) exit;

vc_map( array(
    "name" => __( "Product Sidebar", 'edo'),
    "base" => "product_sidebar",
    "category" => __('by Edo', 'edo' ),
    "description" => __( "Show list product in sidebar hot deal, best selling,...", 'edo'),
    "params" => array(
        array(
            "type"        => "textfield",
            "heading"     => __( "Title", 'edo' ),
            "param_name"  => "title",
            "admin_label" => true,
        ),
        array(
            "type"        => "dropdown",
        	"heading"     => __("Template", 'edo'),
        	"param_name"  => "template",
            "admin_label" => true,
            'std'         => 'template-1',
            'value'       => array(
        		__( 'Tempalte 1', 'edo' ) => 'template-1',
                __( 'Tempalte 2', 'edo' ) => 'template-2',
                __( 'Tempalte 3', 'edo' ) => 'template-3'
        	),
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
            "type" => "dropdown",
        	"heading" => __("Order by", 'edo'),
        	"param_name" => "orderby",
        	"value" => array(
        		__( 'None', 'edo' )     => 'none',
                __( 'ID', 'edo' )       => 'ID',
                __( 'Author', 'edo' )   => 'author',
                __( 'Name', 'edo' )     => 'name',
                __( 'Date', 'edo' )     => 'date',
                __( 'Modified', 'edo' ) => 'modified',
                __( 'Rand', 'edo' )     => 'rand',
                __( 'Discount', 'edo' ) => 'discount'
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
				__( 'No', 'js_composer' )  => 'false',
				__( 'Yes', 'js_composer' ) => 'true',
			),
            'std'         => 'false',
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

class WPBakeryShortCode_Product_Sidebar extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'product_sidebar', $atts ) : $atts;
        extract( shortcode_atts( array(
            'title'       => '',
            
            'per_page'    => 5,
            'template'    => 'template-1',
            'type'        => 'hot-deals',
            'taxonomy'    => 0,
            'orderby'     => 'date',
            'order'       => 'DESC',
            
            
            //Carousel            
            'autoplay'    => 'false', 
            'navigation'  => 'false',
            'slidespeed'  => 250,
            'nav'         => 'true',
            'loop'        => 'true',
            
            'css'         => '',
            'css_animation' => '',
            'el_class'    => '',
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
            if( $orderby == 'discount' ){
                $newargs['meta_key'] = '_reduction_percent';
                $newargs['orderby']  = 'meta_value_num';
            }else{
                $args['orderby']  = $orderby;
            }
            $args['order'] 	 = $order;
        }elseif( $type == 'best-selling' ){
            $newargs['meta_key'] = 'total_sales';
            $newargs['orderby']  = 'meta_value_num';
        }elseif( $type == 'recent-product' ){
            $args['orderby'] = $orderby;
            $args['order'] 	 = $order;
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
        
        if( $products->have_posts() ): 
        
            $data_carousel = array(
                "autoplay"    => $autoplay,
                "navigation"  => $navigation,
                "slidespeed"  => $slidespeed,
                "theme"       => 'style-navigation-top',
                "autoheight"  => 'false',
                'nav'         => 'true',
                'dots'        => 'false',
                'loop'        => $loop,
                'autoplayTimeout' => 1000,
                'autoplayHoverPause' => 'true',
                'items'       => 1
            );
            
            $unique_id = uniqid();
            $carousel = _data_carousel($data_carousel);
            
            if( $template == 'template-1' ){
                ?>
                <div class="option3">
                    <!-- specail -->
    				<div class="block block-specail3 template-1">
    					<div class="block-head">
    						<h4 class="widget-title"><?php echo $title; ?></h4>
    					</div>
    					<div class="block-inner">
    						<?php do_action( "woocommerce_shortcode_before_box_product_loop" ); ?>
                        		<?php $this->edo_loop_product( $products, $carousel, 'list-product-sidebar-1' ) ?>
                            <?php do_action( "woocommerce_shortcode_after_box_product_loop" ); ?>
    					</div>
    				</div>
    				<!-- ./specail -->
                </div>
                <?php
            }elseif( $template == 'template-2' ){
                ?>
                <div class="option3">
                    <!-- carousel-slide -->
                    <div class="block carousel-slide template-2">
                    	<div class="block-head">
                    		<h4 class="widget-title"><?php echo $title; ?></h4>
                    	</div>
                    	<div class="block-inner">
                            <?php do_action( "woocommerce_shortcode_before_box_product_loop" ); ?>
                        		<?php $this->edo_loop_product( $products, $carousel, 'list-product-sidebar-2' ) ?>
                            <?php do_action( "woocommerce_shortcode_after_box_product_loop" ); ?>
                    	</div>
                    </div>
                    <!-- ./carousel-slide -->
                </div>
                <?php
            }elseif( $template == 'template-3' ){
                $i = $j = 1;
                ?>
                <div class="option3">
                    <!-- Top review -->
    				<div class="block block-top-review template-3">
    					<div class="block-head">
    						<h4 class="widget-title"><?php echo $title; ?></h4>
    					</div>
    					<div class="block-inner">
    						<div class="kt-owl-carousel" <?php echo $carousel; ?>>
    							<?php while( $products->have_posts() ): $products->the_post(); ?>
                                    <?php if( $i == 1 ): ?>
                                        <ul class="list-product">
                                    <?php endif; ?>
                                        <li class="product <?php echo ( $i == 1 ) ? 'active' : ''; ?>">
                                            <div class="product-name">
                                                <a class="product-name" href="<?php the_permalink(); ?>"><span class="order"><?php echo esc_attr( $j ) ; ?></span><?php the_title(); ?></a>
                                            </div>
                                            <?php wc_get_template_part( 'content', 'list-product-sidebar-3' ); ?>
                                        </li>
                                     <?php  $i++; $j ++; ?>
                                     <?php if( $i == 6 ): $i = 1; ?>
    	      						   </ul>
                                     <?php endif; ?>
                                <?php endwhile; ?>
                                <?php 
                                if( $i != 1 ){
                                    echo '</ul>';
                                }
                                wp_reset_query();
                                wp_reset_postdata(); 
                                ?>
    						</div>
    					</div>
    				</div>
    				<!-- ./Top review -->
                </div>
                <?php
            }
        if( $type == 'most-review' ){
            remove_filter( 'posts_clauses', array( $this, 'order_by_rating_post_clauses' ) );
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
    /**
     * Loop product
     * @since edo 1.0
     */
     public function edo_loop_product( $products, $data_carousel= '', $content = 'list-product-sidebar-1'){
        ?>
        <ul class="products kt-owl-carousel" <?php echo $data_carousel; ?>>
            <?php while( $products->have_posts() ): $products->the_post(); ?>
                <?php edo_woocommerce_product_loop_item_before(); ?>
					<?php 
                        wc_get_template_part( 'content', $content );
                    ?>
                <?php edo_woocommerce_product_loop_item_after(); ?>
			<?php endwhile; ?>
		</ul>
        <?php
        wp_reset_query();
        wp_reset_postdata(); 
     }
}