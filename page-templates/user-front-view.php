<?php
/**
 * Template Name: User Front View
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
}
</style>
<div class="container"><section class="qs-section has-bgc bgc-darker">
    <div class="container qs-profile--top">
        <div class="qs-profile--head">
            <div class="qs-profile--border text-center">
                <h1 class="color-white qs-profile--title bgc-dark">
                    A Little about dating   </h1>
            </div>
            <div class="qs-profile--avatar-col text-center">
                <div class="qs-profile--avatar">
                    <a href="">
                        <img src="https://kleoseo.com/indica/wp-content/uploads/2021/10/girl7-150x150.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
        
        
        
        
        
            </div>
</section>

<script>
    jQuery(document).ready(function(){
          jQuery("#dob").datepicker( { minDate: '-30Y',dateFormat: 'dd/mm/yy', maxDate: '-18Y' });
    });
</script>
<style>
   main {
	background-image: url(<?php echo get_site_url(); ?>/wp-content/themes/dating/images/865178.jpg) !important;
}.account_info_prsn_bx .personal_info_box .billing_form_py_inf .cnt_sec_right {
	width: 100%;
	float: left;
}.account_info_prsn_bx .personal_info_box .billing_form_py_inf .cnt_sec_right .hlf {
	width: 25%;
	float: left;
}.account_info_prsn_bx .personal_info_box .billing_form_py_inf .cnt_sec_right .hlf select {
	width: 92%;
	float: left;
	font-size: 13px;
	border: 1px solid #0000001f;
	padding: 7px 10px;
	font-family: 'Poppins', sans-serif;
	color: #000;
	margin-top: 9px;
	height: 35px;
}.tagify {
	background: #fff;
	margin-bottom: 5px;
}.full textarea {
	width: 97%;
	float: left;
	font-size: 13px;
	background: #fff;
	border: 1px solid #0000001f;
	padding: 7px 10px;
	font-family: 'Poppins', sans-serif;
	color: #000;
	margin-bottom: 9px;
}
.account_info_prsn_bx .personal_info_box .billing_form_py_inf .cnt_sec_right .hlf.lf input {
	width: 94%;
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
	width: 31%;
	margin-right: 20px;
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
	margin-top: 9px;
	font-size: 21px;
	font-family: Times New Roman !important;
	height: auto;
	text-align: left;
}.data_user {
	text-align: left;
	margin-bottom: 11px;
}.hlf span {
	background: #fff;
	padding: 0px 5px;
	border-radius: 5px;
	border: 1px solid #ccc;
	margin: 9px 4px 0px 4px;
	float: ;
	display: inline-block;
	margin-bottom: ;
}#botom_attrs .cnt_sec_right .hlf label::after {
	content: '';
	height: 1px;
	width: 100px;
	background: #000;
	position: absolute;
	bottom: 0px;
	left: 31%;
}
#botom_attrs .data_user,#botom_attrs .cnt_sec_right .hlf label {
	text-align: center;
	position:relative;
}
</style>
<section class="qs-section has-bgc bgc-darker bg_top_search_mmb bg_top_search_mmbb bg_blocked_box_pg blog-posting_bg_pg">

    <div class="container">
        
        <div class="row">
            <div class="col-lg-10 col-md-12 mauto" style="padding: 0px !important;">
            <?php
            $user_id = $current_user->ID;
                $first_name = get_user_meta( $user_id, 'first_name', true );
                $last_name = get_user_meta( $user_id, 'last_name', true );
                $description = get_user_meta( $user_id, 'aboutme', true);
                $gender = get_user_meta( $user_id, 'gender');
        $gender = $gender[0];
        
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
                
                
                $person = json_decode($person);
                $person = implode(", ", array_map(function($obj) { foreach ($obj as $p => $v) { return $v;} }, $person));
                
                $music = json_decode($music);
                $music = implode(", ", array_map(function($obj) { foreach ($obj as $p => $v) { return $v;} }, $music));
                
                $hobbies = json_decode($hobbies);
                $hobbies = implode(", ", array_map(function($obj) { foreach ($obj as $p => $v) { return $v;} }, $hobbies));
                
            ?>

                <div class="blocked_ristrict_mmbr account_info_prsn_bx">
                    <div class="personal_info_box">
                        <div class="billing_form_py_inf">                        
                               <div class="cnt_sec_right">
                                    <h1 class="hd_top_inf">Personal Information</h1>
                                    <span class="hlf lf">
                                        <label>Name</label>
                                        <div class="data_user"><?php echo $first_name.' '.$last_name ?></div>
                                    </span>
                                    
                                    <span class="hlf lf last">
                                        <label>Date of Birh</label>
                                        <div class="data_user"><?php echo $age; ?></div>
                                    </span>

                                     <span class="hlf">
                                        <label>City</label>
                                       <div class="data_user"><?php echo $city; ?></div>
                                    </span>

                                    <span class="hlf last">
                                        <label>State</label>
                                        <div class="data_user"><?php echo $state; ?></div>
                                    </span>

                                    <span class="hlf">
                                        <label>Zip Code </label>
                                        <div class="data_user"><?php echo $zip; ?></div>
                                    </span>
                                      <span class="hlf" style="width:100% !important;">
                                        <label>About me</label>
                                        <p><?php echo $description; ?></p>
                                    </span>
                               
                                   

                               </div>

                            
                        </div>
                        
                    </div>
                </div>
            </div>
            
            
            
            
            
            <div class="col-lg-10 col-md-12 mauto"  id="botom_attrs">
          

                <div class="blocked_ristrict_mmbr account_info_prsn_bx">
                    <div class="personal_info_box">
                        <div class="billing_form_py_inf">                        
                               <div class="cnt_sec_right">
                                
                                   <span class="hlf">
                                        <label>Age</label>
                                        <div class="data_user"><?php echo $age; ?></div>
                                    </span>

                                    <span class="hlf">
                                        <label>Gender</label>
                                        <div class="data_user"><?php echo $gender; ?></div>
                                    </span>

                                    <span class="hlf">
                                        <label>Height</label>
                                        <div class="data_user"><?php echo $height; ?></div>
                                    </span>

                                    <span class="hlf">
                                        <label>Hair Color</label>
                                        <div class="data_user"><?php echo $height; ?></div>
                                    </span>

                                    <span class="hlf">
                                        <label>Eye Color</label>
                                        <div class="data_user"><?php echo $eyecolor; ?></div>
                                    </span>

                               </div>

                            
                        </div>
                        
                    </div>
                </div>
           

                <div class="blocked_ristrict_mmbr account_info_prsn_bx">
                    <div class="personal_info_box">
                        <div class="billing_form_py_inf">                        
                               <div class="cnt_sec_right">
                                   
                                   <span class="hlf">
                                        <label>Personality</label>
                                        <div class="data_user"><?php 
                                                $person = explode(',',$person);
                                                for($i=0;$i<sizeof($person);$i++){
                                                    echo '<span>'.$person[$i].'</span>';
                                                    }
                                                ?></div>
                                    </span>

                                    <span class="hlf">
                                        <label>Astrological Sign</label>
                                        <div class="data_user"><?php echo $asign; ?></div>
                                    </span>

                                    <span class="hlf">
                                        <label>Occupation</label>
                                        <div class="data_user"><?php echo $occup; ?></div>
                                    </span>

                                    <span class="hlf">
                                        <label>Music</label>
                                        <div class="data_user">
                                            <?php 
                                                $music = explode(',',$music);
                                                for($i=0;$i<sizeof($music);$i++){
                                                    echo '<span>'.$music[$i].'</span>';
                                                    }
                                                ?>
                                        </div>
                                    </span>
                               </div>

                            
                        </div>
                        
                    </div>
                </div>
            
                <div class="blocked_ristrict_mmbr account_info_prsn_bx">
                    <div class="personal_info_box">
                        <div class="billing_form_py_inf">                        
                               <div class="cnt_sec_right">
                                   
                                   <span class="hlf">
                                        <label>Hobbies/Interests</label>
                                        <div class="data_user">
                                            <?php 
                                                $hobbies = explode(',',$hobbies);
                                                for($i=0;$i<sizeof($hobbies);$i++){
                                                    echo '<span>'.$hobbies[$i].'</span>';
                                                    }
                                                ?>
                                        </div>
                                    </span>

                                    <span class="hlf">
                                        <label>Astrological Sign</label>
                                        <div class="data_user"><?php echo $asign; ?></div>
                                    </span>

                                    <span class="hlf">
                                        <label>Random Q</label>
                                        <div class="data_user"><?php echo $r_q_2; ?></div>
                                    </span>

                                    

                                    <span class="hlf">
                                        <label>Random Q</label>
                                        <div class="data_user"><?php echo $asign; ?></div>
                                    </span>
                                    <span class="hlf">
                                        <label>Body Type</label>
                                        <div class="data_user"><?php echo $btype; ?></div>
                                    </span>
                                    <span class="hlf">
                                        <label>Looking For</label>
                                        <div class="data_user"><?php echo $lfor; ?></div>
                                    </span>
                               </div>

                            
                        </div>
                        
                    </div>
                </div>
            </div></div></div></div>
</section>

    </div></div>
   

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jQuery.tagify.min.js"></script>

    <script>
        // The DOM element you wish to replace with Tagify
var input = document.querySelector('input[name=personality]');
var input_1 = document.querySelector('input[name=music]');
var input_2 = document.querySelector('input[name=hobbies]');

// initialize Tagify on the above input node reference
new Tagify(input);
new Tagify(input_1);
new Tagify(input_2)
    </script>
<?php
get_footer();
