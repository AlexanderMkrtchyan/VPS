<?php

/**

 * Template Name: Account Information

 *

 * @package WordPress

 * @subpackage qs

 * @since quigleyshores

 */

get_header();

define( 'DB_NAME', 'harryent_qr' );

/** Database username */
define( 'DB_USER', 'harryent_qr' );

/** Database password */
define( 'DB_PASSWORD', 'Datin@321!' );

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);  
 
// Display error if failed to connect  
if ($db->connect_errno) {  
    printf("Connect failed: %s\n", $db->connect_error);  
    exit();  
} 

$current_user = wp_get_current_user();
$user_id = $current_user->ID;
    
    // Fetch transaction and subscription info from the database 
    $sqlQ = "SELECT S.*, P.name as plan_name, P.price as plan_amount FROM user_subscriptions as S LEFT JOIN plans as P On P.id = S.plan_id WHERE S.user_id = '".$user_id."'"; 
    
    
   $result = $db->query($sqlQ);
   $subscrData = $result->fetch_assoc();
    $timestamp = strtotime($subscrData['valid_from']);
    $date = date('d-m-Y', $timestamp);
    
    $planid = "SELECT * from plans WHERE id = '".$subscrData['plan_id']."'"; 
    
    if($subscrData['plan_id']==1){
        $next_date = date('d-m-Y', strtotime($date .' +30 day'));
    }
    if($subscrData['plan_id']==2){
        $next_date = date('d-m-Y', strtotime($date .' +180 day'));
    }
    if($subscrData['plan_id']==3){
        $next_date = date('d-m-Y', strtotime($date .' +365 day'));
    }
    
    $result = $db->query($planid);
    $planiddata = $result->fetch_assoc();
   
    $planname = $planiddata['name'];
    $price = $planiddata['price'];
?>
<script>
    jQuery(document).ready(function(){
          jQuery("#dob").datepicker( { minDate: '-30Y',dateFormat: 'dd/mm/yy', maxDate: '-18Y' });
    });
</script>
<style>
    .bg_blocked_box_pg {
	background-image: url(<?php echo get_site_url(); ?>/wp-content/themes/dating/images/865178.jpg) !important;
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="https://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<section class="qs-section has-bgc bgc-darker bg_top_search_mmb bg_top_search_mmbb bg_blocked_box_pg blog-posting_bg_pg">

    <div class="container">

        <div class="row">
            <div class="col-lg-8 col-md-12 mauto">
          
                <div class="col-lg-12 top_hd_srch_mmbr blog_posting_top_hd acnt_information_top_hd">
                     <h1 class="color-black text-center">Account Information</h1>
                </div>

                    <?php if(is_user_logged_in()){ 
        
                        $current_user = wp_get_current_user();
                        $user_id = $current_user->ID;
                        
                        $gender = get_user_meta( $user_id, 'gender');
                        $gender = $gender[0];
                        
                        $first_name = get_user_meta( $user_id, 'first_name', true );
                        $last_name = get_user_meta( $user_id, 'last_name', true );
                        $description = get_user_meta($user_id, 'aboutme', true);
                        
                        $dob = get_user_meta($user_id, 'birth-date', true);
                        
                        $age = get_user_meta($user_id, 'age', true);
                        $city = get_user_meta($user_id, 'city', true);
                        $state = get_user_meta($user_id, 'state', true);
                        $zip = get_user_meta($user_id, 'zip', true);
                        
                    ?>

                <div class="blocked_ristrict_mmbr account_info_prsn_bx">
                    <div class="personal_info_box">
                        <div class="billing_form_py_inf">
                            <form>
                               <div class="img_sec_left">
                                   <img src="https://www.thewikifeed.com/wp-content/uploads/2021/04/zayn-malik-1.jpg" />
                                   <div class="upload-btn-wrapper">
                                      <button class="btn">
                                          <a href="<?php echo get_site_url(); ?>/edit-my-personal-profile/"><i class="fas fa-edit"></i></a>
                                      </button>
                                      
                                   </div>
                               </div>

                               <div class="cnt_sec_right">
                                    <h1 class="hd_top_inf">Personal Information</h1>
                                    <span class="hlf">
                                        <label>First Name</label>
                                        <input type="text" value="<?php echo $first_name; ?>" readonly />
                                    </span>

                                    <span class="hlf">
                                        <label>Last Name</label>
                                        <input type="text" value="<?php echo $last_name; ?>" readonly />
                                    </span>

                                    <span class="hlf">
                                        <label>Email</label>
                                        <input type="text" value="<?php if(isset($current_user->user_email)){ echo $current_user->user_email; } ?>" readonly />
                                    </span>

                                    <span class="hlf">
                                        <label>Username</label>
                                        <input type="text" value="<?php if(isset($current_user->user_login)){ echo $current_user->user_login; } ?>" readonly />
                                    </span>

                                    <span class="hlf">
                                        <label>Date of Birh</label>
                                        <input type="text" value="<?php $date=date_create($dob);
                                        echo date_format($date,"d/m/Y"); ?>" readonly />
                                    </span>

                                     <span class="hlf">
                                        <label>City</label>
                                        <input type="text" value="<?php echo $city; ?>" readonly />
                                    </span>

                                    <span class="hlf">
                                        <label>State</label>
                                        <input type="text" value="<?php echo $state; ?>" readonly />
                                    </span>

                                    <span class="hlf">
                                        <label>Zip Code </label>
                                        <input type="text" value="<?php echo $zip; ?>" readonly />
                                    </span>

                               </div>

                            </form> 
                        </div>
                        
                    </div>
                </div>

                <div class="blocked_ristrict_mmbr account_info_prsn_bx member_info_prsn_bx">
                    <div class="personal_info_box">
                        <div class="billing_form_py_inf">
                            
                               <div class="cnt_sec_right">
                                    <h1 class="hd_top_inf">Membership Information</h1>
                                    <span class="hlf hlf_one">
                                        <label>Membership Type:</label>
                                        <input type="text" value="<?php echo $planname; ?>" />
                                    </span>

                                    <span class="hlf hlf_tw">
                                        <label>Membership's Fee:</label>
                                        <input type="text" value="$<?php echo $price; ?>" />

                                        <p>Monthly Fee will drop to $<?php echo $price; ?> on <?php echo $next_date; ?></p>
                                    </span>

                                    <span class="hlf">
                                        <label>Renews on:</label>
                                        <input type="text" value="<?php echo $next_date; ?>" />
                                    </span>

                               </div>

                            
                        </div>
                        
                    </div>
                </div>
                <?php } ?>
            </div>


        </div>

    </div>

</section>

<?php

get_footer();

