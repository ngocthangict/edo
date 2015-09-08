<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
get_header(); 
$kt_sidebar_are = edo_option('kt_woo_shop_sidebar_are','full');
$sidebar_are_layout = 'sidebar-'.$kt_sidebar_are;
if( $kt_sidebar_are == "left" || $kt_sidebar_are == "right" ){
    $col_class = "main-content col-xs-12 col-sm-8 col-md-9"; 
}else{
    $col_class = "main-content col-xs-12 col-sm-12 col-md-12";
}
?>
    <div id="primary" class="content-area <?php echo esc_attr($sidebar_are_layout);?>">
        <main id="main" class="site-main" role="main">
        <div class="container">
                <div class="row">
                <?php breadcrumb_trail();?>      
                </div>
                <div class="row">
                    <div class="row">
                    <div class="<?php echo esc_attr($col_class);?>">
                        <?php woocommerce_content(); ?>
                    </div>
                    <?php
                    if($kt_sidebar_are!='full'){
                        ?>
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="sidebar">
                                <?php get_sidebar('shop');?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        </main><!-- .site-main -->
    </div><!-- .content-area -->

<?php get_footer(); ?>
