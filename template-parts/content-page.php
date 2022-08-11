<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package qs
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="qs-page--thumbnail">
        <?php qs_single_post_thumbnail(); ?>
        <?php qs_edit_post(); ?>
    </div>
    <div class="qs-page--content">
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
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
