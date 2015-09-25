<!-- header -->
<?php
$kt_phone = edo_option( 'kt_phone', '(0123) 456 789');
?>
<header id="header" class="option2">
	<div class="container">
		<!-- main header -->
		<div class="row">
			<div class="main-header">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="logo">
							<?php echo edo_get_logo();?>
						</div>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 main-header-banner">
						<div class="block block-header-right">
							<ul class="list-link">
								<li class="item">
									<a href="#">
										<span class="icon phone"></span>
										<span class="line1"><?php _e( 'Call us:', 'edo' ) ?><br /><strong><?php echo $kt_phone;?></strong></span>
									</a>
								</li>
								<?php if( function_exists( 'YITH_WCWL' ) && edo_is_wc() ):
							        $wishlist_url = YITH_WCWL()->get_wishlist_url(); ?>
							        <li class="item">
								        <a href="<?php echo esc_url( $wishlist_url ); ?>">
											<span class="icon wish-list"></span>
											<span class="line1"><?php _e( 'Wish' , 'edo' );?><br /><strong><?php _e('List' ,'edo'); ?></strong></span>
										</a>
									</li>
							    <?php endif; ?>
							    <?php if( edo_is_wc() ): ?>
								<li class="item">
									<?php 
									$url = get_permalink( get_option('woocommerce_myaccount_page_id') ); 
									$currentUser = wp_get_current_user();
									?>
									<a href="<?php echo esc_url( $url );?>">
										<span class="icon login"></span>
										<span class="line1">
										<?php if ( is_user_logged_in() ):  ?>
										<?php _e('Welcome' , 'edo');?>
										<b><?php echo $currentUser->display_name;?></b>
										<?php else:?>
											<?php _e('Login' , 'edo')?>
										<?php endif;?>
										<br /><strong><?php _e('My account' ,'edo');?></strong></span>
									</a>
								</li>
								<li class="item">
									<a href="<?php echo WC()->cart->get_cart_url(); ?>">
										<span class="icon checkout"></span>
										<span class="line1"><?php _e( 'Checkout', 'edo' ) ?><br /><strong><?php _e( 'Order', 'edo' ) ?></strong></span>
									</a>
								</li>
            				    <li class="item item-cart block-wrap-cart">
                                    <?php do_action( 'edo_mini_cart' ); ?>
            				    </li>
                                <?php endif; ?>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ./main header -->
	</div>
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
                            <a class="navbar-brand" href="#"><?php _e( 'MENU', 'edo' ) ?></a>
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
            </div>
        </div>
    </div>
    <!-- ./main menu-->
    <div class="container">
		<div class="row">
			<div class="row">
				<div class="col-sm-3 col-md-2">
					<!-- Block vertical-menu -->
					<div class="block-vertical-menu block-vertical-menu-style2">
						<div class="block block-vertical-inner">
							<div class="vertical-head">
								<h5 class="vertical-title"><?php _e( 'Categories', 'edo'); ?></h5>
							</div>
							<div class="vertical-menu-content">
							<?php
	                        wp_nav_menu( array(
	                            'menu'              => 'vertical-menu',
	                            'theme_location'    => 'vertical-menu',
	                            'depth'             => 2,
	                            'container'         => '',
	                            'container_class'   => '',
	                            'container_id'      => 'vertial-menu',
	                            'menu_class'        => 'vertical-menu-list',
	                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
	                            'walker'            => new wp_bootstrap_navwalker())
	                        );
	                        ?><!--/.nav-collapse -->
		                    </div>
						</div>
					</div>
					<!-- ./Block vertical-menu -->
				</div>
				<!-- block search -->
				<?php if(edo_is_wpml()): ?>
					<div class="col-sm-5 col-md-8">
				<?php else:?>
					<div class="col-sm-9 col-md-10">
				<?php endif;?>
				<?php do_action( 'edo_search_form_template' ) ?>
				</div>
				<!-- ./block search -->
				<!-- block cl-->
				<?php if(edo_is_wpml()): ?>
				<div class="col-sm-4 col-md-2 wrap-block-cl">
					<div class="inner-cl box-radius">
						<?php do_action( 'edo_header_language' ) ;?>
					</div>
				</div>
				<?php endif;?>
				<!-- ./block cl-->
			</div>
		</div>
	</div>
</header>
<!-- ./header -->
