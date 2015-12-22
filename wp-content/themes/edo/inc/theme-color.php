<?php
if(!function_exists( 'edo_themne_color' )){
	function edo_themne_color(){
		$main_color = edo_option( 'kt_theme_color', '#5a88ca' );
		$kt_theme_color_2 = edo_option('kt_theme_color_2','#f2d03b');
		$rgb_color = edo_hex2rgb($main_color);
		$css = <<<CSS
	/* Color Scheme */

	body a:hover,
	body .top-bar .top-bar-link.dot>li>a:before,
	body .block-category .categories>li>a:before,
	body .option3 .advanced-search .btn-search,
	body .option3 .wrap-block-cl .user-info .fa,
	body .option3 .wrap-block-cl .user-info .dropdown-menu .fa,
	body .option4 .advanced-search .btn-search,
	body .option4 .wrap-block-cl .user-info .fa,
	body .option4 .wrap-block-cl .user-info .dropdown-menu .fa,
	body .widget_product_categories .children>li>a:before,
	body .block-popular-cat .sub-categories li a:before,
	.header.style5 .advanced-search .btn-search,
	.header.style5 .user-info .main-link,
	.box-product-style8 .nav-tab li.active a,
	.box-product-style8 .nav-tab li:hover a,
	.box-product-style8 .box-link a,
	.product.style5 .btn-quick-view:before,
	.lasttest-blogs .item-blog .title a:hover,
	.lasttest-blogs .item-blog .readmore{

		color: {$main_color};
	}

	body #category-select-menu .ui-state-focus,
	body .main-bg,
	body .block-wrap-cart .iner-block-cart>a:after,
	body .main-menu .navbar-nav>li>a:hover, 
	body .main-menu .navbar-nav>li.active>a, 
	body .main-menu .navbar-nav>li>a:focus,
	body .main-menu .navbar-nav>li>a:visited,
	body .main-menu .dropdown-menu>li:hover,
	body .button-radius .icon:before,
	body .megamenu .widget_nav_menu ul>li:hover,
	body .block-category .nav-tab>li>a:hover, 
	body .block-category .nav-tab>li.active>a,
	body .block-category .categories>li>a>.text:before,
	body .block-category .categories>li>a>.text:before,
	body .block-category .categories>li>a:hover>.text,
	body .owl-carousel .owl-next:hover,
	body .owl-carousel .owl-prev:hover,
	body .footer-block-box .block-input-box .block-button, 
	body .footer-block-box .block-input-box .mailchimp-submit,
	body .block-social .list-social li>a:hover,
	body .scroll_top,
	body .block-header-right .item.item-cart,
	body .block-vertical-menu .vertical-head,
	body .block-tabs .nav-tab li a:hover, 
	body .block-tabs .nav-tab li.active a,
	body .block-hot-deals2 .nav-tab li.active a:before, 
	body .block-hot-deals2 .nav-tab li:hover a:before,
	body .option3 .wrap-block-cl .dropdown-menu>li>a:hover,
	body .option3 .tab-cat-products .sub-cat,
	body .block-top-review .list-product .product:hover .order, 
	body .block-top-review .list-product .product.active .order,
	body .option4 .wrap-block-cl .dropdown-menu>li>a:hover,
	body .option4 .block-wrap-cart .iner-block-cart>a:after,
	body .option4 .products .btn-quick-view,
	body .option3 .products .btn-quick-view,
	body .display-product-option li.selected span, 
	body .display-product-option li:hover span,
	body .products .btn-quick-view,
	body .woocommerce #respond input#submit, 
	body .woocommerce a.button, 
	body .woocommerce button.button, 
	body .woocommerce input.button, 
	body .woocommerce #respond input#submit.alt, 
	body .woocommerce a.button.alt, 
	body .woocommerce button.button.alt, 
	body .woocommerce input.button.alt,
	body .woocommerce #respond input#submit:hover, 
	body .woocommerce a.button:hover, 
	body .woocommerce button.button:hover, 
	body .woocommerce input.button:hover, 
	body .woocommerce #respond input#submit.alt:hover, 
	body .woocommerce a.button.alt:hover, 
	body .woocommerce button.button.alt:hover, 
	body .woocommerce input.button.alt:hover,
	body .tagcloud a:hover,
	body .nav-links>a:hover, 
	body .nav-links .current,
	body.woocommerce div.product form.cart .single_add_to_cart_button:before,
	body.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
	body.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content,
	body.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover, 
	body.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
	body.woocommerce #respond input#submit:hover, 
	body.woocommerce a.button:hover, 
	body.woocommerce button.button:hover, 
	body.woocommerce input.button:hover, 
	body.woocommerce #respond input#submit.alt:hover, 
	body.woocommerce a.button.alt:hover, 
	body.woocommerce button.button.alt:hover, 
	body.woocommerce input.button.alt:hover,
	body.woocommerce #review_form #respond .form-submit input,
	body input[type="submit"], button,
	body.woocommerce .wishlist_table td.product-add-to-cart .add_to_cart_button:before,
	body .block-category-list a:hover,
	.header.style5 .block-wrap-cart,
	body .button,
	.header.style6 .main-menu,
	.product.style5 .yith-wcwl-add-button a:hover,
	.product.style5 .yith-wcwl-wishlistaddedbrowse a:hover,
	.product.style5 .yith-wcwl-wishlistexistsbrowse a:hover,
	.product.style5 .compare.button:hover,
	.product.style5 .compare:hover
	{
		background-color: {$main_color};
	}

	body .block-category .nav-tab>li>a:hover, 
	body .block-category .nav-tab>li.active>a,
	body .owl-carousel .owl-next:hover,
	body .owl-carousel .owl-prev:hover,
	body .block-social .list-social li>a:hover,
	body .block-header-right .item .icon,
	body .block-hot-deals2 .nav-tab li.active a:before, 
	body .block-hot-deals2 .nav-tab li:hover a:before,
	body .option3 .main-menu .navbar-nav>li>a:hover, 
	body .option3 .main-menu .navbar-nav>li.active>a, 
	body .option3 .main-menu .navbar-nav>li>a:focus,
	body .option3 .main-menu .navbar-nav>li>a:visited,
	body .block3 .block-head .nav-tab.tab-category li.active, 
	body .block3 .block-head .nav-tab.tab-category li:hover,
	body .option4 .block3 .block-head .nav-tab.default li:hover>a, 
	body .option4 .block3 .block-head .nav-tab.default li.active>a,
	body .option3 .block3 .block-head .nav-tab.default li:hover>a, 
	body .option3 .block3 .block-head .nav-tab.default li.active>a,
	body.woocommerce #content div.product div.thumbnails a:hover img, 
	body.woocommerce div.product div.thumbnails a:hover img, 
	body.woocommerce-page #content div.product div.thumbnails a:hover img, 
	body.woocommerce-page div.product div.thumbnails a:hover img,
	.product.style5 .yith-wcwl-add-button a:hover,
	.product.style5 .yith-wcwl-wishlistaddedbrowse a:hover,
	.product.style5 .yith-wcwl-wishlistexistsbrowse a:hover,
	.product.style5 .compare.button:hover,
	.product.style5 .compare:hover{
		border-color: {$main_color};
	}
	body .block-category .categories>li>a>.text:after{
		 border-left: 16px solid {$main_color};
	}
	body .option3 .block-vertical-menu .vertical-head,
	body .option3 .block .block-head,
	body .block3 .block-head .block-title,
	body .option4 .block-vertical-menu .vertical-head{
		border-top: 5px solid {$main_color};
	}

	body .option4 .block3 .block-head{
		    border-top: 2px solid {$main_color};
	}
	body .block-categories .sub-cat{
		background: rgba({$rgb_color['red']},{$rgb_color['green']},{$rgb_color['blue']}, 0.9);
	}
	body .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
	body .woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content{
		background: {$main_color};
	}

	.header.style6 .advanced-search .btn-search,
	.header.style6 .hotline .icon,
	.header.style6 .block-wrap-cart .iner-block-cart>a:after,
	.edo_icon:hover .icon,
	.product.style6 .btn-add-cart
	{
		background-color: {$kt_theme_color_2};
	}
	.edo_icon:hover .icon{
		border-color: {$kt_theme_color_2};
	}
	.edo_icon .icon,
	.edo_icon:hover .title{
		color: {$kt_theme_color_2};
	}
CSS;
		?>
		<style id="edo-theme-color" type="text/css">
	        <?php echo apply_filters( 'edo_customize_css', $css );?>
	    </style>
		<?php
	}
}

add_action( 'wp_enqueue_scripts', 'edo_themne_color' );