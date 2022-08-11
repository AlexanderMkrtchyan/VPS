<?php

/**

 * Template Name: Join: Step 2

 *

 * @package WordPress

 * @subpackage qs

 * @since quigleyshore

 */

get_header();

//Getting user IP and insert into DB

if (!empty($_SERVER['HTTP_CLIENT_IP'])){

    $ip_address = $_SERVER['HTTP_CLIENT_IP'];

}

//whether ip is from proxy

elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){

    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];

}

//whether ip is from remote address

else{

    $ip_address = $_SERVER['REMOTE_ADDR'];

}


?>




<section class="qs-section qs-reg--section has-bgi bgi-parallax bgc-darker" style="background-image: url(<?php echo get_template_directory_uri().'/images/join.png' ?>)">

    <div class="container">

        <div class="row">

            <div class="col-lg-5">

                <div class="qs-reg">

                    <h2 class="qs-reg--form-title">Security Questions</h2>

                    <form class="qs-reg--form">
                            <input name="user_id_cookie" class="user_id_cookie" type="hidden">
                        <div class="row gutter-y-30">
                            
                            <div class="col-sm-12">
                                <div class="qs-input-attention q1-attention">Please correct this entry</div>
                                <input required class="qs-input input-primary question-1" name="question-1" placeholder="Your Question" type="text">
                            </div>
                            <div class="col-sm-12">
                                <div class="qs-input-attention q1-ans-attention">Please correct this entry</div>
                                <input required class="qs-input input-primary answer-1" name="answer-1" placeholder="Your Answer" type="text">
                            </div>
                            <div class="col-sm-12">
                                <div class="qs-input-attention q2-attention">Please correct this entry</div>
                                <input required class="qs-input input-primary question-2" name="question-2" placeholder="Your Question" type="text">
                            </div>
                            <div class="col-sm-12">
                                <div class="qs-input-attention q2-ans-attention">Please correct this entry</div>
                                <input required class="qs-input input-primary answer-2" name="answer-2" placeholder="Your Answer" type="text">
                            </div>
                            <div class="col-sm-12 text-center qs-reg--next-prev">
                                <button type="submit" class="qs-btn btn-primary submit">Next Step</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> 
<script>
var user_id_cookie = localStorage.getItem('user_id');
document.getElementsByClassName("user_id_cookie")[0].value = user_id_cookie;

</script>
<?php

get_footer();

