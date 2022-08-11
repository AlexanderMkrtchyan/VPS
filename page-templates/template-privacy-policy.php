<?php

/**

 * Template Name: Privacy Policy

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
    }.qs-terms--col p strong {
	margin-left: 0px !important;
	color: #ac7521;
}
.qs-tour--col-inner ul li {
	text-align: left !important;
	list-style: lower-latin;
	margin: 0px !important;
}
#address_text li {
	list-style: none !important;
}
#address_text { margin-top:0px; }
</style>
<section class="qs-tour container-fluid color-white">

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



<?php

get_footer();

