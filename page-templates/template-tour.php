<?php

/**

 * Template Name: Take a tour

 *

 * @package WordPress

 * @subpackage qs

 * @since quigleyshore

 */



session_start();

get_header();

$_SESSION['page'] = 'tour';

?>



<style type="text/css">
    .vh-90{
        height:90vh;
    }
    .heading h1{
        margin-top:20px;
        margin-bottom:20px;
    }
</style>
<style type="text/css">
    .vh-90{
        height:90vh;
    }
    .heading h1{
        margin-top:20px;
        margin-bottom:20px;
        color:#fff;
    }.qs-terms--col p strong {
	margin-left: 0px !important;
	color: #ac7521;
}.qs-faq--content p { color:#000 !important; }
.video span {
	position: absolute;
	top: 35%;
	left: 44%;
	max-width: 170px;
	color: #ebba16;
	text-transform: uppercase;
	font-size: 17px;
	font-weight: bold;
}
#pudz span {
	float: left;
	width: 100%;
	text-align: center;
	top: -40px;
	left: -29%;
	width: ;
	width: 170px;
}
@media screen and (max-width:512px){
    .vh-90{
        height:auto !important;
    }body {
	min-height: 99vh;
}.qs-tour--col-xs {
	height: 66vh !important;
}
#pudz {
	display: block;
	max-width: 62px;
	position: absolute;
	top: 320px;
	right: unset !important;
	cursor: pointer;
	z-index: 10;
	transition: linear .3s;
	margin-right: unset !important;
	margin-left: -20px;
}
#pudz span {
	float: left;
	width: 100%;
	text-align: center;
	top: -40px;
	left: -79%;
	width: 170px;
}
}
</style>
<section class="qs-tour container-fluid color-white" style="background:url('https://quigleyoats22.org/wp-content/uploads/2022/02/sea-g814bb398b_1920.jpg') no-repeat center; background-size:cover; background:none;">

    <div class="row">

        <div class="col-md-12">

    <div class="heading text-center" style="text-align:center">

        <h1 class="color-white"><?php  the_title()?></h1>

    </div>

    </div>

    </div>

    <div class="row" >

        <div class="col-md-12 qs-terms--col vh-901 qs-tour--col-xs">

            <div class="qs-tour--col-inner" style="display:none;">
                    <div class="qs-faq--content"><p>Quigley Shores, with 15 special features that can bring rewards not available on any other dating site on earth. Watch for our mid-April launch date.</p></div>
               
            </div>
 <div class="col-md-12">

                

            
            <div class="video">


            <video id="thank_video" controls  class="height" poster="<?php echo get_site_url() . '/wp-content/uploads/2022/02/video-capture-6893.png'?>">

                    <source type="video/mp4" src="<?php echo get_template_directory_uri() . '/videos/final_1-24.mp4'?>">

                </video>
                <a  href="<?php echo esc_url(home_url('/join-the-quest/join-step-1/')); ?>" class="qs-btn btn-primary btn-lg skip">SKIP</a>
                <div id="pudz">
                    <span>click to start video</span>
                <img src="https://cdn-icons-png.flaticon.com/512/148/148744.png" alt="">
                </div>



             </div>
        

    </div>
        </div>

    </div>
  

</section>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<script>

let video = document.querySelector('video');;

video.addEventListener('ended', (event) => {

  console.log('Video stopped either because 1) it was over, ' +

      'or 2) no further data is available.');

      window.location.href = '/join-step-1/';

});






document.getElementsByClassName('video')[0].addEventListener('mousemove', e=>{

  document.getElementById('pudz').style.opacity = '1';

  console.log('pdzin')

})

setInterval(() => {

  document.getElementById('pudz').style.opacity = '0';

}, 3000);

let state = false

document.getElementById('pudz').addEventListener('click', e=>{

  if(!state){

    document.getElementById('pudz').src = 'https://cdn-icons-png.flaticon.com/512/190/190521.png'
    $('.qs-header--outer').css("display","none");
    $('.plyr__video-wrapper video').attr("id","thank_video_play");
    video.play()
    state = true

  }else{

    document.getElementById('pudz').src = "https://cdn-icons-png.flaticon.com/512/148/148744.png"

    $('.qs-header--outer').css("display","block");
    $('#thank_video_play').attr("id","thank_video");

    video.pause()

    state = false

  }

})

</script>


<?php

get_footer();

