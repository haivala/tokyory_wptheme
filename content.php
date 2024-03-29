<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Tokyo
 * @since Tokyo 0.1
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php if ( is_sticky() ) : ?>
				<hgroup>
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'tokyo' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<h3 class="entry-format"><?php _e( 'Featured', 'tokyo' ); ?></h3>
				</hgroup>
			<?php else : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'tokyo' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php endif; ?>

			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php tokyo_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>

			<?php if ( comments_open() && ! post_password_required() ) : ?>
			<div class="comments-link">
			</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( '<!--:en-->Continue reading<!--:--><!--:fi-->Jatka lukemista<!--:--> <i class="icon-arrow-right></i>', 'tokyo' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'tokyo' ) . '</span>', 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta">
			<?php $show_sep = false; ?>
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'tokyo' ) );
				if ( $categories_list ):
			?>
<!--			<span class="cat-links">
				<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'tokyo' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
				$show_sep = true; ?>
			</span> -->
			<?php endif; // End if categories ?>
			<?php

				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'tokyo' ) );
				if ( $tags_list ):
				if ( $show_sep ) : ?>


			<span class="sep"> | </span>
				<?php endif; // End if $show_sep ?> 
			<span class="tag-links">
				<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'tokyo' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
				$show_sep = true; ?>
			</span>
			<?php endif; // End if $tags_list ?>
			<?php endif; // End if 'post' == get_post_type() ?>

			<?php if ( comments_open() ) : ?>
<!--			<?php if ( $show_sep ) : ?>
			<span class="sep"> | </span>
			<?php endif; // End if $show_sep ?> -->
			<?php comments_popup_link( '<span class="leave-reply">' . __( '
				<span class="comments-link btn btn-mini">
					<!--:en-->Leave a reply<!--:--><!--:fi-->Kommentoi<!--:--> <i class="icon-comment"></i>', 'tokyo' ) . '</span>', __( '
				<span class="comments-link btn btn-mini">
					<b>1</b> <!--:en-->Reply<!--:--><!--:fi-->Kommentti<!--:--> <i class="icon-comment"></i>', 'tokyo' ), __( '
				<span class="comments-link btn btn-mini">
					<b>%</b> <!--:en-->Replies<!--:--><!--:fi-->Kommenttia<!--:--> <i class="icon-comment"></i>', 'tokyo' ) ); ?>
				</span>

			<?php endif; // End if comments_open() ?>

			<?php edit_post_link( __( '<!--:en-->Edit<!--:--><!--:fi-->Muokkaa<!--:-->', 'tokyo' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->
