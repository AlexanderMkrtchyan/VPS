<?php
/**
 * Template Name: Private Vault Photos
 *
 * @package WordPress
 * @subpackage qs
 * @since quigleyshore
 */
get_header();
if(!is_user_logged_in()){
    ?>
    <style>
        .upload_imgs.col-sm-12 h2 {
	text-align: center;
	color: #fff;
	margin-top: 90px;
}
    </style>
    <div class='step5 proff'>
    <div class="container">
       <div class="step-5-wrap" id="bottom_poarts">
                    <div class="col-sm-12 left rivideo" >
                    
                        <div id="inner-part_2"> <div class="inner-part_2"> 
                                <div class="col-md-12">
                                    <div class="upload_imgs col-sm-12" style="padding: 0px;">
                                        <h2>You need to login to access this page.</h2>
                                        </div></div></div>
            
                            </div>
                   
                    </div>
                      </div>
</div>
</div>
<?php    return false;
}

$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}

global $wpdb;
   $user_id = get_current_user_id();

   
    for($t=1;$t<=25;$t++){
        $video_file[$t] = get_user_meta($user_id,"vault_file_".$t);
 
    }
       ?>
       
       <?php $bg_upload = get_user_meta($user_id,"bg_upload"); if(empty($bg_upload[0])){ $bg_upload=''; }  ?>
<link rel='stylesheet' href='<?php echo get_site_url(); ?>/wp-content/themes/dating/css/step5.css' media='all' />
<link rel="stylesheet"  type="text/css"  href="<?php echo get_site_url(); ?>/wp-content/themes/dating/css/lightbox.css">
        <script src="<?php echo get_site_url(); ?>/wp-content/themes/dating/js/lightbox.js"></script>
<style>
    .step5 .container {
    	max-width: 1000px;
    }
    .inner-part {
    	padding: 30px 50px;
    }.button_div {
	text-align: center;
	position: relative;
	margin-top: 20px;
}.upload_img_1.col-sm-6, .upload_img_p. {
	float: left;
	overflow: hidden;
	padding: 0px 15px;
}

.qs-profile--buttons.mt20.col-md-12 {
	display: flex;
	justify-content: center;
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
	padding-right:30px;
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
}main {
	background: url(https://kleoseo.com/indica/wp-content/themes/dating/images/bg_blocked_bx-mmbrr.jpg);
	background-size: cover !important;
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
	padding: 0px 15px !important;
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
    #bottom_poarts {
	width: 300px;
	position: static;
	margin-top: 30px;
}.color-white.qs-profile--title.bgc-dark {
	font-size: 15px !important;
	padding: 20px;
}.qs-profile--head {
	-webkit-box-align: center;
	-ms-flex-align: center;
	align-items: center;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	max-width: 100%;
	float: left;
	margin: 0px;
	width: 100%;
	margin-top: 50px;
}.upload_imgs .col-sm-2 {
	max-width: 50%;
	padding: 0px 6px !important;
}.step5 .container {
	max-width: 300px;
}.step5.proff .row {
	padding: 15px;
	margin: 0px;
}.step5.proff .row {
	padding: 15px;
	margin: 0px;
	padding-right: 0px;
}#bottom_sec {
	margin-top: 0px;
}#bottom_poarts {
	width: 100%;
	position: static;
	margin-top: 30px;
}.upload_img_p.col-sm-2 {
	margin-top: 11px;
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
.uplodss h2 {
	font-size: 26px;
	padding: 0px 27px;
	text-align: center;
	background: url('<?php echo get_site_url(); ?>/wp-content/themes/dating/images/placeholder.jpg') no-repeat;
	background-size: cover;
	background-position: center;
}
img[src="undefined"] {
	display: none;
}
@media screen and (min-width:1100px){
    .step5.proff .container {
    	max-width: 1000px;
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
	display: none;
}
.qs-profile--instr {
	min-height: unset;
	padding: 15px 20px;
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
.step5.proff {
	float: left;
	width: 100%;
}
main {
	background: url('<?php echo wp_get_attachment_url($bg_upload[0]); ?>');
	background-size:cover !important;
}
#rpww .inner-part_2 {
	display: flex;
	width: 100%;
	height: 329px;
}.edit_background {
	position: absolute;
	right: 0;
	background: #00000096;
	margin-top: 10px;
}.edit_background h2 {
	color: #fff;
	font-size: 20px;
	float: left;
	margin: 0px;
	padding: 6px;
}
.upload_imgs .col-sm-2 {
	max-width: 20%;
	padding: 0px 6px !important;
	float: left;
}
.upload_img_p.bttmm.col-sm-2 {
	margin-top: 11px;
}
.upload_img_p .uplodss {
	height: 161px;
}
 .upload_img_1.col-sm-6 {
	float: left;
	overflow: hidden;
	padding: 0px 15px !important;
}
.inner-part_2_2 #thank_video { 	display: block; 	width: 100%; 	position: relative; 	object-fit: cover !important; 	height: 180px; 	margin-top: 0px; 	margin-bottom: 29px; }
</style>

<style>
    .step5 .container {
    	max-width: 1000px;
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
    	max-width: 1000px;
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
	height: 150px;
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
	font-size: 15px;
	margin-top: 20px;
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
	width: 40px;
	transform: none !important;
	height: 40px;
	transition: unset !important;
	margin: auto;
	margin-top: 0px;
	float: none;
}
.upload_imgs.col-sm-12 a span p {
	margin-bottom: 0px;
}#bottom_poarts {
	width: 300px;
}
.upload_imgs.col-sm-12 a span p {
	text-align: center;
	color: #fff;
	font-size: 19px;
}#bottom_poarts {
	width: 300px;
	position: absolute;
	margin-top: 80px;
	z-index: 9;
}.qs-profile--head {
	-webkit-box-align: center;
	-ms-flex-align: center;
	align-items: center;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	max-width: 720px;
	margin: 0px;
	float: right;
}#bottom_sec {
	margin-top: 50px;
}.qs-profile--title {
	padding: 15px 210px 15px 75px;
}.color-white.qs-profile--title.bgc-dark {
	font-size: 30px !important;
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
}#bottom_poarts {
	width: 300px;
	position: absolute;
	margin-top: 80px;
}.upload_imgs.col-sm-12 a {
	width: 100%;
	height: 100%;
	float: left;
	overflow: hidden;
	margin: 0px;
}.upload_img_p .uplodss {
	height: 161px;
	margin: 0px;
}
</style>
            
<div class='step5 proff'>
    <div class="container">
       <div class="step-5-wrap" id="bottom_poarts">
                    <div class="col-sm-12 left rivideo" >
                    
                        <div id="inner-part_2"> <div class="inner-part_2"> 
                                <div class="col-md-12">
                                    <div class="upload_imgs col-sm-12" style="padding: 0px;">
                                        <a href="<?php echo get_site_url(); ?>/private-videos/"><img src="https://kleoseo.com/indica/wp-content/uploads/2021/10/girl7.jpg" alt="" /><span><p>Video Arcade</p><img src="/indica/wp-content/themes/dating/images/3208737.png" alt="" /></span></a> 
                                        </div></div></div>
            
                            </div>
                   
                    </div>
                      </div>
<?php get_template_part( 'blocks/block-profile-top', get_post_type() );  ?>
        <div class="title-page">
            <h2>My Private Photo Gallery</h2>
        </div>
        
        
</div>
</div>

<div class='step5 proff' id="bottom_sec">
    <div class="container">
       
        
        <div id="rpww" class="row" style="margin-bottom:30px !important;">
            
				<style>
				    #inner-part_2_1 .col-md-12.tyr {
                    	padding: 0px !important;
                    	margin: 0px -15px;
                    }
                    .upload_imgs .col-sm-2 {
                    	max-width: 20%;
                    	padding: 0px 6px !important;
                    }
                    #pri_img {
                    	position: absolute;
                    	right: 6px;
                    	top: 6px;
                    	width: 16px;
                    	height: 17px;
                    }
				</style>
                <div class="step-5-wrap">
                    <div class="col-sm-12 step4right" style="padding: 0px !important;">
                            
                            <div id="inner-part_2_1" class"inner-part_2" style="height:auto;"> <div class="inner-part_2" style="height:auto;"> 
                                <div class="col-md-12 tyr" style="padding: 0px !important;">
                                    <div class="upload_imgs col-sm-12" style="width: 100%;float: left;padding-right: 0px;">                                   
                                        <div class="upload_img_p col-sm-2">
                                            <div class="uplodss gallery">
                                                <?php if(!empty($video_file[1][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[1][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[1][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                             
                                            </div>
                                        </div>    
                                        <div class="upload_img_p col-sm-2">
                                            <div class="uplodss">
                                                
                                                <?php if(!empty($video_file[2][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[2][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[2][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                
                                            </div>
                                        </div>
                                        <div class="upload_img_p col-sm-2">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[3][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[3][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[3][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                        <div class="upload_img_p col-sm-2">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[4][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[4][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[4][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                        <div class="upload_img_p col-sm-2">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[5][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[5][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[5][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[6][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[6][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[6][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[7][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[7][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[7][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>	
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[8][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[8][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[8][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[9][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[9][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[9][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[10][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[10][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[10][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[11][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[11][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[11][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[12][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[12][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[12][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[13][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[13][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[13][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[14][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[14][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[14][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[15][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[15][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[15][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[16][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[16][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[16][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                               <?php if(!empty($video_file[17][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[17][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[17][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[18][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[18][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[18][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[18][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[19][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[19][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[20][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[20][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[20][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[21][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[21][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[21][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>	
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[22][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[22][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[22][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[23][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[23][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[23][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[24][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[24][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[24][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <?php if(!empty($video_file[25][0])){ ?>
                                                    <a data-lightbox="mygallery" href="<?php echo wp_get_attachment_image_url($video_file[25][0],'full'); ?>"><?php echo wp_get_attachment_image($video_file[25][0],'full', false, array( "class" => "profile-pic" )); ?></a>
                                                <?php }else{ ?>
                                                    <h2></h2>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                            </div>
                                        </div>
                                    </div>  
                                
                                </div>    </div>    
                            
                            </div>

                    </div>
                      </div>
    </div>    
</div></div>


<?php
    
get_footer();
