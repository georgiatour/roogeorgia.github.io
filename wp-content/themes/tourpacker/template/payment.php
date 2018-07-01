<?php
/*
*Template Name: Payment Page
*
*/

	get_header();
	$theme_option = get_option('theme_option');
	if(isset($_POST['book_duration'])){
		$_POST['book_duration'] = $_POST['book_duration'];
	}else{
		$_POST['book_duration'] = '4 DAYS 3 NIGHTS';
	}

	if(isset($_POST['book_title_tour'])){
		$_POST['book_title_tour'] = $_POST['book_title_tour'];
	}else{
		$_POST['book_title_tour'] = 'CROATIA SAILING & CRUISING';
	}

	if(isset($_POST['book_start_day'])){
		$_POST['book_start_day'] = $_POST['book_start_day'];
	}else{
		$_POST['book_start_day'] = 'March 26, 2016';
	}

	if(isset($_POST['book_end_day'])){
		$_POST['book_end_day'] = $_POST['book_end_day'];
	}else{
		$_POST['book_end_day'] = 'March 29, 2016';
	}

	if(isset($_POST['book_start_address'])){
		$_POST['book_start_address'] = $_POST['book_start_address'];
	}else{
		$_POST['book_start_address'] = 'Dubrovnik, Croatia';
	}
	if(isset($_POST['book_end_address'])){
		$_POST['book_end_address'] = $_POST['book_end_address'];
	}else{
		$_POST['book_end_address'] = 'Hvar, Croatia';
	}
	if(isset($_POST['book_currency'])){
		$_POST['book_currency'] = $_POST['book_currency'];
	}else{
		$_POST['book_currency'] = 'USD';
	}
	if(isset($_POST['book_price'])){
		$_POST['book_price'] = $_POST['book_price'];
	}else{
		$_POST['book_price'] = '1400';
	}
	
	if(isset($_POST['book_id_tour'])){
		$_POST['book_id_tour'] = $_POST['book_id_tour'];
	}else{
		$_POST['book_id_tour'] = '11';
	}
?>
<div class="breadcrumb-wrapper bg-light-2">
	
	<div class="container">
		<?php tourpacker_breadcrumbs(); ?>		
	</div>
	
</div>
<div class="content-wrapper">
			
	<div class="container">

		<div class="row">

			<div class="col-sm-8 col-md-9" role="main">

				<div class="section-title text-left">
					
					<h3><?php echo esc_attr($_POST['book_title_tour']); ?> <small> / <?php echo esc_attr($_POST['book_duration']); ?></small></h3>
					
				</div>
				
				<div class="payment-container">			
						
						<div class="payment-box">
						
							<div class="payment-header clearfix">
							
								<div class="number">
									1
								</div>

								<div class="row gap-10">
								
									<div class="col-sm-9">
										<h5 class="heading mt-0">Your selected departure date</h5>
									</div>
									
									<div class="col-sm-3">
										<a href="<?php if(isset($theme_option['result_search_list'])){ echo esc_attr($theme_option['result_search_list']); } ?>" class="btn btn-primary btn-inverse btn-sm pull-right pull-left-xs mb-20-xss">change</a>
									</div>

								</div>

							</div>
							
							<div class="payment-content">
							
								<div class="payment-content">
									<p>Your departure date: <?php echo esc_attr($_POST['book_start_day']); ?> - <?php echo esc_attr($_POST['book_end_day']); ?></p>
								</div>
								
							</div>
							
						</div>		
						
						<div class="payment-box">
						
							<div class="payment-header clearfix">
							
								<div class="number">
									2
								</div>
								
								<h5 class="heading mt-0">Billing Address And Finish Payment <small>/ <i class="fa fa-lock"></i> secure</small></h5>

							</div>
							
							<div class="payment-content">
								
								<p>Excellent so to no sincerity smallness. Removal request delight if on he we.</p>
								
								<div class="alert alert-info" role="alert"><i class="fa fa-info-circle"></i> Ask especially collecting terminated may son expression.</div>
								
								<div id="paymentOption" class="payment-option-wrapper">

									<div class="row">
									
										<div class="col-sm-12">
										
											<div class="radio-block">
												<input id="payments1" name="payments" type="radio" class="radio" value="paymentsCreditCard"/>
												<label class="" for="payments1"><span>Credit Cars</span> <img src="<?php if(isset($theme_option['payments_img_credit'])){ echo esc_attr($theme_option['payments_img_credit']['url']);} ?>" alt=""></label>
											</div>
											
										</div>
										
										<div class="clear"></div>
										
										<div class="col-sm-12">
											<div class="radio-block">
												<input id="payments2" name="payments" type="radio" class="radio" value="paymentPaypal"/>
												<label class="" for="payments2"><span>Paypal</span> <img src="<?php if(isset($theme_option['payments_img_credit'])){ echo esc_attr($theme_option['payments_img_paypal']['url']);} ?>" alt=""></label>
											</div>
										</div>
										
									</div>
									
									<div id="paymentsCreditCard" class="payment-option-form">
									
										<div class="inner">
										
											<h5 class="mb-15"><?php echo esc_html__('Your Payment Total:',''); ?> <?php echo esc_attr($_POST['book_currency']); ?> <?php echo esc_attr($_POST['book_price']); ?></h5>
										
											<?php echo do_shortcode('[fullstripe_payment form="tour_payment"]'); ?>																				
										</div>
										
									</div>
									<div id="paymentPaypal" class="payment-option-form">
										<div class="inner">
										
											<h5 class="mb-15"><?php echo esc_html__('Your Payment Total:',''); ?> <?php echo esc_attr($_POST['book_currency']); ?> <?php echo esc_attr($_POST['book_price']); ?></h5>
											
											
											<form class="paypal" action="<?php echo esc_attr($theme_option['payment_page_paypal']); ?>" method="post" id="paypal_form">
																																					
											        <input type="hidden" name="cmd" value="_xclick" />											
											        <input type="hidden" name="no_note" value="1" />											
											        <input type="hidden" name="lc" value="UK" />											
											        <input type="hidden" name="currency_code" value="<?php echo esc_attr($_POST['book_currency']); ?>" id="order_currency"/>											
											        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />											
											        <div class="form-horizontal">
														<div class="form-group gap-20">
															<label class="col-sm-3 col-md-2 control-label">First Name</label>
															<div class="col-sm-5 col-md-4">
																<input type="text" class="form-control" name="first_name" value="" required id="order_first_name" />
															</div>
														</div>
													</div>
													<div class="form-horizontal">
														<div class="form-group gap-20">
															<label class="col-sm-3 col-md-2 control-label">Last Name</label>
															<div class="col-sm-5 col-md-4">
																<input type="text" class="form-control" name="last_name" value="" required id="order_last_name"/>
															</div>
														</div>
													</div>																						
											        <input type="hidden" name="payer_email" value="<?php echo esc_attr($theme_option['payment_pp_email']); ?>" />											
											        <input type="hidden" name="item_number" value="<?php echo esc_attr($_POST['book_id_tour']); ?>" id="order_id"/ >											
											        <input type="hidden" name="item_tour_name" value="<?php echo esc_attr($_POST['book_title_tour']); ?>" id="order_title" / >											
											        <input type="hidden" name="item_price" value="<?php echo esc_attr($_POST['book_price']); ?>" id="order_price"/ >

											        <input type="hidden" name="item_departure_date" value="<?php echo esc_attr($_POST['book_start_day']); ?> - <?php echo esc_attr($_POST['book_end_day']); ?>" id="order_departure_date"/ >	
											        <input type="hidden" name="order_start_in" value="<?php echo esc_attr($_POST['book_start_address']); ?>" id="order_start_in"/ >	
											        <input type="hidden" name="order_end_in" value="<?php echo esc_attr($_POST['book_end_address']); ?>" id="order_end_in"/ >	
											        <input type="hidden" name="order_duration" value="<?php echo esc_attr($_POST['book_duration']); ?>" id="order_duration"/ >	
											        <p>The booking amount will be debited from your account once the booking is completed.</p>
											<p>After clicking 'Book Now' you will be directed to Paypal to complete payment. <strong>You must complete the process or the booking will not occur </strong>. Afterwards you will be redirected to us again. </p>										
											        <button type="submit" class="btn btn-primary" id="payment_order">Proceed to paypal</button>	

											        <script>
														jQuery(function($){
														    $(document).ready(function(){
														      var $content = $("body #div1");
														        $("button#payment_order").click(function(){
														            var order_title = $('#order_title').val();
														            var order_duration = $('#order_duration').val();

														            
														            var order_buyer_first_name = $('#order_first_name').val();
														            var order_buyer_last_name = $('#order_last_name').val();
														            
														            var order_departure_date = $('#order_departure_date').val();
														            var order_start_in = $('#order_start_in').val();
														            var order_end_in = $('#order_end_in').val();
														            var order_price = $('#order_price').val();
														            var order_currency = $('#order_currency').val();
														            var order_id = $('#order_id').val();
														            $( "#div1" ).empty();
														            $.ajax({
														              type:"GET",
														              url: ajaxurl,
														              data: {
														                  'action':'ajax_action_stuff',
														                  'ajax_order_title' : order_title, 
														                  'ajax_order_duration' : order_duration, 
														                  'ajax_order_buyer_first_name' : order_buyer_first_name, 
														                  'ajax_order_buyer_last_name' : order_buyer_last_name, 
														                  'ajax_order_departure_date' : order_departure_date, 
														                  'ajax_order_start_in' : order_start_in, 
														                  'ajax_order_end_in' : order_end_in, 
														                  'ajax_order_price' : order_price, 
														                  'ajax_order_currency' : order_currency, 
														                  'ajax_order_id' : order_id, 
														              },
														              dataType: "html",
														              beforeSend: function(){
														                $content.append('<div class="ajax-loading-wrapper"><div class="ajax-loading-inner"><div class="ajax-loading-item">?<img src="<?php echo get_template_directory_uri(); ?>/images/ajax-loading.gif" alt="Ajax Loading"></div></div></div>');
														                },                          
														              success: function(data){
														                $data = $(data);
														                $content.append($data);
														                $data.fadeIn( 7000,'linear', function(){
														                            $(".ajax-loading-wrapper").remove();                            
														                            loading = true;
														                        });                
														                $("#div1").html(data);
														            }});
														        });
														    });
														    });
														</script>										
											    </form>

										</div>
										
									</div>
								</div>

							</div>
							
						</div>					
					
				</div>
				
			</div>

			<div class="col-sm-4 col-md-3 hidden-xs">

				<div class="price-summary-wrapper">
					
					<h4 class="heading mt-0 text-primary uppercase"><?php echo esc_html__('My Trip',''); ?></h4>
				
					<ul class="price-summary-list">
					
						<li>
							<h6 class="heading mt-0 mb-0"><?php echo esc_attr($_POST['book_title_tour']); ?></h6>
							<p class="font12 text-light"><?php echo esc_attr($_POST['book_duration']); ?> city tour</p>
						</li>
						
						<li>
							<h6 class="heading mt-0 mb-0">Starts in <?php echo esc_attr($_POST['book_start_address']); ?></h6>
							<p class="font12 text-light"><?php echo date("l", strtotime($_POST['book_start_day'])); ?>, <?php echo esc_attr($_POST['book_start_day']); ?></p>
						</li>
						
						<li>
							<h6 class="heading mt-0 mb-0">Ends in <?php echo esc_attr($_POST['book_end_address']); ?></h6>
							<p class="font12 text-light"><?php echo date("l", strtotime($_POST['book_end_day'])); ?>, <?php echo esc_attr($_POST['book_end_day']); ?></p>
						</li>						
						
						<li class="divider"></li>
						
						<li>
							<h6 class="heading mt-20 mb-5 text-primary uppercase">Price per person</h6>
							<div class="row gap-10 mt-10">
								<div class="col-xs-7 col-sm-7">
									<?php echo esc_html__('Brochure Price',''); ?>
								</div>
								<div class="col-xs-5 col-sm-5 text-right">
									<?php echo esc_attr($_POST['book_currency']); ?> <?php echo esc_attr($_POST['book_price']); ?>
								</div>
							</div>
							<div class="row gap-10 mt-10">
								<div class="col-xs-7 col-sm-7">
									<?php echo esc_html__('Tax &amp; fee',''); ?>
								</div>
								<div class="col-xs-5 col-sm-5 text-right">
									<?php echo esc_attr($_POST['book_currency']); ?> 0
								</div>
							</div>
						</li>
						
						<li class="divider"></li>
						
						<li class="text-right font600 font14">
							<?php echo esc_attr($_POST['book_currency']); ?> <?php echo esc_attr($_POST['book_price']); ?>
						</li>
						
						<li class="divider"></li>
						
						<li>
						
							<div class="row gap-10 font600 font14">
								<div class="col-xs-9 col-sm-9">
									<?php echo esc_html__('Number of Travellers',''); ?>
								</div>
								<div class="col-xs-3 col-sm-3 text-right">
									1
								</div>
							</div>
						
						</li>
						
						<li class="total-price">
						
							<div class="row gap-10">
								<div class="col-xs-6 col-sm-6">
									<h5 class="heading mt-0 mb-0 text-white"><?php echo esc_html__('Amount due',''); ?></h5>
									<p class="font12"><?php echo esc_html__('before departure',''); ?></p>
								</div>
								<div class="col-xs-6 col-sm-6 text-right">
									<span class="block font20 font600 mb-5"><?php echo esc_attr($_POST['book_currency']); ?><?php echo esc_attr($_POST['book_price']); ?></span>
									<span class="font10 line10 block"><?php echo esc_html__('**Best Price Guarantee',''); ?> </span>
								</div>
							</div>
						
						</li>
						
					</ul>
					
				</div>
				
			</div>

		</div>
	
	</div>
		
</div>
			
			
<?php 
	// Get footer layout
	get_footer();
?>