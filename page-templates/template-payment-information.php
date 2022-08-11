<?php

/**

 * Template Name: Payment Information

 *

 * @package WordPress

 * @subpackage qs

 * @since quigleyshores

 */

get_header();
define('PAYPAL_ID', 'sb-ydqix8257266@business.example.com'); 
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE  
  
define('PAYPAL_RETURN_URL', get_site_url().'/success/');  
define('PAYPAL_CANCEL_URL', get_site_url().'/cancel/');  
define('PAYPAL_NOTIFY_URL', get_site_url().'/paypal-ipn/');  
define('CURRENCY', 'USD');  
  
// Change not required  
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr"); 
 
// start session 
if(!session_id()) session_start();
?>
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
</style>


<section class="qs-section has-bgc bgc-darker bg_top_search_mmb bg_top_search_mmbb bg_blocked_box_pg blog-posting_bg_pg">

    <div class="container">
<h1 style="margin: 0px; text-align:center; with:100%;font-weight: 600;font-family: 'Poppins', sans-serif;font-size: 23px;margin-bottom: 50px;">Confirm Your Plan</h1>
        <div class="row">
            <div class="col-lg-8 col-md-12 mauto">
               <!--
               <div class="col-lg-12 top_hd_srch_mmbr blog_posting_top_hd">
                        <h1 class="color-black text-center">Quigley Shores</h1>
                    </div>
                -->


                <div class="blocked_ristrict_mmbr write_blog_all_cnt choose_plan_slct">
                    <?php 
                        $plan = $_POST['month'];
                        $fee = $_POST['fee'];
                        $price = $_POST['price'];
                        $drop_1 = $_POST['drop_1'];
                        $drop_2 = $_POST['drop_2'];
                        
                        $interval = $_POST['interval'];
                        $time = $_POST['time'];
                       
                    ?>
                    <div class="select_plan_box_outer payment_info_box_outer">
                        <h1 class="hd_top_inf">Selected Plan</h1>
                        <div class="select_plan_box">
                            <h1><?php if(isset($plan)){ echo $plan; } ?></h1>
                            <h2 style="margin: 0px;"><?php if(isset($fee)){ echo $fee; } ?></h2>
                           
                            <button>Confirm Plan</button>
                        </div>
                        <a style="margin: auto;top: 16px;position: relative;" href="<?php echo get_site_url(); ?>/choose-your-plan/" class="pay_inf_bc_btn">Go Back</a>
                    </div>
                    <?php
                        if(is_user_logged_in()){
                           
                             $fullname = $current_user->user_firstname .' '. $current_user->user_lastname;
                             $email = $current_user->user_email;
                             $id = $current_user->ID;
                             $planid = $_POST['pid'];
                             $zipcode = get_user_meta($id,'zip');
                             $zipcode = $zipcode[0];
                             $city = get_user_meta($id,'city');
                             $city = $city[0];
                             $state = get_user_meta($id,'state');
                             $state = $state[0];
                             $zipcode = get_user_meta($id,'zip');
                             $zipcode = $zipcode[0];
                        }
                    ?>

                    <div class="payment_info_box_outer_right">
                        <div class="billing_form_py_inf">
                            <form action="<?php echo PAYPAL_URL; ?>" method="post">
                                
                                <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
                                <!-- Specify a subscriptions button. -->
                                <input type="hidden" name="cmd" value="_xclick-subscriptions">
                                <!-- Specify details about the subscription that buyers will purchase -->
                                <input type="hidden" name="item_name" id="item_name" value="<?php echo $plan; ?>">
                                <input type="hidden" name="item_number" id="item_number" value="<?php echo $planid; ?>">
                                <input type="hidden" name="currency_code" value="<?php echo CURRENCY; ?>">
                                <input type="hidden" name="a3" id="item_price" value="<?php echo $price; ?>">
                                <input type="hidden" name="p3" id="interval_count" value="<?php echo $interval; ?>">
                                <input type="hidden" name="t3" id="interval" value="<?php echo $time; ?>">
                                <input type="hidden" name="src" value="1">
                                <!-- Custom variable user ID -->
                                <input type="hidden" name="custom" value="<?php echo $id; ?>">
                                
                                <!-- Specify urls -->
                                <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
                                <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
                                <input type="hidden" name="notify_url" value="<?php echo PAYPAL_NOTIFY_URL; ?>">
                                
                               <span class="full"><input type="text" placeholder="Full Name" value="<?php if(isset($fullname)){ echo $fullname; } ?>" /></span>
                               <span class="hlf"><input type="text" placeholder="Street Address" /></span>
                               <span class="hlf"><input type="text" placeholder="Apt/Suite" /></span>
                               <span class="full"><input type="text" placeholder="City" value="<?php if(isset($city)){ echo $city; } ?>" /></span>
                               <span class="hlf"><input type="text" placeholder="State" value="<?php if(isset($state)){ echo $state; } ?>" /></span>
                                <span class="hlf hlf_rght"><input type="text" placeholder="Zip Code" value="<?php if(isset($zipcode)){ echo $zipcode; } ?>" /></span>
                               <span class="full" id="paymnt_btn" style="display:none;">
                                  <button>
                                      Pay with PalPal <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2022/03/paypal.png" />
                                  </button>
                               </span>
                            </form> 
                        </div>
                        

                        <div class="agree_tm_pll" style="display:none;">
                            <p>By proceeding you agree to the <a href="<?php echo get_site_url(); ?>/terms-of-use/">Terms of Use</a> and <a href="<?php echo get_site_url(); ?>/terms-of-use/">Privacy</a></p>
                        </div>
                        
                    </div>


                    <?php
                        $Date =  date('Y-m-d');
                        
                        if($time=='M'){
                            if($interval==6){
                                $Date = date('Y-m-d', strtotime($Date. ' + 180 days'));
                            }else{
                                $Date = date('Y-m-d', strtotime($Date. ' + 30 days'));
                            }
                        }else{
                            $Date = date('Y-m-d', strtotime($Date. ' + 366 days'));
                        }
                    ?>

                     <div class="btm_pnl_discount btm_pnl_discountt">
                         <p>You’ll be charged <?php echo $fee; ?> for the first year starting <?php echo $Date; ?>. Your membership will automatically renew two days prior to its expiration date. You can change your plan <a style="color:#fff;" href="<?php echo get_site_url(); ?>/choose-your-plan/">here</a>, or cancel your membership on your Settings page.</p>
                     </div>
                </div>
            </div>


        </div>

    </div>

</section>
<script>
    jQuery(document).ready(function(){
        jQuery('.select_plan_box button, .agree_tm_pll').click(function(){
            jQuery(this).hide();
            jQuery('#paymnt_btn').show();
        });
    });
</script>
<?php

get_footer();

