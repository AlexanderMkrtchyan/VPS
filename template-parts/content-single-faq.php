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

<style type="text/css">	
    .prefix-accordion {
    margin: 0;
    padding: 0;
    list-style: none;
    }

    .prefix-accordion li {
    margin: 0;
    }

    .prefix-accordion li:last-child a {
    border-bottom: none;
    }

    .prefix-accordion--head {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    }

    .prefix-accordion--icon:before {
    display: block;
    }

    .prefix-accordion--body {
    display: none;
    }

    .acc-style li.active a {
    background-color: #ac9d24;
    color: #fff !important;
    }

    .acc-style li.active .prefix-accordion--icon:before {
    content: '-';
    }

    .acc-style .prefix-accordion--head {
    background-color: #32373C;
    padding: 10px 30px 10px 10px;
    border-bottom: 1px solid #fff;
    color: #fff !important;
    }

    .acc-style .prefix-accordion--icon:before {
    content: '+';
    -webkit-transition: .2s;
    transition: .2s;
    font-size: 20px;
    }

    .acc-style .prefix-accordion--body {
    padding: 15px;
    }
</style>

<article id="post-<?php the_ID(); ?>" <?php post_class($class ='qs-faq--single'); ?>>

    <h1 class="color-black"><?php the_title() ?></h1>
    <div class="qs-faq--content">        
        <?php if( have_rows('faq_tabs', $post_id) ): ?>      
                <ul class="prefix-accordion acc-style">
                <?php $list_count = 0; ?>       
                
                <?php while( have_rows('faq_tabs', $post_id) ): the_row(); 
                        $faq_title = get_sub_field('faq_title');
                        $faq_text = get_sub_field('faq_text');
                        $list_count++;
                    ?>
                    <li>
                       
                        <a href="#acc<?php echo $list_count; ?>" class="prefix-accordion--head">
                            <span class="prefix-accordion--title"><?php echo $faq_title ?></span>
                            <span class="prefix-accordion--icon"></span>
                        </a>
                        <div id="acc<?php echo $list_count; ?>" class="prefix-accordion--body">
                            <?php echo $faq_text ?>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->

