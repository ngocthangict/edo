<header id="header" class="header style5">
	<!-- Top bar -->
	<div class="top-bar">
		<div class="container">
			<div class="row">
                <?php
                wp_nav_menu( array(
                    'menu'              => 'topbar-menu',
                    'theme_location'    => 'topbar-menu',
                    'depth'             => 1,
                    'container'         => '',
                    'container_class'   => '',
                    'container_id'      => '',
                    'menu_class'        => 'top-bar-link top-bar-link-left',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
                );
                wp_nav_menu( array(
                    'menu'              => 'topbar-menu-right',
                    'theme_location'    => 'topbar-menu-right',
                    'depth'             => 1,
                    'container'         => '',
                    'container_class'   => '',
                    'container_id'      => '',
                    'menu_class'        => 'top-bar-link top-bar-link-right',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
                );
                ?>
			</div>
		</div>
	</div>
	<!-- Top bar -->
	<div class="container">

		<!-- box header -->
		<div class="row">
			<div class="row">
				<div class="main-header">
					<div class="col-sm-12 col-md-5">
						<div class="logo">
							<?php echo edo_get_logo();?>
						</div>
					</div>
					<div class="col-sm-12 col-md-7">
						<div class="box-control-header">
							<?php do_action( 'edo_search_form_template' ) ?>
							<div class="dropdown user-info <?php if(!edo_is_wpml()) echo esc_attr( 'not-language' );?>">
							  <a class="main-link" data-toggle="dropdown" role="button"><i class="fa fa-user"></i></a>
							  <ul class="dropdown-menu">
							  		<?php if( edo_is_wc() && is_user_logged_in() ): ?>
						                <?php $url = get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>
						                <li><a href="<?php echo esc_url( $url ) ; ?>"><i class="fa fa-user"></i> <?php esc_html_e( 'My Account', 'edo' ) ?></a></li>
						            <?php endif; ?>
						            <?php if( edo_is_wc() && edo_is_wl() && is_user_logged_in() ):
						                $wishlist_url = YITH_WCWL()->get_wishlist_url(); ?>
						                <li><a href="<?php echo esc_url( $wishlist_url ) ; ?>"><i class="fa fa-heart-o"></i> <?php esc_html_e( 'My Wishlist', 'edo' ) ?></a></li>
						            <?php endif; ?>
						            <?php if( edo_is_wc() ): ?>
						                <?php $check_out_url = WC()->cart->get_cart_url(); ?>
						                <li><a href="<?php echo esc_url( $check_out_url ) ; ?>"><i class="fa fa-arrow-circle-right"></i> <?php esc_html_e( 'Checkout', 'edo' ); ?></a></li>
						            <?php endif; ?>
						            <?php if ( is_user_logged_in() ):  ?>
						                <li><a href="<?php echo wp_logout_url(); ?>"><i class="fa fa-sign-out"></i> <?php esc_html_e('Logout', 'edo') ?></a></li>
						            <?php else: ?>
						                <li><a href="<?php echo wp_login_url(); ?>"><i class="fa fa-sign-in"></i> <?php esc_html_e('Login', 'edo') ?></a></li>
						            <?php endif; ?>
							  </ul>
							</div>
							<?php if(edo_is_wpml()): ?>
							<div class="inner-cl">
								<?php edo_get_wpml() ;?>
							</div>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ./box header -->
	</div>
	<!-- main menu-->
	<div class="main-menu">
		<div class="container">
			<div class="row">
				<div class="main-menu-wapper">
				<nav class="navbar" id="main-menu">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand" href="#"><?php esc_html_e( 'MENU', 'edo' ) ?></a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <?php
                            wp_nav_menu( array(
                                'menu'              => 'primary-menu',
                                'theme_location'    => 'primary-menu',
                                'depth'             => 2,
                                'container'         => '',
                                'container_class'   => '',
                                'container_id'      => '',
                                'menu_class'        => 'nav navbar-nav',
                                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                'walker'            => new wp_bootstrap_navwalker())
                            );
                            ?><!--/.nav-collapse -->
                        </div><!--/.nav-collapse -->
                    </div>
                </nav> 
                <?php if( edo_is_wc() ):?>
                <div class="block-wrap-cart">
					<?php do_action( 'edo_mini_cart' ); ?>
				</div>
				<?php endif;?>
				</div>
			</div>
		</div>
	</div>
	<!-- ./main menu-->
</header>
<!-- ./header -->