<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package qs
 */

?>

<?php  the_title( '<h1 class="color-white">', '</h1>' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class($class ='qs-post-single bgc-white'); ?>>

    <div class="qs-post-single--thumbnail">
        <?php qs_single_post_thumbnail(); ?>
    </div>
    <div class="qs-post-single--content">
        <?php
            the_content(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'qs' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post( get_the_title() )
                )
            );
        ?>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->

