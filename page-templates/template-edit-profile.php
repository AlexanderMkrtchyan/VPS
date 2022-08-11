<?php
/**
 * Template Name: Edit Profile
 *
 * @package WordPress
 * @subpackage qs
 * @since quigleyshore
 */
get_header(); ?>
<style>
    #upload-group-inner {
	padding: 0px !important;
}
#upload-group-single {
	padding: 0px !important;
}
#upload-group-inner {
	padding: 0px !important;
	float: left;
	width: 100%;
}
#upload-group-single {
	padding: 0px !important;
	float: left;
	width: 100%;
}
.gutter-y-30 > div {
	float: left;
	width: 100%;
}
#upload-group-single h3 {
	float: left;
	width: 100%;
}
.row.gutter-y-30 {
	margin-bottom: 0px !important;
}
.row.gutter-y-30 p {
	width: 100%;
	float: left;
	margin-left: 13px;
	color: #fff;
	margin-top: -20px !important;
	margin-bottom: 20px !important;
}
.col-md-8 {
	padding-bottom: 0px !important;
}
.qs-profile--item.bgc-darker.h380 {
	float: left;
	width: 100%;
}
.im_pae {
	width: 140px;
	overflow: hidden;
	border-radius: 100px;
	margin: auto;
}
.row.gutter-y-30 .profile_text p {
	margin-top: 9px !important;
	margin-bottom: 0px !important;
	margin-left: 0px !important;
}
.profile_text h2 {
	color: #c8c8c8 !important;
	margin-bottom: 0px !important;
	margin-top: 1px !important;
	float: left;
	width: 100%;
	font-size: 21px;
	letter-spacing: 2px;
}
.row.gutter-y-30 .profile_text p {
	margin-top: 9px !important;
	margin-bottom: 10px !important;
	margin-left: 0px !important;
	line-height: 20px;
}
</style>
<?php
function pidridze(){
    if(wp_get_attachment_image_url(8887, 'thumbnail')){
        echo  wp_get_attachment_image_url(8887, 'thumbnail');
    }else{
        echo 'no image boz@';
    }
}
$args = array(
    'post_type' => 'attachment',
    'post_mime_type' => array('image/jpeg', 'image/png', 'video/mp4', 'image/gif'),
    'post_status' => 'inherit',
    'posts_per_page' => 500,
    'author' => get_current_user_id(),
    'orderby' => 'title',
    );
    $query_images = new WP_Query($args);
?>
<style>
.centered{
    display: none;
    width: 100%;
    height: 100%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background: black;
    filter: blur(10px) contrast(20);
    opacity: 0.5;
    z-index: 1;
    }
.blob-1,.blob-2{
	width:35px;
	height:35px;
	position:absolute;
	background:#fff;
	border-radius:50%;
	top:50%;left:50%;
	transform:translate(-50%,-50%);
}
.blob-1{
	left:20%;
	animation:osc-l 2.5s ease infinite;
}
.blob-2{
	left:80%;
	animation:osc-r 2.5s ease infinite;
	background:#0ff;
}
@keyframes osc-l{
	0%{left:20%;}
	50%{left:50%;}
	100%{left:20%;}
}
@keyframes osc-r{
	0%{left:80%;}
	50%{left:50%;}
	100%{left:80%;}
}
.profile-data.col-lg-2 {
	padding: 0px !important;
	text-align: center;
}
.im_pae {
	width: 140px;
	overflow: hidden;
	border-radius: 100px;
}
.im_pae {
	margin-top: 56px;
}
#im_pae {
	position: relative;
}
.top-text {
	color: #c8c8c8 !important;
	font-size: 23px;
}
.profile_text {
	max-width: 150px;
	margin: auto;
}
.top-text {
	color: #c8c8c8 !important;
	font-size: 23px;
	line-height: normal;
	text-align: left;
}
#im_pae i {
	position: absolute;
	right: 40px;
	color: #c8c8c8;
	bottom: 0px;
	font-size: 19px;
}
.profile_text0 {
	float: left;
	width: 100%;
}
#profile_text {
	float: left;
	width: 100%;
	padding: 0px 10px 10px 10px;
	border: 1px solid #c8c8c8;
	margin-top: 19px;
}
#profile_text p {
	margin: 0px !important;
	float: left;
	width: 100%;
	margin-top: 8px !important;
	font-size: 20px;
	line-height: normal;
	color: #c8c8c8;
}
.h175 img, .h175 video {
	height: auto;
	width: 100%;
	object-fit: none !important;
}
.h175 img, .h175 video {
	height: 115%;
	width: 100%;
	object-fit: none !important;
}
.h380 img, .h380 video {
	height: 271px;
	width: 100%;
	-o-object-fit: cover;
	object-fit: cover;
}
.qs-profile--item.bgc-darker.h380 {
	height: auto;
}
.h175 img, .h175 video {
	height: auto;
	width: 100%;
	object-fit: cover !important;
}
.h175 {
	height: 115px;
	width: 100%;
}
.h175 {
	height: 158px;
	width: 100%;
}
.qs-profile--item.bgc-darker.h380 {
	height: 360px;
}
.h380 img, .h380 video {
	height: 360px;
}
.qs-profile--item.bgc-darker.h380 p {
	margin-top: 0px !important;
	margin-left: 0px !important;
}

.profile-data .h380 img,.profile-data .h380 video {
	height: 271px;
	width: 100%;
	-o-object-fit: cover;
	object-fit: cover;
}
.profile-data .qs-profile--item.bgc-darker.h175 {
	overflow: hidden !important;
	height: 172px;
}
#upload-group-inner .col-md-8.left-data {
	float: right !important;
}
body {
	overflow-x: hidden;
}
.col-md-8.left-data p {
	margin: 0px !important;
	margin-top: -10px !important;
}
.button_div {
	float: left;
	width: 100%;
	text-align: center;
}
.button_div button {
	padding: 2px 10px;
	background: #e2d8d9 !important;
	border: 0px !important;
	border-radius: 8px;
	margin-top: 7px;
}
.reen-btn button {
	background: #81e281 !important;
	width: 100%;
	font-size: 19px;
	letter-spacing: 2px;
}
.blue-btn button {
	background: #6ac5da !important;
	width: 100%;
	font-size: 19px;
	margin-top: 7px;
	letter-spacing: 2px;
}
.reen-btn {
	margin-top: 33px;
	margin-bottom: 18px;
}
#dropdownMenuButton {
	background: #d8d6d7 !important;
	padding: 0px 5px !important;
	color: #000 !important;
	width: 158px;
	text-align: left;
	border: none !important;
}
.o_back {
	float: left;
	width: auto;
	position: absolute;
}
.qs-profile--section-title {
	margin: 0px !important;
	float: right;
	border: none !important;
	width: 100%;
}
.qs-profile--section-title {
	margin: 0px !important;
	float: right;
	border: none !important;
}
.o_back_ {
	float: left;
	width: 100%;
}
#o_back {
	float: left;
	width: 100%;
}
.qs-section.bgc-dark {
	float: left;
	width: 100%;
}
.pae-title {
	width: 100%;
	float: left;
	text-align: center;
}
#o_back {
	display: flex;
	width: 100%;
	margin-top: 20px;
	float: left;
}
#upload-group-1 {
	padding-right: 0px !important;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<img style="display:none;" src="<?php echo wp_get_attachment_image_url(2410, 'thumbnail'); ?>" alt="" id="hidden_no_image">
<video style="display:none;" src="<?php echo get_template_directory_uri().'/videos/demo.mp4'; ?>" id="hidden_no_video"></video>
<?php //get_template_part( 'blocks/block-profile-top', get_post_type() );?>

<section class="qs-section bgc-dark">
    <div class="container">
        <div class="o_back_"><div class="o_back">
                   <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Go Back
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Account</a>
                    <a class="dropdown-item" href="#">Privacy &amp;Safety</a>
                    <a class="dropdown-item" href="#">Notification</a>
                    <a class="dropdown-item" href="#">Membership</a>
                  </div>
                </div>
               </div>
               <div class="pae-title"> <h2 class="qs-profile--section-title">Edit public</h2></div></div>
       <div id="o_back">
        
        <div class="row gutter-y-30">
            <div class="profile-data col-lg-5">
              <div id="upload-group-inner" class="col-lg-12">
               
               <div class="row gutter-y-30" style="display:block !important;">
                   <div class="col-md-8 left-data">
                       <h3 class="color-white" style="margin-top: 50px;">Click a Vault to edit</h3>
                       <div class="row gutter-y-30">
                        <?php
                        $img_count = 0;
                        foreach ($query_images->posts as $image) {
                            if(metadata_exists('post', $image->ID, 'privacy_status')){

                            if( get_post_meta($image->ID, 'privacy_status')[0] == 'public_image' && $img_count<2){
                                $img_src = wp_get_attachment_image_src( $image->ID,'thumbnail',false );
                                ?>
                                <div class="col-xsm-12" style="padding-bottom: 16px;">
                                    <div class="qs-profile--item bgc-darker h175">
                                        <label class="qs-chk-rad chk-rad-primary">
                                            <div class = "centered">
                                                <div class = "blob-1"></div>
                                                <div class = "blob-2"></div>
                                            </div>
                                            <input class="public_checkbox" type="checkbox" name="remember">
                                            <span></span>
                                            <img class="public_images" image-id="<?php echo $image->ID; ?>" src="<?php echo $img_src[0]; ?>" alt="syodr">
                                        </label>
                                    </div>
                                </div>
                                <?php 
                                $img_count++;
                            }
                        }
                    }
                        $i = 0; 
                            
                        ?>
                            
                        </div>
                       <div class="button_div">
                            <div class="wite-btn">
                                <button>Upload Wallpaper</button>
                            </div>
                            
                            <div class="reen-btn">
                                <button>Click for referal links</button>
                            </div>
                            <div class="blue-btn">
                                <button>Run Page Promotion</button>
                            </div>
                        </div>
                   </div>
               </div>
           </div>
           </div>
          
            <div class="profile-data col-lg-2">
                <div id="im_pae">
                    <div class="im_pae">
                        <img src="http://quigleyoats22.org/wp-content/uploads/2021/10/girl7-150x150.jpg" alt="" id="hidden_no_image">
                    <i class="fa fa-edit"></i>
                    </div>
                </div>
                <div class="profile_text0">
                    <div class="profile_text">    
                        <p class="top-text">Madison 23 Dallas, Tx USA</p>
                        <h2><i class="fa fa-edit"></i> About Me</h2>
                    </div>
                </div>
                <div id="profile_text">
                        <p>Customize your profile to fit your style! Let<br> members exploring<br> your<br> page get to know the real you! Make it <br>eye catching!</p>
                    </div>
            </div>
            <div id="upload-group-1" class="col-lg-5">
                <div id="upload-group-inner" class="col-lg-12">
               <h3 class="color-white">My Public Photos</h3>
               <div class="row gutter-y-30" style="display: block !important;">
                   <div class="col-md-8">
                       <div class="row gutter-y-30">
                        <?php
                        $img_count = 0;
                        foreach ($query_images->posts as $image) {
                            if(metadata_exists('post', $image->ID, 'privacy_status')){

                            if( get_post_meta($image->ID, 'privacy_status')[0] == 'public_image' && $img_count<4){
                                $img_src = wp_get_attachment_image_src( $image->ID,'thumbnail',false );
                                ?>
                                <div class="col-xsm-6" style="padding-right:0px;">
                                    <div class="qs-profile--item bgc-darker h175">
                                        <label class="qs-chk-rad chk-rad-primary">
                                            <div class = "centered">
                                                <div class = "blob-1"></div>
                                                <div class = "blob-2"></div>
                                            </div>
                                            <input class="public_checkbox" type="checkbox" name="remember">
                                            <span></span>
                                            <img class="public_images" image-id="<?php echo $image->ID; ?>" src="<?php echo $img_src[0]; ?>" alt="syodr">
                                        </label>
                                    </div>
                                </div>
                                <?php 
                                $img_count++;
                            }
                        }
                    }
                        $i = 0; 
                            while($i<4-$img_count){
                                if($i<4){
                                ?> 
                                <div class="col-xsm-6">
                                    <div class="qs-profile--item bgc-darker h175">
                                        <label class="qs-chk-rad chk-rad-primary">
                                            <div class = "centered">
                                                <div class = "blob-1"></div>
                                                <div class = "blob-2"></div>
                                            </div>
                                            <input class="public_checkbox" type="checkbox" name="remember">
                                            <span></span>
                                            <img class="public_images" src="<?php pidridze(); ?>" alt="syodr">
                                        </label>
                                    </div>
                                </div>
                                <?php
                                $i++;
                                }
                            }
                        ?>
                            
                        </div>
                   </div>
                       <div class="col-md-4">
                       <div class="qs-profile--item bgc-darker h380">
                            <label class="qs-chk-rad chk-rad-primary">
                                <div class = "centered">
                                    <div class = "blob-1"></div>
                                    <div class = "blob-2"></div>
                                </div>
                                <input class="public_checkbox" type="checkbox" name="remember">
                                <span></span>
                                <img class="public_images" image-id="<?php echo $img_count==4 ?  $image->ID : ""; ?>" src="<?php echo $img_count==4 ?  $img_src[0] : pidridze(); ?>" alt="syodridze">
                            </label>
                        </div>
                    </div> 
                   <div class="col-md-12" style="display:none;">
                       <div class="qs-profile--buttons mt0">
                           <button id="upl_img" class="qs-btn btn-primary upl-button btn-sm">
                               <span>Upload Images</span>
                               <input id="public_images" accept="image/*"  multiple type="file">
                           </button>
                           <button id="del_img" class="qs-btn btn-primary upl-button btn-sm">
                               <span>Delete Images</span>
                           </button>
                           <button id="save_img" class="qs-btn btn-primary upl-button btn-sm">
                               <span>Save Images</span>
                           </button>
                       </div>
                   </div>
                   <p>Upload 5 Public Photos for all members to see</p>
               </div>
           </div>
           <div id="upload-group-single" class="col-lg-12">
               <h3 class="color-white">My Public Video</h3>
               <div class="qs-profile--item bgc-darker h380">
                            <?php 
                            $val = 0;
                            foreach ($query_images->posts as $image) {
                                if(metadata_exists('post', $image->ID, 'privacy_status')){

                                if( get_post_meta($image->ID, 'privacy_status')[0] == 'public_video'){
                                    $video_src = wp_get_attachment_url( $image->ID);
                                    ?>
                                    <div class = "centered">
                                                        <div class = "blob-1"></div>
                                                        <div class = "blob-2"></div>
                                                </div>
                                    <label class="qs-chk-rad chk-rad-primary">
                                        <input type="checkbox" name="remember">
                                        <span></span>
                                        <video id="public_video" data-id="<?php echo $image->ID; ?>" controls class="play-controls--video" src="<?php echo $video_src; ?>"></video>
                                    </label>
                                    <?php 
                                   $val++;
                                }
                            }
                        }
                            if($val == 0){
                                ?>
                                <div class = "centered">
                                                        <div class = "blob-1"></div>
                                                        <div class = "blob-2"></div>
                                </div>
                                <label class="qs-chk-rad chk-rad-primary">
                                        <input type="checkbox" name="remember">
                                        <span></span>
                                        <video id="public_video" data-id="" controls class="play-controls--video" src=""></video>
                                </label>
                                <?php 
                            }
                            ?>   
                    <p>Upload 5 Public Photos for all members to see</p>        
               </div>
               <div class="qs-profile--buttons" style="display:none;">
                   <button class="qs-btn btn-primary upl-button btn-sm">
                       <span>Upload Video</span>
                       <input id='public_input_video' accept="video/*"  type="file">
                   </button>
                   <button id='public_delete_video' class="qs-btn btn-primary upl-button btn-sm">
                       <span>Delete Video</span>
                   </button>
                   <button id='public_save_video' class="qs-btn btn-primary upl-button btn-sm">
                       <span>Upload Video</span>
                   </button>
               </div>
               </div>
           </div></div>
        </div>
    </div>
</section>

<button class="qs-btn btn-green save-btn">Save</button>
<?php
get_footer();
