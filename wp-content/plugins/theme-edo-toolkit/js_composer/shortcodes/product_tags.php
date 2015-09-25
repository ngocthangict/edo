<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
vc_map( array(
    "name" => __( "Edo product tags", 'edo'),
    "base" => "edo_product_tags",
    "category" => __('by Edo', 'edo' ),
    "description" => __( 'Display all tags', 'edo' ),
    "params" => array(
        array(
            'type'        => 'textfield',
            'heading'     => __( 'Title', 'edo' ),
            'value'       => __( 'Tags', 'edo' ),
            'param_name'  => 'title',
            'description' => __( 'The title box', 'edo' ),
            'admin_label' => false,
		),
        array(
            "type"        => "textfield",
            "heading"     => __( "Per page", "edo" ),
            "value"       =>5,
            "param_name"  => "per_page",
            "description" => __( "Number tag on page.", "edo" ),
            'admin_label' => false,
        ),
        array(
            "type"        => "textfield",
            "heading"     => __( "Extra class name", "js_composer" ),
            "param_name"  => "el_class",
            "description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" ),
            'admin_label' => false,
        ),
        array(
            'type'           => 'css_editor',
            'heading'        => __( 'Css', 'edo' ),
            'param_name'     => 'css',
            // 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'edo' ),
            'group'          => __( 'Design options', 'edo' ),
            'admin_label'    => false,
		),
    ),
));

class WPBakeryShortCode_Edo_Product_Tags extends WPBakeryShortCode {
    
    protected function content($atts, $content = null) {
        $atts = function_exists( 'vc_map_get_attributes' ) ? vc_map_get_attributes( 'edo_product_tags', $atts ) : $atts;
        $atts = shortcode_atts( array(
            'title'         => 'Tags',
            'per_page'      =>5,
            'el_class'      => '',
            'css'           => ''
            
        ), $atts );
        extract($atts);
        $elementClass = array(
            'base'             => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' ', $this->settings['base'], $atts ),
            'extra'            => $this->getExtraClass( $el_class ),
            'shortcode_custom' => vc_shortcode_custom_css_class( $css, ' ' )
        );
        
        $elementClass = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
        $args = array(
            'taxonomy'=>'product_tag'
        );
        $args = array(
            'hide_empty'=>false
        );

        $tags = get_terms( 'product_tag', $args );
        $count = count( $tags);
        ob_start();
        
        ?>
        <div class="option3">
            <div class="block block-tags <?php echo esc_attr( $elementClass );?>">
                <?php if($title):?>
                <div class="block-head">
                    <h4 class="widget-title"><?php echo $title;?></h4>
                </div>
                <?php endif; ?>
                <div class="block-inner kt-owl-carousel" data-nav="true" data-autoplay="true" data-items="1">
                    <?php 
                        $page = 1;
                        if( $count % $per_page == 0 ){
                            $page = $count / $per_page;
                        }else{
                            $page = $count / $per_page + 1;
                        }
                    ?>
                    <?php for( $i = 1; $i <= $page ; $i++ ): ?>
                        <div class="tagcloud">
                            <?php 
                            $from = ( $i - 1 ) * $per_page; 
                            $to   = $i * $per_page; 
                            for ($from ; $from < $to; $from ++) { 
                                if( isset($tags[$from]) && $tags[$from] ){
                                    $tag = $tags[$from];
                                    $tag_link = get_term_link( $tag );
                                    ?>
                                    <a href="<?php echo esc_attr( $tag_link );?>"><?php echo $tag->name; ?></a>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    <?php endfor;?>
                </div>
            </div>
        </div>
        <?php 
        return ob_get_clean();
    }
    

}