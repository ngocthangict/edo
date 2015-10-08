<?php
/**
 * The template used for displaying page content
 *
 * @package KuteTheme
 * @subpackage edo
 * @since edo 1.0
 */
?>

<?php 
    $kt_show_page_title = edo_get_post_meta(get_the_ID(),'kt_show_page_title','show');
    $kt_page_extra_class = edo_get_post_meta(get_the_ID(),'kt_page_extra_class','show');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($kt_page_extra_class); ?>>
    <?php if( $kt_show_page_title == 'show'): ?>
        <h1 class="page-title"><?php the_title();?></h1>
    <?php endif; ?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'edo' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'edo' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

