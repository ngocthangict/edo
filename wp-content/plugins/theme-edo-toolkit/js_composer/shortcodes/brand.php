<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

vc_map( array(
    "name"        => __( "Brand", 'edo'),
    "base"        => "brand",
    "category"    => __('by Edo', 'edo' ),
    "description" => __( "Display brand list", 'edo'),
    "params"      => array(
        array(
            "type"        => "edo_taxonomy",
            "taxonomy"    => "product_brand",
            "class"       => "",
            "heading"     => __("Brand", 'edo'),
            "param_name"  => "taxonomy",
            "value"       => '',
            'parent'      => 0,
            'hide_empty'  => false,
            'multiple'    => true,
            'placeholder' => __('Choose brand', 'edo'),
            "description" => __("Note: If you want to narrow output, select category(s) above.", 'edo')
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
                __( 'Box 3', 'edo' ) => 'box-3'
        	),
        ),
        array(
            "type"        => "edo_number",
            "heading"     => __( "Perpage", 'edo' ),
            "param_name"  => "per_page",
            "value"       => "4",
            "admin_label" => true,
            'description' => __( 'Number of post to show per page.', 'edo' ),
            "dependency"  => array( 
                "element" => "box_type", 
                "value"   => array( 
                    'box-2' 
                ) 
            ),
        ),
        array(
            "type"        => "edo_number",
            "heading"     => __( "Number", 'edo' ),
            "param_name"  => "number",
            "value"       => "24",
            "admin_label" => true,
            'description' => __( 'The `number` field is used to display the number of subcategory.', 'edo' )
        ),
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Order by', 'js_composer' ),
            'param_name' => 'orderby',
            'value'      => array(
                __( 'Id', 'edo' )          => 'id',
                __( 'Count', 'edo' )       => 'count',
                __( 'Name', 'edo' )        => 'name',
                __( 'Slug', 'edo' )        => 'slug',
                __( 'Term Group ', 'edo' ) => 'term_group',
                __( 'None', 'edo' )        => 'none',
			)
		),
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Order Way', 'js_composer' ),
            'param_name' => 'order',
            'value'      => array(
                __( 'Descending', 'js_composer' ) => 'desc',
                __( 'Ascending', 'js_composer' )  => 'asc'
			)
		),
        
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Hide Empty', 'js_composer' ),
            'param_name' => 'hide',
            'value'      => array(
                __( 'Yes', 'js_composer' ) => '1',
                __( 'No', 'js_composer' )  => '0'
			)
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
            "type"        => "textfield",
            "heading"     => __( "Extra class name", 'edo' ),
            "param_name"  => "el_class",
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
        ),array(
            'type'       => 'css_editor',
            'heading'    => __( 'Css', 'js_composer' ),
            'param_name' => 'css',
            'group'      => __( 'Design options', 'js_composer' )
		),
    )
));
class WPBakeryShortCode_Brand extends WPBakeryShortCode {
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'brand', $atts ) : $atts;
                        
        $atts = shortcode_atts( array(
            'taxonomy'      => '',
            'box_type'      => 'box-1',
            'per_page'      => 4,
            'number'        => 24,
            'orderby'       => 'id',
            'order'         => 'desc',
            'hide'          => 1,
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
            
            'css_animation' => '',
            'el_class'      => '',
            'css'           => '',
            
        ), $atts );
        extract($atts);
        
        $elementClass = array(
        	'base' => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' ', $this->settings['base'], $atts ),
        	'extra' => $this->getExtraClass( $el_class ),
        	'css_animation' => $this->getCSSAnimation( $css_animation ),
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

        ob_start();
        
        if($taxonomy){
            $ids = explode( ',', $taxonomy );
        }else{
            $ids = array();
        }
        $arg = array(
			'orderby'    => $orderby,
			'order'      => $order,
			'hide_empty' => $hide,
			'pad_counts' => true,
            'number'     => $number,
		);
        if( $ids && count( $ids ) > 0 ){
            $arg[ 'include' ]= $ids;
        }

        $brands = get_terms( 'product_brand', $arg );
        $count  = count( $brands );

        if( is_array( $brands ) && $brands && $count > 0 ):
            if($box_type == 'box-3'):
            ?>
            <div class="list kt-owl-carousel" <?php echo _data_carousel($data_carousel);?>>
            <?php
            foreach( $brands as $brand){
                $brand_link = esc_attr(get_term_link( $brand ) );
                $thumbnail_id = absint( get_woocommerce_term_meta( $brand->term_id, 'thumbnail_id', true ) );
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
                ?>
                <a href="<?php echo esc_url($brand_link); ?>">
                    <img src="<?php echo $image ?>" alt="<?php echo $brand->name ?>" />
                </a>
                <?php
            }
            ?>
            </div>
            <?php
            elseif( $box_type == 'box-2' ):
                $page = 1;
                if( $count % $per_page == 0 ){
                    $page = $count / $per_page;
                }else{
                    $page = $count / $per_page + 1;
                }
                ?>
                <div class="option3">
                    <div class="block block-type-2 block-banner-owl kt-owl-carousel" data-margin="0"  data-nav="true" data-items="1" <?php if( $page > 1 ):?> data-loop="true" <?php else: ?> data-loop="false" <?php endif; ?>>
        				<?php for( $i = 1; $i <= $page ; $i++ ): ?>
                        <div class="page-banner">
        					<ul class="list-banner">
                                <?php 
                                    $from = ( $i - 1 ) * $per_page; 
                                    $to   = $i * $per_page; 
                                ?>
                                <?php for( $from ; $from < $to; $from++ ): 
                                        if( isset( $brands[$from] ) && $brands[$from] ):
                                            $brand = $brands[ $from ];
                                            $brand_link = esc_attr(get_term_link( $brand ) );
                                            
                                            $thumbnail_id = absint( get_woocommerce_term_meta( $brand->term_id, 'thumbnail_id', true ) );
                                            
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
                                        ?>
        						            <li><a target="_blank" href="<?php echo $brand_link; ?>"><img src="<?php echo $image ?>" alt="<?php echo $brand->name ?>" /></a></li>
                                        <?php endif; ?>
                                <?php endfor;?>
        					</ul>
        				</div>
                        <?php endfor; ?>
        			</div>
                </div>
            <?php
            else:
            ?>
            <!-- box band -->
    		<div class="box-band block3">
                <?php foreach( $brands as $brand ): ?>
                     <?php $brand_link = esc_attr(get_term_link( $brand ) ); ?>
                     <?php 
                        $thumbnail_id = absint( get_woocommerce_term_meta( $brand->term_id, 'thumbnail_id', true ) );
                            
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
                     ?>
    			     <a target="_blank" href="<?php echo $brand_link; ?>">
                        <img src="<?php echo $image ?>" alt="<?php echo $brand->name ?>" />
                    </a>
                <?php endforeach; ?>
    		</div>
    		<!-- ./box band -->
            <?php
            endif;
        else:
        ?>
        <div class="alert alert-warning"><?php _e('No Brand.','edo');?></div>
        <?php
        endif;
        $result = ob_get_clean();
        return $result;
    }
}