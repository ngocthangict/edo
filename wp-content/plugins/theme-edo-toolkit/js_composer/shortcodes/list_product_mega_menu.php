<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;


vc_map( array(
    "name" => __( "List Products in Megamenu", 'edo'),
    "base" => "list_product_megamenu",
    "category" => __('by Edo', 'edo' ),
    "description" => __( 'Show product in tab best sellers, on sales, new products on option 1', 'edo' ),
    "params" => array(
        array(
			'type' => 'textfield',
			'heading' => __( 'Title', 'edo' ),
			'value' => __( 'Special Products', 'edo' ),
			'param_name' => 'title',
			'description' => __( 'The "per_page" shortcode determines how many products to show on the page', 'edo' ),
            'admin_label' => false,
		),
        array(
            "type"        => "edo_taxonomy",
            "taxonomy"    => "product_cat",
            "class"       => "",
            "heading"     => __("Category", 'edo'),
            "param_name"  => "cat",
            "value"       => '',
            'parent'      => false,
            'multiple'    => true,
            'placeholder' => __('Choose categoy', 'edo'),
            "description" => __("Note: Selected categories will be hide if it empty. Only selected categories will be displayed.", 'edo')
        ),
        array(
        	'type' => 'dropdown',
        	'heading' => __( 'Number Product', 'edo' ),
        	'param_name' => 'number',
        	'admin_label' => false,
        	'value' => array(
        		__( '2 Products', 'edo' ) => '2',
        		__( '3 Products', 'edo' ) => '3',
        		__( '4 Products', 'edo' ) => '4',
        		__( '6 Products', 'edo' ) => '6',
        	),
        	'description' => __( 'The total number of pages.', 'edo' )
        ),
        array(
        	'type' => 'dropdown',
        	'heading' => __( 'Type', 'edo' ),
        	'param_name' => 'types',
        	'admin_label' => false,
        	'value' => array(
        		__( 'Best saler', 'edo' )   => 'sale',
        		__( 'New arrivals', 'edo' ) => 'arrival',
        		__( 'Most Reviews', 'edo' ) => 'review'
        	),
        	'description' => __( 'Select type query of product', 'edo' )
        ),
        array(
        	'type' => 'dropdown',
        	'heading' => __( 'CSS Animation', 'edo' ),
        	'param_name' => 'css_animation',
        	'admin_label' => false,
        	'value' => array(
        		__( 'No', 'edo' ) => '',
        		__( 'Top to bottom', 'edo' ) => 'top-to-bottom',
        		__( 'Bottom to top', 'edo' ) => 'bottom-to-top',
        		__( 'Left to right', 'edo' ) => 'left-to-right',
        		__( 'Right to left', 'edo' ) => 'right-to-left',
        		__( 'Appear from center', 'edo' ) => "appear"
        	),
        	'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'edo' )
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

class WPBakeryShortCode_List_Product_Megamenu extends WPBakeryShortCode {
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'list_product_megamenu', $atts ) : $atts;
        $atts = shortcode_atts( array(
            'title'  => '',
            'cat'    => 0,
            'number' => 4,
            'types'  => 'sale',
            'css_animation' => '',
            'el_class' => '',
            'css' => ''
            
        ), $atts );
        extract($atts);
        global $woocommerce_loop;
        
        $elementClass = array(
        	'base' => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'list_product_megamenu', $this->settings['base'], $atts ),
        	'extra' => $this->getExtraClass( $el_class ),
        	'css_animation' => $this->getCSSAnimation( $css_animation ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        
        ob_start();
        $meta_query = WC()->query->get_meta_query();
        $query = array(
			'post_type'				=> 'product',
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page' 		=> $number,
			'meta_query' 			=> $meta_query,
		);
        global $woocommerce_loop;
        $woocommerce_loop['columns'] = $number;
        
        if($cat > 0){
            $query['tax_query'] = array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'id',
                    'terms'    => $cat,
                ),
            );
        }
        
        if( $types == 'arrival' ){
            $query['orderby'] = 'date';
            $query['order']   = 'DESC';
        }
        
        if( $types == 'sale' ){
            $product_ids_on_sale = wc_get_product_ids_on_sale();
            $query['meta_key'] = 'total_sales';
            $query['orderby']  = 'meta_value_num';
            $query['post__in'] = array_merge( array( 0 ), $product_ids_on_sale );
        }
        
        if( $types  == 'review' ) {
            add_filter( 'posts_clauses', array( $this, 'order_by_rating_post_clauses' ) );
        }
        
        $products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $query, $atts ));
        
        if($types == 'review'){
            remove_filter( 'posts_clauses', array( $this, 'order_by_rating_post_clauses' ) );
        }
        $bootstrapColumn = round( 12 / $number );
        if ( $products->have_posts() ) :
        ?>
        <div class="mega-group <?php echo esc_attr( $elementClass );?>">
            <?php if( $title != "" ):?>
            <h4 class="mega-group-header"><span><?php echo esc_attr( $title ); ?></span></h4>
            <?php endif;?>
            <div class="mega-products row">
                <?php while ( $products->have_posts() ) : $products->the_post();?>
                    <?php
                    global $product;
                    $rating_count = $product->get_rating_count();
                    ?>
                    <div class="col-sm-<?php echo esc_attr( $bootstrapColumn );?> mega-product">
                        <div class="product-avatar">
                            <a href="<?php the_permalink();?>">
                            <?php the_post_thumbnail('shop_catalog');?>
                            </a>
                        </div>
                        <div class="product-name">
                            <a href="<?php the_permalink();?>"><?php the_title();?></a>
                        </div>
                        <div class="price-box">
                            <?php woocommerce_template_loop_price();?>
                        </div>
                        <?php echo edo_display_rating($rating_count); ?>
                    </div>
                <?php endwhile; // end of the loop. ?>
            </div>
        </div>  
        <?php 
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