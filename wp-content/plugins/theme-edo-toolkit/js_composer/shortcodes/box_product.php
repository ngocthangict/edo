<?php
// Exit if accessed directly
if ( ! defined('ABSPATH')) exit;

vc_map( array(
    "name"        => __( "Box Products", 'edo'),
    "base"        => "box_products",
    "category"    => __('by Edo', 'edo' ),
    "description" => __( "Show list product in box hot deal, best selling,...", 'edo'),
    "params"      => array(
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
                __( 'Box 2', 'edo' ) => 'box-2',
                __( 'Box 3', 'edo' ) => 'box-3',
                __( 'Box 4', 'edo' ) => 'box-4',
                __( 'Box 5', 'edo' ) => 'box-5',
                //same box 3
                __( 'Box 6', 'edo' ) => 'box-6',
                //same box 4
                __( 'Box 7', 'edo' ) => 'box-7',
                __( 'Box 8', 'edo' ) => 'box-8'
        	),
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "Link", 'edo' ),
            "param_name"  => "link",
            "admin_label" => false,
            "dependency"  => array( 
                "element" => "box_type", 
                "value"   => array( 
                    'box-4', 
                    'box-7' 
                ) 
            ),
        ),
        array(
			"type"        => "edo_number",
			"heading"     => __("Number sub category", 'edo'),
			"param_name"  => "per_child",
			"value"       => "8",
            "suffix"      => __("Item", 'edo'),
            'admin_label' => false,
            'description' => __( 'The `number` field is used to display the number of subcategory.', 'edo' ),
            "dependency"  => array( 
                "element" => "box_type", 
                "value" => array( 
                    'box-5' 
                ) 
            ),
	  	),
        
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Order by (*sub category)', 'js_composer' ),
            'param_name' => 'sub_orderby',
            'value'      => array(
                __( 'Id', 'edo' )    => 'id',
                __( 'Count', 'edo' ) => 'count',
				__( 'Name', 'edo' )  => 'name',
				__( 'Slug', 'edo' )  => 'slug',
                __( 'Term Group ', 'edo' )  => 'term_group',
                __( 'None', 'edo' )  => 'none',
			),
            "dependency"  => array( 
                "element" => "box_type", 
                "value" => array( 
                    'box-5' 
                ) 
            ),
		),
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Order Way (*sub category)', 'js_composer' ),
            'param_name' => 'sub_order',
            'value'      => array(
				__( 'Descending', 'js_composer' ) => 'desc',
				__( 'Ascending', 'js_composer' ) => 'asc'
			),
            "dependency"  => array( 
                "element" => "box_type", 
                "value"   => array( 
                    'box-5' 
                ) 
            ),
		),
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Hide Empty (*sub category)', 'js_composer' ),
            'param_name' => 'sub_hide',
            'value'      => array(
				__( 'Yes', 'js_composer' ) => '1',
				__( 'No', 'js_composer' ) => '0'
			),
            "dependency"  => array( 
                "element" => "box_type", 
                "value"   => array( 
                    'box-5' 
                ) 
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
            "type"       => "dropdown",
            "heading"    => __("Order by", 'edo'),
            "param_name" => "orderby",
            "value"      => array(
        		__( 'None', 'edo' )     => 'none',
                __( 'ID', 'edo' )       => 'ID',
                __( 'Author', 'edo' )   => 'author',
                __( 'Name', 'edo' )     => 'name',
                __( 'Date', 'edo' )     => 'date',
                __( 'Modified', 'edo' ) => 'modified',
                __( 'Rand', 'edo' )     => 'rand',
                __( 'Discount', 'edo' ) => 'discount'
        	),
            'std'         => 'date',
            "description" => __("Select how to sort retrieved posts.",'edo'),
            "dependency"  => array( "element" => "type", "value" => array( 'hot-deals' ) ),
        ),
        array(
            "type"       => "dropdown",
            "heading"    => __("Order way", 'edo'),
            "param_name" => "order",
            "value"      => array(
                __('ASC', 'edo') => 'ASC',
                __('DESC', 'edo') => 'DESC'
        	),
            'std'         => 'DESC',
            "description" => __("Designates the ascending or descending order.",'edo'),
            "dependency"  => array( "element" => "type", "value" => array( 'hot-deals' ) ),
        ),
        array(
    		'type'        => 'attach_images',
    		'heading'     => __( 'Banner', 'edo' ),
    		'param_name'  => 'banner',
            'description' => __( 'Setup banner for the box on bottom', 'edo' ),
            "dependency"  => array( "element" => "box_type", "value" => array( 'box-3', 'box-6' ) ),
    	),
        array(
            "type"        => "textfield",
            "heading"     => __( "Link Banner", 'edo' ),
            "param_name"  => "link_banner",
            "admin_label" => false,
            "dependency"  => array( "element" => "box_type", "value" => array( 'box-3', 'box-6' ) ),
        ),
        array(
    		'type'        => 'attach_images',
    		'heading'     => __( 'Icon', 'edo' ),
    		'param_name'  => 'icon',
            'description' => __( 'Setup icon for the box', 'edo' ),
            "dependency"  => array( "element" => "box_type", "value" => array( 'box-1' ) ),
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
            "type"       => "dropdown",
            "heading"    => __("Box title position", 'edo'),
            "param_name" => "box_position",
            "value"      => array(
                __('Left', 'edo') => 'left',
                __('Right', 'edo') => 'right'
            ),
            'std'         => 'left',
            "dependency"  => array( "element" => "box_type", "value" => array( 'box-8' ) ),
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
            'title'          => __( 'hot deals', 'edo' ),
            'icon'           => '',
            'per_page'       => 5,
            'box_type'       => 'box-1',
            'type'           => 'hot-deals',
            'taxonomy'       => 0,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'box_position'   =>'left',
            
            //box 5
            'per_child'      => 8,
            'sub_orderby'    => 'id',
            'sub_order'      => 'desc',
            'sub_hide'       => false,
            //box 4
            'link'           => '',
            
            //box 3
            'banner'         => '',
            'link_banner'    => '',
            
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
            
            'css'            => '',
            'css_animation'  => '',
            'el_class'       => '',
        ), $atts ) );
        
         global $woocommerce_loop;
        
        $elementClass = array(
            'base'             => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' box-tab-category ', $this->settings['base'], $atts ),
            'extra'            => $this->getExtraClass( $el_class ),
            'css_animation'    => $this->getCSSAnimation( $css_animation ),
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
            $new_title = $title;
            $new_title = explode( ' ', $new_title );
            
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
                'nav'         => $navigation,
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
                $data_carousel['items'] =  $items_destop;
            }
            $unique_id = uniqid();
            $carousel = _data_carousel($data_carousel);
            
            $arg_child = array(
    			'orderby'    => $sub_orderby,
    			'order'      => $sub_order,
    			'hide_empty' => $sub_hide,
    			'pad_counts' => true,
                'number'     => $per_child
    		);        
            
            if( $box_type == 'box-1' ){
                ?>
                <!-- block  host deals -->
                <div class="block block-hot-deals box-1 has_countdown only_countdown">
                	<div class="block-head">
                		<div class="block-title">
                			<div class="block-icon">
                				<img alt="<?php  echo esc_attr( $title ) ;  ?>" title="<?php echo esc_attr( $title ) ; ?>" src="<?php echo esc_url( $att_icon_url ) ; ?>" />
                			</div>
                			<div class="block-title-text text-sm"><?php echo esc_html( $title_sm ) ; ?></div>
                			<div class="block-title-text text-lg"><?php echo esc_html( $title_lg ) ; ?></div>
                		</div>
                		<div class="block-countdownt">
                			<span class="countdown-only"></span>
                		</div>
                	</div>
                	<div class="block-inner box-type-1">
                        <?php do_action( "woocommerce_shortcode_before_box_product_loop" ); ?>
                    		<?php $this->edo_loop_product( $products, $carousel, 'list-product', true ) ?>
                        <?php do_action( "woocommerce_shortcode_after_box_product_loop" ); ?>
                	</div>
                </div>
                <!-- ./block hot deals -->
                <?php
            }elseif ( $box_type == 'box-2' ){
                $cate_obj = array();
                ?>
                <!-- block tabs -->
				<div class="block block-tabs box-2">
					<div class="block-head">
						<div class="block-title">
							<div class="block-title-text text-lg"><?php echo esc_html( $title ) ; ?></div>
						</div>
						<ul class="nav-tab">                                   
	                        <li class="active"><a data-toggle="tab" href="#tab-all-<?php echo $unique_id ?>"><?php _e( 'All', 'edo' ) ?></a></li>
	                        <?php if( count( $cate_ids ) ): ?>
                                <?php foreach( $cate_ids as $id ):  ?>
                                    <?php $term = get_term( $id, 'product_cat' ); $cate_obj[] = $term;  ?>
                                    <li><a data-toggle="tab" href="#tab-<?php echo esc_attr( $term->term_id . '-' . $unique_id )  ?>"><?php echo esc_html( $term->name )   ?></a></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                      	</ul>
					</div>
					<div class="block-inner">
						<div class="tab-container">
							<div id="tab-all-<?php echo esc_attr( $unique_id )  ?>" class="tab-panel active">
								<?php do_action( "woocommerce_shortcode_before_box_product_loop" ); ?>
                                    <?php $this->edo_loop_product( $products, $carousel ) ?>
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
                                            <?php $this->edo_loop_product( $products, $carousel ) ?>
                                        <?php do_action( "woocommerce_shortcode_after_box_product_loop" ); ?>
        							</div>
                                    <?php else: ?>
                                        <div id="tab-<?php echo $term->term_id . '-' . $unique_id ?>" class="tab-panel">
                                            <?php $this->edo_tab_empty(); ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
						</div>
					</div>
				</div>
				<!-- ./block tabs -->
                <?php
            }elseif( $box_type == 'box-3' || $box_type == 'box-6' ){
                $cate_obj = array();
                ?>
                <!-- new-arrivals -->
                <?php if( $box_type == 'box-3' ): ?>
                <div class="option3">
					<div class="block3 block-new-arrivals box-3">
                <?php else: ?>
                <div class="option4">
					<div class="block3 block-new-arrivals box-6">
                <?php endif; ?>
						<div class="block-head">
							<h3 class="block-title"><?php echo $title; ?></h3>
							<ul class="nav-tab default">
                                <?php if( count( $cate_ids ) ): ?>
                                    <?php foreach( $cate_ids as $id ):  ?>
                                        <?php 
                                        $term = get_term( $id, 'product_cat' ); 
                                        if( $term ):
                                            $cate_obj[] = $term;  ?>
                                            <li <?php if( count( $cate_obj ) == 1 ): ?>class="active"<?php endif; ?> ><a data-toggle="tab" href="#tab-<?php echo $term->term_id . '-' . $unique_id ?>"><?php echo $term->name  ?></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
	                      	</ul>
						</div>
						<div class="block-inner controls-top-left">
							<div class="tab-container">
								<?php if( count( $cate_obj ) > 0 ): $i =1; ?>
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
                    							<div id="tab-<?php echo $term->term_id . '-' . $unique_id ?>" class="tab-panel <?php echo ( $i == 1 ) ? 'active' :'' ?>">
                    								<?php do_action( "woocommerce_shortcode_before_box_product_loop" ); ?>
                                                        <?php $this->edo_loop_product( $term_products, $carousel, 'list-product-3' ) ?>
                                                    <?php do_action( "woocommerce_shortcode_after_box_product_loop" ); ?>
                    							</div>
                                            <?php else: ?>
                                                <div id="tab-<?php echo $term->term_id . '-' . $unique_id ?>" class="tab-panel <?php echo ( $i == 1 ) ? 'active' :'' ?>">
                                                    <?php $this->edo_tab_empty(); ?>
                                                </div>
                                            <?php endif; ?>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
							</div>
						</div>
                        <?php 
                        if( isset( $banner ) && $banner ):
                            $banner_url = wp_get_attachment_image_src( $banner, 'full' );  
                            $banner_src =  is_array($banner_url) ? esc_url($banner_url[0]) :  '';
                            
                            if( $banner_src ):
                                ?>
        						<div class="block-footer">
        							<div class="text-center banner-hover">
        								<a href="<?php echo $link_banner; ?>"><img src="<?php echo $banner_src; ?>" alt="<?php echo $title; ?>" /></a>
        							</div>
        						</div>
                            <?php endif; ?>
                        <?php endif; ?>
					</div>
                </div>
				<!-- new-arrivals -->
                <?php
            }elseif( $box_type == 'box-4' || $box_type == 'box-7' ){
                ?>
                <!-- Hot deals -->
                <?php if( $box_type == 'box-4' ): ?>
                <div class="option3">
					<div class="block3 block-hotdeals box-4">
                <?php else: ?>
                <div class="option4">
					<div class="block3 block-hotdeals box-7">
                <?php endif; ?>
						<div class="block-head">
                            <?php if( $title ): ?>
							<h3 class="block-title"><?php echo $title; ?></h3>
                            <?php endif; ?>
                            <?php if( $link ): ?>
                                <a class="link-all" href="<?php echo esc_url( $link ); ?>"><?php _e( 'View All', 'edo' ) ?></a>
                            <?php endif; ?>
						</div>
						<div class="block-inner controls-top-left">
							<?php do_action( "woocommerce_shortcode_before_box_product_loop" ); ?>
                        		<?php $this->edo_loop_product( $products, $carousel, 'list-product-4' ) ?>
                            <?php do_action( "woocommerce_shortcode_after_box_product_loop" ); ?>
						</div>
					</div>
                </div><!-- Hot deals -->
                <?php
            }elseif( $box_type == 'box-5' ){
                $cate_obj = array();
                ?>
                <div class="option3">
                    <!-- ./group banner -->
    				<div class="block3 tab-cat-products box-5">
    					<div class="block-head">
    						<ul class="nav-tab tab-category">             
    	                        <?php if( count( $cate_ids ) ): ?>
                                    <?php foreach( $cate_ids as $id ):  ?>
                                        <?php 
                                        $term = get_term( $id, 'product_cat' ); 
                                        if( $term ):
                                            $cate_obj[] = $term;  ?>
                                            <li <?php if( count( $cate_obj ) == 1 ): ?>class="active"<?php endif; ?> ><a data-toggle="tab" href="#tab-<?php echo $term->term_id . '-' . $unique_id ?>"><?php echo $term->name  ?></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                          	</ul>
    					</div>
    					<div class="block-inner">
    						<div class="tab-container">
    							<?php if( count( $cate_obj ) > 0 ): $i =1; ?>
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
                                                    $arg_child['parent'] = $term->term_id;
                                                    
                                                    $children = get_terms( 'product_cat', $arg_child );
                                                    ?>
                        							<div id="tab-<?php echo $term->term_id . '-' . $unique_id ?>" class="tab-panel <?php echo ( $i == 1 ) ? 'active' :'' ?>">
                        								<?php if( count( $children ) >0 ): ?>
                                                            <div class="sub-cat">
                                    							<ul class="sub-categories">
                                    								<?php foreach($children as $child): ?>
                                                                        <?php $chil_link = esc_attr(get_term_link( $child ) ); ?>
                                                                        <li>
                                                                            <a href="<?php echo esc_attr($chil_link) ?>"><?php echo $child->name ?></a>
                                                                        </li>
                                                                    <?php endforeach; ?>
                                    							</ul>
                        								    </div>
                                                        <?php else: 
                                                            if( $use_responsive ){
                                                            $arr = array(   
                                                                '0' => array(
                                                                    "items" => $items_mobile
                                                                ), 
                                                                '768' => array(
                                                                    "items" => $items_tablet
                                                                ), 
                                                                '992' => array(
                                                                    "items" => $items_destop + 1
                                                                )
                                                            );
                                                            
                                                            $data_responsive = json_encode($arr);
                                                            $data_carousel["responsive"] = $data_responsive;
                                                        }else{
                                                            $data_carousel['items'] = $items_destop + 1;
                                                        }
                                                        $carousel = _data_carousel($data_carousel);
                                                        ?>
                                                        <?php endif; ?>
                        								<div class="cat-product <?php echo ( count( $children ) > 0 ) ? 'has_subcate' : 'hasnt_subcate'; ?>">
                        									<?php do_action( "woocommerce_shortcode_before_box_product_loop" ); ?>
                                                        		<?php $this->edo_loop_product( $products, $carousel, 'list-product-3' ) ?>
                                                            <?php do_action( "woocommerce_shortcode_after_box_product_loop" ); ?>
                        								</div>
        							             </div>
                                                 <?php else: ?>
                                                    <div id="tab-<?php echo $term->term_id . '-' . $unique_id ?>" class="tab-panel <?php echo ( $i == 1 ) ? 'active' :'' ?>">
                                                        <?php $this->edo_tab_empty(); ?>
                                                    </div>
                                                <?php endif; ?>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
        						</div>
        					</div>
        				</div>
                    </div>
                <!-- ./end group banner -->
            <?php
            }elseif( $box_type == 'box-8'){
                ?>
                <div class="box-product-style8 <?php echo esc_attr( $box_position );?> <?php echo esc_attr( $elementClass );?>">
                    <div class="box-head">
                        <div class="inner">
                            <?php if($title):?>
                            <span class="text"><?php echo esc_html($title);?></span>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="box-tab">
                            <ul class="nav-tab default">
                                <?php if( isset( $cate_ids) && count( $cate_ids ) ): ?>
                                    <?php foreach( $cate_ids as $id ):  ?>
                                        <?php 
                                        $term = get_term( $id, 'product_cat' ); 
                                        if( $term ):
                                            $cate_obj[] = $term;  ?>
                                            <li <?php if( count( $cate_obj ) == 1 ): ?>class="active"<?php endif; ?> ><a data-toggle="tab" href="#tab-<?php echo $term->term_id . '-' . $unique_id ?>"><?php echo $term->name  ?></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="tab-container">
                            <?php if( isset($cate_obj) && count( $cate_obj ) > 0 ): $i =1; ?>
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
                                            <div id="tab-<?php echo $term->term_id . '-' . $unique_id ?>" class="tab-panel <?php echo ( $i == 1 ) ? 'active' :'' ?>">
                                                <?php do_action( "woocommerce_shortcode_before_box_product_loop" ); ?>
                                                    <ul class="products kt-owl-carousel nav-style2" <?php echo $carousel; ?>>
                                                        <?php while( $products->have_posts() ): $products->the_post(); ?>
                                                            <li class="product style5">
                                                                <?php 
                                                                    wc_get_template_part( 'content', 'list-product-5' );
                                                                ?>
                                                            </li>
                                                        <?php endwhile; ?>
                                                    </ul>
                                                <?php do_action( "woocommerce_shortcode_after_box_product_loop" ); ?>
                                            </div>
                                        <?php else: ?>
                                            <div id="tab-<?php echo $term->term_id . '-' . $unique_id ?>" class="tab-panel <?php echo ( $i == 1 ) ? 'active' :'' ?>">
                                                <?php $this->edo_tab_empty(); ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="box-link">
                            <a href="#"><?php _e('View all products','edo');?></a>
                        </div>
                    </div>
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
     * 
     * 
     */
     public function edo_loop_product( $products, $data_carousel= '', $content = 'list-product', $datetime = false){
        ?>
        <ul class="products kt-owl-carousel" <?php echo $data_carousel; ?>>
            <?php $max_time = 0; ?>
            <?php while( $products->have_posts() ): $products->the_post(); ?>
                
                <li class="product">
					<?php 
                        wc_get_template_part( 'content', $content );
                    ?>
                </li>
                <?php
                if( $datetime ){
                    $time = edo_get_max_date_sale( get_the_ID() );
                    if( $time > $max_time ){
                        $max_time = $time;
                    }
                }
                ?>
			<?php endwhile; ?>
		</ul>
        <?php 
        if( $datetime && $max_time > 0 ){
            $y = date( 'Y', $max_time );
            $m = date( 'm', $max_time );
            $d = date( 'd', $max_time );
            ?>
            <input class="max-time-sale" data-y="<?php echo esc_attr( $y );?>" data-m="<?php echo esc_attr( $m );?>" data-d="<?php echo esc_attr( $d );?>" type="hidden" value="">
            <?php
        }
        ?>
        <?php
        wp_reset_query();
        wp_reset_postdata(); 
     }
     public function edo_tab_empty(){
        ?>
            <label><?php _e( 'Empty product', 'edo' ) ?></label>
        <?php
     }
}