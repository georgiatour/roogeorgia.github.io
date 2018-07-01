<?php
/*
*Template Name: Paypal Payments
*
*/

$theme_option = get_option('theme_option');
if ($theme_option['payment_pp_sandbox']){ $test_mode='sandbox.';}else{$test_mode='';}
// PayPal settings
$paypal_email = $_POST['payer_email'];

$return_url = $theme_option['payment_page_paypal'];
$cancel_url = $theme_option['result_search_list'];
$notify_url = $theme_option['payment_page'];

$item_tour_name = (isset($_POST['item_tour_name'])) ? $_POST['item_tour_name'] : 0;
$item_price = (isset($_POST['item_price'])) ? $_POST['item_price'] : 0;

$item_name = $_POST['first_name'].' '.$_POST['last_name'].' Buy :'.$item_tour_name.'' ;
$item_amount = $item_price;


// Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])){
	$querystring = '';
	
	// Firstly Append paypal account to querystring
	$querystring .= "?business=".urlencode($paypal_email)."&";
	
	// Append amount& currency (£) to quersytring so it cannot be edited in html
	
	//The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
	$querystring .= "item_name=".urlencode($item_name)."&";
	$querystring .= "amount=".urlencode($item_amount)."&";
	
	//loop for posted values and append to querystring
	foreach($_POST as $key => $value){
		$value = urlencode(stripslashes($value));
		$querystring .= "$key=$value&";
	}
	
	// Append paypal return addresses
	$querystring .= "return=".urlencode(stripslashes($return_url))."&";
	$querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
	$querystring .= "notify_url=".urlencode($notify_url);
	
	// Append querystring with custom field
	//$querystring .= "&custom=".USERID;
	
	// Redirect to paypal IPN
	header('location:https://www.'.$test_mode.'paypal.com/cgi-bin/webscr'.$querystring);
	exit();
} else {
get_header(); 

global $wpdb;
$tour_results = $wpdb->get_results( "SELECT * FROM `tour_payments` where order_id = '".$_POST['item_number']."' ORDER BY `ID` DESC");	

?>
<div class="breadcrumb-wrapper bg-light-2">
				
	<div class="container">
	
		<?php tourpacker_breadcrumbs(); ?>
		
	</div>
	
</div>

<div class="content-wrapper">

	<div class="container">

		<div class="row">
		
			<div class="col-sm-8 col-md-9">

				<div class="confirmation-wrapper">
				
					<div class="payment-success">
					
						<div class="icon">
							<i class="pe-7s-check text-success"></i>
						</div>
					
						<div class="content">
							
							<h2 class="heading uppercase mt-0 text-success"><?php echo esc_html__('Thank you, your booking is complete!','tourpacker'); ?></h2>
							<p><?php echo esc_html__('Your confirmation number is','tourpacker'); ?> <span class="text-primary font700"><?php echo esc_attr($_POST['item_number']); ?></span></p>
						
						</div>
						
					</div>
				
					<div class="confirmation-content">
					
						<div class="section-title text-left">
							<h4><?php echo esc_html__('Booking Information','tourpacker'); ?></h4>
						</div>
					
						<ul class="book-sum-list">
							<li><span class="font600"><?php echo esc_html__('Booking Number','tourpacker'); ?>: </span><?php echo esc_attr($_POST['item_number']); ?></li>
							<li><span class="font600"><?php echo esc_html__('Booking Price Total','tourpacker'); ?>: </span><?php echo esc_attr($_POST['mc_gross']); ?> <?php echo esc_attr($_POST['mc_currency']); ?></li>
							
							<li><span class="font600"><?php echo esc_html__('Package Name','tourpacker'); ?>: </span><?php echo esc_attr($tour_results['0']->sumary); ?></li>
							<li><span class="font600"><?php echo esc_html__('Starting','tourpacker'); ?>: </span> <?php echo esc_attr($tour_results['0']->start_in); ?></li>
							<li><span class="font600"><?php echo esc_html__('End','tourpacker'); ?>: </span><?php echo esc_attr($tour_results['0']->end_in); ?></li>
							<li><span class="font600"><?php echo esc_html__('Departure Date','tourpacker'); ?>: </span><?php echo esc_attr($tour_results['0']->departure_date); ?></li>
							<li><span class="font600"><?php echo esc_html__('Billing Email','tourpacker'); ?>: </span><?php echo esc_attr($tour_results['0']->buyer_email); ?></li>
							<li><span class="font600"><?php echo esc_html__('Billing Address','tourpacker'); ?>: </span><?php echo esc_attr($_POST['address_street']); ?> </li>
							
						</ul>
						
					</div>
					
					<div class="confirmation-content">
					
						<div class="section-title text-left">
							<h4><?php echo esc_html__('Payment','tourpacker'); ?></h4>
							
						</div>
					
						<?php 	if (isset($theme_option['payment_success_setting_payment_text'])) {

									echo htmlspecialchars_decode($theme_option['payment_success_setting_payment_text']);

								}else{}
						?>
					</div>
					
					<div class="confirmation-content">
					
						<div class="section-title text-left">
							<h4><?php echo esc_html__('Additional Information','tourpacker'); ?></h4>
						</div>
						
						<?php 	if (isset($theme_option['payment_success_setting_additional_text'])) {

									echo htmlspecialchars_decode($theme_option['payment_success_setting_additional_text']);
									
								}else{}
						?>
					</div>
					
					<button class="btn btn-primary"><i class="fa fa-print"></i> <a href="<?php 	if (isset($theme_option['payment_success_setting_link_print'])) {

									echo esc_url($theme_option['payment_success_setting_link_print']);
									
								}else{}
								?>" style="color:white"> <?php echo esc_html__('Print','tourpacker'); ?></a></button>
					<button class="btn btn-primary btn-inverse"><i class="fa fa-envelope-o"></i> <a href="<?php 	if (isset($theme_option['payment_success_setting_link_sent'])) {

									echo esc_url($theme_option['payment_success_setting_link_sent']);
									
								}else{}
								?>"><?php echo esc_html__('Sent to','tourpacker'); ?></a></button>
				
				</div>
				
			</div>

			<div class="col-sm-4 col-md-3 mt-50-xs">

				<aside class="sidebar with-filter">
				
					<div class="sidebar-inner">
					
						<div class="sidebar-module">
							<h4 class="heading mt-0"><?php echo esc_html__('Need Booking Help?','tourpacker'); ?></h4>
							<div class="sidebar-module-inner">
								<p class="mb-10">
								<?php 	if (isset($theme_option['payment_success_setting_need_text'])) {

									echo htmlspecialchars_decode($theme_option['payment_success_setting_need_text']);
									
								}else{}
								?></p>
								<ul class="help-list">
									<?php 	if (isset($theme_option['payment_success_setting_need_field'])) {

									echo htmlspecialchars_decode($theme_option['payment_success_setting_need_field']);
									
								}else{}
								?>
								</ul>
							</div>
						</div>
						
						
						<div class="sidebar-module">
							<h4 class="heading mt-0"><?php echo esc_html__('Why booking with us?','tourpacker'); ?></h4>
							<div class="sidebar-module-inner">
								<ul class="featured-list-sm">
									<?php 	if (isset($theme_option['payment_success_setting_why'])) {

									echo htmlspecialchars_decode($theme_option['payment_success_setting_why']);
									
								}else{}
								?>
								</ul>
							</div>
						</div>
						
					</div>
					
				</aside>

			</div>

		</div>
	
	</div>
		
</div>
<?	
	global $wpdb;
		$wpdb->update(
			'tour_payments', 
			array(
				'buyer_email' 	=> $_POST['payer_email'],	// string
				'price' 		=> $_POST['mc_gross'],
				'currency' 		=> $_POST['mc_currency'],
				'status'		=> $_POST['payment_status'],
				//'payment_type'	=> '',
				'transaction_id' => $_POST['txn_id'],
				//'sumary'	=> ''
			), 
			array( 'order_id' => $_POST['item_number']), 
			
			array( 
				'%s',
				'%s',
				'%s',
				'%s',
				//'%s',
				//'%s',
				'%s'
			)			
		);
get_footer();
}
?>
