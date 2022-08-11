<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package qs
 */

?>

    <article id="post-<?php the_ID(); ?>" <?php post_class($class ='qs-post'); ?>>

        <div class="qs-post--image">
            <a class="qs-post--thumbnail" href="<?php the_permalink(); ?>">
                <?php qs_post_thumbnail();?>
            </a>
            <?php qs_edit_post(); ?>
        </div>
        <div class="qs-post--meta">
            <?php
                if ( 'post' === get_post_type() ) : ?>
                    <div class="qs-post--meta-author">
                        <?php qs_posted_by(); ?>
                    </div>
                    <div class="qs-post--meta-date">
                        <?php qs_posted_on(); ?>
                    </div>
                    <div class="qs-post--meta-comments">
                        <?php qs_comments(); ?>
                    </div>
                <?php endif;
            ?>
        </div>
        <?php qs_category_list(); ?>
        <?php the_title( '<h2 class="qs-post--title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );?>

        <div class="qs-post--content">
            <?php
                the_excerpt();
            ?>
        </div>
        <div class="qs-post--button">
            <a href="<?php the_permalink(); ?>" class="qs-btn btn-primary">Read More</a>
        </div>
        <!-- Post Tags
            <div class="qs-post--tags">
                <?php qs_tag_list(); ?>
            </div>
        -->
    </article><!-- #post-<?php the_ID(); ?> -->

