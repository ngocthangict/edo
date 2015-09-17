<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package KuteTheme
 * @subpackage edo
 * @since edo 1.0
 */
?>
<?php 
    $hotline   = edo_get_info_hotline();
    $copyright = edo_get_info_copyrights();
    $social_icons = edo_get_socials();
?>
<!-- footer -->
<footer id="footer">
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="row">
					<div class="col-sm-12 col-md-4">
						<div class="block footer-block-box">
							<div class="block-head">
								<div class="block-title">
									<div class="block-icon">
										<img src="<?php echo THEME_URL . 'assets/' ?>images/location-icon.png" alt="store icon" />
									</div>
									<div class="block-title-text text-sm">FIND A</div>
									<div class="block-title-text text-lg">edo store</div>
								</div>
							</div>
							<div class="block-inner">
								<div class="block-info clearfix">
									Enter your zip code, city or country to find the closest EDO Store near you!
								</div>
								<div class="block-input-box box-radius clearfix">
									<input type="text" class="input-box-text" placeholder="Zip code, City, Country">
									<button class="block-button main-bg">Go</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-4">
						<div class="block footer-block-box">
							<div class="block-head">
								<div class="block-title">
									<div class="block-icon">
										<img src="<?php echo THEME_URL . 'assets/' ?>images/email-icon.png" alt="store icon">
									</div>
									<div class="block-title-text text-sm">SUBSCRIBE TO</div>
									<div class="block-title-text text-lg">edo shop EMAILS</div>
								</div>
							</div>
							<div class="block-inner">
								<div class="block-info clearfix">
									Lorem Ipsum is simply dummy text of the printing and typesetting industry
								</div>
								<div class="block-input-box box-radius clearfix">
									<input type="text" class="input-box-text" placeholder="Email address">
									<button class="block-button main-bg">Go</button>
								</div>
							</div>
						</div>
					</div>
                    <?php 
                    $args = array(
                          'post_type'      => 'partner',
                          'orderby'        => 'date',
                          'order'          => 'desc',
                          'post_status'    => 'publish'
                    );
                    $partners = new WP_Query( $args );
                    
                    if( $partners->have_posts() ):
                    ?>
                    <?php ob_start(); $i = 0; ?>
                    <?php while ( $partners->have_posts() ): $partners->the_post(); ?>
                        <?php if( has_post_thumbnail() ):?>
                            <li class="partner">
                                <a target="_blank" href="<?php the_permalink() ?>">
                                    <?php the_post_thumbnail();?>
                                </a>
                            </li>
                            <?php $i ++ ; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                    
                    <?php 
                        $html = ob_get_clean(); 
                        $loop = "false";
                        if( $i > 1 ){
                            $loop = "true";
                        }
                    ?>
					<div class="col-sm-12 col-md-4">
						<div class="block footer-block-box">
							<div class="block-head">
								<div class="block-title">
									<div class="block-icon">
										<img src="<?php echo THEME_URL . 'assets/' ?>images/partners-icon.png" alt="store icon" />
									</div>
									<div class="block-title-text text-sm"><?php _e( 'our', 'edo' ) ?></div>
									<div class="block-title-text text-lg"><?php _e( 'partners', 'edo' ) ?></div>
								</div>
							</div>
							<div class="block-inner">
								<div class="block-owl">
									<ul class="kt-owl-carousel list-partners" data-nav="true" data-autoplay="true" data-loop="<?php echo $loop; ?>" data-items="1">
                                        <?php echo $html; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); wp_reset_query(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-middle">
		<div class="container">
			<div class="row">
				<div class="row">
					<div class="col-md-2 col-sm-4 block-link-wapper">
						<div class="block-link">
							<?php
                                if(is_active_sidebar('footer-menu-1')){
                                    dynamic_sidebar('footer-menu-1');
                                }
                            ?>
						</div>
					</div>
					<div class="col-md-2 col-sm-4 block-link-wapper">
						<div class="block-link">
							<?php
                                if(is_active_sidebar('footer-menu-2')){
                                    dynamic_sidebar('footer-menu-2');
                                }
                            ?>
						</div>
					</div>
					<div class="col-md-2 col-sm-4 block-link-wapper">
						<div class="block-link">
							<?php
                                if(is_active_sidebar('footer-menu-3')){
                                    dynamic_sidebar('footer-menu-3');
                                }
                            ?>
						</div>
					</div>
					<div class="col-md-2 col-sm-4 block-link-wapper">
						<div class="block-link">
							<?php
                                if(is_active_sidebar('footer-menu-4')){
                                    dynamic_sidebar('footer-menu-4');
                                }
                            ?>
						</div>
					</div>
					<div class="col-md-2 col-sm-4 block-link-wapper">
						<div class="block-link">
							<?php
                                if(is_active_sidebar('footer-menu-5')){
                                    dynamic_sidebar('footer-menu-5');
                                }
                            ?>	
						</div>
					</div>
					<div class="col-md-2 col-sm-4 block-link-wapper">
						<div class="block-link footer-list-image">
                            <?php
                                if(is_active_sidebar('footer-menu-6')){
                                    dynamic_sidebar('footer-menu-6');
                                }
                            ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-social">
		<div class="container">
			<div class="row">
				<div class="block-social">
					<ul class="list-social">
						<?php echo $social_icons; ?>
					</ul>
				</div>
				<div class="block-payment">
					<?php
                        if(is_active_sidebar('footer-menu-7')){
                            dynamic_sidebar('footer-menu-7');
                        }
                    ?>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="block-coppyright">
					<?php echo esc_attr( $copyright ) ?>
				</div>
				<div class="block-shop-phone">
					<?php _e( 'Shop by phone', 'edo' ) ?> <strong><?php echo esc_attr( $hotline ) ?></strong>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- ./footer -->
<a href="#" class="scroll_top" title="Scroll to Top" style="display: block;">Scroll</a>
<?php wp_footer(); ?>

</body>
</html>
