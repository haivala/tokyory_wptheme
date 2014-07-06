<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Tokyo
 * @since Tokyo 0.1
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<nav id="nav-single">
						<h3 class="assistive-text"><?php _e( '<!--:en-->Post navigation<!--:--><!--:fi-->Artikkeleiden selaus<!--:-->', 'tokyo' ); ?></h3>
						<?php previous_post_link( '%link', __( '<span class="nav-previous btn btn-mini"><i class="icon-arrow-left"></i> <!--:en-->Previous<!--:--><!--:fi-->Edellinen<!--:-->', 'tokyo' ) ); ?></span>
						<?php next_post_link( '%link', __( '<span class="nav-next btn btn-mini"><!--:en-->Next<!--:--><!--:fi-->Seuraava<!--:--> <i class="icon-arrow-right"></i>', 'tokyo' ) ); ?></span>
					</nav><!-- #nav-single -->

					<?php get_template_part( 'content', 'single' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>
