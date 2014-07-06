<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Tokyo
 * @since Tokyo 0.1
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">

			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
					get_sidebar( 'footer' );

			?>

			<div id="site-generator">
			
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
</section>
<?php wp_footer(); ?>
</div>
<div class="row">
	&nbsp;
</div>
</body>
<script src="<?php echo( get_stylesheet_directory_uri() . '/js/menu.js' ); ?>" type="text/javascript"></script>
</html>
