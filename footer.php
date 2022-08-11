<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package qs
 */

?>

</main><!-- #main -->

<footer class="qs-footer text-center bgc-black" id="page_id_<?php echo get_the_id(); ?>">
    <div class="container">
        <div class="links-left">
            <a class="terms" href="<?php echo get_home_url() . '/terms-of-use/' ?>" target="_blank">Terms of Use </a>
             <a class="privacyp" href="<?php echo get_home_url() . '/privacy-policy/' ?>" target="_blank">Privacy Policy </a>
        </div>
        <div class="links-right">
            <a href="<?php echo get_home_url() . '/about-us/' ?>" target="_blank">About Us </a>
             <a href="<?php echo get_home_url() . '/contact-us/' ?>" target="_blank">Contact Us </a>
        </div>
    </div>
</footer>
<div class="menu-overlay menu-overlay_js"></div>
<?php  wp_footer(); ?>


</body>
</html>
