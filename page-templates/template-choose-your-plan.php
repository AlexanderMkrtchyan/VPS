<?php

/**

 * Template Name: Choose your plan

 *

 * @package WordPress

 * @subpackage qs

 * @since quigleyshores

 */

if(!is_user_logged_in()){
    header("Location: ".get_site_url()."/sign-in/"); 
    exit; 
}
get_header();




?>

<style>
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
               <!--
               <div class="col-lg-12 top_hd_srch_mmbr blog_posting_top_hd">
                        <h1 class="color-black text-center">Quigley Shores</h1>
                    </div>
                -->


                <div class="blocked_ristrict_mmbr write_blog_all_cnt choose_plan_slct">
                    <h1 style="margin: 0px;">Choose Your Plan</h1>
                    <p style="width: 100%;text-align: center;margin-bottom: 40px;">Renews Automatically</p>

                    <div class="select_plan_box_outer">
                       <div class="select_plan_box">
                            <h1>Monthly Plan</h1>
                            <h2>$ 25</h2>
                            <h3>After 6 months your plan drops to</h3>
                            <h4>$ 22.50</h4>
                            <h6>Plan will decrease for loyal members</h6>
                            <h5>No membership levels</h5>
                            <form action="<?php echo get_site_url(); ?>/membership-confirmation/" method="post">
                                <input type="hidden" name="fee" value="$ 25" />
                                <input type="hidden" name="price" value="25" />
                                <input type="hidden" name="pid" value="1" />
                                <input type="hidden" name="month" value="Monthly Plan" />
                                <input type="hidden" name="interval" value="1" />
                                <input type="hidden" name="time" value="M" />
                                <input type="hidden" name="drop_1" value="After 6 months your plan drops to" />
                                <input type="hidden" name="drop_2" value="$ 22.50" />
                                
                               <button>Choose Monthly Plan</button>
                            </form>
                            
                        </div>
                        
                        <div class="select_plan_box">
                            <h1>6-Month Plan</h1>
                            <h2>$ 140</h2>
                            <h3>After 12months your plan drops to</h3>
                            <h4>$ 126</h4>
                            <h6>Plan will decrease for loyal members</h6>
                            <h5>No membership levels</h5>
                            <form action="<?php echo get_site_url(); ?>/membership-confirmation/" method="post">
                                <input type="hidden" name="fee" value="$ 140" />
                                <input type="hidden" name="month" value="6-Month Plan" />
                                <input type="hidden" name="pid" value="2" />
                                <input type="hidden" name="interval" value="6" />
                                <input type="hidden" name="price" value="140" />
                                <input type="hidden" name="time" value="M" />
                                <input type="hidden" name="drop_1" value="After 12months your plan drops to" />
                                <input type="hidden" name="drop_2" value="$ 126" />
                               
                               <button>Choose 6-month Plan</button>
                            </form>
                        </div>
                        
                        <div class="select_plan_box">
                            <h1>Yearly Plan</h1>
                            <h2>$280</h2>
                            <h3>After 12-months your plan drops to</h3>
                            <h4>$ 252</h4>
                            <h6>Plan will decrease for loyal members</h6>
                            <h5>No membership levels</h5>
                            <form action="<?php echo get_site_url(); ?>/membership-confirmation/" method="post">
                                <input type="hidden" name="fee" value="$ 280" />
                                <input type="hidden" name="month" value="Yearly Plan" />
                                <input type="hidden" name="price" value="280" />
                                <input type="hidden" name="interval" value="1" />
                                <input type="hidden" name="pid" value="3" />
                                <input type="hidden" name="time" value="Y" />
                                <input type="hidden" name="drop_1" value="After 12-months your plan drops to" />
                                <input type="hidden" name="drop_2" value="$ 252" />
                                
                               <button>Choose Yearly Plan</button>
                            </form>
                        </div>
                    </div>


                    

                     <div class="btm_pnl_discount">
                         <p>College students save 30% on memberships. Enter student .edu email address to qualify.</p>
                     </div>
                </div>
            </div>


        </div>

    </div>

</section>

<?php

get_footer();

