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
        </div>
<div class="qs-post--content">
            <?php
                the_excerpt();
            ?>
        </div>

        <?php the_title( '<h2 class="qs-post--title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );?>

       <div class="qs-post--button">
            <a href="<?php the_permalink(); ?>" class="qs-btn btn-primary btn-sm">Read More <i class="fa fa-angle-right"></i></a>
        </div>
        <!-- Post Tags
            <div class="qs-post--tags">
                <?php qs_tag_list(); ?>
            </div>
        -->
    </article><!-- #post-<?php the_ID(); ?> -->

