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

    $kt_subscribe_title = edo_option('kt_subscribe_title','');
    $kt_subscribe_subtitle = edo_option('kt_subscribe_subtitle','');
    $kt_subscribe_description = edo_option('kt_subscribe_description','');
    $kt_subscribe_success_message = edo_option('kt_subscribe_success_message','');
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
									<div class="block-title-text text-sm"><?php _e( 'FIND A', 'edo' );?></div>
									<div class="block-title-text text-lg"><?php _e( 'edo store', 'edo' );?></div>
								</div>
							</div>
							<div class="block-inner">
								<div class="block-info clearfix">
									<?php _e( 'Enter your zip code, city or country to find the closest EDO Store near you!', 'edo');?>
								</div>
								<div class="block-input-box box-radius clearfix find-store-form">
									<input type="text" class="input-box-text" placeholder="Zip code, City, Country">
									<button id="find-store-button" class="block-button main-bg"><?php _e( 'Go', 'edo');?></button>
									<div class="find-store-messages"></div>
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
									<div class="block-title-text text-sm"><?php echo $kt_subscribe_title;?></div>
									<div class="block-title-text text-lg"><?php echo $kt_subscribe_subtitle;?></div>
								</div>
							</div>
							<div class="block-inner">
								<div class="block-info clearfix">
									<?php echo $kt_subscribe_description;?>
								</div>
								<div class="block-input-box box-radius clearfix">
									<?php echo do_shortcode( '[mailchimp opt_in="yes" title="" text_before=""]'.$kt_subscribe_success_message.'[/mailchimp]' );?>
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
                        $payment_logo = edo_option('kt_payment_logo','');
                        if($payment_logo != ""){
                        	?>
                        	<img src="<?php echo esc_url( $payment_logo );?>" alt="Payment Logo">
                        	<?php
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
