<?php
/**
 * The template for displaying the footer.
 *
 * @package RED_Starter_Theme
 */

?>

			</div><!-- #content -->

			<footer style="background: url(<?php echo get_stylesheet_directory_uri() . '/images/dark-wood.png'; ?>)" id="colophon" class="site-footer" role="contentinfo">
				<div id="footer-sidebar" class="secondary">
					<div id="footer-sidebar1" class="footer-sidebar1">
						<?php
						if(is_active_sidebar('footer-sidebar-1')){
						dynamic_sidebar('footer-sidebar-1');
						}
						?>
						<div class="footer-logo">
							<a href="//localhost:3000/Inhabitant-Project4/"><img src=" <?php echo get_stylesheet_directory_uri(); ?>/images/logos/inhabitent-logo-text.svg" alt="inhabitent logo text"></a>
						</div>
					</div>

				</div>
				<div class="site-info">
					<?php printf( esc_html( 'COPYRIGHT © 2019 INHABITENT' ), 'WordPress' ); ?>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- #page -->

		<?php wp_footer(); ?>

	</body>
</html>
