<?php
/**
 * The template for displaying search results pages.
 *
 * @package KuteTheme
 * @subpackage edo
 * @since edo 1.0
 */

get_header(); 
$kt_sidebar_are = edo_option('kt_sidebar_are','full');
$sidebar_are_layout = 'sidebar-'.$kt_sidebar_are;
if( $kt_sidebar_are == "left" || $kt_sidebar_are == "right" ){
    $col_class = "main-content col-xs-12 col-sm-8 col-md-9"; 
}else{
    $col_class = "main-content col-xs-12 col-sm-12 col-md-12";
}
?>

	<div id="primary" class="content-area <?php echo esc_attr($sidebar_are_layout);?>">
		<main id="main" class="site-main">
        <div class="container">
        		<?php breadcrumb_trail();?>
            <div class="row">
                <div class="<?php echo esc_attr($col_class);?>">
                    <?php if ( have_posts() ) : ?>
            			<h1 class="page-title"><?php printf( esc_attr__( 'Search Results for: %s', 'edo' ), get_search_query() ); ?></h1>
            			<div class="main-page">
            				<div class="page-content clearfix">
            					<ul class="blog-posts">
            						<?php
			            			// Start the loop.
									while ( have_posts() ) : the_post(); ?>
										<?php
										/*
										 * Run the loop for the search to output the results.
										 * If you want to overload this in a child theme then include a file
										 * called content-search.php and that will be used instead.
										 */
										get_template_part( 'templates/loop-search' );

									// End the loop.
									endwhile;
			                        ?>
            					</ul>
            					<div class="sortPagiBar">
            						<div class="sortPagiBar-inner">
            							<?php edo_paging_nav();?>
            						</div>
            					</div>
            				</div>
            			</div>
                        <?php
            		// If no content, include the "No posts found" template.
            		else :
            			get_template_part( 'content', 'none' );
            		endif;
            		?>
                </div>
                <?php
                if($kt_sidebar_are!='full'){
                    ?>
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <div class="sidebar">
                            <?php get_sidebar();?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
