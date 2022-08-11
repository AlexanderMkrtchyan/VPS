<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package qs
 */

get_header();
$question_bg = get_field('question_background', $post_id);
?>

<section class="qs-section qs-question--section has-bgi bgi-parallax" style="background-image: url(<?php echo $question_bg['url'] ?>)">
    <div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/content-single-question', get_post_type() );?>
        <?php endwhile; ?>
        <?php qs_question_navigation() ?>
    </div>
</section>

<?php

get_footer();
