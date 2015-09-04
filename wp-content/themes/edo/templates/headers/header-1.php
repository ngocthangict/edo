<header id="header">
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
                ?><!--/.nav-collapse -->
                <?php do_action( 'edo_menu_header_top' ); ?>
			</div>
		</div>
	</div>
	<!-- Top bar -->
	<div class="container">
		<!-- box header -->
		<div class="row">
			<div class="box-header">
				<div class="col-sm-12 col-md-12 col-lg-3"></div>
				<div class="block-wrap-search col-sm-6 col-md-6 col-lg-5">
					<?php do_action( 'edo_search_form_template' ) ?>
				</div>
				<div class="wrap-block-cl col-sm-3 col-md-3 col-lg-2">
					<div class="inner-cl box-radius">
						<?php do_action( 'edo_header_language' ) ;?>
					</div>
				</div>
                <?php if( edo_is_wc() ): ?>
				    <div class="block-wrap-cart col-sm-3 col-md-3 col-lg-2">
                        <?php do_action( 'edo_mini_cart' ); ?>
				    </div>
                <?php endif; ?>
			</div>
		</div>
		<!-- ./box header -->
		<!-- main header -->
		<div class="row">
			<div class="main-header">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="logo">
							<?php echo edo_get_logo();?>
						</div>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 main-header-banner">
						<div class="herader-banner">
							<ul class="list-banner">
								<li><div class="banner1"><a href="#"><img src="data/option1/banner1.png" alt="Banner"></a></div></li>
								<li><div class="banner1"><a href="#"><img src="data/option1/banner2.png" alt="Banner"></a></div></li>
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
                                'depth'             => 1,
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
</header>