<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package qs
 */

//  Post Thumbnail
if ( ! function_exists( 'qs_post_thumbnail' ) ) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function qs_post_thumbnail() {
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
        }
        the_post_thumbnail(
            'medium',
            array(
                'alt' => the_title_attribute(
                    array(
                        'echo' => false,
                    )
                ),
            )
        );
    }
endif;

// Single Post Thumbnail
if ( ! function_exists( 'qs_single_post_thumbnail' ) ) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function qs_single_post_thumbnail() {
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
        }
        the_post_thumbnail(
            'large',
            array(
                'alt' => the_title_attribute(
                    array(
                        'echo' => false,
                    )
                ),
            )
        );
    }
endif;


//  Post date
if ( ! function_exists( 'qs_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function qs_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
//		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
//			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
//		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$post_date_icon = '<i class="fa fa-clock-o"></i>';
		$posted_on = sprintf(
			/* translators: %s: post date. */
            esc_html_x( '%s', 'post date', 'qs' ),
			'<span class="qs-post--date">' . $time_string . '</span>'
		);
		echo $post_date_icon . $posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

//  Post Author
if ( ! function_exists( 'qs_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function qs_posted_by() {
        $post_user_icon = '<i class="fa fa-user"></i>';
	    $byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'qs' ),
			'<span class="qs-post--author"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo $post_user_icon . $byline; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

//  Post Categories
if ( ! function_exists( 'qs_category_list' ) ) :
    function qs_category_list() {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list( esc_html__( ' ', 'qs' ) );
            if ( $categories_list ) {
                /* translators: 1: list of categories. */
                printf( '<div class="qs-post--categories">' . esc_html__( '%1$s', 'qs' ) . '</div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }
        }
    }
endif;

//  Post Tags
if ( ! function_exists( 'qs_tag_list' ) ) :
    function qs_tag_list() {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {
            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'qs' ) );
            if ( $tags_list ) {
                /* translators: 1: list of tags. */
                printf( '<div class="qs-post--tags">' . esc_html__( 'Tagged %1$s', 'qs' ) . '</div>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }
        }
    }
endif;

//  Post Edit
if ( ! function_exists( 'qs_edit_post' ) ) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function qs_edit_post() {
        $text = __('Edit') .'<i class="fa fa-edit"></i>';
        edit_post_link($text, '', '', '', 'qs-post--edit');
    }
endif;

//  Post Comment
if ( ! function_exists( 'qs_comments' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function qs_comments() {

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			$post_comment_icon = '<i class="fa fa-comments"></i>';
		    echo $post_comment_icon .'<span class="qs-post--comments">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'qs' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}
	}
endif;

// Pagination
if ( ! function_exists( 'qs_pagination' ) ) :
    function qs_pagination(){
        the_posts_pagination(array(
            'mid_size' => 2,
            'prev_text' => __('<i class="fa fa-angle-left"></i>', 'textdomain'),
            'next_text' => __('<i class="fa fa-angle-right"></i>', 'textdomain'),
            'class' => __('qs-pagination'),
            'screen_reader_text' => __('')
        ));
    }
endif;

// Single Post Navigation
if ( ! function_exists( 'qs_post_navigation' ) ) :
    function qs_post_navigation(){
        the_post_navigation(
            array(
                'prev_text' => '<span class="nav-subtitle">' . '<i class="fa fa-angle-left"></i>' . '</span> <span class="nav-title">Previous article</span>',
                'next_text' => '<span class="nav-subtitle">' .  '</span> <span class="nav-title">Next article</span>' . '<i class="fa fa-angle-right"></i>',
                'class'              => 'qs-post-single--nav',
            )
        );
    }
endif;



if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
