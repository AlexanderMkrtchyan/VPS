<?php
/**
 * Template Name: Step 5 of 8
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
        
            $i = 1; // number of tries when the file with the same name is already exists
            
            $profilepicture = $_FILES['video_file'];
            
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
             $video_upload = get_user_meta($user_id,"video_upload");
             
             if(!empty($video_upload)){
                    update_user_meta($user_id,"video_upload",$upload_id);
                }else{
                    add_user_meta($user_id,"video_upload",$upload_id);
                }
            
        }   
      
      
     }
     
        $video_upload = get_user_meta($user_id,"video_upload");
        
 
       ?>
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
	padding-bottom: 38px;
}.inner-part_2 {
	display: table;
	width: 100%;
	height: 100%;
}
.step5.proff .row {
	width: 100%;
	float: left;
	background-color: rgba(255,255,255,.55);
	padding: 30px;
}

.inner-part_2 {
	display: table;
	width: 100%;
	height: 100%;
	background: #d9d9d9;
}.col-sm-6.right {
	float: left;
	height: 100%;
	text-align: center;
	background: none;
}main { display: table; }

@media screen and (max-width:768px){
   .inner-part_2 input {
    	height: 250px !important;
    }
    .inner-part_2 h2 {
    	width: 100%;
    	display: table-cell;
    	vertical-align: middle;
    	text-align: center;
    	height: 250px;
    }
    .inner-part_2 {
    	margin-top:40px;
    }
    .inner-part {
    	padding: 0px;
    	background: none !important;
    }
    .inner-part {
    	padding: 30px;
    }
    main { margin-bottom: 0px !important; padding: 0px !important; }
}

@media screen and (min-width:1100px){
    .step5.proff .container {
    	max-width: 1200px;
    }
}</style>

<script>
	$(document).ready(function() {
document.getElementsByTagName('input')[0].addEventListener('change', function(event) {
  var file = event.target.files[0];
  var fileReader = new FileReader();
  if (file.type.match('image')) {
    fileReader.onload = function() {
      var img = document.createElement('img');
      img.src = fileReader.result;
      document.getElementsByTagName('video')[0].appendChild(img);
    };
    fileReader.readAsDataURL(file);
  } else {
    fileReader.onload = function() {
      var blob = new Blob([fileReader.result], {type: file.type});
      var url = URL.createObjectURL(blob);
      var video = document.createElement('video');
      var timeupdate = function() {
        if (snapImage()) {
          video.removeEventListener('timeupdate', timeupdate);
          video.pause();
        }
      };
      video.addEventListener('loadeddata', function() {
        if (snapImage()) {
          video.removeEventListener('timeupdate', timeupdate);
        }
      });
      var snapImage = function() {
        var canvas = document.createElement('canvas');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
        var image = canvas.toDataURL();
        var success = image.length > 100000;
        if (success) {
          var img = document.createElement('img');
          img.src = image;
          document.getElementsByTagName('video')[0].appendChild(img);
          URL.revokeObjectURL(url);
        }
        return success;
      };
      video.addEventListener('timeupdate', timeupdate);
      video.preload = 'metadata';
      video.src = url;
      // Load video in Safari / IE11
      video.muted = true;
      video.playsInline = true;
      video.play();
    };
    fileReader.readAsArrayBuffer(file);
  }
});
});
</script>
<div class='step5 proff' style="display: table-cell;vertical-align: middle;">
    <div class="container">
        <div class="row" style="margin: 0px !important;">
            <form action="<?php echo get_site_url(); ?>/upload-video/" method="post" style="display: flex;" enctype="multipart/form-data">
                <div class="step-5-wrap">
                    <div class="step-5-wrap">
                        <div class="col-sm-6 left">
                            <div class="inner-part">
                                <h2>Upload Public Profile Video</h2>
                                <p>Choose one video of yourself to be displayed on your public profile page. This video will be visible to all members visiting your page.<br><br> This video can be Changed later.</p>
                                
                            </div>
                            <div class="button_div">
                                    <button class="back-btn">Go back</button>
                                    <button class="submit-btn">Submit</button>
                                </div>
                        </div>
                        <div class="col-sm-6 right">
                            <div class="inner-part_2">
                                <h2>Upload Video</h2>
                                <input type="file" name="video_file" />
                                dsdsd<video id="thank_video" controls="" class="height" poster="https://kleoseo.com/indica/wp-content/uploads/2022/02/video-capture-6893.png">

                    <source type="video/mp4" src="https://kleoseo.com/indica/wp-content/themes/dating/videos/final_1-24.mp4">

                </video>
                            </div>    
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
            <h3 class="modal_heading">Sorry, babe. If you want to upload the video, you have to first join/Login to Quigley Shores.</h3>
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
