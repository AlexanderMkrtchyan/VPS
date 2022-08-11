<?php

/**

 * Template Name: About us

 *

 * @package WordPress

 * @subpackage qs

 * @since quigleyshore

 */



session_start();

get_header();
?>



<style type="text/css">
    .vh-90{
        height:90vh;
    }
    .heading h1{
        margin-top:20px;
        margin-bottom:20px;
        color:#000;
    }.qs-terms--col p strong {
	margin-left: 0px !important;
	color: #ac7521;
}.qs-faq--content p { color:#000 !important; }
</style>
<section class="qs-tour container-fluid color-white" style="background:url('https://quigleyoats22.org/wp-content/uploads/2022/02/WhatsApp-Image-2022-02-22-at-10.43.19-AM.jpeg') no-repeat center; background-size:cover;">

    <div class="row">

        <div class="col-md-12">

    <div class="heading text-center" style="text-align:center">

        <h1 class="color-white"><?php  the_title()?></h1>

    </div>

    </div>

    </div>

    <div class="row">


    </div>
    <div class="row" >

        <div class="col-md-12 qs-terms--col vh-90 qs-tour--col-xs">

            <div class="qs-tour--col-inner">
                    <div class="qs-faq--content"> <?php the_content(); ?></div>
               
            </div>

        </div>

    </div>
  

</section>



<?php

get_footer();

