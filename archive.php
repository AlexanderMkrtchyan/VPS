<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wordpress_framework
 */

get_header();

?>
    <!-- Taxonomy Heading Functions what is ERSS? asdasd-->
<style>
</style>
<?php require get_template_directory() . '/blocks/top-heading-section.php'; ?>
    <div class="<?php echo $prefix_top_class ?>">
        <div class="container">
            <h1 class="color-white">
                <?php the_archive_title(); ?>
            </h1>
            <div class="prefix-archive--description">
                <?php the_archive_description() ?>
            </div>

        </div>
    </div>

    <div class="qs-main--inner">
        <div class="container">
            <?php if ( have_posts() ) : ?>
                <div class="qs-post--loop">
                    <div class="row gutter-y-30">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <div class="col-lg-4 col-sm-6">
                                <?php get_template_part( 'template-parts/content', get_post_type() );?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php qs_pagination();?>
        </div>
    </div>
<?php

get_footer();
