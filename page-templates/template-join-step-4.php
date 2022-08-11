<?php
/**
 * Template Name: Profile Edit
 *
 * @package WordPress
 * @subpackage qs
 * @since quigleyshore
 */

get_header();
if(!is_user_logged_in(  )){

echo "<p class='should_login' style='color:yellow;width: 170px;height: 70px;top: 50%; left:50%; margin: -35px 0 0 -35px;position:absolute;'> You should be logged in</p>";
    return;}
function pidridze(){
    if(wp_get_attachment_image_url(8887, 'thumbnail')){
        echo  wp_get_attachment_image_url(8887, 'thumbnail');
    }else{
        echo 'no image boz@';
    }
}
// $users = get_users();
// foreach($users as $user){
   
// 		$timestamp = mt_rand(1, time()-567993600);
// 		$randomDate = date("Y-m-d", $timestamp);
// 		$birth_date = esc_sql(trim($randomDate));
//         var_dump($birth_date);
// 		update_user_meta( $user->ID, 'birth-date', $birth_date);

// }
// echo $uuid;
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
</style>
<script></script>
<img style="display:none;" src="<?php echo wp_get_attachment_image_url(8887, 'thumbnail'); ?>" alt="" id="hidden_no_image">
<video style="display:none;" src="<?php echo get_template_directory_uri().'/videos/demo.mp4'; ?>" id="hidden_no_video"></video>
<?php get_template_part( 'blocks/block-profile-top', get_post_type() );?>

<section class="qs-section bgc-dark">
    <div class="container">
        <div class="row gutter-y-30">
            <div id="upload-group-1" class="col-lg-6 col-left">
               <h3 class="color-white">Upload Public Photos</h3>
               <div class="row gutter-y-30">
                   <div class="col-md-8">
                       <div class="row gutter-y-30">
                        <?php
                        $img_count = 0;
                        $img_src_local = '';
                        foreach ($query_images->posts as $image) {

                            if(metadata_exists('post', $image->ID, 'privacy_status')){
                            if( get_post_meta($image->ID, 'privacy_status')[0] == 'public_image' && $img_count<4){
                                $img_src = wp_get_attachment_image_src( $image->ID,'thumbnail',false );
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
                                            <img class="public_images" image-id="<?php echo $image->ID; ?>" src="<?php echo $img_src[0]; ?>" alt="syodr">
                                        </label>
                                    </div>
                                </div>
                                <?php 
                                $img_count++;
                            }elseif( get_post_meta($image->ID, 'privacy_status')[0] == 'public_image' && $img_count==4){
                                $img_count++;
                                $img_src_local = wp_get_attachment_image_src( $image->ID,'thumbnail',false );
                            }
                        }
                        }

                        $i = 0; 
                            while($i<4-$img_count){
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
                                <img class="public_images" image-id="<?php echo $img_count==5 ?  $image->ID : ""; ?>" src="<?php echo $img_count==5 ?  $img_src_local[0] : pidridze(); ?>" alt="syodridze">
                            </label>
                        </div>
                    </div> 
                   <div class="col-md-12">
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
                   <div class="col-md-12">
                       <div class="qs-profile--instr">
                           <p>
                               Choose five photos to upload of yourself. This five photos will be visible to members visiting your profile page
                           </p>
                           <p>
                               These photos can be changed later.
                           </p>
                       </div>
                   </div>
               </div>
           </div>
           <div id="upload-group-single" class="col-lg-6">
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
               </div>
               <div class="qs-profile--buttons">
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
               <div class="qs-profile--instr mt30">
                   <p>
                       Choose one video of yourself to be displayed on your public profile page. This video will be visible to all members visiting your page.
                   </p>
                   <p>
                      This video can be changed later.
                   </p>
               </div>
           </div>
        </div>
    </div>
</section>
<section class="qs-section has-bgc bgc-darker">
    <div class="container">
        <h2 class="qs-profile--section-title">Edit private</h2>
        <div class="row gutter-y-30">
        <div class="row gutter-y-30">
            <div id="upload-group-2" class="col-lg-7 col-left">
                <h3 class="color-white">My Private Exclusive Photos</h3>
                <div class="row gutter-y-30">
                    <div class="col-md-12 ">
                        <div class="row gutter-y-10 gutter-x-5">
                            <?php
                            $img_count = 0;
                            foreach ($query_images->posts as $image) {
                                if(metadata_exists('post', $image->ID, 'privacy_status')){
                                if( get_post_meta($image->ID, 'privacy_status')[0] == 'private_image'){
                                    $img_src = wp_get_attachment_image_src( $image->ID,'thumbnail',false );
                                    ?>
                                     <div class="col-sm col-private">
                                        <div class="qs-profile--item bgc-dark h140">
                                            <label class="qs-chk-rad chk-rad-primary">
                                            <div class = "centered">
                                                <div class = "blob-1"></div>
                                                <div class = "blob-2"></div>
                                            </div>
                                                <input class="private_checkbox" type="checkbox" name="remember">
                                                <span></span>
                                                <img image-id="<?php echo $image->ID; ?>" src="<?php echo $img_src[0] ?>" class="private_images" alt="">
                                            </label>
                                        </div>
                                    </div>
                                    <?php 
                                    $img_count++;
                                }
                            }
                            }
                            
                            $i = 0; 
                            while($i<25-$img_count){
                                ?>
                                <div class="col-sm col-private">
                                <div class="qs-profile--item bgc-dark h140">
                                    <label class="qs-chk-rad chk-rad-primary">
                                    <div class = "centered">
                                        <div class = "blob-1"></div>
                                        <div class = "blob-2"></div>
                                    </div> 
                                        <input class="private_checkbox" type="checkbox" name="remember">
                                        <span></span>
                                        <img src="<?php pidridze(); ?>" class="private_images" alt="">
                                    </label>
                                </div>
                            </div>
                                <?php
                                $i++;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="qs-profile--buttons mt0">
                            <button class="qs-btn btn-primary upl-button btn-sm">
                                <span>Upload Images</span>
                                <input id="private_upload" accept="image/*" multiple type="file">
                            </button>
                            <button id="private_delete" class="qs-btn btn-primary upl-button btn-sm">
                                <span>Delete Images</span>
                            </button>
                            <button id="private_save" class="qs-btn btn-primary upl-button btn-sm">
                                <span>Save Images</span>
                            </button>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="qs-profile--instr">
                            <p>
                            Upload up to 25 photos to your Private Photo Gallery, visible only to members who pay YOU a monthly subscription fee.
                            </p>
                            <p>
                                These photos can be changed and edited later.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="upload-group-3" class="col-lg-5">
                <h3 class="color-white">My Private Videos</h3>
                <div class="row gutter-y-30">
                    <?php
                    
                    
                    
                    $img_count = 0;
                    foreach ($query_images->posts as $image) {
                        if(metadata_exists('post', $image->ID, 'privacy_status')){
                        if( get_post_meta($image->ID, 'privacy_status')[0] == 'private_video'){
                            $video_url = wp_get_attachment_url( $image->ID);
                            ?>
                             <div class="col-sm-12">
                                <div class="qs-profile--item bgc-dark h227">
                                <div class = "centered">
                                    <div class = "blob-1"></div>
                                    <div class = "blob-2"></div>
                                </div>
                                    <label class="qs-chk-rad chk-rad-primary">
                                        <input class="private_video_checkbox" type="checkbox" name="remember">
                                        <span></span>
                                        <video preload="metadata" data-id="<?php echo $image->ID; ?>" class="private_video" controls class="play-controls--video" src="<?php echo $video_url; ?>"></video>
                                    </label>
                                </div>
                            </div>
                            <?php 
                            $img_count++;
                        }
                    }
                    }
                    
                    $i = 0; 
                    while($i<3-$img_count){
                        ?>
                        <div class="col-sm-12">
                                <div class="qs-profile--item bgc-dark h227">
                                <div class = "centered">
                                    <div class = "blob-1"></div>
                                    <div class = "blob-2"></div>
                                </div>
                                    <label class="qs-chk-rad chk-rad-primary">
                                        <input class="private_video_checkbox" type="checkbox" name="remember">
                                        <span></span>
                                        <video preload="metadata"  class="private_video" controls class="play-controls--video" src="<?php echo get_template_directory_uri().'/videos/demo.mp4'; ?>"></video>
                                    </label>
                                </div>
                            </div>
                        <?php
                        $i++;
                    }                    
                    ?>

                </div>
                <div class="qs-profile--buttons">
                    <button  class="qs-btn btn-primary upl-button btn-sm">
                        <span>Upload Video</span>
                        <input id="private_video_upload" accept="video/*" multiple type="file">
                    </button>
                    <button id="private_video_delete" class="qs-btn btn-primary upl-button btn-sm">
                        <span>Delete Video</span>
                    </button>
                    <button id="private_video_save" class="qs-btn btn-primary upl-button btn-sm">
                        <span>Save Video</span>
                    </button>
                </div>
                <div class="qs-profile--instr mt30">
                    <p>
                    Upload 3 videos to your Private Video Arcade, visible only to members who pay YOU a monthly subscription fee, and this subscription is different than
                    </p>
                    <p>
                        These videos can be changed of eddited later
                    </p>
                </div>
            </div>
        </div>
            
        </div>
    </div>
</section>

<?php
get_footer();
