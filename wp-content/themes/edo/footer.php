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
	$hotline                      = edo_get_info_hotline();
	$copyright                    = edo_get_info_copyrights();
	$social_icons                 = edo_get_socials();
	
	$kt_subscribe_title           = edo_option('kt_subscribe_title','');
	$kt_subscribe_subtitle        = edo_option('kt_subscribe_subtitle','');
	$kt_subscribe_description     = edo_option('kt_subscribe_description','');
	$kt_subscribe_success_message = edo_option('kt_subscribe_success_message','');
?>
<!-- footer -->
<footer id="footer">
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
						<?php echo edo_get_html( $social_icons ) ; ?>
					</ul>
				</div>
				<div class="block-payment">
					<?php
                        $payment_logo = edo_option('kt_payment_logo','');
                        if( $payment_logo != "" ){
                        	?>
                        	<img src="<?php echo esc_url( $payment_logo );?>" alt="<?php esc_attr_e( 'Payment Logo', 'edo' ) ?>" />
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
					<?php esc_html_e( 'Shop by phone', 'edo' ) ?> <strong><?php echo esc_attr( $hotline ) ?></strong>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- ./footer -->
<a href="#" class="scroll_top" title="<?php esc_attr_e( 'Scroll to Top', 'edo' ) ?>" style="display: block;"><?php esc_html_e( 'Scroll', 'edo' ) ?></a>
<?php wp_footer(); ?>

</body>
</html>
