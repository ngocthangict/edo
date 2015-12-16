<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package KuteTheme
 * @subpackage edo
 * @since Edo 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
$kt_banner_header = edo_option('kt_banner_header','');
$kt_link_banner_header = edo_option('kt_link_banner_header','#');
?>
<?php if($kt_banner_header):?>
<div class="top-banner-header">
	<a href="<?php echo esc_url( $kt_link_banner_header );?>">
	<img src="<?php echo esc_url( $kt_banner_header );?>" alt="">
	</a>
</div>
<?php endif;?>
<?php edo_get_header();?>
