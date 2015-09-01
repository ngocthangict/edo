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
				<ul class="top-bar-link top-bar-link-right dot">
					<li><a href="login.html">My Account</a></li>
					<li><a href="wishlist.html">My Wishlist</a></li>
					<li><a href="checkout.html">Checkout</a></li>
					<li><a href="login.html">Login</a></li>
					<li><a href="compare.html">Compare</a></li>
				</ul>
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
					<div class="advanced-search box-radius">
						<form class="form-inline">
							<div class="form-group search-category">
								<select id="category-select" class="search-category-select">
									<option value="1">All Categories</option>
									<option value="2">Men</option>
									<option value="3">Women</option>
								</select>
							</div>
							<div class="form-group search-input">
								<input type="text" placeholder="What are you looking for?">
							</div>
							<button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
						</form>
					</div>
				</div>
				<div class="wrap-block-cl col-sm-3 col-md-3 col-lg-2">
					<div class="inner-cl box-radius">
						<div class="dropdown language">
						  <a data-toggle="dropdown" role="button"><img src="data/en.jpg" alt="languae1"></a>
						  <ul class="dropdown-menu">
						    	<li><a href="#"><img src="data/en.jpg" alt="languae2">English</a></li>
						    	<li><a href="#"><img src="data/fr.jpg" alt="languae3">French</a></li>
						  </ul>
						</div>
						<div class="dropdown currency">
						  <a data-toggle="dropdown" role="button">USD</a>
						  <ul class="dropdown-menu">
						    	<li><a href="#">$ USD</a></li>
						    	<li><a href="#">€ EUR</a></li>
						  </ul>
						</div>
					</div>
				</div>
				<div class="block-wrap-cart col-sm-3 col-md-3 col-lg-2">
					<div class="iner-block-cart box-radius">
						<a href="cart.html">
							<span class="total">$459.00</span>
						</a>
					</div>
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
                                <a href="checkout.html" class="button-radius btn-check-out">Checkout<span class="icon"></span></a>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
		<!-- ./box header -->
		<!-- main header -->
		<div class="row">
			<div class="main-header">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="logo">
							<?php echo kt_get_logo();?>
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
                            <a class="navbar-brand" href="#">MENU</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="index.html">Home</a></li>
                                <li class="dropdown">
                                    <a href="category-grid.html" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="data/icon_sale.png" alt="Category status">
                                    Fashion</a>
                                    <ul class="dropdown-menu mega_dropdown" role="menu" style="width: 850px;">
                                        <li class="block-container col-sm-3 border">
                                        	<div class="img_container banner-hover">
                                        		<a href="#">
                                                    <img class="img-responsive" src="data/banner/b12.png" alt="sport">
                                                </a>
                                        	</div>
                                        </li>
                                         <li class="block-container col-sm-3">
                                            <ul class="block-megamenu-link">
                                                <li class="link_container group_header">
                                                    <a href="#">TOP FASHION</a>
                                                </li>
                                                <li class="link_container"><a href="#">Bath & Body</a></li>
                                                <li class="link_container"><a href="#">Makeup</a></li>
                                                <li class="link_container"><a href="#">Creams & Lotions</a></li>
                                                <li class="link_container"><a href="#">Sunscreens</a></li>
                                                <li class="link_container"><a href="#">Face Packs/Facial</a></li>
                                                <li class="link_container"><a href="#">Spa & Body grances</a></li>
                                                <li class="link_container"><a href="#">Women's Hygiene</a></li>
                                            </ul>
                                        </li>
                                         <li class="block-container col-sm-3">
                                            <ul class="block-megamenu-text">
                                                <li class="link_container group_header">
                                                    <a href="#">TOP FASHION</a>
                                                </li>
                                                <li class="text_container">
                                                	<p>Aenean sollicitudin, remquis bibendum auctor, nisi elit consequat ipsum, necsagittis sem nibh elit.</p>
                                                	<a href="#" class="button-radius">Learn more<span class="icon"></span></a>
                                                </li>
                                            </ul>
                                        </li>
                                         <li class="block-container col-sm-3">
                                            <ul class="block-megamenu-img">
                                                <li class="img_container banner-hover">
                                                    <a href="#">
                                                        <img class="img-responsive" src="data/banner/b13.png" alt="sport">
                                                    </a>
                                                </li>
                                                <li class="img_container banner-hover">
                                                    <a href="#">
                                                        <img class="img-responsive" src="data/banner/b14.png" alt="sport">
                                                    </a>
                                                </li>
                                                <li class="img_container banner-hover">
                                                    <a href="#">
                                                        <img class="img-responsive" src="data/banner/b15.png" alt="sport">
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="category-grid2.html" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="data/icon_hot.png" alt="Category status">
                                    Mobile & Tablets
                                    </a>
                                    <ul class="dropdown-menu mega_dropdown" role="menu" style="width: 900px;">
                                        <li class="block-container col-sm-3 border">
                                        	<ul class="block-megamenu-link">
                                                <li class="link_container group_header">
                                                    <a href="#">TOP FASHION</a>
                                                </li>
                                                <li class="link_container"><a href="#">Bath & Body</a></li>
                                                <li class="link_container"><a href="#">Makeup</a></li>
                                                <li class="link_container"><a href="#">Creams & Lotions</a></li>
                                                <li class="link_container"><a href="#">Sunscreens</a></li>
                                                <li class="link_container"><a href="#">Face Packs/Facial</a></li>
                                                <li class="link_container"><a href="#">Spa & Body grances</a></li>
                                                <li class="link_container"><a href="#">Women's Hygiene</a></li>
                                            </ul>
                                        </li>
                                         <li class="block-container col-sm-3 border">
                                            <ul class="block-megamenu-link">
                                                <li class="link_container group_header">
                                                    <a href="#">TOP FASHION</a>
                                                </li>
                                                <li class="link_container"><a href="#">Bath & Body</a></li>
                                                <li class="link_container"><a href="#">Makeup</a></li>
                                                <li class="link_container"><a href="#">Creams & Lotions</a></li>
                                                <li class="link_container"><a href="#">Sunscreens</a></li>
                                                <li class="link_container"><a href="#">Face Packs/Facial</a></li>
                                                <li class="link_container"><a href="#">Spa & Body grances</a></li>
                                                <li class="link_container"><a href="#">Women's Hygiene</a></li>
                                            </ul>
                                        </li>
                                         <li class="block-container col-sm-3 border">
                                        	<ul class="block-megamenu-link">
                                                <li class="link_container group_header">
                                                    <a href="#">TOP FASHION</a>
                                                </li>
                                                <li class="link_container"><a href="#">Bath & Body</a></li>
                                                <li class="link_container"><a href="#">Makeup</a></li>
                                                <li class="link_container"><a href="#">Creams & Lotions</a></li>
                                                <li class="link_container"><a href="#">Sunscreens</a></li>
                                                <li class="link_container"><a href="#">Face Packs/Facial</a></li>
                                                <li class="link_container"><a href="#">Spa & Body grances</a></li>
                                                <li class="link_container"><a href="#">Women's Hygiene</a></li>
                                            </ul>
                                        </li>
                                         <li class="block-container col-sm-3">
                                        	<ul class="block-megamenu-link">
                                                <li class="link_container group_header">
                                                    <a href="#">TOP FASHION</a>
                                                </li>
                                                <li class="link_container"><a href="#">Bath & Body</a></li>
                                                <li class="link_container"><a href="#">Makeup</a></li>
                                                <li class="link_container"><a href="#">Creams & Lotions</a></li>
                                                <li class="link_container"><a href="#">Sunscreens</a></li>
                                                <li class="link_container"><a href="#">Face Packs/Facial</a></li>
                                                <li class="link_container"><a href="#">Spa & Body grances</a></li>
                                                <li class="link_container"><a href="#">Women's Hygiene</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="category-list.html" class="dropdown-toggle" data-toggle="dropdown">
									<img src="data/icon_new.png" alt="Category status">
                                    Foods</a>
                                       <ul class="dropdown-menu mega_dropdown" role="menu" style="width: 900px;">
                                        <li class="block-container col-sm-3">
                                        	<div class="img_container banner-hover">
                                        		<a href="#">
                                                    <img class="img-responsive" src="data/banner/b16.png" alt="sport">
                                                </a>
                                        	</div>
                                        </li>
                                         <li class="block-container col-sm-3 border">
                                            <ul class="block-megamenu-link">
                                                <li class="link_container group_header">
                                                    <a href="#">TOP FASHION</a>
                                                </li>
                                                <li class="link_container"><a href="#">Bath & Body</a></li>
                                                <li class="link_container"><a href="#">Makeup</a></li>
                                                <li class="link_container"><a href="#">Creams & Lotions</a></li>
                                                <li class="link_container"><a href="#">Sunscreens</a></li>
                                                <li class="link_container"><a href="#">Face Packs/Facial</a></li>
                                                <li class="link_container"><a href="#">Spa & Body grances</a></li>
                                                <li class="link_container"><a href="#">Women's Hygiene</a></li>
                                            </ul>
                                        </li>
                                         <li class="block-container col-sm-3">
                                        	<div class="img_container banner-hover">
                                        		<a href="#">
                                                    <img class="img-responsive" src="data/banner/b17.png" alt="sport">
                                                </a>
                                        	</div>
                                        </li>
                                         <li class="block-container col-sm-3">
                                        	<ul class="block-megamenu-link">
                                                <li class="link_container group_header">
                                                    <a href="#">TOP FASHION</a>
                                                </li>
                                                <li class="link_container"><a href="#">Bath & Body</a></li>
                                                <li class="link_container"><a href="#">Makeup</a></li>
                                                <li class="link_container"><a href="#">Creams & Lotions</a></li>
                                                <li class="link_container"><a href="#">Sunscreens</a></li>
                                                <li class="link_container"><a href="#">Face Packs/Facial</a></li>
                                                <li class="link_container"><a href="#">Spa & Body grances</a></li>
                                                <li class="link_container"><a href="#">Women's Hygiene</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="category-list2.html" class="dropdown-toggle" data-toggle="dropdown">Auto Accessories</a>
                                    <ul class="dropdown-menu mega_dropdown container-fluid">
                                        <li class="block-container">
                                            <ul class="block-megamenu-link">
                                                <li class="link_container"><a href="#">Mobile</a></li>
                                                <li class="link_container"><a href="#">Tablets</a></li>
                                                <li class="link_container"><a href="#">Laptop</a></li>
                                                <li class="link_container"><a href="#">Memory Cards</a></li>
                                                <li class="link_container"><a href="#">Accessories</a></li>
                                            </ul>
                                        </li>
                                    </ul> 
                                </li>
                                <li><a href="category-grid.html">Jewelry & Watches</a></li>
                                <li><a href="blog.html">Blog</a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                </nav>
			</div>
		</div>
	</div>
	<!-- ./main menu-->
</header>