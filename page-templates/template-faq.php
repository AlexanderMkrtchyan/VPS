<?php
/**
 * Template Name: FAQ
 *
 * @package WordPress
 * @subpackage qs
 * @since quigleyshore
 */
get_header();
 
$faq_posts = get_field('faq', get_the_ID());
?>

<section class="qs-section bgc-darker has-bgi qs-faq" style="background-image: url(<?php echo get_template_directory_uri().'/images/faq.png' ?>)">
    <div class="container qs-faq--container">
        <h1><?php the_title() ?></h1>
        <?php if($faq_posts) : ?>
            <div class="row gutter-y-30">
                <?php foreach( $faq_posts as $post ): setup_postdata($post); ?>
                    <div class="col-md-6">
                        <a class="qs-faq--box" href="<?php the_permalink(); ?>">
                            <i class="<?php echo get_field('faq_ico') ?>"></i>
                            <?php the_title() ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>
<?php
get_footer();
