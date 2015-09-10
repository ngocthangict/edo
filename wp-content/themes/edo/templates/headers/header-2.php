<!-- header -->
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
										<span class="line1">Call us:<br><strong>0904567823</strong></span>
									</a>
								</li>
								<li class="item">
									<a href="#">
										<span class="icon wish-list"></span>
										<span class="line1">Wish<br><strong>List</strong></span>
									</a>
								</li>
								<li class="item">
									<a href="#">
										<span class="icon login"></span>
										<span class="line1">Login<br><strong>Facebook  Twitter</strong></span>
									</a>
								</li>
								<li class="item">
									<a href="#">
										<span class="icon checkout"></span>
										<span class="line1">Checkout<br><strong>Order</strong></span>
									</a>
								</li>
								<li class="item item-cart block-wrap-cart">
									<a href="cart.html">
										<span class="icon cart"></span>
										<span class="line1">Shopping Cart<br><strong>$0.00</strong></span>
									</a>
                                    <div class="block-mini-cart">
                                        <div class="mini-cart-content">
                                        <h5 class="mini-cart-head">2 Items in my cart</h5>
                                        <div class="mini-cart-list">
                                            <ul>
                                                <li class="product-info">
                                                    <div class="p-left">
                                                        <a href="#" class="remove_link"></a>
                                                        <a href="#">
                                                        <img class="img-responsive" src="data/p1.jpg" alt="Product">
                                                        </a>
                                                    </div>
                                                    <div class="p-right">
                                                        <p class="p-name">Donec Ac Tempus</p>
                                                        <p class="product-price">$139.98</p>
                                                        <p>Qty: 1</p>
                                                    </div>
                                                </li>
                                                <li class="product-info">
                                                    <div class="p-left">
                                                        <a href="#" class="remove_link"></a>
                                                        <a href="#">
                                                        <img class="img-responsive" src="data/p2.jpg" alt="Product">
                                                        </a>
                                                    </div>
                                                    <div class="p-right">
                                                        <p class="p-name">Donec Ac Tempus</p>
                                                        <p class="product-price">$139.98</p>
                                                        <p>Qty: 1</p>
                                                    </div>
                                                </li>
                                            </ul>
                                            </div>
                                            <div class="toal-cart">
                                                <span>Total</span>
                                                <span class="toal-price pull-right">$279.96</span>
                                            </div>
                                            <div class="cart-buttons">
                                                <a href="#" class="button-radius btn-check-out">Checkout<span class="icon"></span></a>
                                            </div>
                                        </div>
                                    </div>
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
                        </div><!--/.nav-collapse -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- ./main menu-->
</header>
<!-- ./header -->