<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package KuteTheme
 * @subpackage edo
 * @since edo 1.0
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<section class="error-404 not-found">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'edo' ); ?></h1>
					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'edo' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</main><!-- .site-main -->
		</div><!-- .content-area -->
	</div>
</div>

<?php get_footer(); ?>
