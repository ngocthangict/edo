<!-- header -->
	<header id="header" class="option3">
		<div class="container">
			<!-- main header -->
			<div class="row">
				<div class="main-header">
					<div class="row">
						<div class="col-sm-12 col-md-2 col-lg-2">
							<div class="logo">
								<?php echo edo_get_logo();?>
							</div>
						</div>
						<?php if(edo_is_wpml()):?>
						<div class="col-sm-12 col-md-6 col-lg-7">
						<?php else:?>
							<div class="col-sm-12 col-md-6 col-lg-8">
						<?php endif;?>
							<?php do_action( 'edo_search_form_template' ) ?>
						</div>
						<?php if(edo_is_wpml()):?>
						<div class="col-sm-7 col-md-4 col-lg-3">
						<?php else:?>
							<div class="col-sm-7 col-md-4 col-lg-2">
						<?php endif;?>
							<div class="wrap-block-cl">
								<div class="inner-cl box-radius">
									<div class="dropdown user-info <?php if(!edo_is_wpml()) echo esc_attr( 'not-language' );?>">
									  <a class="main-link" data-toggle="dropdown" role="button"><i class="fa fa-user"></i> <?php _e( 'My account', 'edo' );?></a>
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
								</div>
							</div>
						</div>
						<div class="col-sm-5 cart-mobile">
							<?php do_action( 'edo_mini_cart' ); ?>
						</div>
					</div>
				</div>
			</div>
			<!-- ./main header -->
		</div>
		<div class="container">
			<div class="row">
				<!-- main menu-->
				<div class="main-menu">
					<div class="container">
						<div class="row">
							<nav class="navbar" id="main-menu">
		                        <div class="container-fluid">
		                            <div class="navbar-header">
		                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		                                    <i class="fa fa-bars"></i>
		                                </button>
		                                <a class="navbar-brand" href="#">MENU</a>
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
		                                <ul class="nav navbar-nav navbar-right">
								            <li>
								            	<div class="block-wrap-cart">
													<?php do_action( 'edo_mini_cart' ); ?>
												</div>
								            </li>
							            </ul>
		                            </div><!--/.nav-collapse -->
		                        </div>
		                    </nav>
						</div>
					</div>
				</div>
				<!-- ./main menu-->
			</div>
		</div>
	</header>
	<!-- ./header -->