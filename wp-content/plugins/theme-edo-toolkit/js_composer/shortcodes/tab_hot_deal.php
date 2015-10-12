<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

vc_map( array(
    "name"                    => __( "Hot Deal Tab", 'edo'),
    "base"                    => "hot_deal",
    "category"                => __('by Edo', 'edo' ),
    "description"             => __( "Show tab hot deal", 'edo'),
    "as_parent"               => array('only' => 'tab_section'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element"         => true,
    "show_settings_on_create" => true,
    "params"                  => array(
        array(
            "type"        => "textfield",
            "heading"     => __( "Title", 'edo' ),
            "param_name"  => "title",
            "admin_label" => true,
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "Number Post", 'edo' ),
            "param_name"  => "per_page",
            'std'         => 5,
            "admin_label" => false,
            'description' => __( 'Number post in a slide', 'edo' )
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
        		__('None', 'edo')     => 'none',
                __('ID', 'edo')       => 'ID',
                __('Author', 'edo')   => 'author',
                __('Name', 'edo')     => 'name',
                __('Date', 'edo')     => 'date',
                __('Modified', 'edo') => 'modified',
                __('Rand', 'edo')     => 'rand',
        	),
            'std'         => 'date',
        	"description" => __("Select how to sort retrieved posts.",'edo')
        ),
        array(
            "type"       => "dropdown",
            "heading"    => __("Order", 'edo'),
            "param_name" => "order",
            "value"      => array(
                __('ASC', 'edo')  => 'ASC',
                __('DESC', 'edo') => 'DESC'
        	),
            'std'         => 'DESC',
            "description" => __( "Designates the ascending or descending order.", 'edo' )
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => __( 'CSS Animation', 'js_composer' ),
            'param_name'  => 'css_animation',
            'admin_label' => false,
            'value'       => array(
        		__( 'No', 'js_composer' ) => '',
        		__( 'Top to bottom', 'js_composer' ) => 'top-to-bottom',
        		__( 'Bottom to top', 'js_composer' ) => 'bottom-to-top',
        		__( 'Left to right', 'js_composer' ) => 'left-to-right',
        		__( 'Right to left', 'js_composer' ) => 'right-to-left',
        		__( 'Appear from center', 'js_composer' ) => "appear"
        	),
        	'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'js_composer' )
        ),
        
        // Carousel
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'heading'     => __( 'AutoPlay', 'edo' ),
            'param_name'  => 'autoplay',
            'group'       => __( 'Carousel settings', 'edo' ),
            'admin_label' => false,
		),
        array(
            'type'  => 'dropdown',
            'value' => array(
                __( 'Yes', 'js_composer' ) => 'true',
                __( 'No', 'js_composer' )  => 'false'
            ),
            'heading'     => __( 'Navigation', 'edo' ),
			'param_name'  => 'navigation',
            'description' => __( "Don't display 'next' and 'prev' buttons.", 'edo' ),
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
            'heading'     => __( 'Use Carousel Responsive', 'edo' ),
			'param_name'  => 'use_responsive',
            'description' => __( "Try changing your browser width to see what happens with Items and Navigations", 'edo' ),
            'group'       => __( 'Carousel responsive', 'edo' ),
            'admin_label' => false
		),
        array(
			"type"        => "edo_number",
			"heading"     => __("The items on destop (Screen resolution of device >= 992px )", 'edo'),
			"param_name"  => "items_destop",
			"value"       => "3",
            "suffix"      => __("item", 'edo'),
			"description" => __('The number of items on destop', 'edo'),
            'group'       => __( 'Carousel responsive', 'edo' ),
            'admin_label' => false,
	  	),
        array(
			"type"        => "edo_number",
			"heading"     => __("The items on tablet (Screen resolution of device >=768px and < 992px )", 'edo'),
			"param_name"  => "items_tablet",
			"value"       => "2",
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
			'type'        => 'css_editor',
			'heading'     => __( 'Css', 'js_composer' ),
			'param_name'  => 'css',
			'group'       => __( 'Design options', 'js_composer' ),
            'admin_label' => false,
		),
        array(
            "type"        => "textfield",
            "heading"     => __( "Extra class name", "js_composer" ),
            "param_name"  => "el_class",
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
            'admin_label' => false,
        ),
    ),
    "js_view" => 'VcColumnView'
));
vc_map( array(
    "name"            => __("Section Tab", 'edo'),
    "base"            => "tab_section",
    "content_element" => true,
    "as_child"        => array('only' => 'hot_deal'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params"          => array(
        // add params same as with any other content element
        array(
            "type"        => "textfield",
            "heading"     => __( "Header", 'edo' ),
            "param_name"  => "header",
            "admin_label" => true,
        ),
        array(
			"type"        => "edo_number",
			"heading"     => __("Reduction from", 'edo'),
			"param_name"  => "reduction_from",
			"value"       => "0",
            "suffix"      => __("%", 'edo'),
			"description" => __('The reduction from', 'edo'),
            'admin_label' => true,
	  	),
        array(
			"type"        => "edo_number",
			"heading"     => __("Reduction to", 'edo'),
			"param_name"  => "reduction_to",
			"value"       => "0",
            "suffix"      => __("%", 'edo'),
			"description" => __('The reduction to', 'edo'),
            'admin_label' => true,
	  	)
    )
) );
class WPBakeryShortCode_Hot_Deal extends WPBakeryShortCodesContainer {
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'hot_deal', $atts ) : $atts;
        extract( shortcode_atts( array(
            'title'          => 'Tabs Name',
            'per_page'       => 5,
            'taxonomy'       => 0,
            'icon'           => '',
            'orderby'        => 'date',
            'order'          => 'DESC',
            
            //Carousel            
            'autoplay'       => 'false', 
            'navigation'     => 'false',
            'loop'           => 'false',
            'slidespeed'     => 250,
            'margin'         => 0,
            
            'css'            => '',
            'el_class'       => '',
            'nav'            => 'true',
            //Default
            'items_destop'   => 3,
            'items_tablet'   => 2,
            'items_mobile'   => 1,
            
            'use_responsive' => 1,
            'css_animation'  => '',
        ), $atts ) );
        
         global $woocommerce_loop;
        
        $elementClass = array(
            'base'             => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' box-tab-category ', $this->settings['base'], $atts ),
            'extra'            => $this->getExtraClass( $el_class ),
            'css_animation'    => $this->getCSSAnimation( $css_animation ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        
        $meta_query = WC()->query->get_meta_query();
        
        $args = array(
			'post_type'			  => 'product',
			'post_status'		  => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page' 	  => $per_page,
            'suppress_filter'     => true,
            'orderby'             => $orderby,
            'order'               => $order
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
        $data_carousel = array(
            "autoplay"           => $autoplay,
            "navigation"         => $navigation,
            "margin"             => $margin,
            "slidespeed"         => $slidespeed,
            "theme"              => 'style-navigation-bottom',
            "autoheight"         => 'false',
            'nav'                => 'true',
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
            if( $items_destop > 0 ){
                $items_destop = 3;
            }
            $data_carousel['items'] =  $items_destop;
                
        }
        $carousel = _data_carousel( $data_carousel );
        
        $tabs = edo_get_all_attributes( 'tab_section', $content );
        if( count( $tabs ) >0 ) :
        $unique = uniqid();
        ?>
		<!-- Block hot deals2 -->
		<div class="col-sm-12">
			<div class="block-hot-deals2 has_countdown only_countdown">
				<h3 class="title">hot deals</h3>
				<div class="row">
					<div class="col-sm-4 col-md-3">
						<div class="hot-deal-tab">
							<div class="countdown">
								<span class="countdown-only"></span>
							</div>
							<ul class="nav-tab">
                                <?php $i = 1; ?>
                                <?php foreach( $tabs as $tab ): 
                                        extract( shortcode_atts( array(
                                            'header'         => __( 'Tab name', 'edo' ),
                                            'reduction_from' => 0,
                                            'reduction_to'   => 0,
                                        ), $tab ) );
                                    ?>
		                          <li <?php if( $i ==1 ): ?> class="active" <?php endif; ?> ><a data-toggle="tab" href="#hotdeals-<?php echo $unique ?>-<?php echo $i; ?>"><?php echo $header; ?></a></li>
                                  <?php $i++; ?>
                                <?php endforeach; ?>
	                      	</ul>
						</div>
					</div>
					<div class="col-sm-8 col-md-9">
						<div class="tab-container">
                            <?php $i = 1; ?>
                            <?php 
                            $max_time = 0;
                            foreach( $tabs as $tab ) :
                                extract( shortcode_atts( array(
                                    'header'         => __( 'Tab name', 'edo' ),
                                    'reduction_from' => 0,
                                    'reduction_to'   => 0,
                                ), $tab ) );
                                $meta   = $meta_query;
                                $meta[] = array(
                                    'key' => '_reduction_percent',
                                    'value' => array(
                                        $reduction_from, 
                                        $reduction_to
                                    ),
                                    'compare' => 'BETWEEN'
                                );
                                
                                $args['meta_query'] = $meta;
                                
                                $products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );
                                
                                if( $products->have_posts() ):
                                ?>
        							<div id="hotdeals-<?php echo $unique ?>-<?php echo $i; ?>" class="tab-panel <?php if( $i ==1 ): ?>active<?php endif; ?>">
        								<?php do_action( "woocommerce_shortcode_before_hot_deal_loop" ); ?>
                                            <ul class="products kt-owl-carousel" <?php echo $carousel; ?>>
                                                
            									<?php while( $products->have_posts() ): $products->the_post(); ?>
                                                    <?php edo_woocommerce_product_loop_item_before(); ?>
                                    					<?php 
                                                            wc_get_template_part( 'content', 'list-product' );
                                                            // Get date sale 
                                                            $time = edo_get_max_date_sale( get_the_ID() );
                                                            if( $time > $max_time ){
                                                                $max_time = $time;
                                                            }

                                                        ?>
                                                    <?php edo_woocommerce_product_loop_item_after(); ?>
                                    			<?php endwhile; ?>
            								</ul>
                                            
                                        <?php do_action( "woocommerce_shortcode_after_hot_deal_loop" ); ?>
        							</div>
                                <?php endif; ?>
                                <?php 
                                    wp_reset_query();
                                    wp_reset_postdata(); 
                                ?>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                            <?php 
                            if( $max_time > 0 ){
                                $y = date( 'Y', $max_time );
                                $m = date( 'm', $max_time );
                                $d = date( 'd', $max_time );
                                ?>
                                <input class="max-time-sale" data-y="<?php echo esc_attr( $y );?>" data-m="<?php echo esc_attr( $m );?>" data-d="<?php echo esc_attr( $d );?>" type="hidden" value="">
                                <?php
                            }
                            ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Block hot deals2 -->
        <?php
        endif;
    }
}