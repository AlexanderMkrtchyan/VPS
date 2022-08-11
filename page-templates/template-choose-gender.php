<?php

/**

 * Template Name: Choose Gender

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
    #choose-gen h2,.qs-tour--title.color-white { font-family: 'belymon_script_demoregular' !important;
font-size: 42px; }

@media screen and (max-width:512px){
    .qs-tour--col-xs {
    	height: 90vh !important;
    }
}
</style>
<section class="qs-tour container-fluid color-white">

    <div class="row" style="display:none;">

        <div class="col-md-12">

    <div class="heading text-center" style="text-align:center">

        <h1 class="color-white"><?php  the_title()?></h1>

    </div>

    </div>

    </div>

    <div class="row">


    </div>
    <div class="row" >

        <div class="col-md-6 qs-tour--col vh-90 qs-tour--col-xs" style="background-image: url(<?php echo get_template_directory_uri().'/images/t2.jpg' ?>)">

            <div class="qs-tour--col-inner" id="choose-gen">

                <h2 class="qs-tour--title color-white">Are you a man seeking a beautiful Woman to enhance your Life?</h2>

               

                <form action="<?php echo esc_url(home_url('/join-the-quest/join-step-1/')); ?>" method="post">
                        <input type="hidden" name="gender" value="male" />
                    <button class="qs-btn btn-primary btn-lg" id="choose-gender">Seeking Women</button></form>

            </div>

        </div>

        <div class="col-md-6 qs-tour--col vh-90 qs-tour--col-xs" style="background-image: url(<?php echo get_template_directory_uri().'/images/t1.jpg' ?>)">

            <div class="qs-tour--col-inner" id="choose-gender">

                <h2 class="qs-tour--title color-white">Are you a woman looking for an attractive man who will Respect you for Who You are? </h2>

                

              <form action="<?php echo esc_url(home_url('/join-the-quest/join-step-1/')); ?>" method="post">
                        <input type="hidden" name="gender" value="female" />
                    <button class="qs-btn btn-primary btn-lg" id="choose-gender">Seeking Men</button></form>

            </div>

        </div>

    </div>
    <div id="choose-a-gender"></div>

</section>



<?php

get_footer();

