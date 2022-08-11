<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package qs
 */

get_header();
?>

    <div class="qs-main--inner">
        <div class="container">
            <h1 class="qs-page--title">
                <?php printf( esc_html__( 'Search Results for: %s', 'qs' ), '<span>' . get_search_query() . '</span>' ); ?>
            </h1>
            <?php if ( have_posts() ) : ?>
            <div class="row">
                <div class="col-md-9">
                    <div class="qs-post--loop">
                        <div class="row gutter-y-30">
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php get_template_part( 'template-parts/content', 'search' ); ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <?php qs_pagination();?>
                </div>
                <div class="col-md-3">
                   <?php get_sidebar(); ?>
                </div>
            </div>
            <?php else : ?>
                <?php get_template_part( 'template-parts/content', 'none' );?>
            <?php endif; ?>
        </div>
    </div>

<?php
get_footer();
