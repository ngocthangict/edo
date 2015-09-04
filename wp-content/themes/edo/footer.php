<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package KuteTheme
 * @subpackage Kutethemes
 * @since Edo 1.0
 */
?>
<?php 
    $hotline   = edo_get_info_hotline();
    $copyright = edo_get_info_copyrights();
    $social_icons = edo_get_socials();
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
										<img src="data/location-icon.png" alt="store icon">
									</div>
									<div class="block-title-text text-sm">FIND A</div>
									<div class="block-title-text text-lg">edo store</div>
								</div>
							</div>
							<div class="block-inner">
								<div class="block-info clearfix">
									Enter your zip code, city or country to find the closest EDO Store near you!
								</div>
								<div class="block-input-box box-radius clearfix">
									<input type="text" class="input-box-text" placeholder="Zip code, City, Country">
									<button class="block-button">Go</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-4">
						<div class="block footer-block-box">
							<div class="block-head">
								<div class="block-title">
									<div class="block-icon">
										<img src="data/email-icon.png" alt="store icon">
									</div>
									<div class="block-title-text text-sm">SUBSCRIBE TO</div>
									<div class="block-title-text text-lg">edo shop EMAILS</div>
								</div>
							</div>
							<div class="block-inner">
								<div class="block-info clearfix">
									Lorem Ipsum is simply dummy text of the printing and typesetting industry
								</div>
								<div class="block-input-box box-radius clearfix">
									<input type="text" class="input-box-text" placeholder="Email address">
									<button class="block-button">Go</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-4">
						<div class="block footer-block-box">
							<div class="block-head">
								<div class="block-title">
									<div class="block-icon">
										<img src="data/partners-icon.png" alt="store icon">
									</div>
									<div class="block-title-text text-sm">our</div>
									<div class="block-title-text text-lg">partners</div>
								</div>
							</div>
							<div class="block-inner">
								<div class="block-owl">
									<ul class="kt-owl-carousel list-partners" data-nav="true" data-autoplay="true" data-loop="true" data-items="1">
										<li class="partner"><a href="#"><img src="data/partner1.jpg" alt="partner"></a></li>
										<li class="partner"><a href="#"><img src="data/partner2.jpg" alt="partner"></a></li>
										<li class="partner"><a href="#"><img src="data/partner3.jpg" alt="partner"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
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
							<ul class="list-link">
								<li class="head"><a href="#">Buyer Central</a></li>
								<li><a href="#">Sign in</a></li>
								<li><a href="#">News</a></li>
								<li><a href="#">Buyer Protection</a></li>
								<li><a href="#">Payment Options</a></li>
								<li><a href="#">EMI Payment</a></li>
								<li><a href="#">Shipping Policy</a></li>
								<li><a href="#">Return Policy</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-2 col-sm-4 block-link-wapper">
						<div class="block-link">
							<ul class="list-link">
								<li class="head"><a href="#">Merchant Central</a></li>
								<li><a href="#">Merchant Sign In</a></li>
								<li><a href="#">Merchant Registration</a></li>
								<li><a href="#">How Does It Work</a></li>
								<li><a href="#">Pricing</a></li>
								<li><a href="#">Fulfillment by ShopClues</a></li>
								<li><a href="#">Merchant Tools</a></li>
								<li><a href="#">Best Practice</a></li>
							 </ul>
						</div>
					</div>
					<div class="col-md-2 col-sm-4 block-link-wapper">
						<div class="block-link">
							<ul class="list-link">
								<li class="head"><a href="#">Information</a></li>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Band of Trust</a></li>
								<li><a href="#">ShopClues History</a></li>
								<li><a href="#">News</a></li>
								<li><a href="#">In the Press</a></li>
								<li><a href="#">Awards New</a></li>
								<li><a href="#">Careers</a></li>
							 </ul>
						</div>
					</div>
					<div class="col-md-2 col-sm-4 block-link-wapper">
						<div class="block-link">
							<ul>
								<li class="head"><a href="#">Contact Us</a></li>
								<li><a href="#">Customer Support</a></li>
								<li><a href="#">Merchant Support</a></li>
								<li><a href="#">Merchant Inquiries</a></li>
								<li><a href="#">Product Reviews</a></li>
								<li><a href="#">Brand Inquiries</a></li>
								<li><a href="#">Bulk Orders</a></li>
								<li><a href="#">Contact Us</a></li>
							 </ul>
						</div>
					</div>
					<div class="col-md-2 col-sm-4 block-link-wapper">
						<div class="block-link">
							<ul class="list-link">
								<li class="head"><a href="#">help</a></li>
								<li><a href="#">See all Help</a></li>
								<li><a href="#">My Account</a></li>
								<li><a href="#">FAQs</a></li>
							 </ul>
							 <ul>
							 	<li class="head"><a href="#">OTHER SERVICES</a></li>
								<li><a href="#">Market America Gear</a></li>
								<li><a href="#">Apply for Market</a></li>
								<li><a href="#">America Credit Card</a></li>
							 </ul>
						</div>
					</div>
					<div class="col-md-2 col-sm-4 block-link-wapper">
						<div class="block-link">
							<ul class="list-link flag">
								<li class="head"><a href="#">INTERNATIONAL SHOPPING</a></li>
								<li><a href="#"><img src="data/flag1.png" alt="flang">Customer Support</a></li>
								<li><a href="#"><img src="data/flag2.png" alt="flang">Canada</a></li>
								<li><a href="#"><img src="data/flag3.png" alt="flang">Mexico</a></li>
								<li><a href="#"><img src="data/flag4.png" alt="flang">United Kingdom</a></li>
							</ul>
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
					<ul class="list-logo">
						<li><a href="#"><img src="data/payment1.png" alt="Payment Logo" /></a></li>
						<li><a href="#"><img src="data/payment2.png" alt="Payment Logo" /></a></li>
						<li><a href="#"><img src="data/payment3.png" alt="Payment Logo" /></a></li>
						<li><a href="#"><img src="data/payment4.png" alt="Payment Logo" /></a></li>
					</ul>
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

<?php wp_footer(); ?>

</body>
</html>
