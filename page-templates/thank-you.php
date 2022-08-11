<?php

/**

 * Template Name: Thank you

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
    .qs-thankyou-page h2 {
    	font-size: 40px !important;
    	margin-top: 60px;
    	color: #fff !important;
    	font-family: Catamaran,sans-serif;
    }
    .qs-thankyou-page h2 span {
	width: 100%;
	float: left;
	color: #fff !important;
	font-size: 60px !important;
	margin-bottom: 10px;
	font-weight:bold;
}
.qs-thankyou-page span {
	font-size: 22px !important;
	margin: 0px !important;
	font-weight: bold !important;
}
.qs-thankyou-page {
 background:url('https://quigleyoats22.org/wp-content/uploads/2022/02/sea-g814bb398b_1920.jpg') no-repeat center; 
 background-size:cover;;
}
.qs-thankyou-page #p {
	float: none;
	width: 100%;
	max-width: 610px;
	margin: auto;
}
.qs-thankyou-page #p p{
	float: left;
	width: 100%;
	text-align: center !important;
	margin-top: 50px;
}
.qs-thankyou-page #p p span {
	font-style: italic !important;
}
.qs-thankyou-page #a {
	float: left;
	color: #fff;
	width: 100%;
}
.qs-thankyou-page #a a{
	color: #fff;
}
</style>
    <section class="qs-tour qs-thankyou-page container-fluid color-white">

    <div class="row" >

        <div class="col-md-12 qs-terms--col vh-90 qs-tour--col-xs">

            <div class="qs-tour--col-inner">
                <h2><span class="qs-logo--text"><span class="first_letter" style="width: auto !important;float: none !important;">Q</span>uigley Shores</span></h2>
         
                <div id="p">
                    <p>...thanks you for Joining the only Dating Site on earth where women control the conversation and are Safer both online and off. </p>   
                </div>
                <div id="p">
                    <p>Our proprietary Facial Recognition provides the
most secure identity-verification system on earth.</p>   
                </div>
                
            </div>

        </div>

    </div>
  

</section>



<?php

get_footer();

