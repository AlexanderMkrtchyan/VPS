<?php
/**
 * Template Name: Public Profile
 *
 * @package WordPress
 * @subpackage qs
 * @since quigleyshore
 */
get_header();


$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}

global $wpdb;
   $user_id = get_current_user_id();
   if(isset($_GET['id'])){
       $user_id = $_GET['id'];
   }
    for($t=1;$t<=5;$t++){
        $video_file[$t] = get_user_meta($user_id,"video_file_".$t);
 
    }
       ?>
<link rel='stylesheet' href='<?php echo get_site_url(); ?>/wp-content/themes/dating/css/step5.css' media='all' />
<script src="<?php echo get_site_url(); ?>/wp-content/themes/dating/js/lightbox.js"></script>
<link rel="stylesheet"  type="text/css"  href="<?php echo get_site_url(); ?>/wp-content/themes/dating/css/lightbox.css">
<?php $bg_upload = get_user_meta($user_id,"bg_upload"); ?>
<style>
    .step5 .container {
    	max-width: 1200px;
    }
    .inner-part {
    	padding: 30px 50px;
    }.button_div {
	text-align: center;
	position: relative;
	margin-top: 20px;
}.upload_img_1.col-sm-6 {
	float: left;
	overflow: hidden;
	padding: 0px 15px;
}
main {
	background: url(<?php echo get_site_url(); ?>/wp-content/themes/dating/images/sea.jpg);
	float: left;
	width: 100%;
	background-attachment: fixed;
	background-repeat: no-repeat;
	background-position: center;
	background-size: cover;
	padding-bottom: 0px;
}main {
	float: left;
	width: 100%;
	background-attachment: fixed;
	background-repeat: no-repeat;
	background-position: center;
	background-size: cover;
}.uplodss {
	background: #d9d9d9;
	height: 154px;
	float: left;
	width: 100%;
	display: table;
	position: relative;
}
main { display: table; }
.step5.proff .row {
	width: 100%;
	float: left;
	padding: 45px;
	background-color: rgba(255,255,255,.5);
	border-radius: 30px;
	color: #fff;
}
.inner-part {
	padding: 70px 50px;
	width: 100%;
	position: relative;
	object-fit: cover !important;
	height: auto;
	display: table-cell;
	vertical-align: middle;
}main {
	margin: 0px !important;
	padding:0px !important;
}
.step5.proff .qs-section.has-bgc.bgc-darker {
	background: none !important;
}
@media screen and (max-width:768px){
   .inner-part_2 {
    	display: block;
    	width: 100%;
    	height: 100%;
    }
    .upload_imgs.col-sm-8 {
    	padding: 0px !important;
    	float: left;
    	width: 100%;
    	display: block;
    	max-width: 100%;
    	flex: unset !important;
    }
    .upload_img_1.col-sm-6 {
    	float: left;
    	overflow: hidden;
    	padding: 0px 15px 0px 0px !important;
    }
    .upload_img_1.col-sm-6:nth-child(2n) {
    	padding-right: 0px !important;
    	padding-left: 10px !important;
    }
    .inner-part {
    	padding: 30px;
    	width: 100%;
    	position: relative;
    	object-fit: cover !important;
    	height: auto;
    	display: table-cell;
    	vertical-align: middle;
    }
}
.button_div button,.button_div a {
	background: #0a6d91 !important;
	color: #fff !important;
	font-size: 20px;
	margin-top: 0px !important;
}.button_div {
	text-align: center;
	position: relative;
	margin-top: 13px;
}
.title-page {
	text-align: center;
	width: 100%;
	float: left;
	margin-top: -50px;
	margin-bottom: 40px;
}.title-page h2 {
	font-weight: bold;
	color: #353434;
}
@media screen and (min-width:1100px){
    .step5.proff .container {
    	max-width: 1200px;
    }
    .inner-part {
	
	width: 100%;
	position: relative;
	object-fit: cover !important;
	height: auto;
	display: table-cell;
	vertical-align: middle;
}.col-sm-6.left {
	float: left;
	display: table-cell;
}
}
.profile-pic {
	height: 100%;
	min-width: 100%;
	min-height: auto;
	position: absolute;
	left: 0;
	background: #fff;
	padding: 0px !important;
	object-fit: cover !important;
}
.qs-profile--meta {
	background: #f5f5f5;
	padding: 10px;
	bottom: -9px;
	z-index: 999;
	position: absolute;
	width: 250px;
	left: -17%;
	font-size: 13px;
	color: #000;
	font-weight: normal !important;
	font-family: arial;
	border-radius: 6px;
}
.qs-profile--instr {
	min-height: unset;
	padding: 15px 40px;
}
#thank_video {
	display: block;
	width: 100%;
	position: relative;
	object-fit: cover !important;
	height: 329px;
	margin-top: 0px;
}
#sel_img {
	position: absolute;
	z-index: 9;
	right: 5px;
	border: none !important;
	outline: none !important;
	box-shadow: none !important;
	width: 20px;
	height: 20px;
	top: 5px;
}
#upl_img span {
	padding: 8px 15px;
	width: 100%;
	float: left;
}
#upl_img span.active {
	padding: 8px 15px;
	position: relative;
	width: 100%;
	float: left;
	z-index:9999;
}
#upl_img {
	position: relative;
	padding: 0px;
	float: left;
}
p, span {
	font-family: arial !importnat;
	font-size: 14px; 
}

.qs-profile--avatar-col.text-center {
	position: relative;
}.title-page {
	text-align: center;
	width: 100%;
	float: left;
	margin-top: 0px;
	margin-bottom: 0px;
}
#row {
	float: left;
	width: 100%;
	margin-top: 50px;
	border-top: 5px solid #686766;
	padding-top: 50px;
}
#bottom_poarts .upload_imgs.col-sm-12 {
	height: 350px;
	overflow: hidden;
}
#bottom_poarts .upload_imgs img {
	height: 100%;
	object-fit: cover;
	position: absolute;
	width: 100%;
}
#bottom_poarts .upload_imgs a::before {
	background: #0000008f;
	position: absolute;
	width: 100%;
	content: '';
	left: 0;
	top: 0;
	height: 100%;
	z-index: 99;
}
.qs-profile--meta {
	background: #f5f5f5;
	padding: 10px;
	bottom: 0px;
	z-index: 999;
	position: absolute;
	width: 250px;
	left: -17%;
	font-size: 13px;
	color: #000;
	font-weight: normal !important;
	font-family: arial;
	border-radius: 6px;
	line-height: 16px;
}
.upload_imgs.col-sm-12 a {
	width: 100%;
	height: 100%;
	float: left;
	overflow:hidden;
}
.upload_imgs.col-sm-12 a span {
	position: relative;
	width: 100%;
	text-align: center;
	height: 100%;
	display: inline-block;
	color: #fff;
	font-size: 30px;
	margin-top: 50px;
	z-index: 999;
}
.upload_imgs.col-sm-12 a span {
	position: relative;
	width: 100%;
	text-align: center;
	height: 100%;
	display: inline-block;
	color: #fff;
	font-size: 30px;
	margin-top: 50px;
	z-index: 999;
}

.upload_imgs.col-sm-12 a span p{
	text-align: center;
	color: #fff;
	font-size: 30px;
}
.upload_imgs.col-sm-12 a img {
	transform: scale(1);
	transition:.3s all;
}
.upload_imgs.col-sm-12 a:hover img {
	transform: scale(1.05);
}

#bottom_poarts .upload_imgs span img {
	position: relative;
	width: 80px;
	transform: none !important;
	height: 80px;
	transition: unset !important;
	margin: auto;
	margin-top: 50px;
	float: none;
}

@media screen and (max-width:768px){
    .step5.proff .row {
    	padding: 15px;
    }
}
main {
	background: url('<?php echo wp_get_attachment_url($bg_upload[0]); ?>');
	background-size:cover !important;
	background-position: center center;
}.uplodss img, .upload_imgs video {
	border: 5px solid #fff;
}
.smily span {
	width: 72px !important;
	position: relative;
	text-align: center !important;
}
.blocked_ristrict_mmbr .tabsall_sc .tabcontent .tab_cnt_cnt .descriptn_area img {
	width: 50px;
	height: 50px;
	object-fit: fill;
	margin-right: 0px;
	float: left;
	border-radius: 50px;
	border: 1px solid #eae7e7;
}
</style>

<script src='https://code.jquery.com/jquery-2.2.4.min.js' type='text/javascript'></script>

<div class='step5 proff' style="display: table-cell;vertical-align: middle; ">
    <div class="container">
      
        <div class="title-page">
            <h2>My Public Profile</h2>
        </div>
        
        <div class="row" style="margin: 0px !important; margin-bottom:30px !important;">
  
                <div class="step-5-wrap">
                    <div class="col-sm-6 step4right" style="padding-left: 0px !important;">
                        <div class="title-page">
                            <h2>My Public Photos</h2>
                        </div>
                             <div id="inner-part_2"> <div class="inner-part_2 gallery"> 
                                <div class="col-md-12">
                                    <div class="upload_imgs col-sm-8" >                                       
                                        <div class="upload_img_1 col-sm-6">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[1][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[1][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[1][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>    
                                        <div class="upload_img_1 col-sm-6">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[2][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[2][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[2][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                        <div class="upload_img_1 bttmm col-sm-6">
                                            <div class="uplodss">
                                               <?php if(!empty($video_file[3][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[3][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[3][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                                                            </div>
                                        </div>    
                                        <div class="upload_img_1 bttmm col-sm-6">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[4][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[4][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[4][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="upload_imgs upload_last col-sm-4">
                                        <div class="uplodss">
                                            <?php if(!empty($video_file[5][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[5][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[5][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                               
                                        </div>
                                    </div>
                                </div>    </div>    
               
                            </div>
                    
                    </div>
                    <div class="col-sm-6 left rivideo" >
                     <div class="title-page">
                            <h2>My Public Video</h2>
                        </div>
                        <div id="inner-part_2"> <div class="inner-part_2"> 
                                <div class="col-md-12">
                                    <div class="upload_imgs col-sm-12" style="padding: 0px;">
                                     <?php $video_upload = get_user_meta($user_id,"video_upload"); ?>
                                    <video style="display:block" id="thank_video" controls="" class="height" poster="">
                                        <source type="video/mp4" src="<?php echo get_site_url() . '/videos/user_' . $user_id.'/'.$video_upload[0]; ?>">    
                                        
                    
                                    </video>       
                                        </div></div></div>
            
                            </div>
                   
                    </div>
                      </div>

    
    
    <div id="row">
   <div class="title-page">
                            <h2>My Private Vaults</h2>
                        </div>
                <div class="step-5-wrap" id="bottom_poarts">
                    <div class="col-sm-6 left rivideo" >
                    
                        <div id="inner-part_2"> <div class="inner-part_2"> 
                                <div class="col-md-12">
                                    <div class="upload_imgs col-sm-12" style="padding: 0px;">
                                     <a href="<?php echo get_site_url(); ?>/photogallery/"><img src="https://kleoseo.com/indica/wp-content/uploads/2021/10/girl7.jpg" alt="" /><span><p>Photo Gallery</p><img src="/indica/wp-content/themes/dating/images/3208737.png" alt="" /></span></span></a>
                                        </div></div></div>
            
                            </div>
                   
                    </div>
                    <div class="col-sm-6 left rivideo" >
                    
                        <div id="inner-part_2"> <div class="inner-part_2"> 
                                <div class="col-md-12">
                                    <div class="upload_imgs col-sm-12" style="padding: 0px;">
                                        <a href="<?php echo get_site_url(); ?>/private-videos/"><img src="https://kleoseo.com/indica/wp-content/uploads/2022/03/WhatsApp-Image-2022-03-12-at-10.02.01-AM.jpeg" alt="" /><span><p>Video Arcade</p><img src="/indica/wp-content/themes/dating/images/3208737.png" alt="" /></span></a> 
                                        </div></div></div>
            
                            </div>
                   
                    </div>
                      </div>
                      
                      
                </div> 
                <div class="col-md-12">
                     <div class="col-md-12 mt20  qs-profile--buttons">
                        <div class="qs-profile--instr">
                            <p>(To see my Private Vaults, click either one. If you're one of my subscribers, you'll be able to log-in to drool over my latest additions. If you're not a subscriber, please become one. Only $5/month lets youseewhat others can only imagine)		 
                             </p>
                    </div>
                </div>
            </div>
            
            <div class="container"style="display:none;">

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
       
</div>
<br><br>
<?php
    
get_footer();
