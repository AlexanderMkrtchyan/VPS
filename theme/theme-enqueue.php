<?php

// Styles and Scripts
function qs_scripts() {
    // wp_enqueue_script("jquery");
    //  fancy css 
    wp_enqueue_style( 'qs-fancy-css', get_template_directory_uri() . '/css/jquery.fancybox.min.css', array(), _S_VERSION );

    //  Slick slider
    wp_enqueue_script( 'qs-slick-js', get_template_directory_uri() . '/js/slick.min.js', array(), _S_VERSION, true );

    //  Fancybox
    wp_enqueue_script( 'qs-fancy-js', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery'), _S_VERSION, true );
    //Server part
    wp_enqueue_script( 'socket.io', "https://cdn.socket.io/3.1.3/socket.io.min.js", _S_VERSION, true );
    wp_enqueue_script( 'peer adapter', "https://webrtc.github.io/adapter/adapter-latest.js", _S_VERSION, true );
    wp_enqueue_script( 'peer js', "https://unpkg.com/peerjs@1.3.1/dist/peerjs.min.js",  _S_VERSION, true );
    wp_localize_script( 'peer adapter', 'ajax_object',array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'directory_uri' => get_template_directory_uri() ) );



    //  Sign-in JS
  /*  if(is_page_template( 'page-templates/template-sign-in.php')){ 
        wp_enqueue_script( 'qs-sign-in-js', get_template_directory_uri() . '/dating-js/sign-in.js', array('jquery'), _S_VERSION, true );
    }*/

    //  Profile-edit
    if(is_page_template( 'page-templates/template-profile-edit.php' )){
        wp_enqueue_script( 'template-profile-edit', get_template_directory_uri() . '/dating-js/template-profile-edit.js', array('jquery'), _S_VERSION, true );
    }

    if(is_page_template( 'page-templates/template-join-step-1.php' )){
        wp_enqueue_style( 'teleport-css',  get_template_directory_uri() . '/css/teleport-autocomplete.css', array() , _S_VERSION );
        wp_enqueue_script( 'template-join-step-1', get_template_directory_uri() . '/dating-js/template-join-step-1.js', array('jquery'), _S_VERSION, true );
        wp_enqueue_script( 'teleport-autocomplete', get_template_directory_uri() . '/dating-js/teleport-autocomplete.min.js', array('jquery'), _S_VERSION, true );
        wp_localize_script( 'template-join-step-1', 'ajax_object',array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    }

    if(is_page_template( 'page-templates/template-join-step-2.php' )){
        wp_enqueue_script( 'template-join-step-2', get_template_directory_uri() . '/dating-js/template-join-step-2.js', array('jquery'), _S_VERSION, true );
        wp_localize_script( 'template-join-step-2', 'ajax_object',array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    }
    
    if(is_page_template( 'page-templates/template-join-step-3.php' )){
        wp_enqueue_script( 'template-join-step-3', get_template_directory_uri() . '/dating-js/template-join-step-3.js', array('jquery'), _S_VERSION, true );
        wp_enqueue_script( 'face-api', get_template_directory_uri() . '/dating-js/face-api.min.js', array('jquery'), _S_VERSION, true );
        wp_localize_script( 'template-join-step-3', 'ajax_object',array( 'ajax_url' => admin_url( 'admin-ajax.php' ),'file_uri' => get_theme_file_uri() ) );
    }

    if(is_page_template( 'page-templates/template-profile.php' )){
        wp_enqueue_script( 'heading', get_template_directory_uri() . '/dating-js/header-block.js', array('jquery'), _S_VERSION, true );
    }

    if(is_page_template( 'page-templates/template-join-step-4.php' )){
        wp_enqueue_script( 'template-join-step-4', get_template_directory_uri() . '/dating-js/template-join-step-4.js', array('jquery'), _S_VERSION, true );
        wp_localize_script( 'template-join-step-4', 'ajax_object',array( 'ajax_url' => admin_url( 'admin-ajax.php' ),'file_uri' => get_theme_file_uri() ) );
    }

    if(is_page_template( 'page-templates/template-profile-edit.php' )){
        wp_enqueue_script( 'step-4-for-profile', get_template_directory_uri() . '/dating-js/template-join-step-4.js', array('jquery'), _S_VERSION, true );
        wp_localize_script( 'step-4-for-profile', 'ajax_object',array( 'ajax_url' => admin_url( 'admin-ajax.php' ),'file_uri' => get_theme_file_uri() ) );
    }

    if(is_page_template( 'page-templates/template-wheel.php' )){
        wp_enqueue_script( 'wheel-js', get_template_directory_uri() . '/dating-js/wheel.js', array('jquery'), _S_VERSION, true );
        wp_enqueue_style( 'wheel-css',  get_template_directory_uri() . '/css/wheel.css', array() , _S_VERSION );
    }
    
    if(is_page_template( 'page-templates/template-chat.php' )){
        wp_enqueue_script( 'chat-js', get_template_directory_uri() . '/dating-js/template-chat.js', array('jquery'), _S_VERSION, true );
    }

    if(is_page_template( 'page-templates/template-virtual-dating.php' )){
        wp_enqueue_script( 'virtual-dating', get_template_directory_uri() . '/dating-js/template-virtual-dating.js', array('jquery'), _S_VERSION, true );
        
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }


    if(is_page_template( 'page-templates/template-sign-in.php' )){
        wp_enqueue_script( 'face-api-sign-in', get_template_directory_uri() . '/dating-js/face-api.min.js', array('jquery'), _S_VERSION, true );
        wp_enqueue_script( 'qs-sign-in-js', get_template_directory_uri() . '/dating-js/sign-in.js', array('jquery'), _S_VERSION, true );
        
    }

    // theme core css
    wp_enqueue_style( 'qs-theme', get_template_directory_uri() . '/css/theme.css', array(), _S_VERSION );
    wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.css', array(), _S_VERSION );

    //  Theme JS
    wp_enqueue_script( 'qs-js', get_template_directory_uri() . '/js/theme.min.js', array('jquery'), _S_VERSION, true );
    //  SVG for everybody
    wp_enqueue_script( 'qs-svg', get_template_directory_uri() . '/js/svg4everybody.min.js', array('jquery'), _S_VERSION, true );
    // Global JS
    wp_enqueue_script( 'global', get_template_directory_uri() . '/js/global.js', array('jquery'), _S_VERSION, true );
    // Notification JS
    // wp_enqueue_script( 'notifications', get_template_directory_uri() . '/js/notifications.js', array('jquery'), _S_VERSION, true );


}

function sign_in_async( $tag, $handle ) {
    if ( 'qs-sign-in-js' !== $handle) {
        return $tag;
    }
    return str_replace( ' src', ' async="async" src', $tag );
}
add_filter( 'script_loader_tag', 'sign_in_async', 10, 2 ); 

function template_profile_async( $tag, $handle ) {
    if ( 'template-profile-edit' !== $handle) {
        return $tag;
    }
    return str_replace( ' src', ' async="async" src', $tag );
}
add_filter( 'script_loader_tag', 'template_profile_async', 10, 2 );


function template_join_step_1( $tag, $handle ) {
    if ( 'template-join-step-1' === $handle) {
        $tag = '<script type="text/javascript"  async="async" src="' . esc_url( get_template_directory_uri() . '/dating-js/template-join-step-1.js' ) . '"></script>';
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'template_join_step_1', 10, 3 );



function template_join_step_3( $tag, $handle ) {
    if ( 'template-join-step-3' === $handle) {
        $tag = '<script type="text/javascript"  async="async" src="' . esc_url( get_template_directory_uri() . '/dating-js/template-join-step-3.js' ) . '"></script>';
    }
    if ( 'face-api' === $handle) {
        $tag = '<script  type="text/javascript"  async="async" src="' . esc_url( get_template_directory_uri() . '/dating-js/face-api.min.js' ) . '"></script>';
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'template_join_step_3', 10, 3 );

function template_join_step_4( $tag, $handle ) {
    if ( 'template-join-step-4' === $handle || 'template-profile-edit.php' == $handle) {
        $tag = '<script type="text/javascript"  async="async" src="' . esc_url( get_template_directory_uri() . '/dating-js/template-join-step-4.js' ) . '"></script>';
    }
    return $tag;
}

add_filter( 'script_loader_tag', 'template_join_step_4', 10, 3 );

function profile_edit( $tag, $handle ) {
    if ( 'step-4-for-profile' === $handle) {
        $tag = '<script type="text/javascript"  async="async" src="' . esc_url( get_template_directory_uri() . '/dating-js/template-join-step-4.js' ) . '"></script>';
    }
    return $tag;
}

add_filter( 'script_loader_tag', 'profile_edit', 10, 3 );


function wheel( $tag, $handle ) {
    if ( 'wheel-js' === $handle) {
        $tag = '<script type="text/javascript"  async="async" src="' . esc_url( get_template_directory_uri() . '/dating-js/wheel.js' ) . '"></script>';
    }
    return $tag;
}

add_filter( 'script_loader_tag', 'wheel', 10, 3 );

function chat( $tag, $handle ) {
    if ( 'chat-js' === $handle) {
        $tag = '<script type="text/javascript"  async="async" src="' . esc_url( get_template_directory_uri() . '/dating-js/template-chat.js' ) . '"></script>';
    }
    return $tag;
}

add_filter( 'script_loader_tag', 'chat', 10, 3 );


function header_block( $tag, $handle ) {
    if ( 'heading' === $handle) {
        $tag = '<script type="text/javascript"  async="async" src="' . esc_url( get_template_directory_uri() . '/dating-js/header-block.js' ) . '"></script>';
    }
    return $tag;
}

add_filter( 'script_loader_tag', 'header_block', 10, 3 );

function virtualDating( $tag, $handle ) {
    if ( 'virtual-dating' === $handle) {
        $tag = '<script type="text/javascript"  async="async" src="' . esc_url( get_template_directory_uri() . '/dating-js/template-virtual-dating.js' ) . '"></script>';
    }
    return $tag;
}

add_filter( 'script_loader_tag', 'virtualDating', 10, 3 );






function template_sign_in( $tag, $handle ) {
    if ( 'face-api-sign-in' === $handle) {
        $tag = '<script  type="text/javascript"  async="async" src="' . esc_url( get_template_directory_uri() . '/dating-js/face-api.min.js' ) . '"></script>';
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'template_sign_in', 10, 3 );





add_action( 'wp_enqueue_scripts', 'qs_scripts' );










