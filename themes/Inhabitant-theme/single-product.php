<?php
/**
 * The template for displaying all single posts.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header">

							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'large' ); ?>
							<?php endif; ?>
						
					</header><!-- .entry-header -->

					<div class="entry-content">
										
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							<p class="price"><?php echo CFS()->get( 'price' ); ?></p>
							<?php the_content(); ?>
							<div class="buttons-wrapper">
								<button class="link-button"><i class="fab fa-facebook-f"></i>LIKE</button>
								<button class="link-button"><i class="fab fa-twitter"></i>TWEET</button>
								<button class="link-button"><i class="fab fa-pinterest"></i>PIN</button>

							</div>

						
					</div><!-- .entry-content -->

					<footer class="entry-footer">
						<?php red_starter_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				</article><!-- #post-## -->

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
