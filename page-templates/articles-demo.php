<?php
/**
 * Template Name: Demo Articles
 *
 * @package WordPress
 * @subpackage qs
 * @since quigleyshore
 */
get_header();
global $wpdb;
   $user_id = get_current_user_id();
   
?>
<style>
    .article_page_heading { padding: 6px 0; font-family: Times New Roman; }
    #maine-artixlw {
	display: flex;
	justify-content: center;
	align-items: center;
}#primary {
	background: url(<?php echo get_site_url(); ?>'/wp-content/themes/dating/images/bg_blocked_bx-mmbrr.jpg') center center !important;
	background-size: cover;
	width: 100%;
}
</style>
<section class="qs-tour container-fluid color-white">
    <div class="row ">
        <div class="col-sm-12">
            <h1 class="color-white text-center article_page_heading">Articles to Feed Your Brain</h1>
        </div>
        <div class="maine-artixlw col-sm-12">
            <div id="maine-artixlw">
        <?php if($user_id!=0){
            $gender = get_user_meta( $user_id, 'gender');
            $gender = $gender[0];
            
        }
        if($gender=='female' || $user_id==0) { ?>
        <div class="col-md-4 qs-tour--col article-col vh-100  ">
           <p class="text_container width-83 text-center">Articles for Women</p>
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                         <?php if($user_id!=0){ ?><a href="<?php echo get_site_url(); ?>/articles/"><?php }else{ ?><a href="<?php echo get_site_url(); ?>/choose-gender/"><?php } ?>
                            <img class="inner_image" src="http://quigleyoats22.org/wp-content/themes/dating/images/img_2.jpeg"
                            alt="Avatar">
                        </a>
                    </div>
                    <div class="flip-card-back">
                        <?php if($user_id!=0){ ?><a href="<?php echo get_site_url(); ?>/articles/"><?php }else{ ?><a href="<?php echo get_site_url(); ?>/choose-gender/"><?php } ?><img class="inner_image" src="http://quigleyoats22.org/wp-content/themes/dating/images/img_2.jpeg"
                            alt="Avatar">
                        </a>
                    </div>
                    <div class="overlay-text">
                        <?php if($user_id!=0){ ?><a style="color:#fff;" href="<?php echo get_site_url(); ?>/articles/women/"><?php }else{ ?><a style="color:#fff;" href="<?php echo get_site_url(); ?>/choose-gender/"><?php } ?><p>Quigley Shores provides members with “Articles to feed your brain”, some of which are only for Women. Men can’t access any of them, so our female members can feel confident that they won’t be judged, or have to endure criticism or sarcasm from some guy.  Plus, women have a chance to share thoughts, impressions and ideas that the article elicited, and share them anonymously with one another through our online chat forums. Empowering women is one of our most important goals. </p></a>
                    </div>
                </div>
            </div>
            
        </div>
        <?php } ?>
        <div class="col-md-4 qs-tour--col article-col vh-100">
            <p class="text_container">Articles for Women and Men</p>
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <?php if($user_id!=0){ ?><a href="<?php echo get_site_url(); ?>/articles/"><?php }else{ ?><a href="<?php echo get_site_url(); ?>/choose-gender/"><?php } ?><img class="inner_image" src="http://quigleyoats22.org/wp-content/themes/dating/images/img_3.jpeg"
                            alt="Avatar">
                            </a>
                            <p class="text_container_back">Bozi txa</p>
                    </div>
                    <div class="flip-card-back">
                        <?php if($user_id!=0){ ?><a href="<?php echo get_site_url(); ?>/articles/"><?php }else{ ?><a href="<?php echo get_site_url(); ?>/choose-gender/"><?php } ?><img class="inner_image" src="http://quigleyoats22.org/wp-content/themes/dating/images/img_3.jpeg"
                            alt="Avatar"></a>
                    </div>
                    <div class="overlay-text">
                        <?php if($user_id!=0){ ?><a style="color:#fff;" href="<?php echo get_site_url(); ?>/articles/women-men/"><?php }else{ ?><a style="color:#fff;" href="<?php echo get_site_url(); ?>/choose-gender/"><?php } ?><p>Some “Articles to feed your brain” are intended for both men and women, and some for couples, filled with information that each sex needs to understand about the other, as well as helpful hints on dating, sharing interests, when kids are involved, and growing the relationship in a positive direction. </p></a>
                    </div>
                </div>
            </div>
        </div>
        <?php if($gender=='male' || $user_id==0) { ?>
        <div class="col-md-4 qs-tour--col article-col vh-100">
            <p class="text_container">Articles for  Men</p>
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                       <?php if($user_id!=0){ ?><a href="<?php echo get_site_url(); ?>/articles/"><?php }else{ ?><a href="<?php echo get_site_url(); ?>/choose-gender/"><?php } ?> <img class="inner_image" src="http://quigleyoats22.org/wp-content/themes/dating/images/img_1.jpeg"
                            alt="Avatar"></a>
                    </div>
                    <div class="flip-card-back">
                       <?php if($user_id!=0){ ?><a href="<?php echo get_site_url(); ?>/articles/"><?php }else{ ?><a href="<?php echo get_site_url(); ?>/choose-gender/"><?php } ?> <img class="inner_image" src="http://quigleyoats22.org/wp-content/themes/dating/images/img_1.jpeg"
                            alt="Avatar"></a>
                    </div>
                    <div class="overlay-text">
                        <?php if($user_id!=0){ ?><a style="color:#fff;" href="<?php echo get_site_url(); ?>/articles/men/"><?php }else{ ?><a style="color:#fff;" href="<?php echo get_site_url(); ?>/choose-gender/"><?php } ?><p>Quigley Shores provides our Male members with “Articles to feed your brain” that Women won’t be able to see. Men can feel confident reading unconventional philosophies that are not in lock-step with commonly accepted norms, knowing they won’t be judged by other men or women in their lives. Plus, men can share impressions, thoughts and ideas that the article raised, anonymously sharing them with other men through our online chat forums.  </p></a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div></div></div>
    
    <div class="row black-bg">
        <div class="col-md-4">
            <div class=""><p class="color-white text-center">Photo Credits</p></div>
            <div class=""><p class="color-white">Short Synopsis</p></div>
            
            
        </div>
        <div class="col-md-4">
            <div class=""><p class="color-white text-center">Photo Credits</p></div>
            <div class=""><p class="color-white">Short Synopsis</p></div>
            
            
        </div>
        <div class="col-md-4">
            <div class=""><p class="color-white text-center">Photo Credits</p></div>
            <div class=""><p class="color-white">Short Synopsis</p></div>
            
            
        </div>
    </div>
    
</section>
<?php
get_footer();