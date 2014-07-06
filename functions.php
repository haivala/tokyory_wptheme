<?php

/**
 * Display navigation to next/previous pages when applicable
 */
function tokyo_content_nav( $nav_id ) {
        global $wp_query;

        if ( $wp_query->max_num_pages > 1 ) : ?>
                <nav id="<?php echo $nav_id; ?>">
                        <?php next_posts_link( __( '<div class="nav-previous btn btn-mini"><i class="icon-arrow-left"></i> <!--:en-->Older posts<!--:--><!--:fi-->Vanhemmat artikkelit<!--:--></div>', 'tokyo' ) ); ?>
                        <?php previous_posts_link( __( '<div class="nav-next btn btn-mini"><!--:en-->Newer posts<!--:--><!--:fi-->Uudemmat artikkelit<!--:--> <i class="icon-arrow-right"></i></div>', 'tokyo' ) ); ?>
                </nav><!-- #nav-above -->
        <?php endif;
}

/** Change the automatic exerpt lenght **/
function tokyo_excerpt_length( $length ) {
	return 15;
}
add_filter( 'excerpt_length', 'tokyo_excerpt_length', 999 );

function tokyo_continue_reading_link() {
        return ' <a href="'. esc_url( get_permalink() ) . '">' . __( '<!--:en-->Continue reading <!--:--><!--:fi-->Jatka lukemista <!--:--><span class="meta-nav">&rarr;</span>', 'tokyo' ) . '</a>';
}

function tokyo_excerpt_more( $more ) {
        return $more . ' <a href="'. esc_url( get_permalink() ) . '">' . __( '<!--:en-->Continue reading <!--:--><!--:fi-->Jatka lukemista <!--:--><span class="meta-nav">&rarr;</span>', 'tokyo' ) . '</a>';
}
add_filter( 'excerpt_more', 'tokyo_continue_reading_link' );
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own tokyo_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function tokyo_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
                case 'pingback' :
                case 'trackback' :
        ?>
        <li class="post pingback">
                <p><?php _e( 'Pingback:', 'tokyo' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'tokyo' ), '<span class="edit-link">', '</span>' ); ?></p>
        <?php
                        break;
                default :
        ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <article id="comment-<?php comment_ID(); ?>" class="comment">
                        <footer class="comment-meta">
                                <div class="comment-author vcard">
                                        <?php
                                                $avatar_size = 68;
                                                if ( '0' != $comment->comment_parent )
                                                        $avatar_size = 39;

                                                echo get_avatar( $comment, $avatar_size );

                                                /* translators: 1: comment author, 2: date and time */
                                                printf( __( '%1$s %2$s <span class="says"><!--:en-->said:<!--:--><!--:fi-->sanoi:<!--:--></span>', 'tokyo' ),
                                                        sprintf( '<span class="fn bold">%s</span>', get_comment_author_link() ),
                                                        sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
                                                                esc_url( get_comment_link( $comment->comment_ID ) ),
                                                                get_comment_time( 'c' ),
                                                                /* translators: 1: date, 2: time */
                                                                sprintf( __( '%1$s <!--:en-->at<!--:--><!--:fi-->klo<!--:--> %2$s', 'tokyo' ), get_comment_date(), get_comment_time() )
                                                        )
                                                );
                                        ?>

                                        <?php edit_comment_link( __( 'Edit', 'tokyo' ), '<span class="edit-link">', '</span>' ); ?>
                                </div><!-- .comment-author .vcard -->

                                <?php if ( $comment->comment_approved == '0' ) : ?>
                                        <em class="comment-awaiting-moderation"><?php _e( '<!--:en-->Your comment is awaiting moderation.<--:--><!--:fi-->Viestisi odottaa hyväksyntää<!--:-->', 'tokyo' ); ?></em>
                                        <br />
                                <?php endif; ?>

                        </footer>

                        <div class="comment-content"><?php comment_text(); ?></div>

                        <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '
	                        <div class="reply btn btn-mini">
					<!--:en-->Reply to comment<!--:--><!--:fi-->Vastaa kommenttiin<!--:--><i class="icon-arrow-down"></i>
	                        </div><!-- .reply -->			
			', 'tokyo' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </article><!-- #comment-## -->
        <?php
                        break;
        endswitch;
}
 

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function tokyo_posted_on() {
        printf( __( '<span class="sep"><!--:en-->Posted on <!--:--><!--:fi-->Julkaistu <!--:--></span>
<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a>', 'tokyo' ),
                esc_url( get_permalink() ),
                esc_attr( get_the_time() ),
                esc_attr( get_the_date( 'c' ) ),
                esc_html( get_the_date() ),
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                esc_attr( sprintf( __( 'View all posts by %s', 'tokyo' ), get_the_author() ) ),
                get_the_author()
        );
}

/*
 * Contunue Readin linkin suomennos
 * <span class="by-author"> <span class="sep"> <!--:en-->by<!--:--><!--:fi-->,<!--:--> </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s<!--:fi-->n<!--:--></a><!--:fi--> toimesta<!--:--></span></span>', 'tokyo' ),
 */


?>
