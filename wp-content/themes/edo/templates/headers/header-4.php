<!-- header -->
<header id="header" class="option4 header-style4">
	<div class="container">
		<!-- main header -->
		<div class="row">
			<div class="main-header">
				<div class="row">
					<div class="col-sm-12 col-md-3 col-lg-3">
						<div class="logo">
							<?php echo edo_get_logo();?>
						</div>
						<div class="shop-menu">
							<div class="icon">
								<span><?php _e( 'Shop', 'edo');?></span>
							</div>
							<!-- Block vertical-menu -->
							<div class="block block-vertical-menu">
								<div class="vertical-head">
									<h5 class="vertical-title"><?php _e( 'Categories', 'edo');?></h5>
								</div>
								<div class="vertical-menu-content">
			                        <?php
			                        wp_nav_menu( array(
			                            'menu'              => 'vertical-menu',
			                            'theme_location'    => 'vertical-menu',
			                            'depth'             => 2,
			                            'container'         => '',
			                            'container_class'   => '',
			                            'container_id'      => '',
			                            'menu_class'        => 'vertical-menu-list',
			                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			                            'walker'            => new wp_bootstrap_navwalker())
			                        );
			                        ?><!--/.nav-collapse -->
			                    </div>
							</div>
							<!-- ./Block vertical-menu -->
						</div>
					</div>
					<div class="col-sm-6 col-md-5 col-lg-6">
						<?php do_action( 'edo_search_form_template' ) ?>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-3">
						<div class="wrap-block-cl">
							<div class="inner-cl box-radius">
								<div class="dropdown user-info <?php if(!edo_is_wpml()) echo esc_attr( 'not-language' );?>">
								  <a class="main-link" data-toggle="dropdown" role="button"><i class="fa fa-user"></i> <?php _e( 'My Account', 'edo' ) ?></a>
								  <ul class="dropdown-menu">
								  		<?php if( edo_is_wc() && is_user_logged_in() ): ?>
							                <?php $url = get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>
							                <li><a href="<?php echo $url; ?>"><i class="fa fa-user"></i> <?php _e( 'My Account', 'edo' ) ?></a></li>
							            <?php endif; ?>
							            <?php if( edo_is_wc() && edo_is_wl() && is_user_logged_in() ):
							                $wishlist_url = YITH_WCWL()->get_wishlist_url(); ?>
							                <li><a href="<?php echo $wishlist_url; ?>"><i class="fa fa-heart-o"></i> <?php _e( 'My Wishlist', 'edo' ) ?></a></li>
							            <?php endif; ?>
							            <?php if( edo_is_wc() ): ?>
							                <?php $check_out_url = WC()->cart->get_cart_url(); ?>
							                <li><a href="<?php echo $check_out_url; ?>"><i class="fa fa-arrow-circle-right"></i> <?php _e( 'Checkout', 'edo' ); ?></a></li>
							            <?php endif; ?>
							            <?php if ( is_user_logged_in() ):  ?>
							                <li><a href="<?php echo wp_logout_url(); ?>"><i class="fa fa-sign-out"></i> <?php _e('Logout', 'edo') ?></a></li>
							            <?php else: ?>
							                <li><a href="<?php echo wp_login_url(); ?>"><i class="fa fa-sign-in"></i> <?php _e('Login', 'edo') ?></a></li>
							            <?php endif; ?>
								  </ul>
								</div>
								<?php do_action( 'edo_header_language' ) ;?>
								<div class="block-wrap-cart <?php if(!edo_is_wpml()) echo esc_attr( 'not-language' );?>">
									<?php do_action( 'edo_mini_cart' ); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ./main header -->
	</div>
</header>
<?php 
global $custom_css;

if( $custom_css && is_array( $custom_css ) ){
    echo '<style id="menu-settings-inline-css" type="text/css">';
    foreach( $custom_css as $css ){
        if( is_array( $css ) && isset( $css[ 'item' ] ) && isset( $css[ 'color' ] ) && $css[ 'item' ] && $css[ 'color' ] ){
            echo ' .'.$css[ 'item' ].' a:hover{ color: '. $css[ 'color' ] .' }';
        }
    }
    echo '</style>';
}
?>
<!-- ./header -->