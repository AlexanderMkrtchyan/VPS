<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package qs
 */
$post_id = get_the_ID();


?>
<article id="post-<?php the_ID(); ?>" <?php post_class($class ='qs-question--single'); ?>>
    <h1 class="qs-question--title question_title color-white"><?php the_title() ?></h1>
    <div class="qs-question--content">
        <?php if( have_rows('answers', $post_id) ): ?>
                <ul class="row gutter-y-30 qs-question--list question_answer">

                <?php while( have_rows('answers', $post_id) ): the_row();
                        $answer_title = get_sub_field('answer_title');
                        $answer_type = get_field('answer_types');

                    ?>
                    <li class="col-sm-6">
                        <label>
                            <?php if($answer_type == 'single') : ?>
                                <input name="answers" type="radio" />
                            <?php endif; ?>
                            <?php if($answer_type == 'multiple') : ?>
                                <input name="<?php echo $answer_title ?>" type="checkbox" />
                            <?php endif; ?>
                            <span class="qs-btn btn-primary"><?php echo $answer_title ?></span>
                        </label>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>

    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->

