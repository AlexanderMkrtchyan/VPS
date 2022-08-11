<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package qs
 */

get_header();
?>
    <div class="container">
        <div class="qs-error--content">
            <span class="text-404">404</span>
            <h1 class="qs-page--title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'qs' ); ?></h1>
            <p class="qs-error--text"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'qs' ); ?></p>
            <?php get_search_form(); ?>
            <a class="qs-btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo __('Go Home','qs') ?></a>
        </div>
    </div>
<?php
get_footer();
