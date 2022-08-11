<?php
/**
 * Template Name: Edit Personal Profile
 *
 * @package WordPress
 * @subpackage qs
 * @since quigleyshore
 */
get_header();
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
 <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tagify.css">
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
}main {
	background: url(https://quigleyoats22.org/wp-content/themes/dating/images/profile_bg.jpg);
	float: left;
	width: 100%;
	background-attachment: fixed;
	background-repeat: no-repeat;
	background-position: center;
	background-size: cover;
}section { background:none !important; }
.container > .row {
	width: 100%;
	float: left;
	background-color: rgba(255,255,255,.55);
	padding: 30px;
}
@keyframes osc-r{
	0%{left:80%;}
	50%{left:50%;}
	100%{left:80%;}
}section {
	background: none !important;
	width: 100%;
}.btn-sm {
	font-size: 17px;
	font-weight: 400;
	border-radius: 5px;
	border-width: 1px;
	line-height: 20px;
	padding: 8px 14px;
}
@media screen and (min-width:1100px){
    .container {
    	max-width: 1300px;
    }
}
.qs-section.has-bgc.bgc-darker {
	padding-top: 30px !important;
	padding-bottom:30px !important;
}
.bgc-dark {
	background: none;
	border: 1px solid #fff;
	border-radius: 0px;
	width: auto;
}
.qs-profile--border {
	margin-right: -155px;
	max-width: 100%;
	-webkit-box-flex: 1;
	-ms-flex: 1;
	flex: 1;
}
.bgc-dark {
	background: none;
	border: 1px solid #fff;
	border-radius: 0px;
	padding-left: 100px;
	padding-right: 180px;
	font-size: 31px;
	font-weight: 300 !important;
}
.qs-section {
	margin-top: 0px !important;
	padding: 0px !important;
}
.row.gutter-y-20.thibg {
	width: 100%;
	float: left;
	background-color: rgba(255,255,255,.55) !important;
	padding: 50px 30px;
	border-radius: 50px;
}
.container > .row {
	width: 100%;
	float: left;
	background: none !important;
	padding: 0px 60px;
}
#user_datata {
	text-align: center;
}

#user_datata h2 {
	font-family: Times Roman !important;
	border-bottom: 1px solid #333;
	max-width: 100px;
	margin: auto;
	padding-bottom: 6px;
	margin-bottom: 0px;
	font-size: 23px;
	margin-top: 19px;
}
#user_datata span {
	font-size: 20px;
}
#user_datata .col-md-3, #user_datata .col-md-6 {
	float: left;
}
.tagss span {
	padding: 5px 0px;
}
.tagss font {
	background: rgba(255,255,255,.55) !important;
	padding: 3px 9px;
	border-radius: 10px;
	font-size: 18px !important;
	float: ;
	margin: ;
	margin-top: ;
	font-family: Times Roman !important;
}
#btm_Section {
	margin-top: 0px;
	margin-bottom: 50px;
}
.tagss {
	float: none;
	width: 100%;
	margin: 0px;
	max-width: 300px;
	display: inline-block;
	margin-top: 10px;
}
.qs-section.has-bgc.bgc-darker.bg_top_search_mmb.bg_top_search_mmbb.bg_blocked_box_pg.blog-posting_bg_pg {
	background: none !important;
	padding: 0px !important;
}.blocked_ristrict_mmbr {
	width: 100%;
	float: left;
	background: #ffffffc7;
	border-radius: 10px;
	overflow: hidden;
	padding: 40px 50px;
	border: 1px solid #8f601c;
	margin-bottom: 30px;
}
#user_datata .col-md-3.user_datata {
	padding: 0px !important;
	max-width: 100%;
	text-align: left;
	width: 100%;
	float: left;
}
.user_data h2 {
	float: left;
	max-width: 100% !important;
	width: 100%;
}.user_data {
	float: left;
	width: 23%;
	margin: 0px 20px;
}.tagify {
	background: #fff;
	margin-bottom: 5px;
	margin-right: 15px;
}.edit-icon {
	position: absolute;
	bottom: 0px;
	left: 45%;
	color: #fff;
	font-size: 28px;
}
</style>
<div class="container">

<script>
    jQuery(document).ready(function(){
           jQuery("#private_images").on('change', function(event) {
	     u = 0;
	     var storedFiles = [];      
	    var myfiles = document.getElementById('private_images');
        var files = myfiles.files;
        var imagen = '';
        var i=0;

            var readImg = new FileReader();
            var file=files[i];
            if(file.type.match('image.*')){
                storedFiles.push(file);
                if(file.size<=5000000){
                    imagen = URL.createObjectURL(file);
                }else{
                    alert('You cannot upload image larger than 5 MB');
                    imagen = '';
                }
                readImg.onload = (function(file) {
                    return function(e) {
                };
            })(file);
        readImg.readAsDataURL(file);
        }else{
            alert('the file '+file.name+' is not an image<br/>');
        }
  
    
    jQuery('.qs-profile--avatar a').html('<img src="'+imagen+'" class="fakeimg profile-pic" alt="" loading="lazy" width="500">');
});
    });
</script>
<style>
    main {
	background-image: url(<?php echo get_site_url(); ?>/wp-content/themes/dating/images/865178.jpg) !important;
}.account_info_prsn_bx .personal_info_box .billing_form_py_inf .cnt_sec_right {
	width: 100%;
	float: left;
}.account_info_prsn_bx .personal_info_box .billing_form_py_inf .cnt_sec_right .quaa {
	width: 25%;
	float: left;
}.account_info_prsn_bx .personal_info_box .billing_form_py_inf .cnt_sec_right .hlf select {
	width: 100%;
	float: left;
	font-size: 13px;
	border: 1px solid #0000001f;
	padding: 7px 10px;
	font-family: 'Poppins', sans-serif;
	color: #000;
	margin-bottom: 9px;
	height: 35px;
}.tagify {
	background: #fff;
	margin-bottom: 5px;
}.account_info_prsn_bx .personal_info_box .billing_form_py_inf .cnt_sec_right .hlf.lf {
	width: 49%;
}.full textarea {
	width: 100%;
	float: left;
	font-size: 13px;
	background: #fff;
	border: 1px solid #0000001f;
	padding: 7px 10px;
	font-family: 'Poppins', sans-serif;
	color: #000;
	margin-bottom: 9px;
}.account_info_prsn_bx .personal_info_box .billing_form_py_inf .cnt_sec_right .hlf input {
	width: 100%;
}
.account_info_prsn_bx .personal_info_box .billing_form_py_inf .cnt_sec_right .hlf.lf input {
	width: 100%;
	float: left;
	font-size: 13px;
	background: #fff;
	border: 1px solid #0000001f;
	padding: 7px 10px;
	font-family: 'Poppins', sans-serif;
	color: #000;
	margin-bottom: 9px;
}.personal_info_box button {
	background: #b37c26;
	float: none !important;
	max-width: 200px;
	width: 100%;
	padding: 5px 10px;
	color: #fff !important;
	font-size: 21px;
	border: none !important;
}.account_info_prsn_bx .personal_info_box .billing_form_py_inf .cnt_sec_right {
	width: 100%;
	float: left;
}.hd_top_inf {
	border-bottom: 1px solid #333;
	padding-bottom: 10px;
}#botom_attrs {
	width: 100%;
	float: left;
	background: #ffffffc7;
	border-radius: 10px;
	overflow: hidden;
	padding: 40px 50px;
	border: 1px solid #8f601c;
	margin-bottom: 30px;
}#botom_attrs .blocked_ristrict_mmbr.account_info_prsn_bx {
	width: 32%;
	margin-right: 0px;
	padding: 0px !important;
	background: none !important;
	border: none;
}#botom_attrs .blocked_ristrict_mmbr.account_info_prsn_bx:nth-child(3) {
	margin: 0px !important;
}#botom_attrs .cnt_sec_right .hlf {
	width: 100% !important;
}.account_info_prsn_bx .personal_info_box .billing_form_py_inf .cnt_sec_right .hlf label, label {
	width: 100%;
	float: left;
	margin-bottom: 9px;
	font-size: 19px;
	font-family: Times New Roman !important;
	height: auto;
}.mspaceb {
	margin: 0px 16px !important;
}.account_info_prsn_bx .personal_info_box .billing_form_py_inf .cnt_sec_right .hlf {
	width: 32%;
	float: left;
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
 <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
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
            $height = get_user_meta($user_id, 'height', true);
            $haircolor = get_user_meta($user_id, 'haircolor', true);
            $eyecolor = get_user_meta($user_id, 'eyecolor', true);
            $asign = get_user_meta($user_id, 'asign', true);
            $occup = get_user_meta($user_id, 'occup', true);
            $music = get_user_meta($user_id, 'music', true);
            $person = get_user_meta($user_id, 'person', true);
            $hobbies = get_user_meta($user_id, 'hobbies', true);
            $r_q_1 = get_user_meta($user_id, 'r_q_1', true);
            $r_q_2 = get_user_meta($user_id, 'r_q_2', true);
            $btype = get_user_meta($user_id, 'btype', true);
            $lfor = get_user_meta($user_id, 'relationn', true);
            $author_pic = get_user_meta($user_id, 'author_pic', true);
             $all_data = $_POST;
      
        if(!empty($_POST)){

            if(!$_FILES['private_images']['error'][0]){
                $user_dirname = 'profile/user_' . $user_id;
        if(!file_exists($user_dirname)) wp_mkdir_p($user_dirname);
                if($_FILES['private_images']['name'][0]) {
  if(!$_FILES['private_images']['error'][0]) {
    //validate the file
    
    $new_file_name = strtolower($_FILES['private_images']['tmp_name'][0]);
    //can't be larger than 300 KB 
    if($_FILES['private_images']['size'][0] > (30000000)) {
      //wp_die generates a visually appealing message element
      wp_die('Your file size is to large.');
    }
    else {
      //the file has passed the test
      //These files need to be included as dependencies when on the front end.
      require_once( ABSPATH . 'wp-admin/includes/image.php' );
      require_once( ABSPATH . 'wp-admin/includes/file.php' );
      require_once( ABSPATH . 'wp-admin/includes/media.php' );
    
      // Let WordPress handle the upload.
      // Remember, 'upload' is the name of our file input in our form above.
      
      $profilepicture = $_FILES['private_images'];
      $new_file_path = $user_dirname . '/' .$profilepicture['name'][0];
                $new_file_mime = mime_content_type( $profilepicture['tmp_name'][0] );
                
                // looks like everything is OK
                if( move_uploaded_file( $profilepicture['tmp_name'][0], $new_file_path ) ) {
                    if(!empty($author_pic)){
                	update_user_meta( $user_id, 'author_pic', trim($profilepicture['name'][0]));
                    }else{
                       add_user_meta( $user_id, 'author_pic', trim($profilepicture['name'][0]));
                    }
            }  

      if ( is_wp_error( $file_id ) ) {
         print_r('Error loading file!');
      } else {
        print_r('<p id="notice-error">Your Profile was successfully Updated.</p>');
      }
    }
  }
  else {
    //set that to be the returned message
    wp_die('Error: '.$_FILES['private_images']['error'][0]);
  }}
                
        
            }
            $first_name = update_user_meta( $user_id, 'first_name', $all_data['fname']);
            $last_name = update_user_meta( $user_id, 'last_name', $all_data['lname']);
            
           if(empty($description)){
                add_user_meta( $user_id, 'aboutme', $_POST['aboutme']);
            }else{
                update_user_meta( $user_id, 'aboutme', $_POST['aboutme']);
            }
            
            if(empty($dob)){ 
                add_user_meta( $user_id, 'birth-date', $_POST['dob']);
            }else{
                
                update_user_meta( $user_id, 'birth-date', $_POST['dob']);
            }
            
            
            if(empty($age)){
                add_user_meta( $user_id, 'age', $_POST['age']);
            }else{
                update_user_meta( $user_id, 'age', $_POST['age']);
            }
            
            if(empty($city)){
                add_user_meta( $user_id, 'city', $_POST['city']);
            }else{
                update_user_meta( $user_id, 'city', $_POST['city']);
            }
            
            if(empty($state)){
                add_user_meta( $user_id, 'state', $_POST['state']);
            }else{
                update_user_meta( $user_id, 'state', $_POST['state']);
            }
            
            if(empty($zip)){
                add_user_meta( $user_id, 'zip', $_POST['zip']);
            }else{
                update_user_meta( $user_id, 'zip', $_POST['zip']);
            }
            
            if(empty($height)){
                add_user_meta( $user_id, 'height', $_POST['height']);
            }else{
                update_user_meta( $user_id, 'height', $_POST['height']);
            }
            if(empty($haircolor)){
                add_user_meta( $user_id, 'haircolor', $_POST['haircolor']);
            }else{
                update_user_meta( $user_id, 'haircolor', $_POST['haircolor']);
            }
            
            if(empty($eyecolor)){
                add_user_meta( $user_id, 'eyecolor', $_POST['eyecolor']);
            }else{
                update_user_meta( $user_id, 'eyecolor', $_POST['eyecolor']);
            }
            
            
            if(empty($asign)){
                add_user_meta( $user_id, 'asign', $_POST['asign']);
            }else{
                update_user_meta( $user_id, 'asign', $_POST['asign']);
            }
            
            
            if(empty($occup)){
                add_user_meta( $user_id, 'occup', $_POST['occup']);
            }else{
                update_user_meta( $user_id, 'occup', $_POST['occup']);
            }
            
            
            if(empty($music)){
                add_user_meta( $user_id, 'music', $_POST['music']);
            }else{
                update_user_meta( $user_id, 'music', $_POST['music']);
            }
            
            
            if(empty($person)){
                add_user_meta( $user_id, 'person', $_POST['person']);
            }else{
                update_user_meta( $user_id, 'person', $_POST['person']);
            }
            
            
            if(empty($hobbies)){
                add_user_meta( $user_id, 'hobbies', $_POST['hobbies']);
            }else{
                update_user_meta( $user_id, 'hobbies', $_POST['hobbies']);
            }
            
            
            if(empty($r_q_1)){
                add_user_meta( $user_id, 'r_q_1', $_POST['rand_q']);
            }else{
                update_user_meta( $user_id, 'r_q_1', $_POST['rand_q']);
            }
            
            if(empty($r_q_2)){
                add_user_meta( $user_id, 'r_q_2', $_POST['heightq']);
            }else{
                update_user_meta( $user_id, 'r_q_2', $_POST['heightq']);
            }
            
            if(empty($btype)){
                add_user_meta( $user_id, 'btype', $_POST['type']);
            }else{
                update_user_meta( $user_id, 'btype', $_POST['type']);
            }
             
            if(empty($lfor)){
                add_user_meta( $user_id, 'relationn', $_POST['relationn']);
            }else{
                update_user_meta( $user_id, 'relationn', $_POST['relationn']);
            }
            
            
            $first_name = get_user_meta( $user_id, 'first_name', true );
            $last_name = get_user_meta( $user_id, 'last_name', true );
            $description = get_user_meta( $user_id, 'aboutme', true);
            
            $dob = get_user_meta($user_id, 'birth-date', true);
            $age = get_user_meta($user_id, 'age', true);
            $city = get_user_meta($user_id, 'city', true);
            $state = get_user_meta($user_id, 'state', true);
            $zip = get_user_meta($user_id, 'zip', true);
            $height = get_user_meta($user_id, 'height', true);
            $haircolor = get_user_meta($user_id, 'haircolor', true);
            $eyecolor = get_user_meta($user_id, 'eyecolor', true);
            $asign = get_user_meta($user_id, 'asign', true);
            $occup = get_user_meta($user_id, 'occup', true);
            $music = get_user_meta($user_id, 'music', true);
            $person = get_user_meta($user_id, 'person', true);
            $hobbies = get_user_meta($user_id, 'hobbies', true);
            $r_q_1 = get_user_meta($user_id, 'r_q_1', true);
            $r_q_2 = get_user_meta($user_id, 'r_q_2', true);
            $btype = get_user_meta($user_id, 'btype', true);
            $lfor = get_user_meta($user_id, 'relationn', true);
            $author_pic = get_user_meta($user_id, 'author_pic', true);
        }
        
        
  
    ?>
    <script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        jQuery('#date_picker').attr('min',today);
    </script>
<form action="<?php echo get_site_url(); ?>/edit-my-personal-profile/" enctype="multipart/form-data" method="post">
    
    <section class="qs-section has-bgc bgc-darker">
    <div class="container qs-profile--top">
        <div class="qs-profile--head">
            <div class="qs-profile--border text-center">
                <h1 class="color-white qs-profile--title bgc-dark">
                    A Little about dating   </h1>
            </div>
            <div class="qs-profile--avatar-col text-center">
                <div class="qs-profile--avatar">
                    <a href="">
                        <img src="<?php echo get_site_url().'/profile/user_' . $user_id.'/'.$author_pic; ?>" alt="">
                    </a>
                    <div class="edit-icon"><i class="fa fa-edit"></i></div>
                    <input id="private_images" name="private_images[]" type="file" name"pfile" />
                </div>
            </div>
        </div>
        
        
        
        
        
            </div>
</section>
<section class="qs-section has-bgc bgc-darker bg_top_search_mmb bg_top_search_mmbb bg_blocked_box_pg blog-posting_bg_pg">

    <div class="container">
        
        <div class="row">
            <div class="col-lg-10 col-md-12 mauto" style="padding:0px;">
          

                <div class="blocked_ristrict_mmbr account_info_prsn_bx">
                    <div class="personal_info_box">
                        <div class="billing_form_py_inf">                        
                               <div class="cnt_sec_right">
                                    <h1 class="hd_top_inf">Personal Information</h1>
                                    <span class="hlf lf">
                                        <label>First Name</label>
                                        <input type="text" name="fname" value="<?php if(isset($first_name)){ echo $first_name; } ?>" />
                                    </span>

                                    <span class="hlf lf" style="float:right;">
                                        <label>Last Name</label>
                                        <input type="text" name="lname" value="<?php if(isset($last_name)){ echo $last_name; } ?>" />
                                    </span>
                                    
                                    <span class="full">
                                        <label>About Me</label>
                                        <textarea name="aboutme" placeholder="Write a little description about you..."><?php if(isset($description)){ echo $description; } ?></textarea>
                                    </span>
                                    <span class="hlf">
                                        <label>Email</label>
                                        <input name="email" type="text" value="<?php if(isset($current_user->user_email)){ echo $current_user->user_email; } ?>" readonly />
                                    </span>

                                    <span class="hlf mspaceb">
                                        <label>Username</label>
                                        <input name="username" type="text" value="<?php if(isset($current_user->user_login)){ echo $current_user->user_login; } ?>" readonly />
                                    </span>

                                    <span class="hlf">
                                        <label>Date of Birh</label>
                                        <input name="dob" type="date" id="date_picker" value="<?php if(isset($dob)){ echo $dob; } ?>" />
                                    </span>

                                     <span class="hlf">
                                        <label>City</label>
                                        <input name="city" type="text" value="<?php if(isset($city)){ echo $city; } ?>" />
                                    </span>

                                    <span class="hlf mspaceb">
                                        <label>State</label>
                                        <input name="state" type="text" value="<?php if(isset($state)){ echo $state; } ?>" />
                                    </span>

                                    <span class="hlf">
                                        <label>Zip Code </label>
                                        <input name="zip" type="text" value="<?php if(isset($zip)){ echo $zip; } ?>" />
                                    </span>

                               
                                   

                               </div>

                            
                        </div>
                        
                    </div>
                </div>
            </div>
            
            
            
            <div class="col-lg-10 col-md-12 mauto" id="botom_attrs">
          

                <div class="blocked_ristrict_mmbr account_info_prsn_bx">
                    <div class="personal_info_box">
                        <div class="billing_form_py_inf">                        
                               <div class="cnt_sec_right">
                                    
                                   <span class="hlf">
                                        <label>Age</label>
                                        <input name="age" type="text" value="<?php if(isset($age)){ echo $age; } ?>" />
                                    </span>

                                    <span class="hlf">
                                        <label>Gender</label>
                                        <select name="gender">
                                            <option <?php if(isset($gender)){ if($gender=='male') echo "selected";  } ?>>Male</option>
                                            <option <?php if(isset($gender)){ if($gender=='female') echo "selected";  } ?>>Female</option>
                                        </select>
                                    </span>

                                    <span class="hlf">
                                        <label>Height</label>
                                        <input name="height" type="text" value="<?php if(isset($height)){ echo $height; } ?>" />
                                    </span>

                                    <span class="hlf">
                                        <label>Hair Color</label>
                                        <input name="haircolor" type="text" value="<?php if(isset($haircolor)){ echo $haircolor; } ?>" />
                                    </span>

                                    <span class="hlf">
                                        <label>Eye Color</label>
                                        <input name="eyecolor" type="text" id="Brown" value="<?php if(isset($eyecolor)){ echo $eyecolor; } ?>" />
                                    </span>

                               </div>

                            
                        </div>
                        
                    </div>
                </div>
            
                
          

                <div class="blocked_ristrict_mmbr account_info_prsn_bx mspaceb">
                    <div class="personal_info_box">
                        <div class="billing_form_py_inf ">                        
                               <div class="cnt_sec_right">
                                    
            
                                    <span class="hlf">
                                        <label>Astrological Sign</label>
                                        <input name="asign" type="text" value="<?php if(isset($asign)){ echo $asign; } ?>" />
                                    </span>

                                    <span class="hlf">
                                        <label>Occupation</label>
                                        <input name="occup" type="text" value="<?php if(isset($occup)){ echo $occup; } ?>" />
                                    </span>

                                    

                                   
                                    <span class="hlf">
                                        <label>Music</label>
                                        <input name='music' value='<?php if(isset($music)){ echo $music; } ?>'>
                                    </span>
                               </div>
                             <span class="full">
                                        <label>Personality</label>
                                        <input name='person' value='<?php if(isset($person)){ echo $person; } ?>'>
                                    </span>
                            <span class="full">
                                        <label>Hobbies/Interests</label>
                                        <input name='hobbies' value='<?php if(isset($hobbies)){ echo $hobbies; } ?>'>
                                    </span>

                        </div>
                        
                    </div>
                </div>
           
           
                <div class="blocked_ristrict_mmbr account_info_prsn_bx">
                    <div class="personal_info_box">
                        <div class="billing_form_py_inf">                        
                               <div class="cnt_sec_right">
                                    
                                   
                                   

                                    <span class="hlf">
                                        <label>Random Q</label>
                                        <input name="rand_q" type="text" value="<?php if(isset($r_q_1)){ echo $r_q_1; } ?>" />
                                    </span>

                                    

                                    <span class="hlf">
                                        <label>Random Q</label>
                                        <input name="heightq" type="text" id="Brown" value="<?php if(isset($r_q_2)){ echo $r_q_2; } ?>" />
                                    </span>
                                    <span class="hlf">
                                        <label>Body Type</label>
                                        <input name='type' value='<?php if(isset($btype)){ echo $btype; } ?>'>
                                    </span>
                                    <span class="hlf">
                                        <label>Looking For</label>
                                        <input name='relationn' value='<?php if(isset($lfor)){ echo $lfor; } ?>'>
                                    </span>
                               </div>

                            
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-12 mauto" >
          

                <div class="blocked_ristrict_mmbr account_info_prsn_bx" style="background: none !important;border: none !important;padding: 0px !important;">
                    <div class="personal_info_box">
                        <div class="billing_form_py_inf">                        
                               <div class="cnt_sec_right" style="text-align: center;width: 100%;">
                                    
                                   <button>Save</button>
                               </div>

                            
                        </div>
                        
                    </div>
                </div>
            </div>
    
    
    </div></div></div>
</section></section>
</form>
<?php }else{ ?>
<style>
    .account_info_prsn_bx .personal_info_box .billing_form_py_inf .cnt_sec_right label {
	font-weight: bold !important;
	font-size: 13px !important;
	width: 50% !important;
}.account_info_prsn_bx .personal_info_box .billing_form_py_inf .cnt_sec_right span.last {
	margin-right: 0px !important;
}.account_info_prsn_bx .personal_info_box .billing_form_py_inf .cnt_sec_right .hlf {
	width: 100% !important;
	float: left;
	border-bottom: 1px dashed #333;
	margin-bottom: 17px;
	margin-right: 18px;
	padding-bottom: 7px;
}.data_user {
	float: right;
}.hlf p {
	width: 100%;
	float: left;
	margin-top: 10px;
}.account_info_prsn_bx .personal_info_box .billing_form_py_inf .cnt_sec_right .hlf {
	width: 48% !important;
	float: left;
	border-bottom: 1px dashed #333;
	margin-bottom: 17px;
	margin-right: 18px;
	padding-bottom: 7px;
}.account_info_prsn_bx .personal_info_box .billing_form_py_inf .cnt_sec_right .hlf label, .account_info_prsn_bx .personal_info_box .billing_form_py_inf .cnt_sec_right .hlf div {
	width: 100% !important;
	float: left;
}.account_info_prsn_bx .personal_info_box .billing_form_py_inf .cnt_sec_right .hlf {
	width: 30% !important;
	float: left;
	border-bottom: none !important;
	margin-bottom: 0px;
	margin-right: 0px;
	padding-bottom: 7px;
}.account_info_prsn_bx .personal_info_box .billing_form_py_inf .cnt_sec_right .hlf {
	width: 32%;
	float: left;
}.mspaceb {
	margin: 0px 16px;
}
</style>
<section class="qs-section has-bgc bgc-darker bg_top_search_mmb bg_top_search_mmbb bg_blocked_box_pg blog-posting_bg_pg">

    <div class="container">
        
        <div class="row">
            <div class="col-lg-8 col-md-12 mauto">
          

                <div class="blocked_ristrict_mmbr account_info_prsn_bx">
                    <div class="personal_info_box">
                        <div class="billing_form_py_inf">                        
                               <div class="cnt_sec_right">
                                    <h1 class="hd_top_inf">Personal Information</h1>
                                    <span class="hlf lf">
                                        <label>Name</label>
                                        <div class="data_user">John Smith</div>
                                    </span>
                                    <span class="hlf lf last">
                                        <label>Email</label>
                                        <div class="data_user">JonyCA90@gmail.com</div>
                                    </span>

                                    <span class="hlf lf">
                                        <label>Username</label>
                                        <div class="data_user">JohnS90</div>
                                    </span>

                                    <span class="hlf lf last">
                                        <label>Date of Birh</label>
                                        <div class="data_user">01/05/2004</div>
                                    </span>

                                     <span class="hlf">
                                        <label>City</label>
                                       <div class="data_user">Monterey</div>
                                    </span>

                                    <span class="hlf last">
                                        <label>State</label>
                                        <div class="data_user">CA</div>
                                    </span>

                                    <span class="hlf">
                                        <label>Zip Code </label>
                                        <div class="data_user">93940</div>
                                    </span>
                                      <span class="hlf" style="width:100%;">
                                        <label>Myself Summary</label>
                                        <p>I don`t like talk too much to be honest and especially about myself. I am man of actions, I do a lot of sports, I adore to travel and to see the world.</p>
                                    </span>
                               
                                   

                               </div>

                            
                        </div>
                        
                    </div>
                </div>
            </div>
            
            
            
            
            
            <div class="col-lg-8 col-md-12 mauto">
          

                <div class="blocked_ristrict_mmbr account_info_prsn_bx">
                    <div class="personal_info_box">
                        <div class="billing_form_py_inf">                        
                               <div class="cnt_sec_right">
                                    
                                   <span class="hlf">
                                        <label>Age</label>
                                        <div class="data_user">23</div>
                                    </span>

                                    <span class="hlf">
                                        <label>Gender</label>
                                        <div class="data_user">Male</div>
                                    </span>

                                    <span class="hlf">
                                        <label>Height</label>
                                        <div class="data_user">5'7"</div>
                                    </span>

                                    <span class="hlf">
                                        <label>Hair Color</label>
                                        <div class="data_user">Brunette</div>
                                    </span>

                                    <span class="hlf">
                                        <label>Eye Color</label>
                                        <div class="data_user">Brown</div>
                                    </span>

                               </div>

                            
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <div class="col-lg-8 col-md-12 mauto">
          

                <div class="blocked_ristrict_mmbr account_info_prsn_bx">
                    <div class="personal_info_box">
                        <div class="billing_form_py_inf">                        
                               <div class="cnt_sec_right">
                                    
                                   <span class="hlf">
                                        <label>Personality</label>
                                        <div class="data_user">Creative, Out Going, Romantic, Confident</div>
                                    </span>

                                    <span class="hlf">
                                        <label>Astrological Sign</label>
                                        <div class="data_user">Aries</div>
                                    </span>

                                    <span class="hlf">
                                        <label>Occupation</label>
                                        <div class="data_user">Dental Assistant</div>
                                    </span>

                                    

                                    <span class="hlf">
                                        <label>Relationship</label>
                                        <div class="data_user">Single</div>
                                    </span>
                                    <span class="hlf">
                                        <label>Music</label>
                                        <div class="data_user">Rock, Indie, Confident, Pop</div>
                                    </span>
                               </div>

                            
                        </div>
                        
                    </div>
                </div>
            </div>
            
            
            <div class="col-lg-8 col-md-12 mauto">
          

                <div class="blocked_ristrict_mmbr account_info_prsn_bx">
                    <div class="personal_info_box">
                        <div class="billing_form_py_inf">                        
                               <div class="cnt_sec_right">
                                    
                                   <span class="hlf">
                                        <label>Hobbies/Interests</label>
                                        <div class="data_user">Hiking, Travel, Movies</div>
                                    </span>

                                    <span class="hlf">
                                        <label>Astrological Sign</label>
                                        <div class="data_user">Aries</div>
                                    </span>

                                    <span class="hlf">
                                        <label>Random Q</label>
                                        <div class="data_user">Female</div>
                                    </span>

                                    

                                    <span class="hlf">
                                        <label>Random Q</label>
                                        <div class="data_user">5'7</div>
                                    </span>
                                    <span class="hlf">
                                        <label>Body Type</label>
                                        <div class="data_user">Athletic</div>
                                    </span>
                                    <span class="hlf">
                                        <label>Looking For</label>
                                        <div class="data_user">Relationship</div>
                                    </span>
                               </div>

                            
                        </div>
                        
                    </div>
                </div>
            </div></div></div></div>
</section>
<?php } ?>
    </div></div>
   

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jQuery.tagify.min.js"></script>

    <script>
        // The DOM element you wish to replace with Tagify
var input = document.querySelector('input[name=person]');
var input_1 = document.querySelector('input[name=music]');
var input_2 = document.querySelector('input[name=hobbies]');

// initialize Tagify on the above input node reference
new Tagify(input);
new Tagify(input_1);
new Tagify(input_2)
    </script>
<?php
get_footer();
