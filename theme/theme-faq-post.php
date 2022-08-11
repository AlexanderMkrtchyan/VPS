<?php
add_action( 'init', 'register_faq' );

function register_faq() {

    $labels = array(
        'name'               => __( 'FAQ', 'qs' ),
        'singular_name'      => __( 'FAQ', 'qs' ),
        'add_new'            => _x( 'New FAQ', '${4:Name}', 'qs' ),
        'add_new_item'       => __( 'New FAQ', 'qs}' ),
        'edit_item'          => __( 'FAQ edit', 'qs' ),
        'menu_name'          => __( 'FAQ', 'qs' ),
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => true,
        'description'         => 'description',
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        //'menu_icon'         => '',
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'has_archive'         => true,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => true,
        'capability_type'     => 'post',
        'supports'            => array(
            'title', 'editor', 'author', 'thumbnail',
            'custom-fields', 'trackbacks', 'comments',
            'revisions', 'page-attributes', 'post-formats'
        ),
    );

    register_post_type( 'FAQ', $args );
}


