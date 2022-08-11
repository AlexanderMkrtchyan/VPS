<?php
add_action( 'init', 'register_question' );

function register_question() {

    $labels = array(
        'name'               => __( 'Question', 'qs' ),
        'singular_name'      => __( 'Question', 'qs' ),
        'add_new'            => _x( 'New Question', '${4:Name}', 'qs' ),
        'add_new_item'       => __( 'New Question', 'qs}' ),
        'edit_item'          => __( 'Question edit', 'qs' ),
        'menu_name'          => __( 'Question', 'qs' ),
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

    register_post_type( 'Question', $args );
}


