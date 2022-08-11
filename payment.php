<?php /* Template Name: Payment */
get_header();?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="<?php echo 
get_template_directory_uri(); ?>/html/css/style.css" type="text/css" rel="stylesheet" />
<div class="header-title">
	<h2>Guest Membership Payment Plans</h2>
</div>
<div id="wrap">
	<div class="wrap">
		<div class="membershipbox">
			<div class="left-side-mship mship">
				<h2>5-5-5 Club</h2>
				<p>A trial membership that gives you all the benefits for a fraction of the cost.<span>Complete access to 5 members of the opposite sex</span></p>
				<div class="price">
					<span class="dol"><sup>$</sup><span>5</span></span>
					<div class="days_time">
						<p>FOR 5 DAYS</p>
					</div>
					<div class="paybtn">
						<a href="" data-href="https://quigleyshores.com/signup/?time=5&duration=D&item=5-5-5 Club&price=5">Join the 5-5-5 Club</a>
					</div>
				</div>
			</div>
			<div class="right-side-mship mship">
				<h2>Full Membership</h2>
				<p>All our resort's benefits included in a single low fee.<br>reduced the longer you stay.</p>
				<h3>Select your term:</h3>
				<div class="price">
					<div class="paybtn">
						<a href="" data-href="https://quigleyshores.com/signup/?time=1&duration=M&item=$35 For 30 Days&price=30">$35 For 30 Days</a>
						<a href="" data-href="https://quigleyshores.com/signup/?time=2&duration=M&item=$70 For 60 Days&price=60">$70 For 60 Days</a>
						<a href="" data-href="https://quigleyshores.com/signup/?time=3&duration=M&item=$105 For 90 Days&price=90/">$105 For 90 Days</a>
					</div>
					<div class="paybtn">
						<a href="" data-href="https://quigleyshores.com/signup/?time=6&duration=M&item=$210 For 6 Months&price=210">$210 For 6 Months</a>
						<a href="" data-href="https://quigleyshores.com/signup/?time=1&duration=Y&item=$420 For 1 Year&price=420">$420 For 1 Year</a>
					</div>
				</div>
			</div>
		</div>

		<div class="header-title-bottom" id="payment_option">
			<h2>Choose Payment Options</h2>
			<div class="payment_optons">
				<div class="payment_box">
					<div class="icon_box">
						<div class="image_icon">
							<a href=""><img src="<?php echo 
	get_template_directory_uri(); ?>/html/images/ppay.png" alt="Paypal" /></a>
						</div>
						<div class="image_icon">
							<input type="radio" name="payment" value="Square" />
							<img src="<?php echo 
	get_template_directory_uri(); ?>/html/images/sqpay.png" alt="Square" />
						</div>
						<div class="image_icon">
							<input type="radio" name="payment" value="Cash App" />
							<img src="<?php echo 
get_template_directory_uri(); ?>/html/images/cpay.png" alt="Cash App" />
						</div>
						<div class="image_icon">
							<input type="radio" name="payment" value="Zelle" />
							<img src="<?php echo 
get_template_directory_uri(); ?>/html/images/zpay.png" alt="Zelle" />
						</div>
						<div class="image_icon">
							<input type="radio" name="payment" value="Apple Pay" />
							<img src="<?php echo 
get_template_directory_uri(); ?>/html/images/apay.png" alt="Apple Pay" />
						</div>
						<div class="image_icon">
							<input type="radio" name="payment" value="Samsung Pay" />
							<img src="<?php echo 
get_template_directory_uri(); ?>/html/images/spay.png" alt="Samsung Pay" />
						</div>
						<div class="image_icon">
							<input type="radio" name="payment" value="Google Pay" />
							<img src="<?php echo 
get_template_directory_uri(); ?>/html/images/gpay.png" alt="Google Pay" />
						</div>
						<div class="image_icon">
							<input type="radio" name="payment" value="Amazon Pay" />
							<img src="<?php echo 
get_template_directory_uri(); ?>/html/images/icon8.jpg" alt="Amazon Pay" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	jQuery(document).ready(function(){
		jQuery('.paybtn').each(function(){
			jQuery(this).find('a').click(function(e){
				e.preventDefault();
				jQuery('.paybtn').find('a').removeClass('active');
				jQuery(this).addClass('active');
				var href = jQuery(this).attr('data-href');
				jQuery('.image_icon').find('a').attr('href',href);
				jQuery('html,body').animate({
					scrollTop: jQuery("#payment_option").offset().top},
				'slow');
				});
		});
	});
</script>
<?php get_footer();?>