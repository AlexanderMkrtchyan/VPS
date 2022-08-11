<?php 
/* Template Name: Success Payment */
get_header();
$payment_id = $statusMsg = ''; 
$status = 'error'; 
define( 'DB_NAME', 'harryent_qr' );

/** Database username */
define( 'DB_USER', 'harryent_qr' );

/** Database password */
define( 'DB_PASSWORD', 'Datin@321!' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );
if(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt'])){ //$_GET['st'] == 'Completed' 
    // Get transaction information from URL  
    $item_number = $_GET['item_number'];   
    $txn_id = $_GET['tx'];  
    $payment_gross = $_GET['amt'];  
    $currency_code = $_GET['cc'];  
    $payment_status = $_GET['st']; 
    $custom = $_GET['cm']; 
    // Connect with the database  
$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);  
 
// Display error if failed to connect  
if ($db->connect_errno) {  
    printf("Connect failed: %s\n", $db->connect_error);  
    exit();  
}
     
    // Fetch transaction and subscription info from the database 
    $sqlQ = "SELECT S.*, P.name as plan_name, P.price as plan_amount FROM user_subscriptions as S LEFT JOIN plans as P On P.id = S.plan_id WHERE S.txn_id = '".$txn_id."'"; 
    
    
   $result = $db->query($sqlQ);
  //$result = $stmt->get_result(); 
 // print_r($sqlQ);
      if($result->num_rows > 0){ 
        // Subscription and transaction details 
        $subscrData = $result->fetch_assoc(); 
         
        $ref_id = $subscrData['id']; 
        $paypal_subscr_id = $subscrData['paypal_subscr_id']; 
        $txn_id = $subscrData['txn_id']; 
        $paid_amount = $subscrData['paid_amount']; 
        $currency_code = $subscrData['currency_code']; 
        $interval = $subscrData['subscr_interval']; 
        $interval_count = $subscrData['subscr_interval_count']; 
        $valid_from = $subscrData['valid_from']; 
        $valid_to = $subscrData['valid_to']; 
        $payment_status = $subscrData['payment_status']; 
         
        $payer_name = $subscrData['payer_name']; 
        $payer_email = $subscrData['payer_email']; 
         
        $plan_name = $subscrData['plan_name']; 
        $plan_amount = $subscrData['plan_amount']; 
         
        $status = 'success'; 
        $statusMsg = 'Your Subscription Payment has been Successful!'; 
    }else{ 
        $statusMsg = "Transaction has been failed! If you got success response from PayPal, please refresh this page after sometime."; 
    } 
}else{ 
    header("Location: index.php"); 
    exit; 
} 
?>
<link rel="stylesheet" href="https://kleoseo.com/indica/wp-content/themes/dating/css/custom_1.css">
<?php if(!empty($subscrData)){ ?>
<style>
    .ready_to_publish .all_btns_area_publish span {
    	width: 100%;
    	float: right;
    	display: flex !important;
    	justify-content: flex-end !important;
    }
    .all_btns_area_publish button {
    	margin-left: 10px;
    }
    .select_plan_box_outer .select_plan_box h3 {
    	height: auto;
    }    .bg_blocked_box_pg {
	background-image: url(<?php echo get_site_url(); ?>/wp-content/themes/dating/images/nature.jpg) !important;
}
.billing_form_py_inf input {
	height: 36px;
}
.billing_form_py_inf span {
	margin: 3px 0px !important;
}
.blocked_ristrict_mmbr.write_blog_all_cnt.choose_plan_slct .col-sm-4 {
	float: left;
	width:100%;
}


@media screen and (min-width:1100px){
    .select_plan_box_outer .select_plan_box {
    	width: 31%;
    	float: left;
    	margin: 0 1.1%;
    	background: #fff;
    	border-radius: 12px;
    	padding: 30px 26px;
    	text-align: center;
    }
}
.select_plan_box_outer .select_plan_box h2 {
	margin-bottom: 0px;
}
.select_plan_box_outer .select_plan_box h3 {
height: auto;
}
.bg_blocked_box_pg {
	background-image: url(<?php echo get_site_url(); ?>/wp-content/themes/dating/images/giylXW3.jpg) !important;
}
</style>


<section class="qs-section has-bgc bgc-darker bg_top_search_mmb bg_top_search_mmbb bg_blocked_box_pg blog-posting_bg_pg">

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 mauto">
                <div class="blocked_ristrict_mmbr write_blog_all_cnt choose_plan_slct">
                    <h2 style="font-size:24px; text-align:center; width:100%; float:left;" class="<?php echo $status; ?>"><?php echo $statusMsg; ?></h2>
                    <div class="col-sm-4">
                        <h4>Payment Information</h4>
                        <p><b>Reference Number:</b> #<?php echo $ref_id; ?></p>
                        <p><b>Subscription ID:</b> <?php echo $paypal_subscr_id; ?></p>
                        <p><b>TXN ID:</b> <?php echo $txn_id; ?></p>
                        <p><b>Paid Amount:</b> <?php echo $paid_amount.' '.$currency_code; ?></p>
                        <p><b>Status:</b> <?php echo $payment_status; ?></p>
                    </div>
                    <div class="col-sm-4">
                        <h4>Subscription Information</h4>
                        <p><b>Plan Name:</b> <?php echo $plan_name; ?></p>
                        <p><b>Amount:</b> <?php echo $plan_amount.' '.CURRENCY; ?></p>
                        <p><b>Plan Interval:</b> <?php echo $interval_count.$interval; ?></p>
                        <p><b>Period Start:</b> <?php echo $valid_from; ?></p>
                        <p><b>Period End:</b> <?php echo $valid_to; ?></p>
                    </div>
                    <div class="col-sm-4">
                        <h4>Payer Information</h4>
                        <p><b>Name:</b> <?php echo $payer_name; ?></p>
                        <p><b>Email:</b> <?php echo $payer_email; ?></p>
                    <?php }else{ ?>
                    <style>
    .ready_to_publish .all_btns_area_publish span {
    	width: 100%;
    	float: right;
    	display: flex !important;
    	justify-content: flex-end !important;
    }
    .all_btns_area_publish button {
    	margin-left: 10px;
    }
    .select_plan_box_outer .select_plan_box h3 {
    	height: auto;
    }    .bg_blocked_box_pg {
	background-image: url(<?php echo get_site_url(); ?>/wp-content/themes/dating/images/nature.jpg) !important;
}
.billing_form_py_inf input {
	height: 36px;
}
.billing_form_py_inf span {
	margin: 3px 0px !important;
}
.blocked_ristrict_mmbr.write_blog_all_cnt.choose_plan_slct .col-sm-4 {
	float: left;
	width:100%;
}


@media screen and (min-width:1100px){
    .select_plan_box_outer .select_plan_box {
    	width: 31%;
    	float: left;
    	margin: 0 1.1%;
    	background: #fff;
    	border-radius: 12px;
    	padding: 30px 26px;
    	text-align: center;
    }
}
.select_plan_box_outer .select_plan_box h2 {
	margin-bottom: 0px;
}
.select_plan_box_outer .select_plan_box h3 {
height: auto;
}
.bg_blocked_box_pg {
	background-image: url(<?php echo get_site_url(); ?>/wp-content/themes/dating/images/giylXW3.jpg) !important;
}.qs-section.has-bgc.bgc-darker.bg_top_search_mmb.bg_top_search_mmbb.bg_blocked_box_pg.blog-posting_bg_pg {
	height: 77vh;
}
</style>


<section class="qs-section has-bgc bgc-darker bg_top_search_mmb bg_top_search_mmbb bg_blocked_box_pg blog-posting_bg_pg">

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 mauto">
                <div class="blocked_ristrict_mmbr write_blog_all_cnt choose_plan_slct">
                    <h2 style="font-size:24px; text-align:center; width:100%; float:left;" class="<?php echo $status; ?>">
                           Please wait...</h2>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } get_footer(); ?>