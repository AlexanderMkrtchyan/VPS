<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package qs
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <link rel="stylesheet" href="<?php echo get_site_url(); ?>/wp-content/themes/dating/css/custom_1.css">
    <script>
        WebFont.load({
            google: {
                families: ['Catamaran:100,200,300,400', 'Source Serif Pro:300,400,600']
            },
        });
    </script>
<!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
     <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Calibri:400,700,400italic,700italic"> -->
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'qs'); ?></a>
<header class="qs-header--outer header-jump_js">
    <div class="qs-header">
        <div class="qs-header--container">
            <div class="menu-open-btn menu-open-btn_js">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="qs-logo--wrap">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <!--Logo-->
                    <?php
                    $logo = get_field('header_logo', 'option_header');
                    if ($logo) : ?>
                        <img class="qs-logo" src="<?php echo $logo['url']; ?>" alt="<?php bloginfo('name'); ?>">
                    <?php else: ?>
                        Logo
                    <?php endif; ?>
                    <span class="qs-logo--text"><span class="first_letter">Q</span>uigley Shores</span>
                </a>
            </div>
            <nav class="mobile-nav_js qs-menu">
                <div class="qs-menu--mobile-head">
                    <div class="qs-menu--head-logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <!--Logo-->
                            <?php
                            $logo = get_field('header_logo', 'option');
                            if ($logo) : ?>
                                <img src="<?php echo $logo['url']; ?>" alt="<?php bloginfo('name'); ?>">
                            <?php else: ?>
                                Logo
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="menu-close-btn menu-close-btn_js">
                        <span></span>
                        <span></span>
                    </div>
                </div>



                <div class="qs-menu--mobile-body">
                    <?php

                        if (has_nav_menu('header-menu')) {
                            wp_nav_menu(
                                array(
                                    'container' => 'ul',
                                    'theme_location' => 'header-menu',
                                    'menu_class' => 'qs-menu--nav general-menu_js',
                                    'walker' => new New_Theme_Menu()
                                )
                            );
                        } else {
                            echo '<b>Menu</b>';
                        }

                    ?>

                </div>

               <div class="qs-menu--mobile-body">
                   <?php
                   /*
                       if (has_nav_menu('header-menu-logged-in')) {
                            wp_nav_menu(
                                array(
                                    'container' => 'ul',
                                    'theme_location' => 'header-menu-logged-in',
                                    'menu_class' => 'qs-menu--nav general-menu_js',
                                    'walker' => new New_Theme_Menu()
                                )
                            );
                        } else {
                            echo '<b>Menu</b>';
                        }
                   */
                   ?>
               </div>

            </nav>
            <div style="display:none;" class="qs-notif">
                <span id="qs-notif_js" class="qs-notif--icon">
                    <svg role="img">
                        <use href="<?php echo get_stylesheet_directory_uri() ?>/icons/icons.svg#notif"/>
                    </svg>
                    <span class="qs-notif--count">
                        10
                    </span>
                </span>
                <div id="qs-notif-list_js" class="qs-notif--list">
                    <div id="klir"></div>
                    <div class="qs-notif--item">
                        <div class="qs-notif--img">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/demo/upl1.png" alt="">
                        </div>
                        <div class="qs-notif--content">
                            <div class="qs-notif--part">
                                <a href="">Julia Smith</a> sent you notification. Do you want to make a friendship?
                                <div class="qs-notif--btn">
                                    <a class="qs-btn btn-secondary btn-xsm" href="">Add to friend</a>
                                </div>
                            </div>
                            <div class="qs-notif--part">
                                <time>3 Nov 11:30</time>
                            </div>
                        </div>
                    </div>
                    <div class="qs-notif--item">
                        <div class="qs-notif--img">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/demo/upl1.png" alt="">
                        </div>
                        <div class="qs-notif--content">
                            <div class="qs-notif--part">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, velit!
                            </div>
                            <div class="qs-notif--part">
                                <time>3 Nov 11:30</time>
                            </div>
                        </div>
                    </div>
                    <div class="qs-notif--item">
                        <div class="qs-notif--img">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/demo/upl1.png" alt="">
                        </div>
                        <div class="qs-notif--content">
                            <div class="qs-notif--part">
                                Lorem ipsum dolor sit amet, <a href="">consectetur adipisicing</a> elit. Accusamus, velit!
                            </div>
                            <div class="qs-notif--part">
                                <time>3 Nov 11:30</time>
                            </div>
                        </div>
                    </div>
                    <div class="qs-notif--item">
                        <div class="qs-notif--img">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/demo/upl1.png" alt="">
                        </div>
                        <div class="qs-notif--content">
                            <div class="qs-notif--part">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, velit!
                            </div>
                            <div class="qs-notif--part">
                                <time>3 Nov 11:30</time>
                            </div>
                        </div>
                    </div>
                    <div class="qs-notif--item">
                        <div class="qs-notif--img">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/demo/upl1.png" alt="">
                        </div>
                        <div class="qs-notif--content">
                            <div class="qs-notif--part">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, velit!
                            </div>
                            <div class="qs-notif--part">
                                <time>3 Nov 11:30</time>
                            </div>
                        </div>
                    </div>
                    <div class="qs-notif--item">
                        <div class="qs-notif--img">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/demo/upl1.png" alt="">
                        </div>
                        <div class="qs-notif--content">
                            <div class="qs-notif--part">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, velit!
                            </div>
                            <div class="qs-notif--part">
                                <time>3 Nov 11:30</time>
                            </div>
                        </div>
                    </div>
                    <div class="qs-notif--item qs-notif--more">
                        <a href="">- See more -</a>
                    </div>
                </div>
            </div>
            <div class="qs-header--links">
                <a href="<?php echo esc_url(home_url('/take-a-tour/')); ?>">
                    <!--span class="sign-d">Sign In/ Sign Up</span-->
                    <!--span class="sign-m">
                        <svg role="img">
                            <use href="<?php echo get_stylesheet_directory_uri() ?>/icons/icons.svg#sign"/>
                        </svg>
                    </span-->
                </a>
            </div>

        </div>
    </div>
</header>

<main id="primary" class="site-main qs-main">
    <div style="display: none" id="my_id" data-id="<?php echo get_current_user_id(); ?>"></div>
    <div style="max-width:300px; display:none" id="notificat">
        <p style="color:white;" id="request_name"></p>
        <img id='request_image' src="" alt="">
        <button id="accept_request">Accept</button>
        <button id="deny_request">Deny</button>
    </div>
    <div class="step5 proff container"><div class="container"> <div class="col-lg-11 col-md-12 mauto">
        <?php if(is_user_logged_in()){ echo do_shortcode('[dashboard_links]'); } ?>
    </div></div></div>
   

