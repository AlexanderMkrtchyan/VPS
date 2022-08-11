<?php
/**
 * Template Name: Homepage
 *
 * @package WordPress
 * @subpackage qs
 * @since quigleyshores
 */
get_header();
?>
    <section>
        <div class="qs-slider home-sldr">
            <?php if( have_rows('slider') ): ?>
            <div id="home-slider" class="slick--preloader">
                <?php while( have_rows('slider') ): the_row(); ?>
                <?php
                    $qs_slider_welcome_text = get_sub_field('welcome_text');
                    $qs_slider_image = get_sub_field('slider_image');
                ?>
                <div class="home-sldr--slide" id="gslide-<?php echo get_row_index(); ?>">
                    <div class="home-sldr--slide-img" style="background-image: url(<?php if(!empty($qs_slider_image)) { echo $qs_slider_image['url']; } ?>)">
                        <?php if(!empty($qs_slider_welcome_text)) : ?>
                           <div class="container">
                               <div class="home-sldr--text">
                                   <div class="home-sldr--title"><?php echo $qs_slider_welcome_text ?></div>
                               </div>
                           </div>
                        <?php endif; ?>
		                <?php
                            if(get_row_index() == 4){
                        ?>
                        
                            <a href="<?php echo esc_url(home_url('/choose-gender/')); ?>" class="pre_registration qs-btn btn-primary upl-button btn-sm" id="join-btn"><span>Join Here</span><span id="bvacktext">Join Here</span></a>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
            <div class="home-sldr--dots"></div>
        </div>
    </section>
<?php
get_footer();



