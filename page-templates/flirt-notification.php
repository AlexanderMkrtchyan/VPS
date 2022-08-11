<?php

/**

 * Template Name: Flirt Notification
 *

 * @package WordPress

 * @subpackage qs

 * @since quigleyshores

 */

get_header();


if(!is_user_logged_in()){
    echo "Login to Access the page";
    die();
}


?>
<style>
    .qs-section.has-bgc.bgc-darker.bg_top_search_mmb.bg_top_search_mmbb.bg_blocked_box_pg {
    	background: url('https://kleoseo.com/indica/wp-content/themes/dating/images/blocked_bg.jpeg') no-repeat !important;
    	background-size: cover !important;
    }
    .blocked_ristrict_mmbr .tabsall_sc .tabcontent .tab_cnt_cnt .descriptn_area {
	position: relative;
}.smily {
	position: absolute;
	top: -23px;
	width: 100%;
}.blocked_ristrict_mmbr .tabsall_sc .tabcontent .tab_cnt_cnt .descriptn_area {
	position: relative;
	margin-top: 10px;
}
.fa-heart { color:red !important; }
.smily span {
	width: 17px !important;
	position: relative;
}
.smily form span input {
	position: absolute;
	left: 0;
	top: -3px;
	opacity: 0;
	cursor: pointer;
}
.fa-heart {
	color: red !important;
	float: left;
}
.res {
	color: green;
	font-size: 10px;
}
.blockd_bx_btm_pgntn nav .pagination {
	margin: 0;
	display: inline-flex;
	list-style: none;
}#clear_emoj {
	background: blue;
	float: left;
	font-size: 10px;
	color: #fff;
	padding: 0px 9px;
	border-radius: 4px;
	cursor: pointer;
	margin-left: 10px;
}
.user_name span {
	font-size: 25px;
	color: #b37c26;
	font-weight: ;
}
#userimg {
	width: 50px;
	float: left;
	overflow: hidden;
	border-radius: 100px;
	margin-right: 10px;
}
.user_name span {
	font-size: 25px;
	color: #b37c26;
	float: left;
}
.emojis span {
	font-size: 34px;
	float: left;
}
.emojis {
	float: right;
	width: auto;
	line-height: 20px;
	margin-top: 0px;
}
.emojis a {
	float: right;
	background: #b37c26;
	padding: 1px 12px;
	border-radius: 5px;
	color: #fff !important;
	margin-left: 7px;
	margin-top: 5px;
	text-decoration: unset !important;
}
.data_user {
	float: left;
	width: 100%;
	margin-bottom: 20px;
}
.blocked_ristrict_mmbr h1 {
	margin-bottom: 40px;
}
.emojis img {
	width: 50px;
	height: 50px;
	object-fit: fill;
	object-position: center;
	margin-left: 10px;
	float: left;
	margin-top: -7px;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">

<section class="qs-section has-bgc bgc-darker bg_top_search_mmb bg_top_search_mmbb bg_blocked_box_pg">

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
<!--                     <div class="top_back_btn_hd">
                        <a href="#"><i class="fas fa-angle-left"></i> Go back</a>

                        <div class="right_drp_top">
                            <button onclick="myFunction()">Settings <i class="fas fa-angle-down"></i></button>
                            <div id="myDIV" class="drpodwn_menu_top_rght">
                                <a href="#">Profile</a>
                                <a href="#">Account</a>
                                <a href="#">Privacy & Safety</a>
                                <a href="#">Notifications</a>
                                <a href="#">Membership</a>
                            </div>
                        </div>
                    </div> -->
            </div>

<!--        <div class="col-lg-8 col-md-10 mauto bg_trans_new_lk" style="background: none;padding-bottom: 20px;">
               <div class="col-lg-12 top_hd_srch_mmbr top_hd_srch_mmbrr">
                   <h1 class="color-black text-center mb-5" style="font-size: 35px;">Privacy & Safety</h1>
                </div> 

                <div class="col-lg-12">
                    <div class="top_nav_blockd_ls">
                        <a href="#">Privacy</a>
                        <a href="#" class="active">Blocked List</a>
                        <a href="#">Face Recognition</a>
                        <a href="#">Passwords and Login</a>
                    </div>
                </div>
            </div>
 -->

            <div class="col-lg-8 col-md-12 mauto">
                <div class="blocked_ristrict_mmbr">
                    <h1>Flirt Notification</h1>
                    <?php 
                        global $wpdb;
                        $idd = get_current_user_id();
                        $rid = $wpdb->get_results ( "SELECT * FROM wp_usermeta WHERE `meta_key` = 'emoji_send_$idd'");
                        for($k=0;$k<sizeof($rid);$k++){ 
                            $emoji = $rid[$k]->meta_value;
                            $user_data = get_userdata($rid[$k]->user_id);
                            $smily = json_decode($emoji);
                           
                    ?>
                    <div class="data_user">
                        <div class="user_name">
                             <span><div id="userimg"><img src="<?php print_r(get_avatar_url($uid)); ?>" alt="" /></div><?php print_r($user_data->data->display_name);  ?></span>
                        </div>
                        <div class="emojis"><?php 
                            if(strpos($smily->smily, 'wink') !== false) { echo "<span><img src='https://kleoseo.com/indica/wp-content/themes/dating/images/wink_png.png' alt='' /></span>"; }
                            if(strpos($smily->smily, 'smile') !== false) { echo "<span><img src='https://kleoseo.com/indica/wp-content/themes/dating/images/rose.png' alt='' /></span>"; }
                            if(strpos($smily->smily, 'kiss') !== false) { echo "<span>&#128536;</span>"; }
                            if(strpos($smily->smily, 'heart') !== false) { echo "<span><img src='https://kleoseo.com/indica/wp-content/themes/dating/images/heart_red.png' alt='' /></span>"; }
                        ?>
                        <a href="https://kleoseo.com/indica/public-profile/?id=<?php echo $rid[$k]->user_id; ?>">Send back</a>
                        </div>
                    </div>
                  <?php } ?>
                </div>
            </div>


        </div>

    </div>



    <div class="container">

        <div class="row">

        </div>

    </div>

</section>

<?php

get_footer();

