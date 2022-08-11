<?php
/*
 * Template Name: Join Quigley Shores
 *
 */
session_start();
get_header();
$_SESSION['page'] = 'join';
?>


<section class="qs-tour container-fluid color-white">
    <div class="qs-tour--head">
        <h1 class="color-white"><?php  the_title()?></h1>
    </div>
    <div class="row">
        <div class="col-md-6 qs-tour--col vh-100" style="background-image: url(<?php echo get_template_directory_uri().'/images/t2.jpg' ?>)">
            <div class="qs-tour--col-inner">
                <h2 class="qs-tour--title color-white">Are you a male seeking beautiful women who could enhance your life?</h2>
                <p>
                    Click below to see your possibilities
                </p>
                <a href="<?php echo esc_url(home_url('/join-the-quest/join-step-1/')); ?>"  class="qs-btn btn-primary btn-lg">Seeking Women</a>
            </div>
        </div>
        <div class="col-md-6 qs-tour--col vh-100" style="background-image: url(<?php echo get_template_directory_uri().'/images/t1.jpg' ?>)">
            <div class="qs-tour--col-inner">
                <h2 class="qs-tour--title color-white">Are you a female seeking handsome
                    men who could enhance your life?</h2>
                <p>
                    Click below to see your possibilities
                </p>
                <a href="<?php echo esc_url(home_url('/join-the-quest/join-step-1/')); ?>"  class="qs-btn btn-primary btn-lg">Seeking Men</a>
            </div>
        </div>
    </div>
</section>

<?php

