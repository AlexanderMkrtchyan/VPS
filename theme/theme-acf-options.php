<?php
//  Theme Admin Options
if (current_user_can('administrator')) {
    if( function_exists('acf_add_options_page') ) {

        acf_add_options_page(array(
            'page_title' 	=> 'Theme General Settings',
            'menu_title'	=> 'Theme Settings',
            'menu_slug' 	=> 'theme_general_settings',
            'capability'	=> 'edit_posts',
            'redirect'		=> false,
            'post_id' => 'option_general',
        ));

        acf_add_options_sub_page(array(
            'page_title' 	=> 'Theme Blog Settings',
            'menu_title'	=> 'Blog',
            'parent_slug'	=> 'theme_general_settings',
            'post_id' => 'option_blog',

        ));

        acf_add_options_sub_page(array(
            'page_title' 	=> 'Theme Header Settings',
            'menu_title'	=> 'Header',
            'parent_slug'	=> 'theme_general_settings',
            'post_id' => 'option_header'
        ));

        acf_add_options_sub_page(array(
            'page_title' 	=> 'Theme Footer Settings',
            'menu_title'	=> 'Footer',
            'parent_slug'	=> 'theme_general_settings',
            'post_id' => 'option_footer'
        ));
    }
}

/*
//  Add style tag in head
function vw_hook_css() {
    $theme_color = get_field('vw_select_theme_color', 'option');
    if(empty($theme_color)){
        $theme_color = '#EE3A07';
    }
    list($r, $g, $b) = sscanf($theme_color, "#%02x%02x%02x");
    $theme_color_rgb = $r.','.$g.','.$b;
    ?>
    <style id="vw-theme-color-scheme">
        :root{
            --primary-scheme:<?php echo $theme_color; ?>;
            --primary-scheme-rgb: <?php echo $theme_color_rgb; ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'vw_hook_css');
*/