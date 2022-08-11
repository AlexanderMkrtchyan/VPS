<?php

/**

 * Template Name: Join: Step 3

 *

 * @package WordPress

 * @subpackage qs

 * @since quigleyshore

 */



get_header();

?>

<style>
       @media screen and (max-width:480px){
        #video {
        	width: 100% !important;
        }
        #verification_for_image label {
        	width: 91% !important;
        }
        .qs-reg--quest-face {
        	max-width: 100% !important;
        	-webkit-box-flex: 0 !important;
        	-ms-flex: 0 0 50% !important;
        	flex: 0 0 50% !important;
        	height: auto !important;
        	float:none !important;
        	margin: auto !important;
        }
    }
</style>
<section class="qs-section qs-reg--section bgc-darker has-bgi bgi-parallax" style="background-image: url(<?php echo get_template_directory_uri().'/images/ocean.png' ?>)">

    <div class="container qs-reg--quest-container">

        <div class="qs-reg--quest">

            <div class="qs-reg--quest-first-col">

                <div class="qs-reg--quest-face">

                    <canvas id="image_0"></canvas>

                    <!-- <i class="fa fa-plus"></i> -->

                </div>

                <div class="qs-reg--quest-face" style="display:none;">

                    <canvas id="image_1"></canvas>

                    <!-- <i class="fa fa-plus"></i> -->

                </div>

                <div class="qs-reg--quest-face" style="display:none;">

                    <canvas id="image_2"></canvas>

                    <!-- <i class="fa fa-plus"></i> -->

                </div>

            </div>

            <div class="qs-reg--quest-second-col">

           

                <div class="qs-reg--quest-display">

                <div class="loader">

  <span></span>

  <span></span>

  <span></span>

  <span></span>

  <span></span>

  <span></span>

  <span></span>

  <span></span>

  <span></span>

  <span></span>

  <span></span>

  <span></span>

  <span></span>

  <span></span>

  <span></span>

</div>

                    <span class="qs-reg--quest-live">

                    <video id="video"  width="512px" height="512px" autoplay muted></video>
            
                    </span>

                    <div class="qs-reg--quest-btn">

                        <button id="keep" class="qs-btn btn-sm btn-blue">

                            <i class="fa fa-check"></i>

                            Keep

                        </button>

                        <button id="capture" class="qs-btn btn-xsm btn-red" href="">

                            <i class="fa fa-close"></i>

                            Capture

                        </button>

                        <button id='redo' class="qs-btn btn-sm btn-blue">

                            <i class="fa fa-repeat"></i>

                            Redo

                        </button>

                    </div>
                    
                </div>
                <div id="verification_for_image">
                    <input class="verifyme" type="checkbox" /><label>I acknowledge I have read, understand and agree to the  <span data-toggle="modal" data-target="#textModal">Facial Recognition.</span></label> 
                    <span class="error_msg">Please accept the Terms &amp; Conditions</span>
                </div>
            </div>

            <div class="qs-reg--quest-third-col">

                <div class="qs-reg--quest-info text-center bgc-black">

                    <h3 class="color-white">Facial

                        Recognition</h3>

                    <p>Added security to better

                        protect your information</p>

                    <p>Use facial recognition for a hassle free log in!</p>

                </div>

            </div>

        </div>
    
        <div id="next-btn" class="qs-reg--quest-buttons qs-reg--next-prev text-center">
        
            <a href="<?php echo esc_url( home_url( '/thank-you/' ) ); ?>" class="qs-btn btn-primary">Next Step</a>
            
            <span id="next-btn-overlay"></span>
        </div>

    </div>

</section>
<script>
 jQuery('.error_msg').hide();
jQuery(".verifyme").click(function(){
    if(jQuery(".verifyme").prop('checked') == true){ 
        jQuery('#next-btn-overlay').hide();
        jQuery('.error_msg').hide();
    }else{
        jQuery('#next-btn-overlay').show();
    }
});
var i=0;
jQuery("#next-btn-overlay").click(function(){
    if(i == 0){ 
        jQuery('.error_msg').show();
    }
});
</script>
<div id="canvasCollection" style="display:none;"></div>

<canvas id="klri_canvas" style="display:none;"></canvas>



<div class="detection_options" style="display:none;">

  <p class="age"></p>

  <p class="gender"></p>

  <p class="score"></p>

</div>
<div class="modal fade" id="textModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Terms &amp; Conditions</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                “Quigley Oats” is an assumed name of Quigley Oats, LLC, the parent of all Quigley properties (websites), including Quigley Shores, Quigley Beach, Quigley Sands, Quigley Pines and Quigley Island. Additional properties may be added at a later date. The use of “Quigley Oats, LLC” and/or “Quigley Oats” shall include and mean any Quigley property owned and/or controlled by Quigley Oats, LLC
                              </div>
                             
                            </div>
                          </div>
                        </div>


<?php







// $args = array(

//     'post_type' => 'attachment',

//     'post_status' => 'inherit',

//     'posts_per_page' => -1,

//   );

//   $attachment = new WP_Query($args);

//   $html = '<div id="cel_images">';

//   $i = 0;

//   foreach($attachment->posts as $img){

//     if(get_post_meta( $img->ID, 'camera_ai_image')){

//         $html .= '<img class='.$img->post_title.' src=' .  wp_get_attachment_image_src( $img->ID, 'full')[0] . ' id='.$i.'_cel>';

//         $i++;

//     }

//   }

// $html .= '</div>';

// echo $html;

get_footer();


