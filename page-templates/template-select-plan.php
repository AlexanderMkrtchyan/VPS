<?php

/**

 * Template Name: Select plan

 *

 * @package WordPress

 * @subpackage qs

 * @since quigleyshores

 */

get_header();





?>
<style>
    .select_plan_box_outer .select_plan_box h2 {
	    margin-bottom: 0px;
	}
	.select_plan_box_outer .select_plan_box h3 {
	    height: auto;
    }
    .select_plan_box_outer .select_plan_box h4 {
    	font-size: 33px;
    }
    .select_plan_box_outer .select_plan_box h3 {
    	font-size: 16px;
    }
    .select_plan_box_outer .select_plan_box h4 {
    	margin: 30px 0px;
    }
    sup {
    	top: -6px;
    }
    .select_plan_box h6, .select_plan_box h {
    	margin: 0px !important;
    }
    .select_plan_box_outer .select_plan_box h1 {
    	margin-bottom: 0px;
    }
   .choose_plan_slct .btm_pnl_discount.black {
    	background: #000;
    }     
    
    @media screen and (max-width:768px){
        .select_plan_box_outer .select_plan_box {
        	width: 100%;
        	float: left;
        	margin: 1 0%;
        	background: #fff;
        	border-radius: 12px;
        	padding: 30px 30px;
        	text-align: center;
        }
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
                    <h1>Select Plan</h1>
                    <div class="select_plan_box_outer">
                        <div class="select_plan_box">
                            <h1>Monthly Plan</h1>
                            <h2><sup>$</sup> 25</h2>
                            <h5>&nbsp;</h5>
                            <h3>Renews Automatically</h3>
                            <h5>After 6 months,</h5>
                            <h5>Renewal Drops to:</h5>
                            <h4><sup>$</sup> 22.50</h4>
                            
                            <h6>Pay Monthly</h6>
                            <h5>Cancel any time</h5>
                            <h5>&nbsp;</h5>
                            <button>SELECT</button>
                        </div>


                        <div class="select_plan_box">
                            <h1>6 Month Plan</h1>
                            <h2><sup>$</sup> 140</h2>
                            <h3>Renews Automatically</h3>
                            <h5>Renew for same term</h5>
                            <h5>Save 10%</h5>
                            <h5>Renewal Drops to:</h5>
                            <h4><sup>$</sup> 126</h4>
                            
                            <h6>One Time Charge</h6>
                            <h5>Cancel any time</h5>
                            <h5>after term expires</h5>
                            <button>SELECT</button>
                        </div>
                        
                        <div class="select_plan_box">
                            <h1>Annual Plan</h1>
                            <h2><sup>$</sup> 280</h2>
                            <h3>Renews Automatically</h3>
                            <h5>&nbsp;</h5>
                            <h5>Renew for same term</h5>
                            <h5>Renewal Drops to:</h5>
                            <h4><sup>$</sup> 252</h4>
                            
                            <h6>One Time Charge</h6>
                            <h5>Cancel any time</h5>
                            <h5>after term expires</h5>
                            <button>SELECT</button>
                        </div>
                    </div>

                    <div class="btm_pnl_discount black">
                         <p>Membership fees drop 10%/ year until you pay nothing*. Your membershio expries on the concurrent anniversary of its commencement, but automatically renews 2-days before it expires. You may cancel in  your Settings.</p>
                     </div>
                     

                     <div class="btm_pnl_discount">
                         <p>College students save 30% on monthly and yearly memberships. Enter student email address in order to qualify for student discount.</p>
                     </div>     
                     <p>*refer to FAQs for details</p>
                </div>
            </div>


        </div>

    </div>

</section>

<?php

get_footer();

