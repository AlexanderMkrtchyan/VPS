<?php
/**
 * The sidebar containing the main widget area
 * @package qs
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside class="qs-sidebar" id="qs-sidebar" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
