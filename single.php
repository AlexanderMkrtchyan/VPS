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

    <div class="qs-main--inner bgc-dark">
        <div class="container">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/content-single', get_post_type() );?>
            <?php endwhile; ?>
            <?php qs_post_navigation(); ?>
        </div>
    </div>

<?php

get_footer();
