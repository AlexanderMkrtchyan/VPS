<?php
//  Remove admin bar html margin
function remove_admin_bar_bump() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_bar_bump');

//  Remove h2 tag from post pagination
function theme_sanitize_pagination($content) {
    // Remove h2 tag
    $content = preg_replace('#<h2.*?>(.*?)<\/h2>#si', '', $content);
    return $content;
}
add_action('navigation_markup_template', 'theme_sanitize_pagination');

//  Limit post text on blog page
function theme_excerpt_length($length){
    return 20;
}
add_filter('excerpt_length', 'theme_excerpt_length');

//  Change comment submit button
function comment_form_submit_button($button) {
    $button ='<button class="qs-btn btn-primary" type="submit">Post Comment' . get_comment_id_fields() . '</button>';
    return $button;
}
add_filter('comment_form_submit_button', 'comment_form_submit_button');

// remove p tag from contact form 7
add_filter('wpcf7_autop_or_not', '__return_false');

// Enable svg upload
function qs_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'qs_mime_types');

//  Remove some settings from customizer admin panel
add_action( "customize_register", "qs_remove_customize_settings" );
function qs_remove_customize_settings( $wp_customize ) {
    $wp_customize->remove_panel("ajax_pagination_settings");

}

//  Remove “Category:” from category title
function prefix_category_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'prefix_category_title' );