<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

vc_map( array(
    "name"        => __( "Brand", 'edo'),
    "base"        => "brand",
    "category"    => __('by Edo', 'edo' ),
    "description" => __( "Display brand in option 4", 'edo'),
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
                __( 'Box 2', 'edo' ) => 'box-2'
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
            if( $box_type == 'box-2' ):
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
        endif;
        $result = ob_get_clean();
        return $result;
    }
}