<?php
//	Register widgets
function qs_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'qs' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'qs' ),
            'before_widget' => '<div id="%1$s" class="qs-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="qs-widget--title">',
            'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Shop Sidebar', 'qs' ),
            'id'            => 'sidebar-shop',
            'description'   => esc_html__( 'Add widgets here.', 'qs' ),
            'before_widget' => '<div id="%1$s" class="qs-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="qs-widget--title">',
            'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Single Product Sidebar', 'qs' ),
            'id'            => 'sidebar-single-product',
            'description'   => esc_html__( 'Add widgets here.', 'qs' ),
            'before_widget' => '<div id="%1$s" class="qs-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="qs-widget--title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'qs_widgets_init' );