<?php
/**
 * Template Name: Edit Public Profile
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
   print_r($user_id);
   if(isset($_POST)){
       if(isset($_POST['delete_video'])){
           $size = sizeof($_POST['delete_video']);
           if($size>0){
               for($r=0;$r<$size;$r++){
                   for($w=0;$w<=2;$w++){
                       $my_video = get_user_meta($user_id, "video_upload_".$w);
                      
                       if($my_video[0]==$_POST['delete_video'][$r]){
                            delete_user_meta($user_id, "video_upload_".$w);
    	                    wp_delete_attachment($_POST['delete_video'][$r]);	
                       }
                   }
               }
           }
       }
     if(isset($_POST['delete_video_1'])){ 
	    delete_user_meta($user_id, "video_upload_single");
	    wp_delete_attachment($_POST['delete_video_1']);	
    }
   }
   if(!empty($_FILES['bg_upload']['name']) && !isset($_POST['sel_img']) && !isset($_FILES['public_images']['name']) && !isset($_FILES['video_file_2']) && !isset($_FILES['video_file'])){
        
        require( dirname(__FILE__) . '/../../../../wp-load.php' );
        $j=1;$o=0;
        $wordpress_upload_dir = wp_upload_dir();
        $user_dirname = $wordpress_upload_dir['path'] . '/user_' . $user_id .'/bg';
        if(!file_exists($user_dirname)) wp_mkdir_p($user_dirname);
        
            $i = 1; // number of tries when the file with the same name is already exists
          
            $profilepicture = $_FILES['bg_upload'];
        
            $new_file_path = $user_dirname . '/' .$profilepicture['name'];
            $new_file_mime = mime_content_type( $profilepicture['tmp_name'] );
            
            while( file_exists( $new_file_path ) ) {
            	$i++;
            	$new_file_path = $user_dirname . '/' . $i . '_' . $profilepicture['name'];
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
        $bg_upload = get_user_meta($user_id,"bg_upload", true);

        if(!empty($bg_upload[0])){
            update_user_meta($user_id,"bg_upload",$upload_id);
        }else{
            add_user_meta($user_id,"bg_upload",$upload_id);
        }
        $bg_upload = get_user_meta($user_id,"bg_upload", true);
        
    } 
  
     if(!empty($_FILES['video_file'])){
        require( dirname(__FILE__) . '/../../../../wp-load.php' );
        $j=1;
      
        $user_dirname = 'videos/user_' . $user_id;
        if(!file_exists($user_dirname)) wp_mkdir_p($user_dirname);
        
            $i = 1; // number of tries when the file with the same name is already exists
            
            $profilepicture = $_FILES['video_file'];
            if($profilepicture['size']!=0){
                $new_file_path = $user_dirname . '/' .$profilepicture['name'];
                $new_file_mime = mime_content_type( $profilepicture['tmp_name'] );
                
                // looks like everything is OK
                if( move_uploaded_file( $profilepicture['tmp_name'], $new_file_path ) ) {
                	$video_upload = get_user_meta($user_id,"video_upload_single",true);
                	
                     if(empty($video_upload)){
                            add_user_meta($user_id,"video_upload_single",$profilepicture['name']);
                        }
            }  
             
            
        }   
      
      
     }
     
     if(!isset($_FILES['bg_upload']['name']) && !isset($_POST['sel_img']) && !empty($_FILES['public_images']['name']) && !isset($_FILES['video_file']) && !isset($_FILES['video_file_2'])){
        require( dirname(__FILE__) . '/../../../../wp-load.php' );
        $j=1;$o=0;
        $wordpress_upload_dir = wp_upload_dir();
        $user_dirname = $wordpress_upload_dir['path'] . '/user_' . $user_id;
        if(!file_exists($user_dirname)) wp_mkdir_p($user_dirname);
        foreach($_FILES['public_images'] as $images){
            $i = 1; // number of tries when the file with the same name is already exists
          
            $profilepicture = $_FILES['public_images'];
        
            $new_file_path = $user_dirname . '/' .$profilepicture['name'][$o];
            $new_file_mime = mime_content_type( $profilepicture['tmp_name'][$o] );
            
            while( file_exists( $new_file_path ) ) {
            	$i++;
            	$new_file_path = $user_dirname . '/' . $i . '_' . $profilepicture['name'][$o];
            }
          
            // looks like everything is OK
      if( move_uploaded_file( $profilepicture['tmp_name'][$o], $new_file_path ) ) {
            	$upload_id = wp_insert_attachment( array(
            		'guid'           => $new_file_path, 
            		'post_mime_type' => $new_file_mime,
            		'post_title'     => preg_replace( '/\.[^.]+$/', '', $profilepicture['name'][$o] ),
            		'post_content'   => '',
            		'post_status'    => 'inherit'
            	), $new_file_path );
            
            	// wp_generate_attachment_metadata() won't work if you do not include this file
            	require_once( ABSPATH . 'wp-admin/includes/image.php' );
            
            	// Generate and save the attachment metas into the database
            	wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $new_file_path ) );
        } 
        $video_file1 = get_user_meta($user_id,"video_file_".$j, true);
       
        if(empty($video_file1)){
            add_user_meta($user_id,"video_file_".$j,$upload_id);
        }
        $j++;$o++;
    }  }
    
    for($t=1;$t<=5;$t++){
        $video_file[$t] = get_user_meta($user_id,"video_file_".$t);
 
    }
    
    if(!empty($_FILES['video_file_2']['name'])){
        require( dirname(__FILE__) . '/../../../../wp-load.php' );
        $j=1;
        $total = count($_FILES['video_file_2']['name']);
        $user_dirname = 'videos/user_' . $user_id;
        if(!file_exists($user_dirname)) wp_mkdir_p($user_dirname);
            
            $i = 1; // number of tries when the file with the same name is already exists
            for($p=0;$p<$total;$p++){
                $profilepicture = $_FILES['video_file_2'];
                
                if($profilepicture['size']!=0){
                   
                    $new_file_path = $user_dirname . '/' .$profilepicture['name'][$p];
                    $new_file_mime = mime_content_type( $profilepicture['tmp_name'][$p] );
                    
                    
                    // looks like everything is OK
                    if( move_uploaded_file( $profilepicture['tmp_name'][$p], $new_file_path ) ) {
                        $video_upload = get_user_meta($user_id,"video_upload_".$p,true);
                        
                    	 if(empty($video_upload)){
                                add_user_meta($user_id, "video_upload_".$p, $profilepicture['name'][$p]);
                            }
                     }  } 
             
            
        }   
      
      
     }
     for($m=0;$m<=2;$m++){
         $video_upload1[$m] = get_user_meta($user_id,"video_upload_".$m);
     }
    $video_upload_single = get_user_meta($user_id,"video_upload_single"); 
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
	height: 140px;
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
}#delete_video_1,#delete_videos {
	position: absolute;
	top: 7px;
	right: 7px;
	width: 20px;
	height: 20px;
}.upload_imgs.col-sm-12 {
	position: relative;
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
	height: 301px;
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

#rpww .inner-part_2 {
	display: flex;
	width: 100%;
	height: 301px;
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
	max-width: 111px;
	padding: 0px 6px !important;
	float:left;
}
.upload_img_p.bttmm.col-sm-2 {
	margin-top: 17px;
}
.upload_img_p .uplodss {
	height: 99px;
}
 .upload_img_1.col-sm-6 {
	float: left;
	overflow: hidden;
	padding: 0px 15px !important;
}
.inner-part_2_2 #thank_video { 	display: block; 	width: 100%; 	position: relative; 	object-fit: cover !important; 	height: 170px; 	margin-top: 0px; 	margin-bottom: 0px; }
.inner-part_2_2 #thank_video {
	margin-bottom: 0px;
}
.rightonputs div, .rightonputs div img {
	height: 100%;
	object-fit: cover !important;
}.inner-part_2_2 .upload_imgs.col-sm-12 {
	height: 174px; margin-bottom: 20px;
}
.inner-part_2_2 img {
	object-fit: fill;
	width: 100%;
	height: 100%;
}.inner-part_2_2 img {
	object-fit: cover;
	width: 100%;
	height: 100%;
}p, span {
	font-family: arial !importnat;
	font-size: 16px;
}
</style>
<style>

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
	width:50px;
	height50px;
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
}.smily {
	width: auto;
	float: right;
	margin-top: 20px;
}
.descriptn_area {
	width: 100% !important;
	float: left;
}.smily {
	width: 100%;
	display: table-cell;
}
.smily span {
	width: 100px !important;
	position: relative;
	text-align: center !important;
}
.blocked_ristrict_mmbr .tabsall_sc .tabcontent .tab_cnt_cnt .descriptn_area img {
	width: 50px;
	height: 50px;
	object-fit: fill;
	margin-right: 0px;
	float: left;
	border-radius: 0px;
	border:none !important;
}.res {
	background: green;
	font-size: 10px;
	width: 100%;
	float: left;
	margin-top: 10px;
	text-align: center;
}.smily form {
	width: 100%;
	display: flex;
	justify-content: center;
}.res {
	background: green;
	font-size: 10px;
	width: 100px;
	text-align: center;
	color: white !important;
	margin: auto;
	float: none;
	margin-top: 20px;
}.emoji {
	font-size: 50px !important;
}.blocked_ristrict_mmbr {
	width: 100%;
	float: left;
	background: none;
	border-radius: 10px;
	overflow: hidden;
	padding: 0px;
	border: none !important;
}.blocked_ristrict_mmbr .tabsall_sc .tabcontent {
	width: 100%;
	float: left;
	padding: 0px 0;
}.blocked_ristrict_mmbr .tabsall_sc .tabcontent .tab_cnt_cnt {
	width: 100%;
	float: left;
	border-bottom: none;
	margin-bottom: 0px;
	padding-bottom: 0px;
}
</style>
<script src='https://code.jquery.com/jquery-2.2.4.min.js' type='text/javascript'></script>
<?php $bg_upload = get_user_meta($user_id,"bg_upload"); 
      
       if(empty($bg_upload)){ $bg_upload = get_site_url().'/wp-content/themes/dating/images/d_bg.jpg'; ?>
       <style>
           main {
	background: url('<?php echo $bg_upload; ?>');
	background-size:cover !important;
}
       </style>
  <?php  
       
       }else{?>
      <style>
          main {
	background: url('<?php echo wp_get_attachment_url($bg_upload[0]); ?>');
	background-size:cover !important;
}
      </style>
       <?php   } ?>
<script>
	$(document).ready(function() {
	    $('#sav_bgimg').click(function(){
	     $('#img_bgfomr').submit();  
	   }); 	
		
	 $("#bg_upload").on('change', function(event) {
	     u = 0;
	     var storedFiles = [];      
	    var myfiles = document.getElementById('bg_upload');
        var files = myfiles.files;
        var i=0;
        for (i = 0; i<files.length; i++) {
            var readImg = new FileReader();
            var file=files[i];
            if(file.type.match('image.*')){
                storedFiles.push(file);
                if(file.size<=5000000){
                    imagen[i] = URL.createObjectURL(file);
                    $('main').attr('style','background-image:url('+imagen[i]
                    +')  !important');
                }else{
                    alert('You cannot upload image larger than 5 MB');
                    imagen[i] = '';
                }
                readImg.onload = (function(file) {
                    return function(e) {
                };
            })(file);
        readImg.readAsDataURL(file);
        }else{
            alert('the file '+file.name+' is not an image<br/>');
        }
    }
	 });
	    
	    
	   $('#sav_img').click(function(){
	     $('#img_fomr').submit();  
	   }); 
	   var y=0;
	   $(".upload_img_1").each(function(){
    	    var tt = $(this).find('input').val();
    		if(tt==''){
    	        y=y+1;
    		}
    	});
    	console.log(y);
    	$(".upload_last").each(function(){
    	    var tt = $(this).find('input').val();
    		if(tt==''){
    	        y=y+1;
    		}
    	});
    	console.log(y);
		var i=0;	
		var u = 0;	
		var imagen = [];
		var chec = 0,m=0;
		
		
	 $("#public_images").on('change', function(event) {
	     u = 0;
	     var storedFiles = [];      
	    var myfiles = document.getElementById('public_images');
        var files = myfiles.files;
        var i=0;
        for (i = 0; i<files.length; i++) {
            var readImg = new FileReader();
            var file=files[i];
            if(file.type.match('image.*')){
                storedFiles.push(file);
                if(file.size<=5000000){
                    imagen[i] = URL.createObjectURL(file);
                }else{
                    alert('You cannot upload image larger than 5 MB');
                    imagen[i] = '';
                }
                readImg.onload = (function(file) {
                    return function(e) {
                };
            })(file);
        readImg.readAsDataURL(file);
        }else{
            alert('the file '+file.name+' is not an image<br/>');
        }
    }
    
    $(".upload_img_1").each(function(){
            var tt = $(this).find('img').not('.fakeimg').attr('src');
        	if(typeof(tt) === 'undefined'|| tt === ''){
                $(this).find('.uplodss').append('<img src="'+imagen[u]+'" class="fakeimg profile-pic" alt="" loading="lazy" width="500">');
                u=u+1;
            }
        });
    
     if(y>u){
        $(".upload_last").each(function(){
                var tt = $(this).find('img').not('.fakeimg').attr('src');
            	if(typeof(tt) === 'undefined'|| tt === ''){
                    $(this).find('.uplodss').append('<img src="'+imagen[u]+'" class="fakeimg profile-pic" alt="" loading="lazy" width="500">');
                    u=u+1;
                }
            });
         }
    $(".upload_img_1, .upload_last").each(function(){
	    var tt = $(this).find('input').val();
		if(tt != ''){
	        chec = 1;
		}
	});
    if(chec == 1){
	   $('#upl_img').find('span').addClass('active');
	   $("#upl_img span").click(function(e){
	   return alert("you cannot upload more images");
	});
	         
	    }
});
	    
	    
     $('#save_img_1').click(function(){
	     $('#pmg_fomr').submit();  
	   }); 
	   	var i=0;	
		var u = 0;	
		var imagen = [];
		var chec = 0,m=0;
		
		
	 $("#private_images").on('change', function(event) {
	     u = 0;
	     var storedFiles = [];      
	    var myfiles = document.getElementById('private_images');
        var files = myfiles.files;
        
        var i=0;
        for (i = 0; i<files.length; i++) {
            var readImg = new FileReader();
            var file=files[i];
            if(file.type.match('image.*')){
                storedFiles.push(file);
                if(file.size<=5000000){
                    imagen[i] = URL.createObjectURL(file);
                }else{
                    alert('You cannot upload image larger than 5 MB');
                    imagen[i] = '';
                }
                readImg.onload = (function(file) {
                    return function(e) {
                };
            })(file);
        readImg.readAsDataURL(file);
        }else{
            alert('the file '+file.name+' is not an image<br/>');
        }
    }
    
    $(".upload_img_p").each(function(){
            var tt = $(this).find('img').not('.fakeimg').attr('src');
        	if(typeof(tt) === 'undefined'|| tt === ''){
                $(this).find('.uplodss').append('<img src="'+imagen[u]+'" class="fakeimg profile-pic" alt="" loading="lazy" width="500">');
                u=u+1;
            }
        });
    
     
    $(".upload_img_p").each(function(){
	    var tt = $(this).find('input').val();
		if(tt != ''){
	        chec = 1;
		}
	});
    if(chec == 1){
	   $('#upl_img1').find('span').addClass('active');
    	   $("#upl_img1 span").click(function(e){
    	   return alert("you cannot upload more images");
    	});
	         
	    }
});
	    
	    
	    
	});
</script>

<script>
	$(document).ready(function() {
	    $('.fa.fa-edit').click(function(){
	        $('video').hide();
            $('.inner-part_2 input').show();
            $('.fa.fa-edit').hide();
            $('.inner-part_2 h2').show();
                  
	    })
	    
                  
	  $('input[name="video_file"]').change(function() {
          var file = event.target.files[0];
          var check = $('.rightonputs img').attr('src');
          if(typeof(check) == 'undefined' || check === ''){
              alert("Remove the existing video");
              return false;;
          }
          var fileReader = new FileReader();
          if (file.type.match('image')) {
            fileReader.onload = function() {
              var img = document.createElement('img');
              img.src = fileReader.result;
              $('.rightonputs img').attr('src',img.src);
            
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
                  $('.rightonputs img').attr('src',img.src);
                  $('.rightonputs video').show();
                  $('.rightonputs input[type="checkbox"]').hide();
                  $('.fa.fa-edit').show();
                  
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
        
        
        $('#video_file_2').change(function() {
            var files = event.target.files;
           var size = files.length-1;
           var imgg=new Array();
           for(var r=0; r<files.length;r++){
                      var file = event.target.files[r];
                      console.log(r);
                       var fileReader = new FileReader();
                          if (file.type.match('image')) {
                              
                            fileReader.onload = function() {
                              var img = document.createElement('img');
                              img.src = fileReader.result;
                              
                              $(this).find('img').attr('src',img.src);
                              
                                return false;
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
                                 imgg[r] = img.src
                                
                                  
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
                     
                  }
           
           var g =0;
          $('.inner-part_2_2 .col-md-12').each(function(){
              $.each(imgg, function(index, value){
                console.log(index + ": " + value + '<br>');
            });
             // var check = $(this).find('img').attr('src');
             // var thiss = $(this);
             // g++;
             // if(typeof(check) !== 'undefined' || check !== ''){
                  
                   /*thiss.find('img#img'+r).attr('src',img.src);
                                  thiss.find('video').show();
                                  thiss.find('input[type="checkbox"]').hide();
                                  $('.fa.fa-edit').show(); */
             // }
          });
        });
});
</script>
<?php if($user_id!=0){ ?>
<div class="edit_background">
    <form id="img_bgfomr" action="<?php echo get_site_url(); ?>/edit-public-profile/" method="post" enctype="multipart/form-data">
        <input type="file" name="bg_upload" id="bg_upload" />
        <h2><i class="fa fa-edit"></i> Upload Backgound Image</h2>
        <button id="sav_bgimg" class="qs-btn btn-primary upl-button btn-sm">Save</button>
    </form>
</div>
<?php } ?>
<div class='step5 proff'>
    <div class="container">
       
        <?php get_template_part( 'blocks/block-profile-top', get_post_type() );  ?>
        <div class="title-page">
            <h2>My Public Profile</h2>
        </div>
        
        <div id="rpww" class="row" style="margin: 0px !important; margin-bottom:30px !important;">
            	<?php
           
			if(isset($_POST)){
			    if(isset($_POST['sel_img'])){
					if(is_array($_POST['sel_img']) && sizeof($_POST['sel_img'])>1){
					    
					   	foreach($_POST['sel_img'] as $img_id){
					   	    for($t=1;$t<=sizeof($_POST['sel_img']);$t++){
                                $video_file[$t] = get_user_meta($user_id,"video_file_".$t, true);
                                if($video_file[$t][0]==$img_id){
                                    delete_user_meta($user_id,"video_file_".$t);
                                }
                            }
					   	    wp_delete_attachment($img_id);
					   	    
   
						}						
					}else{
					    for($t=1;$t<=5;$t++){
                                $video_file[$t] = get_user_meta($user_id,"video_file_".$t, true);
                               
                                if($video_file[$t][0]===$_POST['sel_img'][0]){
                                    delete_user_meta($user_id,"video_file_".$t);
                                }
                            }
						wp_delete_attachment($_POST['sel_img']);			}
				}} ?>
                <div class="step-5-wrap">
                    <div class="col-sm-6 step4right" style="padding-left: 0px !important;">
                        
                        <form id="img_fomr" action="<?php echo get_site_url(); ?>/edit-public-profile/" method="post" enctype="multipart/form-data">
                            <div id="inner-part_2"> <div class="inner-part_2"> 
                                <div class="col-md-12">
                                    <div class="upload_imgs col-sm-8" >                                   
                                        <div class="upload_img_1 col-sm-6">
                                            <div class="uplodss">
                                                <h2></h2>
                                                <?php if(!empty($video_file[1][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[1][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                <input type="checkbox" value="<?php echo $video_file[1][0]; ?>" name="sel_img[]" id="sel_img" />
                                            </div>
                                        </div>    
                                        <div class="upload_img_1 col-sm-6">
                                            <div class="uplodss">
                                                <h2></h2>
                                                <?php if(!empty($video_file[2][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[2][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                 <input type="checkbox" value="<?php echo $video_file[2][0]; ?>" name="sel_img[]" id="sel_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_1 bttmm col-sm-6">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[3][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[3][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[3][0]; ?>" name="sel_img[]" id="sel_img" />
                                            </div>
                                        </div>    
                                        <div class="upload_img_1 bttmm col-sm-6">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[4][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[4][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                 	<input type="checkbox" value="<?php echo $video_file[4][0]; ?>" name="sel_img[]" id="sel_img" />
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="upload_imgs upload_last col-sm-4">
                                        <div class="uplodss">
                                            <h2></h2>
                                                 <?php if(!empty($video_file[5][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[5][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                               <input type="checkbox" value="<?php echo $video_file[5][0]; ?>" name="sel_img[]" id="sel_img" />
                                        </div>
                                    </div>
                                </div>    </div>    
                                <div class="col-md-12">
                                   <div class="qs-profile--buttons mt20 col-md-12" style="padding-right: 0px;">
                                       <div id="upl_img" class="qs-btn btn-primary upl-button btn-sm">
                                           <span>Upload Images</span>
                                           <input id="public_images" name="public_images[]" multiple="" type="file">
                                       </div>
                                       <button id="del_img" class="qs-btn btn-primary upl-button btn-sm">
                                           <span>Delete Images</span>
                                       </button>
                                       <div id="sav_img" class="qs-btn btn-primary upl-button btn-sm">
                                           <span>Save Images</span>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-12">
                                    <div class="col-md-12 mt20  qs-profile--buttons">
                                   <div class="qs-profile--instr">
                                       <p>Open the 'photos' folder on your local drive. Select 1 to 5 photos you'd like to share with other members. Click "Upload Images" and they will appear in one of the empty frames above. "Save" those you want to keep, or "Delete" images you want to remove. 
                                       </p>
                                   </div></div>
                               </div>
                            </div>
                    
                        </form>
                    </div>
                    <div class="col-sm-6 left rivideo" >
                        <form action="<?php echo get_site_url(); ?>/edit-public-profile/" method="post" enctype="multipart/form-data">
                           
                        <div id="inner-part_2" class="rightonputs"> <div class="inner-part_2"> 
                                <div class="col-md-12">
                                    <div class="upload_imgs col-sm-12" style="padding: 0px;">
                                        
                                        <input style="display:none" type="file" name="video_file" />
                                        <?php if(isset($video_upload_single[0])){ ?>
                                    <video style="display:block" id="thank_video" controls="" class="height" poster="">
                                        <source type="video/mp4" src="<?php echo get_site_url() . '/videos/user_' . $user_id.'/'.$video_upload_single[0]; ?>"> 
                                    </video>  
                                    <input type="checkbox" value="<?php echo get_site_url() . '/videos/user_' . $user_id.'/'.$video_upload_single[0]; ?>" name="delete_video_1" id="delete_video_1" />
                                    <?php }else{ ?>
                                        <img src="<?php echo get_site_url(); ?>/wp-content/themes/dating/images/curtain.jpg" alt="" />
                                    <?php } ?>
                                    
                                        </div></div></div>
                                <div class="col-md-12" style="padding: 0px;">
                                   <div class="qs-profile--buttons mt20 col-md-12" style="padding-right: 0px;">
                                       <div id="upl_img" class="qs-btn btn-primary upl-button btn-sm">
                                           <span>Upload Video</span>
                                           <input style="" type="file" name="video_file">
                                       </div>
                                       <button id="del_video" class="qs-btn btn-primary upl-button btn-sm">
                                           <span>Delete Video</span>
                                       </button>
									   <input type="submit" id="save_img" class="qs-btn btn-primary upl-button btn-sm" value="Save Video" /> 
                                   </div>
                               </div>
                               <div class="col-md-12" style="padding: 0px;">
                                    <div class="col-md-12 mt20  qs-profile--buttons">
                                   <div class="qs-profile--instr">
                                       <p>Open the "videos" folder on your local drive. Select a video you'd like to share with other members.  Click "Upload Video" and it will appear in the empty theater above. "Save" if you're OK with it, or "Delete" if you want to remove it.
                                       </p>
                                   </div></div>
                               </div>
                            </div>
                        </form>    
                    </div>
                      </div>
    </div>    
</div>
</div>
<div class='step5 proff' style="display: table-cell;vertical-align: middle; ">
    <div class="container">
<?php
    $cid = get_current_user_id();
    $c_cid = get_current_user_id();
    if(isset($_GET['id'])){
        $cid = $_GET['id'];
    
    $gender = get_user_meta( $cid, 'gender');
    $gender = $gender[0];
    print_r($gender);
?>

            <div class="col-lg-8 col-md-12 mauto">
              
                <div class="blocked_ristrict_mmbr">
                    
                    <input type="hidden" value="<?php echo $c_cid; ?>" name="my_user_id" id="my_user_id" />
                    <div class="tabsall_sc">
                        <div class="tabcontent">
                            <?php 
                           $t=0; ?>
                           <div class="tab_cnt_cnt">
                               <div class="descriptn_area">
                                <div class="smily">
                                    <form action="" method="post">
                                        <div style="padding: 0px;">   
                                        <?php
                                          $idd = $cid; //450
                                          $emoji = get_user_meta($c_cid, 'emoji_send_'.$idd); // 1
                                         
                                            if(!empty($emoji[0])){
                                                 $data = json_decode($emoji[0]);
                                                 
                                                 if($data->u_id==$idd){ ?>
                                                    <input type="hidden" value="<?php echo $cid; ?>" name="user_id" id="user_id" />
                                                    <?php if(strpos($data->smily, 'wink') === false) { ?>
                                                    <span><input type="radio" name="smily[]" value="128521;" /><img src="https://kleoseo.com/indica/wp-content/themes/dating/images/wink.png" alt="" /></span><?php } ?>
                                                    <?php if(strpos($data->smily, 'smile') === false) { if($gender=="female"){?>
                                                    <span><input type="radio" name="smily[]" value="128522;" /><img src="https://kleoseo.com/indica/wp-content/themes/dating/images/rose.png" alt="" /></span>
                                                    <?php }else{ ?>
                                                    <span><input type="radio" name="smily[]" value="128522;" /><img src="https://kleoseo.com/indica/wp-content/themes/dating/images/carnation.png" alt="" /></span>
                                                    <?php }}  ?>
                                                    <?php if(strpos($data->smily, 'heart') === false) { ?>
                                                    <span><input type="radio" name="smily[]" value="heart" /><img src="https://kleoseo.com/indica/wp-content/themes/dating/images/heart.png" alt="" /></span><?php } ?>
                                                    
                                                <?php  $t=1;  }
                                            }
                                            
                                            if($t==0){
                                                 ?>
                                                   <input type="hidden" value="<?php echo $cid; ?>" name="user_id" id="user_id" />
                                       
                                                    <span><input type="radio" name="smily[]" value="128521;" /><img src="https://kleoseo.com/indica/wp-content/themes/dating/images/wink.png" alt="" /></span>
                                        
                                             <?php     if($gender=="female"){?>
                                                    <span><input type="radio" name="smily[]" value="128522;" /><img src="https://kleoseo.com/indica/wp-content/themes/dating/images/rose.png" alt="" /></span>
                                                    <?php }else{ ?>
                                                    <span><input type="radio" name="smily[]" value="128522;" /><img src="https://kleoseo.com/indica/wp-content/themes/dating/images/carnation.png" alt="" /></span>
                                                    <?php } ?>
                                                    
                                                    
                                                    <span><input type="radio" name="smily[]" value="heart" /><img src="https://kleoseo.com/indica/wp-content/themes/dating/images/heart.png" alt="" /></span>
                                          
                                         <?php  
                                            }
                                        ?>
                                    </div>    
                                    </form>
                                    <div class="res"></div>
                                </div>
                                  
                               </div>

                               
                           </div>
                     
                        </div>

                    </div>
                </div>
               
            </div>
            <?php } ?>
</div>
</div>

<div class='step5 proff' id="bottom_sec">
    <div class="container">
<hr style="height: 1px;width: 100%;background: #000;float: left;margin: 30px 0px;">
        <div class="title-page" style="margin:0px;">
            <h2> My Private Vaults</h2>
        </div>
        
        <div id="rpww" class="row" style="margin: 0px !important; margin-bottom:30px !important; padding:0px; background:none">
            	<?php
          
      if(!isset($_FILES['bg_upload']['name']) && !isset($_POST['sel_img']) && !isset($_POST['pri_img']) && !isset($_FILES['public_images']['name']) && !empty($_FILES['private_images']['name']) && !isset($_FILES['video_file'])){
        require( dirname(__FILE__) . '/../../../../wp-load.php' );
        $j=1;$o=0;
      $total = count($_FILES['private_images']['name']);
      
        $wordpress_upload_dir = wp_upload_dir();
        $user_dirname = $wordpress_upload_dir['path'] . '/user_' . $user_id;
        if(!file_exists($user_dirname)) wp_mkdir_p($user_dirname);
        for($r=0;$r<$total;$r++){
            $i = 1; // number of tries when the file with the same name is already exists
          
            $profilepicture = $_FILES['private_images'];
        //print_r($profilepicture);
            $new_file_path = $user_dirname . '/' .$profilepicture['name'][$r];
            $new_file_mime = mime_content_type( $profilepicture['tmp_name'][$r] );
            
            while( file_exists( $new_file_path ) ) {
            	$i++;
            	$new_file_path = $user_dirname . '/' . $i . '_' . $profilepicture['name'][$r];
            }
          
            // looks like everything is OK
      if( move_uploaded_file( $profilepicture['tmp_name'][$r], $new_file_path ) ) {
            	$upload_id = wp_insert_attachment( array(
            		'guid'           => $new_file_path, 
            		'post_mime_type' => $new_file_mime,
            		'post_title'     => preg_replace( '/\.[^.]+$/', '', $profilepicture['name'][$r] ),
            		'post_content'   => '',
            		'post_status'    => 'inherit'
            	), $new_file_path );
                
            	// wp_generate_attachment_metadata() won't work if you do not include this file
            	require_once( ABSPATH . 'wp-admin/includes/image.php' );
            
            	// Generate and save the attachment metas into the database
            	wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $new_file_path ) );
                
           
        } else {
                    echo "No Move";
                }
        for($t=1;$t<=25;$t++){
            $video_file11 = get_user_meta($user_id,"vault_file_".$t);
            
             if(empty($video_file11[0])){
                    add_user_meta($user_id, "vault_file_".$t, $upload_id);
                    break;
                }
            
        }
        $j++;$o++;
       
    }  }
    
    for($t=1;$t<=25;$t++){
        $video_file[$t] = get_user_meta($user_id,"vault_file_".$t);
    }
    
   
			if(isset($_POST)){
			    if(isset($_POST['pri_img'])){
					if(is_array($_POST['pri_img']) && sizeof($_POST['pri_img'])>1){
					    
					   	foreach($_POST['pri_img'] as $img_id){
					   	    for($t=1;$t<=25;$t++){
                                $video_file12 = get_user_meta($user_id,"vault_file_".$t);
                               if($video_file12[0]==$img_id){
                                    delete_user_meta($user_id, "vault_file_".$t);
                                    $file_path = wp_get_attachment_image_url($img_id,'full');
                                   $file_path1 = wp_get_attachment_image_url($img_id,'150x150');
                                   $file_path2 = wp_get_attachment_image_url($img_id,'thumbnail');
                                    wp_delete_file($file_path);
                                    wp_delete_file($file_path1);
                                    wp_delete_file($file_path2);
        					   	    wp_delete_attachment($img_id);
                                }
                            }
                            
						}						
					}else{
					    for($t=1;$t<=25;$t++){
                                $video_file[$t] = get_user_meta($user_id,"vault_file_".$t, true);
                               
                                if($video_file[$t][0]===$_POST['pri_img'][0]){
                                    delete_user_meta($user_id,"vault_file_".$t);
                                }
                            }
						wp_delete_attachment($_POST['pri_img']);			}
				}
			    
			  
			}		    
      
    ?>
				<style>
				    #inner-part_2_1 .col-md-12.tyr {
                    	padding: 0px !important;
                    	margin: 0px -15px;
                    }
                    .upload_imgs .col-sm-2 {
	max-width: 111px;
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
                    <div class="col-sm-6 step4right" style="padding-left: 0px !important;">
                        <h2 style="text-align: center;font-size: 30px;margin-top: 20px;font-family: Times Roman !important;font-weight: bold;color: #353434;">Photo Gallery</h2>
                     <form id="pmg_fomr" action="<?php echo get_site_url(); ?>/edit-public-profile/" method="post" enctype="multipart/form-data">
                            <div id="inner-part_2_1" class"inner-part_2" style="height:auto;"> <div class="inner-part_2" style="height:auto;"> 
                                <div class="col-md-12 tyr" style="padding: 0px !important;">
                                    <div class="upload_imgs col-sm-12" >                                   
                                        <div class="upload_img_p col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                <?php if(!empty($video_file[1][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[1][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                <input type="checkbox" value="<?php echo $video_file[1][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>    
                                        <div class="upload_img_p col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                <?php if(!empty($video_file[2][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[2][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                 <input type="checkbox" value="<?php echo $video_file[2][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[3][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[3][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[3][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[4][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[4][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[4][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[5][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[5][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[5][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[6][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[6][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[6][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[7][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[7][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[7][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[8][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[8][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[8][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[3][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[3][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[8][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[9][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[9][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[9][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[10][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[10][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[10][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[11][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[11][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[11][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[12][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[12][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[12][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[13][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[13][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[14][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[15][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[15][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[15][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[16][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[16][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[16][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[17][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[17][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[17][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[18][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[18][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[18][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[19][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[19][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[19][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[20][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[20][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[20][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[21][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[21][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[21][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[22][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[22][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[22][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[23][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[23][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[23][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[24][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[24][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                	<input type="checkbox" value="<?php echo $video_file[24][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                        <div class="upload_img_p bttmm col-sm-2">
                                            <div class="uplodss">
                                                <h2></h2>
                                                 <?php if(!empty($video_file[25][0])){ ?>
                                                    <?php echo wp_get_attachment_image($video_file[25][0],'full', false, array( "class" => "profile-pic" )); ?>
                                                <?php }else{ ?>
                                                    <img style="opacity:0" class="profile-pic" src="">
                                               <?php } ?>
                                                 	<input type="checkbox" value="<?php echo $video_file[25][0]; ?>" name="pri_img[]" id="pri_img" />
                                            </div>
                                        </div>
                                    </div>  
                                
                                </div>    </div>    
                                <div class="col-md-12">
                                   <div class="qs-profile--buttons mt20 col-md-12" style="padding-right: 0px;">
                                       <div id="upl_img1" class="qs-btn btn-primary upl-button btn-sm">
                                           <span>Upload Images</span>
                                           <input id="private_images" name="private_images[]" multiple="" type="file">
                                       </div>
                                       <button id="del_img1" class="qs-btn btn-primary upl-button btn-sm">
                                           <span>Delete Images</span>
                                       </button>
                                       <div id="save_img_1" class="qs-btn btn-primary upl-button btn-sm">
                                           <span>Save Images</span>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-12">
                                    <div class="col-md-12 mt20  qs-profile--buttons">
                                   <div class="qs-profile--instr">
                                       <p>Open the 'photos' folder on your local drive. Select up to 25 of your personal photos for subscribers to your “Private Photo Gallery.”  Click "Upload Images" and they will appear in one of the empty frames above. Click "Save" once you have the ones you want to keep, or "Delete" those you want to remove."
                                       </p>
                                   </div></div>
                               </div>
                            </div>
                    
                        </form>
                    </div>
                    <div class="col-sm-6 left rivideo" >
                        <h2 style="text-align: center;font-size: 30px;margin-top: 20px;font-family: Times Roman !important;font-weight: bold;color: #353434;">Video Arcade</h2>
                        <form action="<?php echo get_site_url(); ?>/edit-public-profile/" method="post" enctype="multipart/form-data">
                            <div id="inner-part_2"> <div class="inner-part_2_2"> 
                                <div class="col-md-12" id="image_1">
                                    <div class="upload_imgs col-sm-12" style="padding: 0px;">
                                        
                                        <?php if(isset($video_upload1[0][0])){ ?>
                                    <video style="display:block" id="thank_video" controls="" class="height" poster="">
                                        <source type="video/mp4" src="<?php echo get_site_url() . '/videos/user_' . $user_id.'/'.$video_upload1[0][0]; ?>"> 
                                    </video>  
                                    <input type="checkbox" value="<?php echo  $video_upload1[0][0]; ?>" name="delete_video[]" id="delete_videos" />
                                    <?php }else{ ?>
                                        <img id="vimg1" src="<?php echo get_site_url(); ?>/wp-content/themes/dating/images/curtain.jpg" alt="" />
                                    <?php } ?>   
                                    
                                        </div></div>
                                        
                                        <div class="col-md-12" id="image_2">
                                    <div class="upload_imgs col-sm-12" style="padding: 0px;">
                                        
                                         <?php if(isset($video_upload1[0][0])){ ?>
                                    <video style="display:block" id="thank_video" controls="" class="height" poster="">
                                        <source type="video/mp4" src="<?php echo get_site_url() . '/videos/user_' . $user_id.'/'.$video_upload1[1][0]; ?>"> 
                                    </video>  
                                    <input type="checkbox" value="<?php echo $video_upload1[1][0]; ?>" name="delete_video[]" id="delete_videos" />
                                    <?php }else{ ?>
                                        <img id="vimg2" src="<?php echo get_site_url(); ?>/wp-content/themes/dating/images/curtain.jpg" alt="" />
                                    <?php } ?>   
                    
                                    </video>       
                                        </div></div>
                                        
                                        <div class="col-md-12" id="image_3">
                                    <div class="upload_imgs col-sm-12" style="padding: 0px;">
                                        <?php if(isset($video_upload1[2][0])){ ?>
                                    <video style="display:block" id="thank_video" controls="" class="height" poster="">
                                        <source type="video/mp4" src="<?php echo get_site_url() . '/videos/user_' . $user_id.'/'.$video_upload1[2][0]; ?>"> 
                                    </video>  
                                    <input type="checkbox" value="<?php echo  $video_upload1[2][0]; ?>" name="delete_video[]" id="delete_videos" />
                                    <?php }else{ ?>
                                        <img src="<?php echo get_site_url(); ?>/wp-content/themes/dating/images/curtain.jpg" alt="" />
                                    <?php } ?>         
                                        </div></div>
                                        </div>
                                <div class="col-md-12" style="padding: 0px;">
                                   <div class="qs-profile--buttons mt20 col-md-12" style="padding-right: 0px;">
                                       <div id="upl_img2" class="qs-btn btn-primary upl-button btn-sm">
                                           <span>Upload Video</span>
                                           <input style="" type="file" name="video_file_2[]" id="video_file_2" multiple="">
                                       </div>
                                       <button id="del_img2" class="qs-btn btn-primary upl-button btn-sm">
                                           <span>Delete Video</span>
                                       </button>
									   <input type="submit" id="save_img" class="qs-btn btn-primary upl-button btn-sm" value="Save Video" /> 
                                   </div>
                               </div>
                               <div class="col-md-12" style="padding: 0px;">
                                    <div class="col-md-12 mt20  qs-profile--buttons">
                                   <div class="qs-profile--instr" style="padding: 28px 20px;">
                                       <p>Open the "videos" folder on your local drive. Select 1 to 3 of your personal videos for subscribers to your “Private Video Arcade.” Click "Upload Videos" and each will appear in one of the empty theaters above. "Save" if you're OK with things, or "Delete" if you want to remove something."
                                       </p>
                                   </div></div>
                               </div>
                            </div>
                        </form>    
                    </div>
                      </div>
    </div>    
</div></div>


<?php
    
get_footer();
