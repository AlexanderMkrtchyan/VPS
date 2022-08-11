<?php

/**

 * Template Name: Contact us

 *

 * @package WordPress

 * @subpackage qs

 * @since quigleyshore

 */



session_start();

get_header();
?>



<style type="text/css">
   #primary > div {
	float: left;
	width: 100%;
	height: 77vh;
	display: flex;
}
    .heading h1{
        margin-top:20px;
        margin-bottom:20px;
    }.qs-terms--col p strong {
	margin-left: 0px !important;
	color: #ac7521;
}#contact-uss {
	max-width: 530px;
	margin: auto;
	background: rgba(255,255,255,.55) !important;
	color: #000 !important;
}.qs-tour--col-inner {
	padding: 30px 30px;
}

@media screen and (max-width:512px){
    #contact-uss {
    	max-width: 90%;
    	margin: auto;
    	background: rgba(255,255,255,.55) !important;
    	color: #000 !important;
    }
    .qs-tour--col-inner {
    	padding: 0px !important;
    }
    #primary > div {
    	float: left;
    	width: 100%;
    	height: 82vh;
    	display: flex;
    }
    .qs-terms--col p, .qs-terms--col ol {
    	text-align: left !important;
    	margin-left: 0px !important;
    	font-size: 20px;
    }
}
</style>
<div style="background: url('https://quigleyoats22.org/wp-content/themes/dating/images/faq.png') no-repeat;background-size: cover !important;background-position: bottom center !important;">
<section id="contact-uss" class="qs-tour container-fluid color-white" >

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

        <div class="col-md-12 qs-terms--col qs-tour--col-xs">

            <div class="qs-tour--col-inner">
                <?php the_content(); ?>
            </div>

        </div>

    </div>
  

</section>

</div>

<?php

get_footer();

