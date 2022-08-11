<?php

/** 

* Template Name: Video page

 *

 * @package WordPress

 * @subpackage qs

 * @since quigleyshore

 */

get_header();



?>
<style>
    
    @media screen and (max-width:900px){
        #thank_video {
        	width: 50%;
        	display: block;
        	margin:auto;
        	float:none;
        	position: relative;
        	height: 230px !important;
        	object-fit: cover !important;
        }
    }
    @media screen and (max-width:480px){
        #thank_video {
        	width: 100%;
        	display: block;
        	position: relative;
        	height: 545px !important;
        	object-fit: cover !important;
        }
    }
    @media screen and (max-width:360px){
        .video {
        	width: 100% !important;
        }
    }
    
</style>


<script>

var socket = io.connect('https://quigleyshores.com:3000', {secure: true});



socket.on('global_connected', e=>{

socket.emit('klir')

})

</script>



<div class="container">

    <div class="row">

            <div class="col-md-12">

                <div class="video">



                <video id="thank_video" controls  class="height" poster="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/09dc9daf-f068-4ae4-963e-e32d43c2b2c8/d1qdh9w-df269a40-4a5f-46fc-993e-f3c7c009318c.jpg/v1/fill/w_1600,h_1000,q_75,strp/sexy_widescreen_girl_by_xatzis5000_d1qdh9w-fullview.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MTAwMCIsInBhdGgiOiJcL2ZcLzA5ZGM5ZGFmLWYwNjgtNGFlNC05NjNlLWUzMmQ0M2MyYjJjOFwvZDFxZGg5dy1kZjI2OWE0MC00YTVmLTQ2ZmMtOTkzZS1mM2M3YzAwOTMxOGMuanBnIiwid2lkdGgiOiI8PTE2MDAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.pPdxKCjuQEUlekY8lfAzcDRQmqTYe2GMj4uYeY5y5fs">

                    <source type="video/mp4" src="<?php echo get_template_directory_uri() . '/videos/final_1-24.mp4'?>">

                </video>

                <a  href="<?php echo esc_url(home_url('/join-the-quest/join-step-1/')); ?>" class="qs-btn btn-primary btn-lg skip">SKIP</a>

                <img id="pudz" src="https://cdn-icons-png.flaticon.com/512/148/148744.png" alt="">



             </div>

            </div>

    </div>

</div>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<script>

let video = document.getElementById('thank_video')

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
    $('#thank_video').attr("id","thank_video_play");
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

<?php get_footer();

