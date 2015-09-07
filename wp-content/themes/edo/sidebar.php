<?php
/**
 * The sidebar containing the main widget area
 *
 * @package KuteTheme
 * @subpackage edo
 * @since edo 1.0
 */

$kt_used_sidebar = edo_option('kt_used_sidebar','sidebar-shop');

if(is_page()){
	$kt_page_used_sidebar = edo_get_post_meta(get_the_ID(),'kt_page_used_sidebar','none');
	if($kt_page_used_sidebar!="none"){
		$kt_used_sidebar = $kt_page_used_sidebar;
	}
}
?>
<div id="secondary" class="secondary">
	<?php if ( is_active_sidebar( $kt_used_sidebar ) ) : ?>
		<div id="widget-area" class="widget-area" role="complementary">
			<?php dynamic_sidebar( $kt_used_sidebar ); ?>
		</div><!-- .widget-area -->
	<?php endif; ?>

</div><!-- .secondary -->

