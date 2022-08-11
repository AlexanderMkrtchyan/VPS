<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package qs
 */
get_header();

?>
    <div class="qs-main--inner">
        <div class="container">
            <h1 class="color-white">
                <?php the_title() ?>
            </h1>
            <?php get_template_part( 'template-parts/content-page', get_post_type() );?>
        </div>
    </div>
<?php

get_footer();
