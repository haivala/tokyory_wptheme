<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Tokyo
 * @since Tokyo 0.1
 */

get_header(); ?>

	<div id="primary">
		<div id="content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( '<!--:en-->This is somewhat embarrassing, isn&rsquo;t it?<!--:--><!--:fi-->Tämä on nyt vähän noloa<!--:-->', 'tokyo' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( '<!--:en-->It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.<!--:--><!--:fi-->Nyt näyttää siltä ettemme löydä mitä olit etsimässä. Ehkä joku seuraavista linkeistä auttaa.<!--:-->', 'tokyo' ); ?></p>

					<?php get_search_form(); ?>

					<?php the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ), array( 'widget_id' => '404' ) ); ?>

					<div class="widget">
						<h2 class="widgettitle"><?php _e( '<!--:en-->Most Used Categories<!--:--><!--:fi-->Eniten käytetyt kategoriat<!--:-->', 'tokyo' ); ?></h2>
						<ul>
						<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
						</ul>
					</div>

					<?php
					/* translators: %1$s: smilie */
					$archive_content = '<p>' . sprintf( __( '<!--:en-->Try looking in the monthly archives.<!--:--><!--:fi-->Kokeile kuukausittaista arkistoa<!--:--> %1$s', 'tokyo' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', array('count' => 0 , 'dropdown' => 1 ), array( 'after_title' => '</h2>'.$archive_content ) );
					?>

				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
