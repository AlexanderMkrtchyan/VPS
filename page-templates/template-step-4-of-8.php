<?php
/**
 * Template Name: Step 4 of 8
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
  
   if(!empty($_FILES)){
        require( dirname(__FILE__) . '/../../../../wp-load.php' );
        $j=1;
      
        $wordpress_upload_dir = wp_upload_dir();
        $user_dirname = $wordpress_upload_dir['path'] . '/user_' . $user_id;
        if(!file_exists($user_dirname)) wp_mkdir_p($user_dirname);
        for($l=1;$l<=sizeof($_FILES);$l++){
            $i = 1; // number of tries when the file with the same name is already exists
            
            $profilepicture = $_FILES['video_file'.$l];
            
            if($profilepicture['size']!=0){
               
                $new_file_path = $user_dirname . '/' .$profilepicture['name'];
                $new_file_mime = mime_content_type( $profilepicture['tmp_name'] );
                
                while( file_exists( $new_file_path ) ) {
                	$i++;
                	$new_file_path = $wordpress_upload_dir['path'] . '/' . $i . '_' . $profilepicture['name'];
                }
                
               
                // looks like everything is OK
                if( move_uploaded_file( $profilepicture['tmp_name'], $new_file_path ) ) {
                	
                
                	$upload_id = wp_insert_attachment( array(
                		'guid'           => $new_file_path, 
                		'post_mime_type' => $new_file_mime,
                		'post_title'     => preg_replace( '/\.[^.]+$/', '', $profilepicture['name'] ),
                		'post_content'   => '',
                		'post_status'    => 'inherit'
                	), $new_file_path );
                
                	// wp_generate_attachment_metadata() won't work if you do not include this file
                	require_once( ABSPATH . 'wp-admin/includes/image.php' );
                
                	// Generate and save the attachment metas into the database
                	wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $new_file_path ) );
            }  
             $video_file_1 = get_user_meta($user_id,"video_file_1");
             $video_file_2 = get_user_meta($user_id,"video_file_2");
             $video_file_3 = get_user_meta($user_id,"video_file_3");
             $video_file_4 = get_user_meta($user_id,"video_file_4");
             $video_file_5 = get_user_meta($user_id,"video_file_5");
             if($l==1){
                if(!empty($video_file_1)){
                    update_user_meta($user_id,"video_file_1",$upload_id);
                }else{
                    add_user_meta($user_id,"video_file_1",$upload_id);
                }
             }
            if($l==2){
                if(!empty($video_file_2)){
                    update_user_meta($user_id,"video_file_2",$upload_id);
                }else{
                    add_user_meta($user_id,"video_file_2",$upload_id);
                }
            }
            if($l==3){
                if(!empty($video_file_3)){
                    update_user_meta($user_id,"video_file_3",$upload_id);
                }else{
                    add_user_meta($user_id,"video_file_3",$upload_id);
                }
            }
            if($l==4){
                if(!empty($video_file_4)){
                    update_user_meta($user_id,"video_file_4",$upload_id);
                }else{
                    add_user_meta($user_id,"video_file_4",$upload_id);
                }
            }
            if($l==5){
                if(!empty($video_file_5)){
                    update_user_meta($user_id,"video_file_5",$upload_id);
                }else{
                    add_user_meta($user_id,"video_file_5",$upload_id);
                }
            }
        }   
      
        $j++;
    }  }
     
        $video_file1 = get_user_meta($user_id,"video_file_1");
        $video_file2 = get_user_meta($user_id,"video_file_2");
        $video_file3 = get_user_meta($user_id,"video_file_3");
        $video_file4 = get_user_meta($user_id,"video_file_4");
        $video_file5 = get_user_meta($user_id,"video_file_5");
 
       ?>
<link rel='stylesheet' href='<?php echo get_site_url(); ?>/wp-content/themes/dating/css/step5.css' media='all' />
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
	background: url(<?php echo get_site_url(); ?>/wp-content/themes/dating/images/profile_bg.jpg);
	float: left;
	width: 100%;
	background-attachment: fixed;
	background-repeat: no-repeat;
	background-position: center;
	background-size: cover;
}.uplodss {
	background: #d9d9d9;
	height: 184px;
	float: left;
	width: 100%;
	display: table;
	position: relative;
}
main { display: table; }
.step5.proff .row {
	width: 100%;
	float: left;
	background-color: rgba(255,255,255,.55);
	padding: 30px;
}
.inner-part {
	padding: 70px 50px;
	width: 100%;
	position: relative;
	object-fit: cover !important;
	height: auto;
	display: table-cell;
	vertical-align: middle;
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
</style>

<script src='https://code.jquery.com/jquery-2.2.4.min.js' type='text/javascript'></script>
<script>
	$(document).ready(function() {

    
    var readURL = function(input,dd) {
       if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $(dd).removeAttr('style');
                $(dd).removeAttr('srcset');
                $(dd).attr('src', e.target.result);
               
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").each(function(){
        $(this).on('change', function(){
            var dd = $(this).parent().find('.profile-pic');
            readURL(this,dd);
        });
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
});
</script>
<style type="text/css">
.button_div input, .button_div a {
	background: #0a6d91 !important;
	color: #fff !important;
	font-size: 20px;
	margin-top: 0px !important;
	height: 29px;
	border: none !important;
	line-height: 20px;
	float: ;
}
    #join_now_modal{
        display:none;
        position: fixed;
        width: 60%;
        background: #000000;
        margin-left: 20%;
        padding: 58px;
        top: 30%;
        left:0;
        border-radius: 22px;
    }
    .modal_heading{
        color:#ffffff;
        font-family: Catamaran,sans-serif;
    }
    #join_now_modal {
    	border: 2px solid #c9a933;
    	box-shadow: 0px 0px 15px #c9a93378;
    }
    .close_btn_modal{
        position: absolute;
        top: 22px;
        right: 40px;
        background: transparent;
        color: #fff;
        font-size: 20px;
        box-shadow: none;
        border: 0;
    }
    #drag-container img, #drag-container .register_req, #drag-container video {
	filter: blur(0px) !important;
}
@media screen and (max-width:480px){
    #join_now_modal {
    	display: none;
    	position: fixed;
    	width: 76%;
    	background: #000000;
    	margin-left: 10%;
    	padding: 40px 20px 0px 20px;
    	top: 10%;
    	border-radius: 22px;
    }
    .close_btn_modal {
    	position: absolute;
    	top: 2px;
    	right: 7px;
    	background: transparent;
    	color: #fff;
    	font-size: 20px;
    	box-shadow: none;
    	border: 0;
    }.col-sm-6.step4right {
	float: left;
	height: auto;
}.inner-part_2 {
	display: block;
	width: 100%;
	height: auto;
}
}

</style>
<div class='step5 proff' style="display: table-cell;vertical-align: middle;">
    <div class="container">
        <div class="row" style="margin: 0px !important;">
            <form action="<?php echo get_site_url(); ?>/upload-images/" method="post" style="display: flex;" enctype="multipart/form-data">
                <div class="step-5-wrap">
                    <div class="col-sm-6 step4right" style="padding-left: 0px !important;">
                            <div class="inner-part_2">
                                <div class="upload_imgs col-sm-8" >
                                    <div class="upload_img_1 col-sm-6">
                                        <div class="uplodss">
                                            <h2>Upload Image</h2>
                                            <?php if(!empty($video_file1[0])){ ?>
                                                <?php echo wp_get_attachment_image($video_file1[0],'full', false, array( "class" => "profile-pic" )); ?>
                                            <?php }else{ ?>
                                                <img style="opacity:0; <?php if($user_id==0){ ?> z-index:99;<?php } ?>" class="profile-pic <?php if($user_id==0){ ?> bozi_txa<?php } ?>" src="">
                                           <?php } ?>
                                            <input class="file-upload" type="file" name="video_file1" />
                                        </div>
                                    </div>    
                                    <div class="upload_img_1 col-sm-6">
                                        <div class="uplodss">
                                            <h2>Upload Image</h2>
                                           <?php if(!empty($video_file2[0])){ ?>
                                                <?php echo wp_get_attachment_image($video_file2[0],'full', false, array( "class" => "profile-pic" )); ?>
                                            <?php }else{ ?>
                                                <img style="opacity:0; <?php if($user_id==0){ ?> z-index:99;<?php } ?>" class="profile-pic <?php if($user_id==0){ ?> bozi_txa<?php } ?>" src="">
                                           <?php } ?>
                                             <input class="file-upload" type="file" name="video_file2" />
                                        </div>
                                    </div>
                                    <div class="upload_img_1 bttmm col-sm-6">
                                        <div class="uplodss">
                                            <h2>Upload Image</h2>
                                             <?php if(!empty($video_file3[0])){ ?>
                                                <?php echo wp_get_attachment_image($video_file3[0],'full', false, array( "class" => "profile-pic" )); ?>
                                            <?php }else{ ?>
                                                <img style="opacity:0; <?php if($user_id==0){ ?> z-index:99;<?php } ?>" class="profile-pic <?php if($user_id==0){ ?> bozi_txa<?php } ?>" src="">
                                           <?php } ?>
                                             <input class="file-upload" type="file" name="video_file3" />
                                        </div>
                                    </div>    
                                    <div class="upload_img_1 bttmm col-sm-6">
                                        <div class="uplodss">
                                            <h2>Upload Image</h2>
                                             <?php if(!empty($video_file4[0])){ ?>
                                                <?php echo wp_get_attachment_image($video_file4[0],'full', false, array( "class" => "profile-pic" )); ?>
                                            <?php }else{ ?>
                                                <img style="opacity:0; <?php if($user_id==0){ ?> z-index:99;<?php } ?>" class="profile-pic <?php if($user_id==0){ ?> bozi_txa<?php } ?>" src="">
                                           <?php } ?>
                                             <input class="file-upload" type="file" name="video_file4" />
                                        </div>
                                    </div>
                                </div>  
                                <div class="upload_imgs col-sm-4">
                                    <div class="uplodss">
                                        <h2>Upload Image</h2>
                                             <?php if(!empty($video_file5[0])){ ?>
                                                <?php echo wp_get_attachment_image($video_file5[0],'full', false, array( "class" => "profile-pic" )); ?>
                                            <?php }else{ ?>
                                                <img style="opacity:0; <?php if($user_id==0){ ?> z-index:99;<?php } ?>" class="profile-pic <?php if($user_id==0){ ?> bozi_txa<?php } ?>" src="">
                                           <?php } ?>
                                             <input class="file-upload" type="file" name="video_file5" />
                                    </div>
                                </div>    
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6 left rivideo">
                        <div class="inner-part">
                            <h2>Upload Public Profile Photos</h2>
                            <p>Choose five photos to upload of yourself. This five photos will be visible to all members visiting your page.<br>This photos can be changed later.</p>
                            
                        </div>
                        <div class="button_div">
                                <a href="<?php echo $previous; ?>" class="back-btn">Go back</a>
                                
                                <?php if($user_id==0){ ?>
                                    <a class="back-btn  bozi_txa">Submit</a>
                                <?php }else{ ?>
                                    <input type='submit' class="back-btn" value='Submit' />
                                <?php } ?>
                            </div>
                    </div>
                </div> 
            </form>    
        </div>
    </div>    
</div>
<div id="join_now_modal">
    <div id="join_now_modal_inner">
        <div class="text-center">
            <button class="close_btn_modal" type="button">x</button>
            <h3 class="modal_heading">Sorry, babe. If you want to upload the image, you have to first join/Login to Quigley Shores.</h3>
            <a href="<?php echo get_site_url() . '/join-the-quest/join-step-1/' ?>" class="qs-btn btn-primary mt30">Join The
                Quest</a>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.upload_img_1.col-sm-6,.upload_imgs.col-sm-4,.button_div').each(function(){
            $(this).find('.bozi_txa').click(function(){
                $('#join_now_modal').show();
            }); 
        }); 
        $('.close_btn_modal').click(function(){
            $('#join_now_modal').hide();
        }); 
    });

</script>
<?php
    
get_footer();
