<?php
/**
 * The main template file
 * @package qs
 */

get_header();
$query_object = get_queried_object();
?>
    <!-- Blog Heading-->
    <?php require get_template_directory() . '/blocks/top-heading-section-blog.php'; ?>
    <div class="<?php echo $prefix_top_class ?>">
        <div class="container">
            <h1 class="color-white text-center">
                <?php if(!empty($prefix_top_title_blog)) : ?>
                    <?php echo $prefix_top_title_blog?>
                <?php else: ?>
                    <?php single_post_title() ?>
                <?php endif; ?>
            </h1>
            <?php if(!empty($prefix_top_description_blog)) : ?>
                <div class="qs-archive--description color-white text-center">
                    <?php echo $prefix_top_description_blog; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if(is_user_logged_in()): ?>

    <div class="qs-main--inner bgc-dark">
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

    <?php else : ?>

    <section class="qs-section has-bgc bgc-darker color-white">
        <div class="container">
            <?php if( have_rows('blog_box', $query_object) ): ?>
                <div class="row gutter-y-30">
                    <?php while( have_rows('blog_box', $query_object) ): the_row();
                        $title = get_sub_field('title', $query_object);
                        $text = get_sub_field('text', $query_object);
                        $image = get_sub_field('image', $query_object);
                        ?>
                        <div class="col-lg-4">
                            <div class="qs-blog--box">
                                <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                                <div class="qs-blog--text-hover">
                                    <h2 class="color-white text-center"><?php echo $title ?></h2>
                                    <?php echo $text ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php endif; ?>


<?php

get_footer();
