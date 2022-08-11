<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package qs
 */

get_header();
?>

<section class="qs-section has-bgi" style="background-image: url(<?php echo get_template_directory_uri().'/images/faq.png' ?>)">
    <div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/content-single-faq', get_post_type() );?>
        <?php endwhile; ?>
    </div>
</section>

<?php

get_footer();
