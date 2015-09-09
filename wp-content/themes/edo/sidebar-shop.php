<?php
/**
 * The sidebar containing the main widget area
 *
 * @package KuteTheme
 * @subpackage edo
 * @since edo 1.0
 */

$kt_used_sidebar = edo_option('kt_woo_shop_used_sidebar','sidebar-shop');
// option Single product
if(is_product()){
    $kt_used_sidebar = edo_option('kt_woo_single_used_sidebar','full');
}
?>
<div id="secondary" class="secondary">
	<?php if ( is_active_sidebar( $kt_used_sidebar ) ) : ?>
		<div id="widget-area" class="widget-area" role="complementary">
			<?php dynamic_sidebar( $kt_used_sidebar ); ?>
		</div><!-- .widget-area -->
	<?php endif; ?>

</div><!-- .secondary -->

